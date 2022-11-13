@extends('layouts.base')

@section('title')
Создать машины нового клиента
@endsection

@section('content')



<h1>Создать машины нового клиента</h1>
<hr>
<h2>Персональные данные</h2>
@if($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
        <li>{{$error}}</li>            
        @endforeach
    </div>
@endif
        
        <div class="form-row col-md-10">
            <div class="form-group col-md-4">
                <span>Уникальный идентификатор клиента: </span>
                <span>{{$data->id}}</span>
                <span>Заявленное количество автомобилей: </span>
                <span>{{$data->cars}}</span>
            </div>
        </div>
        <div class="form-row col-md-10">
            <div class="form-group col-md-4">
                <span>ФИО клиента: </span>
                <span>{{$data->name}}</span>
            </div>
            <div class="form-group col-md-4">
                <span>Пол: </span>
            <span>{{$data->gender}}</span>
            </div>
        </div>
        <div class="form-row col-md-10">
            <div class="form-group col-md-4">
                <span>Номер телефона: </span>
            <span>{{$data->phone}}</span> 
            </div>
            <div class="form-group col-md-4">
                <span>Адрес: </span>
                <span>{{$data->address}}</span> 
            </div>
        </div>
        
    <hr>
<form action="{{route('successCreateAuto')}}" method="post">
    @csrf
    <h3>Автомобили</h3>
    @for ($i = 1; $i <= $data->cars; $i++)
    <h4>Автомобиль №{{$i}}</h4>
        <input type="hidden" name="client_id" value="{{$data->id}}">
        @include('layouts/carsCreate')
    @endfor
        <button type="submit" class="btn btn-primary">Отправить данные по автомобилям</button>
</form>




@endsection