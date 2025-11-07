<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CrearVentaRequest extends FormRequest
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
             "clienteId" => "required|exists:entidades,id",
            "detalleVentas" => "required|array",
            "detalleVentas.*.descripcion" => "required|string|max:255",
            "detalleVentas.*.cantidad" => "required|integer|min:1",
            "detalleVentas.*.precioUnitario" => "required|numeric|min:0",
            "detalleVentas.*.total" => "required|numeric|min:0",
            'imagenes' => ['nullable', 'file', 'mimes:jpg,jpeg,png', 'max:2048'],
           
            

        ];
    }
    public function messages(): array
    {
        return [
             "clienteId.required" => "El id del cliente es requerido",
            "clienteId.exists" => "Debe seleccionar un cliente",

            "detalleVentas.required" => "Debe ingresar detalles de ventas",
            "detalleVentas.array" => "El detalle de las ventas debe ser un array",

            "detalleVentas.*.descripcion.required" => "La descripción es obligatoria",
            "detalleVentas.*.cantidad.required" => "La cantidad es obligatoria",
            "detalleVentas.*.cantidad.integer" => "La cantidad debe ser un número entero",
            "detalleVentas.*.precioUnitario.required" => "El precio unitario es obligatorio",
            "detalleVentas.*.precioUnitario.numeric" => "El precio unitario debe ser un número",
            "detalleVentas.*.total.required" => "El total es obligatorio",
            "detalleVentas.*.total.numeric" => "El total debe ser un número",

            
            'imagenes.file' => 'Cada imagen debe ser un archivo válido',
            'imagenes.mimes' => 'Solo se permiten imágenes JPG o PNG',
            'imagenes.max' => 'Cada imagen no debe superar los 2 MB',
            
        ];
    }
    protected function prepareForValidation(): void
    {
        if ($this->has('detalleVentas') && is_string($this->detalleVentas)) {
            $this->merge([
                'detalleVentas' => json_decode($this->detalleVentas, true),
            ]);
        }
    }

}
