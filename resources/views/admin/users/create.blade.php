@extends('layouts.admin')
@section('content')
<h1>Новый пользователь</h1>
<div class="row">
    <form class='col-sm-8 col-lg-6 col-xl-4' action="{{route('admin.user.store')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Имя пользователя</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Имя пользователя"
                value="{{old('input')}}" required>
            @error('name')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="{{old('input')}}"
                required>
            @error('email')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="password"
                value="{{old('input')}}" required>
            @error('password')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="role">Выберите тип пользователя</label>
            <select class="form-control" name="role" id="role" required>
                @foreach ($roles as $roleName => $role)
                <option value="{{$roleName}}" {{$roleName==old('role') ? 'selected' : '' }}>{{$role}}</option>
                @endforeach
            </select>
            @error('role')
            <p class="text-danger">{{ $message}}</p>
            @enderror
        </div>


        <button type="submit" class="btn btn-primary">Добавить</button>
    </form>
</div>
@endsection