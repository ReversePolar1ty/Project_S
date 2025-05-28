@extends('layout.main')
@section('content')
<div>
    <hr>
        <div>
            <form action="{{route('workers.update', $worker->id)}}" method="post">
                @csrf
                @method('Patch')
                <div style="margin-bottom: 15px;"><input type="text" name="name" placeholder="Имя" value="{{old('name') ?? $worker->name}}">
                    @error('name')<div>{{$message}}</div>@enderror
                </div>
                <div style="margin-bottom: 15px;"><input type="text" name="surname" placeholder="Фамилия" value="{{old('surname') ?? $worker->surname}}">
                    @error('surname')<div>{{$message}}</div>@enderror
                </div>
                <div style="margin-bottom: 15px;"><input type="email" name="email" placeholder="Email" value="{{old('email') ?? $worker->email}}">
                    @error('email')<div>{{$message}}</div>@enderror
                </div>
                <div style="margin-bottom: 15px;"><input type="number" name="age" placeholder="Возраст" value="{{old('age') ?? $worker->age}}"></div>
                <div style="margin-bottom: 15px;"><textarea name="description" placeholder="Описание">{{old('description') ?? $worker->description}}</textarea></div>
                <div style="margin-bottom: 15px;">
                    <input type="checkbox" name="is_married" id="isMarried" {{$worker -> is_married ? 'checked' : ''}}>
                    <label for="isMarried">Is married</label>
                </div>
                <div style="margin-bottom: 15px;"><input type="submit" value="Сохранить"></div>
            </form>
        </div>
</div>
@endsection
