@extends('layout.main')
@section('content')
<div>
    @can('create', \App\Models\Worker::class)
        <div>
            <a href="{{route('workers.create')}}">Добавить</a>
        </div>
    @endcan
    <hr>
    <div>
        <form action="{{route('workers.index')}}">
            <input type="text" name="name" placeholder="Имя" value="{{request()->get('name')}}">
            <input type="text" name="surname" placeholder="Фамилия" value="{{request()->get('surname')}}">
            <input type="text" name="email" placeholder="Email" value="{{request()->get('email')}}">
            <input type="number" name="from" placeholder="От" value="{{request()->get('from')}}">
            <input type="number" name="to" placeholder="До" value="{{request()->get('to')}}">
            <input type="text" name="description" placeholder="Описание" value="{{request()->get('description')}}">
            <input id="isMarried" type="checkbox" name="is_married" {{request()->get('is_married')=='on' ? 'checked' : ''}}>
            <label for="isMarried"></label>
            <input type="submit">
            <a href="{{route('workers.index')}}">Сбросить</a>
        </form>
    </div>
    <hr>
    @foreach($workers as $worker)
        <div>
            <div>Имя:{{$worker -> name}}</div>
            <div>Фамилия: {{$worker -> surname}}</div>
            <div>Email: {{$worker -> email}}</div>
            <div>Возраст: {{$worker -> age}}</div>
            <div>О себе: {{$worker -> description}}</div>
            <div>IsMarried: {{$worker -> is_married}}</div>
            <div>
                <a href="{{route ('workers.show', $worker -> id)}}">Просмотреть</a>
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
        <hr>
    @endforeach
    <div class="my-nav">
        {{$workers->withQueryString()->links()}}
    </div>
</div>
@endsection
