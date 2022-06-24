@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col mt-3 d-flex align-items-center">
        <h1> {{$client->name}}</h1>
        <a href="{{route('admin.client.edit',$client->id)}}"><i class="fas fa-pen text-success ml-3"></i></a>
    </div>
</div>
<div class="row mt-1 mb-1">
    <div class="col">
        <a href="{{route('admin.client.index')}}" class="btn btn-primary col-sm-2 col-md-1">Назад</a>
    </div>
</div>
<div class="row mt-3">
    <div class="card col-lg-6">
        <div class="table-responsive card-body p-0">
            <table class="table">
                <tbody>
                    <tr>
                        <td>ID клиента</td>
                        <td>{{$client->id}}</td>
                    </tr>
                    <tr>
                        <td scope="row">Дата договора</td>
                        <td>{{$client->dateOfSigned()->translatedFormat('d.m.Y')}}</td>
                    </tr>
                    <tr>
                        <td scope="row">Стоимость поставки</td>
                        <td>{{$client->purchaseFormatted()}} руб.</td>
                    </tr>
                    <tr>
                        <td scope="row">Регион</td>
                        <td> {{$client->region}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection