<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class UpdateRecicladoras extends FormRequest
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
        $recicladorasId = $this->route('recicladoras');
        return [
            //
            
            'nombre' => [
                'required',
                'string',
                'max:255',
                Rule::unique('recicladoras', 'nombre')->ignore($recicladorasId),
            ],
            'direccion' => 'nullable|string',
            'telefono' => 'nullable|string|max:20',
            'correo' => [
                'nullable',
                'email',
                Rule::unique('recicladoras', 'email')->ignore($recicladorasId),
            ],
            'nombre_contacto' => 'nullable|string|max:255',
            'contacto_telefono' => 'nullable|string|max:20',
            'contacto_correo' => 'nullable|email',
            
            'estado' => 'required|int',
        ];
    }
}
