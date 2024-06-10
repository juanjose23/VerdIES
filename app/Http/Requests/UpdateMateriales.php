<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateMateriales extends FormRequest
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
        $productoId = $this->route('materiales');
        return [
            'nombre' => [
                'required',
                Rule::unique('materiales', 'nombre')->ignore($productoId),
                'regex:/^[a-zA-Z\s]+$/'
            ],
            'estado' => 'required|int',
            'descripcion' => 'nullable|max:500',
            'imagen' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }
}
