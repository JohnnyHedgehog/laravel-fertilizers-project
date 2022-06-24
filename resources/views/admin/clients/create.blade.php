@extends('layouts.admin')
@section('content')
<h1>Новый клиент</h1>
<div class="row">
    <form class='col-sm-8 col-lg-6 col-xl-4' action="{{route('admin.client.store')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Наименование</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Наименование клиента"
                value="{{old('input')}}" required>
        </div>
        <div class="form-group">
            <label for="date">Дата договора</label>
            <input type="date" class="form-control" id="date" name="date_of_signed" placeholder=" Enter email"
                value="{{old('input')}} required">
        </div>
        <div class="form-group">
            <label for="purchase">Стоимость поставки, руб.</label>
            <input type="number" step="0.01" min="0" placeholder="0,00" class="form-control" id="purchase"
                name="purchase" value="{{old('input')}}" required>
        </div>
        <div class="form-group">
            <label for="region">Регион</label>
            <input type="text" class="form-control" id="region" name="region" placeholder="Регион клиента"
                value="{{old('input')}}" required>
        </div>

        <button type="submit" class="btn btn-primary">Добавить</button>
    </form>
</div>
@endsection