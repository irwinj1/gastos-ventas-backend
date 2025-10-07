<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Venta;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class VentasController extends Controller
{
    //
    use ApiResponse;
    public function index(Request $request){
        try {
            //code...
            $ventasQuery = Venta::with(['ventas', 'detalle_ventas', 'archivos']);

            if ($request->filled('busqueda')) {
                $busqueda = $request->busqueda;
                $ventasQuery->whereHas('clientes', function ($q) use ($busqueda) {
                    $q->whereRaw('nombre ILIKE ?', ["%{$busqueda}%"]);
                });
            }

            // Asignamos la paginación a una variable
            $ventas = $ventasQuery->paginate(10);

            $pagination = [
                'per_page' => $ventas->perPage(),
                'current_page' => $ventas->currentPage(),
                'last_page' => $ventas->lastPage(),
                'total' => $ventas->total(),
            ];
            return $this->success("Ventas obtenidas",200, $ventas, $pagination);

        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
