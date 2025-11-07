<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Clientes\ClienteCreateRequest;
use App\Http\Requests\Clientes\UpdateClienteRequest;
use App\Models\Entidades;
use App\Traits\ApiResponse;
use DB;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    use ApiResponse;
    /**

     *
     * @operationId Listados clientes
     */
    public function index(Request $request)
    {
        try {

            $clientes = Entidades::with(['distritos.municipios.departamentos.pais'])->where('es_cliente', true);
            if ($request->filled("buscar")) {
                $buscar = '%' . $request->buscar . '%'; // para coincidencia parcial

                $clientes = $clientes->where(function ($query) use ($buscar) {
                    $query->where("nombre_comercial", "ilike", $buscar)
                        ->orWhere("dui", "ilike", $buscar)
                        ->orWhere("nit", "ilike", $buscar)
                        ->orWhere("n_registro", "ilike", $buscar)
                        ->orWhere("telefono", "ilike", $buscar)
                        ->orWhere("email", "ilike", $buscar)
                        ->orWhere("direccion", "ilike", $buscar)
                        ->orWhere("nombre", "ilike", $buscar)
                        ->orWhere("apellido", "ilike", $buscar);
                });
            }

            $clientesData = $clientes->paginate(10);

            $pagination = [
                "perPage" => $clientesData->perPage(),
                "currentPage" => $clientesData->currentPage(),
                "total" => $clientesData->total(),
                "lastPage" => $clientesData->lastPage(),
            ];
            $dataFormatted = $clientesData->map(function ($clientes) {
                return [
                    "id" => $clientes->id,
                    "nombre" => $clientes->nombre,
                    "apellido" => $clientes->apellido,
                    "direccion" => $clientes->direccion,
                    "dui" => $clientes->dui ?? null,
                    "nit" => $clientes->nit ?? null,
                    "email" => $clientes->email ?? null,
                    "telefono" => $clientes->telefono ?? null,
                    "nRegistro" => $clientes->n_registro ?? null,
                    "nombreComercial" => $clientes->nombre_comercial ?? null,
                    "distrito" => [
                        "id" => $clientes->distritos->id,
                        "nombre" => $clientes->distritos->nombre
                    ],
                    "municipio" => [
                        "id" => $clientes->distritos->municipios->id,
                        "nombre" => $clientes->distritos->municipios->nombre
                    ],
                    "departamento" => [
                        "id" => $clientes->distritos->municipios->departamentos->id,
                        "nombre" => $clientes->distritos->municipios->departamentos->nombre
                    ],
                    "pais" => [
                        "id" => $clientes->distritos->municipios->departamentos->pais->id,
                        "nombre" => $clientes->distritos->municipios->departamentos->pais->nombre,
                        "siglas" => $clientes->distritos->municipios->departamentos->pais->siglas,
                        "codigoArea" => $clientes->distritos->municipios->departamentos->pais->codigo_area,
                        "mask" => $clientes->distritos->municipios->departamentos->pais->mask
                    ]

                ];
            });
            return $this->success("Clientes obtenidos", 200, $dataFormatted, $pagination);
        } catch (\Exception $th) {
            //throw $th;
            $this->error($th->getMessage());
        }
    }

    /**

     *
     * @operationId Crear cliente
     */
    public function createCliente(ClienteCreateRequest $request)
    {
        $validated = $request->validated();
        DB::beginTransaction();

        try {
            $cliente = [];
            if ($request->filled("nombre")) {
                $cliente["nombre"] = $validated["nombre"];
            }
            if ($request->filled("apellido")) {
                $cliente["apellido"] = $validated["apellido"];
            }
            if ($request->filled("nombreComercial")) {
                $cliente["nombre_comercial"] = $validated["nombreComercial"];
            }
            if ($request->filled("dui")) {
                $cliente["dui"] = $validated["dui"];
            }
            if ($request->filled("nit")) {
                $cliente["nit"] = $validated["nit"];
            }
            if ($request->filled("idDistrito")) {
                $cliente["id_distrito"] = $validated["idDistrito"];
            }
            if ($request->filled("registro")) {
                $cliente["n_registro"] = $validated["registro"];
            }
            if ($request->filled("telefono")) {
                $cliente["telefono"] = $validated["telefono"];
            }
            if ($request->filled("email")) {
                $cliente["email"] = $validated["email"];
            }
            if ($request->filled("direccion")) {
                $cliente["direccion"] = $validated["direccion"];
            }
            $cliente["es_cliente"] = true;
            $cliente["es_proveedor"] = false;

            $clientes = Entidades::create($cliente);
            if ($clientes) {
                DB::commit();
                return $this->success("Cliente creado", 200, $cliente);
            } else {
                DB::rollBack();
                return $this->error("Error al crear al cliene");
            }
        } catch (\Throwable $th) {
            DB::rollBack();
            $this->error('Error al crear cliente',500);
            
        }
    }

    /**

     *
     * @operationId Obtener cliente
     */
    public function getClienteId(Request $request, $id = null)
    {
        
        try {

            $cliente = Entidades::with(['distritos.municipios.departamentos.pais']);

            if ($id != null) {
                $cliente->where("id", $id);
            }

            if ($request->filled('nombre')) {
                $cliente->where('nombre', 'ilike', "%$request->nombre%");
            }
            if ($request->filled('apellido')) {
                $cliente->where('apellido', 'ilike', "%$request->apellido%");
            }
            if ($request->filled('nombreComercial')) {
                $cliente->where('nombre_comercial', 'ilike', "%$request->nombreComercial%");
            }

            $clienteData = $cliente->first();

            return $this->success("Cliente obtenido", 200, $clienteData);
        } catch (\Throwable $th) {
            //throw $th;
            $this->error($th->getMessage());
        }
    }

    /**

     *
     * @operationId Actualizar cliente
     */

    public function actualizarCliente(UpdateClienteRequest $request, $id)
    {
        DB::beginTransaction();

        try {
            $cliente = Entidades::findOrFail($id);

            $cliente->update($request->validated());

            DB::commit();

            return $this->success("Cliente actualizado correctamente",200, $cliente); 
        } catch (\Throwable $th) {
            DB::rollBack();

            return $this->error("Error al actualizar el cliente",500);
        }
    }

    /**

     *
     * @operationId Eliminar cliente
     */

    public function eliminarCliente(Request $request, $id = null)
    {
        try {
            DB::beginTransaction();
            $cliente = Entidades::find($id);

            $cliente->delete();

            DB::commit();
            return $this->success("Cliente eliminado", 200, $cliente);
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            $this->error('Error al eliminar cliente',500);
        }
    }
}
