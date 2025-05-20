@extends('layout.main')
@section('content')
<div>
        <div>
            <div>Name:{{$worker -> name}}</div>
            <div>Surname: {{$worker -> surname}}</div>
            <div>Email: {{$worker -> email}}</div>
            <div>Age: {{$worker -> age}}</div>
            <div>Description: {{$worker -> description}}</div>
            <div>IsMarried: {{$worker -> is_married}}</div>
            <div>
                <a href="{{route ('worker.index')}}">Назад</a>
            </div>
            <div>
                <a href="{{route ('worker.edit', $worker -> id)}}">Редактировать</a>
            </div>
            <div>
                <form action="{{route('worker.delete', $worker->id)}}" method="post">
                    @csrf
                    @method('Delete')
                    <input type="submit" value="Удалить">
                </form>
            </div>
        </div>
</div>
@endsection
