@extends('layouts.base')

@section('title')
Создать машины нового клиента
@endsection

@section('content')



<h1>Создать машины нового клиента</h1>
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
        </tr>
        @endforeach
    </tbody>
</table>     
    <hr>
<form action="{{route('successCreateAuto')}}" method="post">
    @csrf
    <h4>Новый Автомобиль</h4>
        <input type="hidden" name="client_id" value="{{$data->id}}">
        <input type="hidden" name="cars" value="{{$data->cars}}">
        @include('layouts/carsCreate')
        <button type="submit" class="btn btn-primary">Сохранить автомобиль</button>
</form>
<hr>
<form action="{{route('allData')}}" method="get">
    <button type="submit" class="btn btn-primary">Завершить создание</button>
</form>




@endsection