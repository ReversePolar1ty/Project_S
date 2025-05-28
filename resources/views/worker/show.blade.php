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
                <a href="{{route ('workers.index')}}">Назад</a>
            </div>
            @can('update', $worker)
                <div>
                    <a href="{{route ('workers.edit', $worker -> id)}}">Редактировать</a>
                </div>
            @endcan
            @can('delete', $worker)
                <div>
                    <form action="{{route('workers.destroy', $worker->id)}}" method="post">
                        @csrf
                        @method('Delete')
                        <input type="submit" value="Удалить">
                    </form>
                </div>
            @endcan
        </div>
</div>
@endsection
