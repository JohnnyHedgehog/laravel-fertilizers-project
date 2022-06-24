@extends('layouts.main')
@section('content')


<h1> {{$fertilizer->name}}</h1>
<h2 class='fs-4'>{{$fertilizer->price}} руб.</h2>

<div class="row mt-3 mb-3">
    <div class="col">
        <a href="{{route('fertilizer.index')}}" class="btn btn-primary">Назад в каталог</a>
    </div>
</div>

<table class="table table-bordered fs-5">
    <tbody>
        <tr>
            <th scope="row">№ для заказа:</th>
            <td>{{$fertilizer->id}}</td>
        </tr>
        <tr>
            <th scope="row">Наименование:</th>
            <td>{{$fertilizer->name}}</td>
        </tr>
        <tr>
            <th scope="row">Норма Азот:</th>
            <td>{{$fertilizer->nitrogen_rate}}</td>
        </tr>
        <tr>
            <th scope="row">Норма Фосфор:</th>
            <td>{{$fertilizer->phosphorus_rate}}</td>
        </tr>
        <tr>
            <th scope="row">Норма Калий:</th>
            <td>{{$fertilizer->potassium_rate}}</td>
        </tr>
        <tr>
            <th scope="row">Группа&nbsp;культур:</th>
            <td>{{$fertilizer->culture->name}}</td>
        </tr>
        <tr>
            <th scope="row">Регион:</th>
            <td>{{$fertilizer->region}}</td>
        </tr>
        <tr>
            <th scope="row">Применение:</th>
            <td colspan="2">{{$fertilizer->purpose}}</td>
        </tr>
        <tr>
            <th scope="row">Описание:</th>
            <td colspan="2">{{$fertilizer->description}}</td>
        </tr>
    </tbody>
</table>
@endsection