<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Departamento;
use App\Models\Distrito;
use App\Models\Municipio;
use App\Models\Pais;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;

class CatalogosController extends Controller
{
    use ApiResponse;

    /**

     *
     * @operationId Listado paises
     */
    public function pais(Request $request){
        try {
            
            $pais = Pais::query();
            if ($request->filled('buscar')) {
                $buscar = "%$request->buscar%";
                $pais->where('nombre','ilike',$buscar)
                    ->orWhere('siglas','ilike',$buscar)
                    ->orWhere('codigo_area','ilike',$buscar)
                    ->orWhere('id','ilike',$buscar);
            }

            $paises = $pais->paginate(10);

            $pagination = [
                "perPage"=> $paises->perPage(),
                "currentPage"=> $paises->currentPage(),
                "total"=> $paises->total(),
                "lastPage"=> $paises->lastPage(),
            ];

            $paisData = $paises->map(function($q){
                return [
                    'id'=>$q->id,
                    'nombre'=>$q->nombre,
                    'siglas'=>$q->siglas,
                    'codigoArea'=>$q->codigo_area,
                    'mask'=>$q->mask
                ];
            });
           
            return $this->success('Paises obtenido',200,$paisData, $pagination);
        } catch (\Throwable $th) {
            //throw $th;
            return $this->error('Error al obtener los paises',401);
        }
    }

    /**

     *
     * @operationId Listado departamentos
     */

    public function departamentos(Request $request, $idPais){
        try {
            $depatamento = Departamento::where('id_pais',$idPais);
            if ($request->filled('buscar')) {
                $buscar = "%$request->buscar%";
                $depatamento->where('nombre','ilike',$buscar)   
                ->orWhere('id','ilike',$buscar); 
            }
            $departamentos = $depatamento->paginate(10);
            $pagination = [
                "perPage"=> $departamentos->perPage(),
                "currentPage"=> $departamentos->currentPage(),
                "total"=> $departamentos->total(),
                "lastPage"=> $departamentos->lastPage(),
            ];
            $departamentoFormat = $departamentos->map(function($q){
                return [
                    'id'=>$q->id,
                    'nombre'=>$q->nombre
                ];
            });
            return $this->success('Departamentos obtenidos',200,$departamentoFormat,$pagination);
        } catch (\Throwable $th) {
            return $this->error('Error al obtener los departamentos',401);
        }
    }

    /**

     *
     * @operationId Listado municipios
     */

    public function municipios(Request $request, $idMunicipio){
        try {
            $municipios = Municipio::where('id_departamento',$idMunicipio);

            if ($request->filled('buscar')) {
                $buscar = "%$request->buscar%";
                $municipios->where('nombre','ilike',$buscar)
                ->orWhere('id','ilike',$buscar);   
            }

            $municipiosData = $municipios->paginate(10);

            $pagination = [
                "perPage"=> $municipiosData->perPage(),
                "currentPage"=> $municipiosData->currentPage(),
                "total"=> $municipiosData->total(),
                "lastPage"=> $municipiosData->lastPage(),
            ];

            $municipioFormat = $municipiosData->map(function($q){
                return [
                    'id'=>$q->id,
                    'nombre'=>$q->nombre
                ];
            });

            return $this->success('Listado de municipios',200,$municipioFormat,$pagination);
        } catch (\Exception $e) {
            //throw $th;
            return $this->error('Error al obtener los municipio '.$e,401);
        }
    }

    /**

     *
     * @operationId Listado distritos
     */

    public function distritos(Request $request, $idMunicipio){
        try {
            $distritos = Distrito::where('id_municipio',$idMunicipio);
            if ($request->filled('buscar')) {
                $buscar = "%$request->buscar%";
                $distritos->where('nombre','ilike',$buscar)
                ->orWhere('id','ilike',$buscar);    
            }
            $distritosData = $distritos->paginate(10);
            $pagination = [
                "perPage"=> $distritosData->perPage(),
                "currentPage"=> $distritosData->currentPage(),
                "total"=> $distritosData->total(),
                "lastPage"=> $distritosData->lastPage(),
            ];
            $distritosFormat = $distritosData->map(function($q){
                return [
                    'id'=>$q->id,
                    'nombre'=>$q->nombre
                ];
            });

            return $this->success('Distritos obtenidos',200,$distritosFormat,$pagination);
        } catch (\Throwable $th) {
            //throw $th;
            $this->error('Error al obtener los distritos',401);
        }
    }
}
