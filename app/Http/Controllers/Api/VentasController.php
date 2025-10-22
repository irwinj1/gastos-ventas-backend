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
            ];
            //    return $objVentas;
            $ventas = Venta::create($objVentas);

            $total = 0;

           $images = $request->file('imagenes');
        
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
                if (isset($images[$key]) && $images[$key]->isValid()) {
                    $originalName = $images[$key]->getClientOriginalName();
                    $extension = $images[$key]->getClientOriginalExtension();
                    $tamanio = $images[$key]->getSize();
                    $path = $images[$key]->store('detalleVentas', 'public');
                    Archivo::create([
                        'id_tipo_archivo'=>1,
                        'id_referencia'=> $detalleVenta['id'],
                        'nombre_archivo'=> $originalName,
                        'ruta'=> $path,
                        'extension'=> $extension,
                        'tamanio'=> $tamanio,
                    ]);
                }
            }

            $ventas->total = $total;
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

}
