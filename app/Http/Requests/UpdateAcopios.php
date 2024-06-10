<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateAcopios extends FormRequest
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
        $AcopiosId = $this->route('acopios');

        return [
            'nombre' => [
                'required',
                Rule::unique('acopios', 'nombre')->ignore($AcopiosId),
                'regex:/^[a-zA-ZÀ-ÿ\s]+$/'
            ],
            'estado' => 'required|integer',
            'descripcion' => 'nullable|max:500',
            'latitude' => 'nullable|numeric|between:-90,90',
            'longitude' => 'nullable|numeric|between:-180,180',
        ];
    }
}
