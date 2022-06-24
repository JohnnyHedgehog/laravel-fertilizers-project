@extends('layouts.admin')
@section('content')
<h1>Удаленные группы культур</h1>
<div class="row">
    <a href="{{route('admin.culture.index')}}" class="btn btn-primary mb-3">Назад</a>
</div>
<div class="row">
    <div class="table-responsive col-sm-6">
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Наименование</th>
                    <th scope="col" class="text-center">Действия</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cultures as $culture)
                <tr>
                    <th scope="row">{{$culture->id}}</th>
                    <td>{{$culture->name}}</td>
                    <td class="text-center">
                        <form action="{{route('admin.culture.trash.update', $culture->id)}}" method="POST">
                            @csrf
                            @method("PATCH")
                            <button type="submit" class="bg-transparent border-0"><i
                                    class="fa fa-undo   text-success"></i></button>
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