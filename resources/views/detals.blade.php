@extends('layouts.base')

@section('title')
Клиент № {{$id['id']}}
@endsection

@section('content')



<h1>Клиент № {{$id['id']}}</h1>
<hr>
{{--<h2>Персональные данные</h2>--}}
@if($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
        <li>{{$error}}</li>            
        @endforeach
    </div>
@endif
<table class="table table-bordered">        
    <caption>
        Персональные данные клиента
    </caption>
    <thead class="thead-dark">
    <tr>
        <th scope="col">Идентификатор</th>
        <th scope="col">ФИО</th>
        <th scope="col">Пол</th>
        <th scope="col">Номер телефона</th>
        <th scope="col">Адрес</th>
    </tr>
    </thead>
    <tbody>
        <tr>
            <td scope="col">
                {{$data->id}}
            </td>
            <td scope="col">
                {{$data->name}}
            </td>
            <td scope="col">
                {{$data->gender}}
            </td>
            <td scope="col">
                {{$data->phone}}
            </td>
            <td scope="col">
                {{$data->address}}
            </td>
        </tr>
    </tbody>
</table>     
    <hr>
<table class="table table-bordered">        
    <caption>
        Имеющиеся автомобили
    </caption>
    <thead class="thead-dark">
    <tr>
        <th scope="col">Марка</th>
        <th scope="col">Модель</th>
        <th scope="col">Цвет</th>
        <th scope="col">Гос номер</th>
        <th scope="col">Статус</th>
        <th scope="col">Удалить</th>
    </tr>
    </thead>
    <tbody>
        @foreach ($data->autos as $auto)
        <tr>
            <td scope="col">
                {{$auto->mark}}
            </td>
            <td scope="col">
                {{$auto->model}}
            </td>
            <td scope="col">
                <div style="height: 15px; width:15px; background-color:{{$auto->color}};"></div>{{$auto->color}}
            </td>
            <td scope="col">
                {{$auto->number}}
            </td>
            <td scope="col">
                {{$auto->status}}
            </td>
            <td>
                <form action='{{route('deleteAuto',$auto->id)}}'>
                    <button class='btn btn-danger'>Удалить Автомобиль</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>     
    <hr>
<a class="btn btn-primary" href="{{route('createAuto',$data->id)}}">Добавить новый автомобиль</a>
<hr>
<form action="{{route('AllData', 1)}}" method="get">
    <button type="submit" class="btn btn-primary">На главную</button>
</form>




@endsection