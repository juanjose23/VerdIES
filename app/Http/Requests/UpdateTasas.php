<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTasas extends FormRequest
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
            'materiales'=>'required|exists:materiales,id',
            'estado' => 'required|in:0,1',
            'monedas' => 'required|exists:monedas,id',
            'cantidad' => 'required|numeric|min:0', // Asegura que sea un número mayor o igual a 0
            'cantidadlibra' => 'required|numeric|min:0', // Asegura que cantidadlibra sea un número mayor o igual a 0
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            if ($this->input('cantidadlibra') <= $this->input('cantidad')) {
                $validator->errors()->add('cantidadlibra', 'La cantidad en libras debe ser mayor que la cantidad.');
            }
        });
    }

}
