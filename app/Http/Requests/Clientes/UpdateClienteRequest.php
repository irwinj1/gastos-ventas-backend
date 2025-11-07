<?php

namespace App\Http\Requests\Clientes;

use Illuminate\Foundation\Http\FormRequest;

class UpdateClienteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
            "nombre"=> "nullable|max:100|string",
            "apellido"=> "nullable|max:100|string",
            "nombreComercial"=> "nullable|max:2000",
            "email"=> "nullable|email",
            "dui"=> "nullable|max:10",
            "nit"=> "nullable|max:20",
            "idDistrito"=>"nullable|exists:distritos,id",
            "registro"=>"nullable|max:20",
            "telefono"=> "nullable|max:9",
            "direccion"=> "nullable|max:2000",
        ];
    }
     public function messages(): array{
        return [
            "nombre.max"=> "El nombre no puede contener mas de 100 caracteres",
            "nombre.string"=> "El nombre debe de ser solo texto",
            "apellido.max"=> "El apellido no puede contener mas de 100 caracteres",
            "apellido.string"=> "El apellido solo debe ser texto",
            "nombreComercial.max"=>"El nombre comercial no debe de tener mas de 2000 caracteres",
            "dui.max"=> "Dui debe de tener maximo 10 caracteres",
            "nit.max"=>"NIT debe de tener macimo de 20 caractares",
            "idDistrito.exists"=>"El distrito debe ser valido",
            "registro.max"=> "El numero de registro no debe poseer mas de 20 caracteres",
            "telefono.max"=> "El Telefono no debe tener mas de 9 caracteres",
            "direccion.max"=> "La direccionn debe de tener mas de 2000 caractares",
        ];
    }
}
