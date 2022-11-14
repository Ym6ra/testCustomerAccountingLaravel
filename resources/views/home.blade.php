@extends('layouts.base')

@section('title')
Наши клиенты
@endsection

@section('content')

<table class="table table-bordered">
    <caption>
        <span>Все клиенты</span><br>
        <a class='btn btn-primary' href="{{route('createClient')}}">Добавить новго клиента</a>

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
    <tbody>
    @foreach ($data as $client)
    <tr>
        <td>
            <h4>{{$client->name}}</h4>
        <a class='btn btn-primary' href="{{route('oneClientData', $client->id)}}">Детальнее</a>
            <div></div>
        </td>
        <td>
            @foreach ($client->autos as $auto)
            @if ($auto->status == 'Присутствует')
                <form action="{{route('updateStatus',$auto->id)}} " method="post">
                    @csrf 
                    <input type="hidden" name="status" value="Отсутствует">
                    <button type="submit" class="alert alert-success">
                        <span>Гос. Номер: <strong>{{$auto->number}}</strong></span><br>
                        <span>Статус: {{$auto->status}}</span>
                    </button>
                </form>
            @else
                <form action="{{route('updateStatus',$auto->id)}} " method="post">
                    @csrf 
                    <input type="hidden" name="status" value="Присутствует">
                    <button type="submit" class="alert alert-danger">
                        <span>Гос. Номер: <strong>{{$auto->number}}</strong></span><br>
                        <span>Статус: {{$auto->status}}</span>
                    </button>
                </form>
            @endif
            @endforeach
        </td>
        <td>{{$client->phone}}</td>
        <td>
            <form action='{{route('updateСlientData',$client->id)}}'>
            <button class='btn btn-primary'>Редактировать клиента</button>
            </form>
        <td>
            <form action='{{route('deleteClient',$client->id)}}'>
            <button class='btn btn-danger'>Удалить клиента</button>
            </form>
        </td>
    </tr>
    @endforeach
    </tbody>
</table>
<nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
        {{--{{$pages['pages']}}--}}
        @for ($i = 1; $i <= $pages['pages']; $i++)
            @if ($pages['pages']!=1)
                @if ($pages['page']==$i)
                    <li class="page-item"><a class="page-link active" href="{{route('AllData',$i)}}">{{$i}}</a></li>
                @else
                    <li class="page-item"><a class="page-link" href="{{route('AllData',$i)}}">{{$i}}</a></li>
                @endif
            @endif
        @endfor
    </ul>
</nav>



@endsection