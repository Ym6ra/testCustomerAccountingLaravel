@extends('layouts.base')

@section('title')
Создать нового клиента
@endsection

@section('content')



<h1>Создать нового клиента</h1>
<hr>
<h2>Персональные данные</h2>
<form action="{{route('createClient')}}" method="post">
    @csrf
    <div class="form-group cl-8">
        <label for="name">ФИО клиента</label>
        <input type='text' name='name' pattern='[A-Za-zА-Яа-яЁё]{6,}' placeholder="ФИО, не менее 3 символов" id='name' class='form-control' required>
        <label for="gender">Пол</label>
        <select name="gender" class='form-control' required>
            <option>муж</option>
            <option>жен</option>
            <option>иное</option>
        </select>
        <label for="phone">Номер телефона</label>

        <input type="tel" id="phone" name="phone" class='form-control' placeholder="8-800-555-35-35" required> <!--pattern="8-[0-9]{3}-[0-9]{3}-[0-9]{2}-[0-9]{2}"-->
        <label for="address">Адрес</label>
        <input type='text' name='address' placeholder="Адрес" id='address' class='form-control'>
    </div>
    <hr>
    <h3>Автомобили</h3>
        <div class="form-group">
            <label for="mark">mark</label>
            <input type='text' name='mark' placeholder="mark" id='mark' class='form-control' required>
            <label for="model">model</label>
            <input type='text' name='model' placeholder="model" id='model' class='form-control' required>
            <label for="color">color</label>
            <input type='text' name='color' placeholder="color" id='color' class='form-control' required>
            <label for="number">number</label>
            <input type='text' name='number' placeholder="Адрес" id='number' class='form-control' required>
            <label for="status">status</label>
            <input type='checkbox' name='status' id='ctatus' required>   
        </div>
        <button type="submit" class="btn btn-success">Отправить</button>
</form>



@endsection