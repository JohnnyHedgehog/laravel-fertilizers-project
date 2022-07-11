@extends('layouts.admin')
@section('content')
<h1>Импорт данных Excel</h1>
<div class="row">
    <a href="{{route('admin.client.import.create')}}" class="btn btn-success mb-3 mr-3"> <i
            class="nav-icon fas fa-user-tie"></i> Импорт клиентов</a>
    <a href="{{route('admin.fertilizer.import.create')}}" class="btn btn-success mb-3"><i
            class="nav-icon fas fa-align-justify"></i> Импорт удобрений</a>

</div>
<div class='d-flex flex-column  justify-content-between h-100'>
    <div class="row">
        <div class="table-responsive border-bottom mb-3">
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Имя файла </th>
                        <th scope="col">Статус импорта</th>
                        <th scope="col">Пользователь</th>
                        <th scope="col">Дата создания</th>
                        <th scope="col">Ошибки</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($imports as $import)
                    <tr>
                        <th scope="row">{{$import->id}}</th>
                        <td>{{$import->file_name}}</td>

                        <td @if($import->status_id == 1) class="text-primary"
                            @elseif($import->status_id == 2) class="text-danger"
                            @else class="text-success"
                            @endif>
                            {{$import->status->name}}</td>

                        <td>{{$import->user->name}}</td>
                        <td>{{$import->createdAt()->translatedFormat('d.m.Y H:i:s')}}</td>
                        <td>
                            @if ($import->errors !== null)

                            @foreach ($import->errors as $error)
                            <p><b>Строка #{{$error['row']}}:</b> {{$error['error']}}</p>
                            @endforeach
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>

    <div class='row'>
        <div class="col-12 d-flex justify-content-center">
            {{$imports->links()}}
        </div>
    </div>
</div>
@endsection