@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col mt-3 d-flex align-items-center">
        <h1> {{$user->name}}</h1>
        <a href="{{route('admin.user.edit',$user->id)}}"><i class="fas fa-pen text-success ml-3"></i></a>
    </div>
</div>
<div class="row mt-1 mb-1">
    <div class="col">
        <a href="{{route('admin.user.index')}}" class="btn btn-primary col-sm-2 col-md-1">Назад</a>
    </div>
</div>
<div class="row mt-3">
    <div class="card col-lg-6">
        <div class="table-responsive card-body p-0">
            <table class="table">
                <tbody>
                    <tr>
                        <td>ID пользователя</td>
                        <td>{{$user->id}}</td>
                    </tr>
                    <tr>
                        <td scope="row">Имя пользователя</td>
                        <td>{{$user->name}}</td>
                    </tr>
                    <tr>
                        <td scope="row">Email</td>
                        <td>{{$user->email}}</td>
                    </tr>
                    <tr>
                        <td scope="row">Статус</td>
                        <td> {{$user->role}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection