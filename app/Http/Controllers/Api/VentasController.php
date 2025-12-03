<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CrearVentaRequest;
use App\Models\Archivo;
use App\Models\DetalleVenta;
use App\Models\TipoArchivo;
use App\Models\Venta;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VentasController extends Controller
{
    //
    use ApiResponse;

    /**

     *
     * @operationId Listado ventas
     */
    public function index(Request $request)
    {
        try {

            //code...
           // return $request->all();
            $ventasQuery = Venta::with(['entidades']);

            if ($request->filled('busqueda')) {
                $busqueda = $request->busqueda;
                $ventasQuery->whereHas('clientes', function ($q) use ($busqueda) {
                    $q->whereRaw('nombre ILIKE ?', ["%{$busqueda}%"]);
                });
            }

            // Asignamos la paginación a una variable
            $ventas = $ventasQuery->paginate(10);
            $vetasMap = $ventas->map(function ($v) {
                return [
                    "id"=> $v->id,
                    "total"=>$v->total,
                    "cliente"=>[
                        "id_cliente"=> $v->entidades->id,
                        "nombre"=> $v->entidades->nombre_comercial,
                    ]
                ];
            });
            $pagination = [
                'per_page' => $ventas->perPage(),
                'current_page' => $ventas->currentPage(),
                'last_page' => $ventas->lastPage(),
                'total' => $ventas->total(),
            ];
            return $this->success("Ventas obtenidas", 200, $vetasMap, $pagination);

        } catch (\Throwable $th) {
            //throw $th;
            $this->error($th->getMessage());
        }
    }


    /**

     *
     * @operationId Obtener venta
     */
    public function getVentaById($id){
        try {
            //code...

            $venta = Venta::with(['detalleVentas','entidades.distritos.municipios.departamentos.pais','archivos'])->where('id',$id)->first();

            $ventaFormated = [
                'detalleVenta'=>$venta->detalleVentas->map(function($q){
                    return [
                        'id'=>$q->id,
                        'id_venta'=>$q->id_venta,
                        'descripcion'=>$q->descripcion,
                        'cantidad'=>$q->cantidad,
                        'precioUnitario'=>$q->precio_unitario,
                        'ventasAfectadas'=>$q->ventas_afectadas,
                        'createdAt'=>$q->created_at
                    ];
                }),
                'cliente'=>[
                    'id'=>$venta->entidades->id,
                    'nombre'=>$venta->entidades->nombre,
                    'apellido'=>$venta->entidades->apellido,
                    'nombreComercial'=>$venta->entidades->nombre_comercial,
                    'email'=>$venta->entidades->email,
                    'dui'=>$venta->entidades->dui,
                    'nit'=>$venta->entidades->nit,
                    'telefono'=>$venta->entidades->telefono,
                    'direccion'=>$venta->entidades->direccion,
                    'esCliente'=>$venta->entidades->es_cliente,
                    'esProveedor'=>$venta->entidades->es_proveedor,
                    'registro'=>$venta->entidades->n_registro,
                    'distrito'=>[
                        'id'=>$venta->entidades->distritos->id,
                        'nombre'=>$venta->entidades->distritos->nombre,
                    ],
                    'municipio'=>[
                        'id'=>$venta->entidades->distritos->municipios->id,
                        'nombre'=>$venta->entidades->distritos->municipios->nombre,
                    ],
                    'departamento'=>[
                        'id'=>$venta->entidades->distritos->municipios->departamentos->id,
                        'nombre'=>$venta->entidades->distritos->municipios->departamentos->nombre,
                    ],
                    'paises'=>[
                        'id'=>$venta->entidades->distritos->municipios->departamentos->pais->id,
                        'nombre'=>$venta->entidades->distritos->municipios->departamentos->pais->nombre,
                        'siglas'=>$venta->entidades->distritos->municipios->departamentos->pais->siglas,
                        'codigoArea'=>$venta->entidades->distritos->municipios->departamentos->pais->codigo_area,
                        'mask'=>$venta->entidades->distritos->municipios->departamentos->pais->mask,
                    ],
                ],
                'archivos'=>[
                    'id'=>$venta->archivos->id,
                    'nombrearchivo'=>$venta->archivos->nombre_archivo,
                    'ruta'=>$venta->archivos->ruta,
                    'extension'=>$venta->archivos->extension,
                    'tamanio'=>$venta->archivos->tamanio,
                    'img'=>base64_encode(file_get_contents(storage_path('app/public/'.$venta->archivos->ruta)))
                ],
                'fechaFactura'=>$venta->fecha_factura,
                'total'=>$venta->total
            ];
            return $this->success('Detalle venta',200,$ventaFormated);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    /**

     *
     * @operationId Crear ventas
     */

    public function createVentas(CrearVentaRequest $request)
    {
        $validated = $request->validated();
        $idUser = auth("api")->user()->id;

        DB::beginTransaction();

        try {

            $objVentas = [
                "id_user" => $idUser,
                "id_entidad" => (int) $validated["clienteId"],
                "fecha_factura" => $validated['fechaFactura']
            ];
            //    return $objVentas;
            $ventas = Venta::create($objVentas);

            $total = 0;




            $paths = [];
            foreach ($validated['detalleVentas'] as $key => $detalle) {
                $total += $detalle['total'];

                $detalleVenta = DetalleVenta::create([
                    'descripcion' => $detalle['descripcion'],
                    'cantidad' => (int) $detalle['cantidad'],
                    'precio_unitario' => (float) $detalle['precioUnitario'],
                    'id_venta' => $ventas["id"],
                    'ventas_afectadas' => (float) $detalle['total'],
                ]);

                // Verificar si existe imagen para este detalle
                // Verificar si existe imagen para este detalle usando el mismo índice

            }
            if($request->hasFile('imagenes')){

                $originalName = $request->file('imagenes')->getClientOriginalName();
                $extension = $request->file('imagenes')->getClientOriginalExtension();
                $tamanio = $request->file('imagenes')->getSize();
                $path = $request->file('imagenes')->store('ventas', 'public');
                $archivo = Archivo::create([
                    'id_tipo_archivo'=>1,
                    'nombre_archivo'=> $originalName,
                    'ruta'=> $path,
                    'extension'=> $extension,
                    'tamanio'=> $tamanio,
                ]);
            }
            $ventas->total = $total;
            $ventas->id_referencia = $archivo->id;
            $ventas->save();

            DB::commit();

            return response()->json([
                'success' => true,
                'venta' => $paths,
            ]);

        } catch (\Exception $th) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => $th->getMessage(),
            ], 500);
        }
    }

    /**

     *
     * @operationId actualizar venta
     */
    public function actualizarVenta(Request $request,$id){

    }

    /**

     *
     * @operationId Eliminar venta
     */

    public function destroy($id){
        DB::beginTransaction();
        try {

            $ventas = Venta::find($id);
            $ventas->delete();

            $detalleVentas = DetalleVenta::where('id_venta', $ventas->id);
            foreach ($detalleVentas as $detalleVenta) {
                $detalleVenta->delete();
            }
            DB::commit();
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    /**

     *
     * @operationId exportar ventas
     */

    public function exportarPDF(Request $request){
        try {
            $ventas = Venta::with(['detalleVentas'])->whereIn('id',$request->ids)->get();
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
