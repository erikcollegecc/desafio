<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUpadareProduto extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    
    public function rules()
    {
        $id = $this->segment(2);

        $rule = [
            'nome_produto' => ['required', 'min:3',  'max:160', 
            Rule::unique('produtos')->ignore($id), ],
            'descricao' => ['nullable', 'min:5', 'max:10000'],
            'breve_descricao' => ['nullable', 'min:5', 'max:255'],
            'tipo_produto' => ['required'],
            'ref' => ['nullable'],
            'nome_atributo' => ['nullable'],
            'atributos' => ['nullable'],
            'atributos_visivel' => ['nullable'],
            'image' => ['nullable'],
        ];

        if ($this->method == 'PUT') {
            $rule['image'] = ['nullable', 'image'];
        }
        
        return $rule;
    }
}
