<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRecicladoras extends FormRequest
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
            'nombre' => 'required|string|max:255|unique:recicladoras,nombre',
            'direccion' => 'nullable|string',
            'telefono' => 'nullable|string|max:20',
            'correo' => 'nullable|email|unique:recicladoras,email',
            'nombre_contacto' => 'nullable|string|max:255',
            'contacto_telefono' => 'nullable|string|max:20',
            'contacto_correo' => 'nullable|email',
          
            'estado' => 'required|int',
        ];
    }
}
