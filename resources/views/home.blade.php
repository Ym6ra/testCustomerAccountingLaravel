@extends('layouts.base')

@section('title')
Наши клиенты
@endsection

@section('content')

<table class="table table-striped table-bordered">
    <caption>
        Все клиенты <a href="{{route('createClient')}}">Добавить</a>

    </caption>
    <thead class="thead-dark">
    <tr>
        <th scope="col">ФИО</th>
        <th scope="col">Автомобиль</th>
        <th scope="col">Номер телефона</th>
        <th scope="col">Редактировать</th>
        <th scope="col">Удалить</th>
    </tr>
    </thead>
    <tbody></tbody>
    @foreach ($data as $client)
    <tr>
        <td>{{$client->name}}</td>
        <td>
            @foreach ($client->autos as $auto)
            <span>Гос номер: {{$auto->number}}</span><br>
            <span>Статус: {{$auto->status}}</span>
            <hr>
            @endforeach
        </td>
        <td>{{$client->phone}}</td>
        <td><a href="{{route('updateClient')}}">↓↑</a></td>
        {{--<td><a href="{{route('deleteClient')}}">--</a></td>--}}
    </tr>
    @endforeach
    </tbody>
</table>

@endsection