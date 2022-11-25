<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class ClientRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        switch ($this->method()) {
            case 'GET':
            case 'DELETE':
            case 'POST': {
                    return [
                        'name' => 'required|min:3',
                        'gender' => 'required',
                        'phone' => 'required|unique:clients',
                        'address' => 'required',
                    ];
                }
            case 'PUT':
            case 'PATCH': {
                    return [
                        'name' => 'required|min:3',
                        'gender' => 'required',
                        'phone' => 'required',
                        'address' => 'required',
                    ];
                }
            default:
                break;
        }
    }
    
    public function messages()
    {
        return [
            'name.required' => 'Укажите ФИО',
            'name.min' => 'Слишком короткое ФИО',
            'gender.required' => 'Выборите пол',
            'phone.required' => 'Укажите телефон',
            'address.required' => 'Укажите адрес',
            'phone.unique' => 'Телефон уже используется',
        ];
    }
}
//проверено перед commit
