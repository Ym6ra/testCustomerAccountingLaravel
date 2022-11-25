<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class AutoRequest extends FormRequest
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
        switch($this->method()){
            case 'GET':
            case 'DELETE':
            case 'POST':{
                    return [
                        'client_id' => 'required',
                        'mark' => 'required',
                        'model' => 'required',
                        'color' => 'required',
                        'number' => 'required|unique:autos',
                        'status' => 'required',
                    ];
            }
            case 'PUT':
            case 'PATCH':{
                    return [
                        'mark' => 'required',
                        'model' => 'required',
                        'color' => 'required',
                        'number' => 'required',
                        'status' => 'required',
                    ];
            }
            default:
                break;
        }
    }

    public function messages()
    {
        return [
            'client_id.required' => 'Ошибка создания клиента, начните все сначала',
            'mark.required' => 'Укажите марку автомобиля',
            'color.required' => 'Выберите цвет автомобиля',
            'number.required' => 'Укажите гос. номер автомобиля',
            'status.required' => 'Статус не определен',
            'number.unique' => 'Гос. номер уже используется',
        ];
    }
}
//проверено перед commit
