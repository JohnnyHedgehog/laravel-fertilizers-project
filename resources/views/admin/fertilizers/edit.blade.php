@extends('layouts.admin')
@section('content')
<h1>Редактор удобрений</h1>
<div class="row">
    <form class='col-sm-8 col-lg-6 col-xl-4 mb-3' action="{{route('admin.fertilizer.update', $fertilizer->id)}}"
        method="POST">
        @csrf
        @method("PATCH")
        <div class="form-group">
            <label for="name">Наименование</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Наименование удобрения"
                value="{{$fertilizer->name}}" required>
            @error('name')
            <p class="text-danger">{{ $message}}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="nitrogen_rate">Норма Азот</label>
            <input type="number" step="0.01" min="0" placeholder="0,00" class="form-control" id="nitrogen_rate"
                name="nitrogen_rate" value="{{$fertilizer->nitrogen_rate}}" required>
            @error('nitrogen_rate')
            <p class="text-danger">{{ $message}}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="phosphorus_rate">Норма Фосфор</label>
            <input type="number" step="0.01" min="0" placeholder="0,00" class="form-control" id="phosphorus_rate"
                name="phosphorus_rate" value="{{$fertilizer->phosphorus_rate}}" required>
            @error('nitrogen_rate')
            <p class="text-danger">{{ $message}}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="potassium_rate">Норма Калий</label>
            <input type="number" step="0.01" min="0" placeholder="0,00" class="form-control" id="potassium_rate"
                name="potassium_rate" value="{{$fertilizer->potassium_rate}}" required>
            @error('potassium_rate')
            <p class="text-danger">{{ $message}}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="culture_id">Группа культур</label>
            <select class="form-control" name="culture_id" id="culture_id" required>
                @foreach ($cultures as $culture)
                <option value="{{$culture->id}}">{{$culture->name}}</option>
                @endforeach
            </select>
            @error('culture_id')
            <p class="text-danger">{{ $message}}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="region">Регион</label>
            <input type="text" class="form-control" id="region" name="region" placeholder="Регион"
                value="{{$fertilizer->region}}" required>
            @error('region')
            <p class="text-danger">{{ $message}}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="price">Стоимость</label>
            <input type="number" step="0.01" min="0" placeholder="0,00" class="form-control" id="price" name="price"
                value="{{$fertilizer->price}}" required>
            @error('price')
            <p class="text-danger">{{ $message}}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="description">Описание</label>
            <textarea class="form-control" id="decription" name="description"
                placeholder="Описание">{{$fertilizer->description}}</textarea>
            @error('description')
            <p class="text-danger">{{ $message}}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="purpose">Назначение</label>
            <input type="text" class="form-control" id="purpose" name="purpose" placeholder="Назначение"
                value="{{$fertilizer->purpose}}" required>
            @error('purpose')
            <p class="text-danger">{{ $message}}</p>
            @enderror
        </div>


        <button type="submit" class="btn btn-primary">Сохранить</button>
    </form>
</div>
@endsection