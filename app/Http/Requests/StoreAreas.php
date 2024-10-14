<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAreas extends FormRequest
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
            'nombre' => ['required', 'unique:universidades,nombre', 'regex:/^[a-zA-Z\sáéíóúÁÉÍÓÚüÜ]+$/'],
            'estado' => 'required|int',
            'descripcion' => 'nullable|max:500',
            'materialesData' => 'json'
        ];
    }
}
