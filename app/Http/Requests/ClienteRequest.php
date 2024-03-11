<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteRequest extends FormRequest
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
            //aqui vamos adicionar o valor obrigatorio
            'nome' => 'required',
            'cpf' => 'required',
            'email' => 'required',
            'fone' => 'required',
            'nascimento' => 'required',

        ];
    }

    //criar um metodo para retornar as mensagens

    public function messages(): array 
    {
        return[
          'nome.required' => 'O nome é obrigatório',
          'email.required' => 'O e-mail é obrigatório',
          'cpf.required' => 'O CPF é obrigatório',
          'fone.required' => 'O telefone é obrigatório',
          'nascimento.required' => 'É obrigatório adicionar a data de nascimento',
        ];
    }
}
