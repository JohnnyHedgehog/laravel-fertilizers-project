@extends('layouts.admin')
@section('content')
<h1>Новая группа культур</h1>
<div class="row">
    <form class='col-sm-8 col-lg-6 col-xl-4' action="{{route('admin.culture.store')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Наименование</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Наименование"
                value="{{old('input')}}" required>
        </div>
        <button type="submit" class="btn btn-primary">Добавить</button>
    </form>
</div>
@endsection