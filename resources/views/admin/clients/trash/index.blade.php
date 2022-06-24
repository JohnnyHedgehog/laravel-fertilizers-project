@extends('layouts.admin')
@section('content')
<h1>Удаленные клиенты</h1>
<div class="row">
    <a href="{{route('admin.client.index')}}" class="btn btn-primary mb-3">Назад</a>
</div>
<div class="row">
    <div class="table-responsive">
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Наименование</th>
                    <th scope="col">Дата договора</th>
                    <th scope="col">Стоимость поставки, руб.</th>
                    <th scope="col">Регион</th>
                    <th scope="col" colspan="3" class="text-center">Действия</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clients as $client)
                <tr>
                    <th scope="row">{{$client->id}}</th>
                    <td>{{$client->name}}</a></td>
                    <td>{{$client->dateOfSigned()->translatedFormat('d.m.Y')}}</td>
                    <td>{{$client->purchaseFormatted()}}</td>
                    <td>{{$client->region}}</td>
                    <td class="text-center">
                        <form action="{{route('admin.client.trash.update', $client->id  )}}" method="POST">
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