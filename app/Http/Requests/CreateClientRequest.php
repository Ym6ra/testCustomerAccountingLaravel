<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class CreateClientRequest extends FormRequest
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
        return [
            'name' => 'required|min:3',
            'gender' => 'required',
            'phone' => 'required',
            'address' => 'required',
            //'cars' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Укажите ФИО',
            'name.min' => 'Слишком короткое ФИО',
            'gender.required' => 'Выборите пол',
            'phone.required' => 'Укажите телефон',
            'address.required' => 'Укажите адрес',
            //'cars.required' => 'Выберите количество машин',
        ];
    }
}
