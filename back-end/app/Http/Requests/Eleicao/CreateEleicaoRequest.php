<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateEleicaoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'ano' => ['required', 'numeric', 'digitis:4'],
            'id_usuario' => ['required', 'exists:usuarios', 'id'],
            'hierarquia' => ['required', 'exists:cargos.nivel_hierarquia']
        ];
    }
}
