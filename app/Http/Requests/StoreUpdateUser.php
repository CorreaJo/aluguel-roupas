<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateUser extends FormRequest
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

        $id = $this->id ?? '';
        $rules = [
            'name' => ['required', 'string', 'max:255'],

            'email' => ['required', 'string', 'email', 'max:255', "unique:users,email,{$id},id"],

            'password' => ['required', 'confirmed', 'min:6', 'max:15'],
        ];

        if($this->method('PUT')){
            $rules['password'] = [
                'nullable',
                'min:6',
                'max:15',
            ];
        }
        return $rules;
    }
    
    public function messages()
    {
        return [
            'min' => 'Campo deve ter no mínimo :min caracteres',
            'max' => 'Campo deve ter no maximo :max caracteres',
            'unique' => 'Esse email já existe',
        ];
    }
}
