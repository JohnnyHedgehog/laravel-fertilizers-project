@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col mt-3 d-flex align-items-center">
        <h1> {{$fertilizer->name}}</h1>
        <a href="{{route('admin.fertilizer.edit',$fertilizer->id)}}"><i class="fas fa-pen text-success ml-3"></i></a>
    </div>
</div>
<div class="row mt-1 mb-1">
    <div class="col">
        <a href="{{route('admin.fertilizer.index')}}" class="btn btn-primary col-sm-2 col-md-1">Назад</a>
    </div>
</div>
<div class="row mt-3">
    <div class="card">
        <div class="table-responsive card-body p-0">
            <table class="table">
                <tbody>
                    <tr>
                        <td class="w-25">ID </td>
                        <td>{{$fertilizer->id}}</td>
                    </tr>
                    <tr>
                        <td scope="row">Норма Азот</td>
                        <td>{{$fertilizer->nitrogen_rate}}</td>
                    </tr>
                    <tr>
                        <td scope="row">Норма Фосфор</td>
                        <td>{{$fertilizer->phosphorus_rate}} </td>
                    </tr>
                    <tr>
                        <td scope="row">Норма Калий</td>
                        <td>{{$fertilizer->potassium_rate}} </td>
                    </tr>
                    <tr>
                        <td scope="row">Группа культур</td>
                        <td>{{$fertilizer->culture->name}} </td>
                    </tr>
                    <tr>
                        <td scope="row">Регион</td>
                        <td> {{$fertilizer->region}}</td>
                    </tr>
                    <tr>
                        <td scope="row">Стоимость</td>
                        <td> {{$fertilizer->price}} руб.</td>
                    </tr>
                    <tr>
                        <td scope="row">Описание</td>
                        <td> {{$fertilizer->description}}</td>
                    </tr>
                    <tr>
                        <td scope="row">Назначение</td>
                        <td> {{$fertilizer->purpose}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection