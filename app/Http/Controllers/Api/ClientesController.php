<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Clientes\ClienteCreateRequest;
use App\Models\Entidades;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    use ApiResponse;
    /**

     *
     * @operationId Obtener clientes
     */
    public function index(Request $request)
    {
        try {
            $clientes = Entidades::where('es_cliente',true);
            if($request->filled("nombreComercial")) {
                $clientes = $clientes->where("nombre_comercial","ilike", $request->nombre_comercial);
            }
            $clientesData = $clientes->paginate(10);
            $pagination = [
                "perPage"=> $clientesData->perPage(),
                "currentPage"=> $clientesData->currentPage(),
                "total"=> $clientesData->total(),
                "lastPage"=> $clientesData->lastPage(),
            ];
            $dataFormatted = $clientesData->map(function ($clientes) {
                return [
                    "nombre"=>$clientes->nombre,
                    "apellido"=> $clientes->apellido,
                    "direccion"=> $clientes->direccion,
                    "dui"=> $clientes->dui ?? null,
                    "nit"=> $clientes->nit??null,
                    "email"=> $clientes->email??null,
                    "telefono"=> $clientes->telefono??null,
                    "nRegistro"=> $clientes->n_registro??null,
                    "nombreComercial"=> $clientes->nombre_comercial??null,
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
                return $this->success("Cliente creado", 200, $cliente);
            } else {
                return $this->error("Error al crear al cliene");
            }
        } catch (\Throwable $th) {
            //throw $th;
            $this->error($th->getMessage());
        }
    }

    /**

     *
     * @operationId Obtener cliente
     */
    public function getClienteId(Request $request, $id = null)
    {
    
        try {
            
            $cliente = Entidades::query();

            if ($id != null) {
                $cliente->where("id", $id);
            }

            if ($request->filled('nombre')) {
               $cliente->where('nombre', 'ilike' ,"%$request->nombre%");
            }
            if ($request->filled('apellido')) {
                $cliente->where('apellido', 'ilike' , "%$request->apellido%");
            }
            if ($request->filled('nombreComercial')) {
                $cliente->where('nombre_comercial',  'ilike' ,"%$request->nombreComercial%");
            }

            $clienteData = $cliente->first();

            return $this->success("Cliente obtenido",200, $clienteData);
        } catch (\Throwable $th) {
            //throw $th;
            $this->error($th->getMessage());
        }
    }
}
