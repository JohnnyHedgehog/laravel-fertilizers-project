@extends('layouts.admin')
@section('content')
<h1>Редактор групп культур</h1>
<div class="row">
    <form class='col-sm-8 col-lg-6 col-xl-4' action="{{route('admin.culture.update', $culture->id)}}" method="POST">
        @csrf
        @method("PATCH")
        <div class="form-group">
            <label for="name">Наименование</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Наименование"
                value="{{$culture->name}}" required>
        </div>
        <button type="submit" class="btn btn-primary">Сохранить</button>
    </form>
</div>
@endsection