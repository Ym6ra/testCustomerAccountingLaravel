@extends('layouts.base')

@section('title')
Наши клиенты
@endsection

@section('content')

<table>
    <caption>
        <h1>Все клиенты</h1>
        <a href="{{route('createСlient')}}">+</a>

    </caption>
    <tr>
        <th>ФИО</th>
        <th>Автомобиль</th>
        <th>Номер телефона</th>
        <th>Редактировать</th>
        <th>Удалить</th>
    </tr>
    <tr>
        <td>1</td>
        <td>1</td>
        <td>1</td>
        <td><a href="{{route('updateClient')}}">↓↑</a></td>
        <td><a href="{{route('deleteClient')}}">--</a></td>
    </tr>
</table>

@endsection