<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateAreas extends FormRequest
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
        $categoriaId = $this->route('areas');
        return [
            'nombre' => [
                'required',
                Rule::unique('area_conocimientos', 'nombre')->ignore($categoriaId),
                'regex:/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s.]+$/'
            ],
            'estado' => 'required|int',
            'descripcion' => 'nullable|max:500',
        ];
    }
}
