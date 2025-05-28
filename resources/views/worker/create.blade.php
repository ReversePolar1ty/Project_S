@extends('layout.main')
@section('content')
<div>
    <hr>
        <div>
            <form action="{{route('workers.store')}}" method="post">
                @csrf
                <div style="margin-bottom: 15px;"><input type="text" name="name" placeholder="Имя" value="{{old('name')}}">
                    @error('name')<div>{{$message}}</div>@enderror
                </div>
                <div style="margin-bottom: 15px;"><input type="text" name="surname" placeholder="Фамилия" value="{{old('surname')}}">
                    @error('surname')<div>{{$message}}</div>@enderror
                </div>
                <div style="margin-bottom: 15px;"><input type="email" name="email" placeholder="Email" value="{{old('email')}}">
                    @error('email')<div>{{$message}}</div>@enderror
                </div>
                <div style="margin-bottom: 15px;"><input type="number" name="age" placeholder="Возраст" value="{{old('age')}}"></div>
                <div style="margin-bottom: 15px;"><textarea name="description" placeholder="Описание">{{old('description')}}</textarea></div>
                <div style="margin-bottom: 15px;">
                    <input type="checkbox" name="is_married" id="isMarried" {{old('is_married')== 'on' ? 'checked' : ''}}>
                    <label for="isMarried">Is married</label>
                </div>
                <div style="margin-bottom: 15px;"><input type="submit" value="Добавить"></div>
            </form>
        </div>
</div>
@endsection
