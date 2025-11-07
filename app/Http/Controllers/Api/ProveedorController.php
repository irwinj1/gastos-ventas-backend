<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    /**

     *
     * @operationId Listados proveedores
     */
    public function index(Request $request)
    {
        try {

            $clientes = Entidades::with(['distritos.municipios.departamentos.pais'])->where('es_preoveedor', true);
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
}
