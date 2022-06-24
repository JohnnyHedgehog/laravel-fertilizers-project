@extends('layouts.admin')
@section('content')
<h1>Удаленные удобрения</h1>
<div class="row">
    <a href="{{route('admin.fertilizer.index')}}" class="btn btn-primary mb-3">Назад</a>
</div>
<div class="row">
    <div class="table-responsive">
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Наименование</th>
                    <th scope="col">Норма Азот</th>
                    <th scope="col">Норма Фосфор</th>
                    <th scope="col">Норма Калий</th>
                    <th scope="col">Группа культур</th>
                    <th scope="col">Район</th>
                    <th scope="col">Стоимость</th>
                    <th scope="col">Назначение</th>
                    <th scope="col" class="text-center">Действия</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($fertilizers as $fertilizer)
                <tr>
                    <td scope="row">{{$fertilizer->id}}</td>
                    <td>{{$fertilizer->name}}</td>
                    <td>{{$fertilizer->nitrogen_rate}}</td>
                    <td>{{$fertilizer->phosphorus_rate}}</td>
                    <td>{{$fertilizer->potassium_rate}}</td>
                    <td>{{$fertilizer->culture->name}}</td>
                    <td>{{$fertilizer->region}}</td>
                    <td>{{$fertilizer->price}}</td>
                    <td>{{$fertilizer->purpose}}</td>
                    <td class="text-center">
                        <form action="{{route('admin.fertilizer.trash.update', $fertilizer->id  )}}" method="POST">
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