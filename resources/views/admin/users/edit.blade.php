@extends('layouts.admin')
@section('content')
<h1>Редактор пользователя</h1>
<div class="row">
    <form class='col-sm-8 col-lg-6 col-xl-4' action="{{route('admin.user.update', $user->id)}}" method="POST">
        @csrf
        @method("PATCH")
        <div class="form-group">
            <label for="name">Имя пользователя</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Имя пользователя"
                value="{{$user->name}}" required>
            @error('name')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="{{$user->email}}"
                required>
            @error('email')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="role">Выберите тип пользователя</label>
            <select class="form-control" name="role" id="role" required>
                @foreach ($roles as $roleName => $role)
                <option value="{{$roleName}}" {{$roleName==$user->role ? 'selected' : '' }}>{{$role}}</option>
                @endforeach
            </select>
            @error('role')
            <p class="text-danger">{{ $message}}</p>
            @enderror
        </div>
        {{-- Скрытое поле для возможности редактировать пользователя с таким же Email --}}
        <div class="form-group">
            <input type="hidden" class="form-control" name="user_id" value="{{$user->id}}">
        </div>

        <button type="submit" class="btn btn-primary">Сохранить</button>
    </form>
</div>
@endsection