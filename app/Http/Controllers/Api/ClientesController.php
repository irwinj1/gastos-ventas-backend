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
     * @operationId Obtener cliente
     */
    public function index(){
        try {
            $clietes = Entidades::all();

            $this->success("Obtener clientes",200, $clietes);
        } catch (\Throwable $th) {
            //throw $th;
            $this->error($th->getMessage());
        }
    }

    /**
     
     *
     * @operationId Crear cliente
     */
    public function createCliente(ClienteCreateRequest $request){
        $validated = $request->validated();
        
        try {
            $cliente = [];
            if($request->filled("nombre")){
                $cliente["nombre"] = $validated["nombre"];
            }
            if($request->filled("apellido")){
                $cliente["apellido"] = $validated["apellido"];
            }
            if($request->filled("nombreComercial")){
                $cliente["nombre_comercial"] = $validated["nombreComercial"];
            }
            if($request->filled("dui")){
                $cliente["dui"] = $validated["dui"];
            }
            if($request->filled("nit")){
                $cliente["nit"] = $validated["nit"];
            }
            if($request->filled("telefono")){
                $cliente["telefono"] = $validated["telefono"];
            }
            if($request->filled("email")){
                $cliente["email"] = $validated["email"];
            }
            if($request->filled("direccion")){
                $cliente["direccion"] = $validated["direccion"];
            }
            $cliente["es_cliente"] = true;
            $cliente["es_proveedor"] = false;

            return $this->success("data",200, $cliente);
            $clientes = Entidades::create($cliente);
            if($clientes){
                return $this->success("Cliente creado",200,$cliente);
            }else{
                return $this->error("Error al crear al cliene");
            }
        } catch (\Throwable $th) {
            //throw $th;
            $this->error($th->getMessage());
        }
    }
}
