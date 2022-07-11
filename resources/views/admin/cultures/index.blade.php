@extends('layouts.admin')
@section('content')
<h1>Группы культур</h1>
<div class="row d-flex justify-content-between">
    <a href="{{route('admin.culture.create')}}" class="btn btn-success mb-3 mr-3">Добавить</a>
    <a href="{{route('admin.culture.trash.index')}}" class="btn btn-outline-danger mb-3">Удаленные позиции</a>
</div>
<div class="row">
    <div class="table-responsive col-sm-6">
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Наименование</th>
                    <th scope="col" colspan="3" class="text-center">Действия</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cultures as $culture)
                <tr>
                    <th scope="row">{{$culture->id}}</th>
                    <td><a href="{{route('admin.culture.show',$culture->id)}}">{{$culture->name}}</a></td>
                    <td>
                        <a href="{{route('admin.culture.show',$culture->id)}}"><i class="fas fa-eye"></i></a>
                    </td>
                    <td>
                        <a href="{{route('admin.culture.edit',$culture->id)}}"><i
                                class="fas fa-pen text-success"></i></a>
                    </td>
                    <td>
                        <form action="{{route('admin.culture.delete', $culture->id)}}" method="POST">
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