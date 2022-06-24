@extends('layouts.admin')
@section('content')
<h1>Удаленые пользователи</h1>
<div class="row">
    <a href="{{route('admin.user.index')}}" class="btn btn-primary mb-3">Назад</a>
</div>
<div class="row">
    <div class="table-responsive">
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Имя пользователя</th>
                    <th scope="col">Email</th>
                    <th scope="col">Тип пользователя</th>
                    <th scope="col" class="text-center">Действия</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <th scope="row">{{$user->id}}</th>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->getRole()}}</td>
                    <td class="text-center">
                        <form action="{{route('admin.user.trash.update', $user->id)}}" method="POST">
                            @csrf
                            @method("PATCH")
                            <button type="submit" class="bg-transparent border-0"><i
                                    class="fa fa-undo   text-success"></i></button>
                        </form>
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection