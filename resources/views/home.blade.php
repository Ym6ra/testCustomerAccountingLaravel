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
        <th scope="col">Изменить статус</th>
        <th scope="col">Номер телефона</th>
        <th scope="col">Редактировать</th>
        <th scope="col">Удалить</th>
    </tr>
    </thead>
    <tbody>
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
        <td><form action="" method="">
            @foreach ($client->autos as $auto)
            <span>Гос номер: {{$auto->number}}</span><br>
            <input type="hidden" name="number" value="{{$auto->number}}">
            <div class='form-row col-md-10' style="flex-wrap: nowrap;">
                <select name="status" class='form-control'style="margin-right: 1rem;">
                    <option>Присутствует</option>
                    <option>Отсутствует</option>
                </select> 
                <button class='btn btn-primary'>↓↑</button>
            </div>
            <hr>
            @endforeach
            </form>
        </td>
        <td>{{$client->phone}}</td>
        <td><a href="{{route('updateClient')}}">Редактировать</a></td>
        {{--<td><a href="{{route('deleteClient')}}">--</a></td>--}}
    </tr>
    @endforeach
    </tbody>
</table>

@endsection