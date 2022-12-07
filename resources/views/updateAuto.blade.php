@extends('layouts.base')

@section('title')
Автомобиль № {{$data->id}}
@endsection

@section('content')

@if($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
        <li>{{$error}}</li>            
        @endforeach
    </div>
@endif

<form action="{{route('succesUpdateAuto', $data->id )}}" method="post">
        <input type="hidden" name="_method" value="patch" />
    @csrf
    <h4>Автомобиль № {{$data->id}}</h4>
    <input type="hidden" name="id" value="{{$data->id}}">
    <input type="hidden" name="client_id" value="{{$data->client_id}}">
    <div class="form-row col-md-10">
        <div class="form-group col-md-2">
            <label for="mark">Марка</label>
            <input type='text' name='mark' value="{{$data->mark}}" id='mark' class='form-control'>
        </div>
        <div class="form-group col-md-2">
            <label for="model">Модель</label>
            <input type='text' name='model' value="{{$data->model}}" id='model' class='form-control'>
        </div>
        <div class="form-group col-md-2">
            <label for="color">Цвет</label>
            <input type='color' name='color' id='color' value="{{$data->color}}" class='form-control'>
        </div>
    </div>
    <div class="form-row col-md-10">
        <div class="form-group col-md-2">
            <label for="number">Гос. номер</label>
            <input type='text' name='number' value="{{$data->number}}" id='number' class='form-control'>
        </div>
            <div class="form-group col-md-2">
        <label for="region">Регион</label>
        <input type='number' name='region' value="{{$data->region}}" id='region' class='form-control' min="1" max="999">
    </div>
        <div class="form-group col-md-4">
            <label for="status">Состояние</label>
            <select name="status" class='form-control'>
                    <option>Присутствует</option>
                    <option>Отсутствует</option>
                </select>  
        </div> 
    </div>
    <button type="submit" class="btn btn-primary">Сохранить автомобиль</button>
</form>
<hr>
<form action="{{route('oneClientData', $data->client_id )}}" method="get">
    <button type="submit" class="btn btn-primary">Назад</button>
</form>




@endsection
{{--проверено перед commit--}}
