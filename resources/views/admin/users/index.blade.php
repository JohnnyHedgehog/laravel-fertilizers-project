@extends('layouts.admin')
@section('content')
<h1>Пользователи</h1>
<div class="row d-flex justify-content-between">
    <a href="{{route('admin.user.create')}}" class="btn btn-success mb-3">Добавить</a>
    <a href="{{route('admin.user.trash.index')}}" class="btn btn-outline-danger mb-3">Удаленные пользователи</a>
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
                    <th scope="col" colspan="3" class="text-center">Действия</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <th scope="row">{{$user->id}}</th>
                    <td><a href="{{route('admin.user.show',$user->id)}}">{{$user->name}}</a></td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->getRole()}}</td>
                    <td class="text-center">
                        <a href="{{route('admin.user.show',$user->id)}}"><i class="fas fa-eye"></i></a>
                    </td>
                    <td>
                        <a href="{{route('admin.user.edit',$user->id)}}"><i class="fas fa-pen text-success"></i></a>
                    </td>
                    <td>
                        <form action="{{route('admin.user.delete', $user->id)}}" method="POST">
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="bg-transparent border-0"><i
                                    class="fa fa-trash   text-danger"></i></button>
                        </form>

                    </td>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection