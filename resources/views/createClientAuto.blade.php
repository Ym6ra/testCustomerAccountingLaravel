@extends('layouts.base')

@section('title')
Создать машины нового клиента
@endsection

@section('content')



<h1>Создать машины новго клиента</h1>
<hr>
<h2>Персональные данные</h2>
@if($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
        <li>{{$error}}</li>            
        @endforeach
    </div>
@endif
    <div class="form-group cl-8">
        <label for="name">ФИО клиента</label>
        <input type='text' name='name'  placeholder="ФИО, не менее 3 символов" id='name' class='form-control'>
        <label for="gender">Пол</label>
        <select name="gender" class='form-control'>
            <option>муж</option>
            <option>жен</option>
            <option>иное</option>
        </select>
        <label for="phone">Номер телефона</label>
        <input type="tel" id="phone" name="phone" class='form-control' placeholder="8-800-555-35-35" >
        <label for="address">Адрес</label>
        <input type='text' name='address' placeholder="Адрес" id='address' class='form-control'>
        <label for="cars">Машин</label>
        <input type='text' name='cars' placeholder="Сколько машин" id='cars' class='form-control'>
        <button type="submit" class="btn btn-success">Отправить данные клиента</button>
    </div>
    <hr>
<form action="{{route('successCreate')}}" method="post">
    @csrf
    <h3>Автомобили</h3>
        @yield('createCars')
        <button type="submit" class="btn btn-success">Отправить данные по автомобилям</button>
</form>




@endsection