@extends('layouts.admin')
@section('content')
<h1>Удобрения</h1>
<div class="row d-flex justify-content-between">
    <div>
        <a href="{{route('admin.fertilizer.create')}}" class="btn btn-success mb-3 mr-3">Добавить</a>
        <a href="{{route('admin.fertilizer.import.create')}}" class="btn btn-outline-success mb-3 mr-3"> <i
                class="nav-icon fas fa-file-import"></i> Импорт Excel</a>
        <a href="{{route('admin.fertilizer.export.index')}}" class="btn btn-outline-success mb-3 mr-3"> <i
                class="nav-icon fas fa-file-export"></i> Экспорт Excel</a>
    </div>
    <a href="{{route('admin.fertilizer.trash.index')}}" class="btn btn-outline-danger mb-3">Удаленные позиции</a>
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
                    <th scope="col" colspan="3" class="text-center">Действия</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($fertilizers as $fertilizer)
                <tr>
                    <td scope="row">{{$fertilizer->id}}</td>
                    <td><a href="{{route('admin.fertilizer.show',$fertilizer->id)}}">{{$fertilizer->name}}</a></td>
                    <td>{{$fertilizer->nitrogen_rate}}</td>
                    <td>{{$fertilizer->phosphorus_rate}}</td>
                    <td>{{$fertilizer->potassium_rate}}</td>
                    <td>{{$fertilizer->culture->name}}</td>
                    <td>{{$fertilizer->region}}</td>
                    <td>{{$fertilizer->price}}</td>
                    <td>{{$fertilizer->purpose}}</td>

                    <td>
                        <a href="{{route('admin.fertilizer.show',$fertilizer->id)}}"><i class="fas fa-eye"></i></a>
                    </td>
                    <td>
                        <a href="{{route('admin.fertilizer.edit',$fertilizer->id)}}"><i
                                class="fas fa-pen text-success"></i></a>
                    </td>
                    <td>
                        <form action="{{route('admin.fertilizer.delete', $fertilizer->id)}}" method="POST">
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="bg-transparent border-0"><i
                                    class="fa fa-trash   text-danger"></i></button>
                        </form>
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection