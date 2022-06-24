@extends('layouts.main')
@section('content')
<h1 class="m-3">Удобрения ИП Иванов</h1>
<div>

    <form action="{{route('fertilizer.index')}}" id="main-form" method="GET">
        <div class="row gy-2 mb-3">
            <div class="col-lg-4">
                <label class="fs-5" for="name">Название</label>
                {{-- В value проверяем, есть ли старое значение до отправки формы. Если нет, то проверяем, есть ли
                введенные
                данные в форму. Если нет, ты выводим пустую строку в value --}}
                <input type="text" class="form-control bg-white" id="name" name="name" placeholder="Что ищем?"
                    value="{{old('input') ? old('input') : (isset($data['name']) ? $data['name'] : '')}}">
                @error('name')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="col-lg-4">
                <label class="fs-5" for="description">Описание содержит</label>
                <input type="text" class="form-control bg-white" id="description" name="description"
                    placeholder="Что ищем?"
                    value="{{old('input') ? old('input') : (isset($data['description']) ? $data['description'] : '')}}">
                @error('description')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="col-lg-4">
                <label class="fs-5" for="purpose">Применение</label>
                <input type="text" class="form-control bg-white" id="purpose" name="purpose" placeholder="Что ищем?"
                    value="{{old('input') ? old('input') : (isset($data['purpose']) ? $data['purpose'] : '')}}">
                @error('purpose')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
        </div>

        <div class="row gy-2 mb-3">
            <div class="col-lg-4">
                <label class="fs-5">Норма Азот</label>
                <div class="d-flex justify-content-between">
                    <div class="form-group me-2">
                        <label for="nitrogen_more">От</label>
                        <input type="number" class="form-control bg-white" id="nitrogen_more" name="nitrogen_more"
                            placeholder="0.00"
                            value="{{old('input') ? old('input') : (isset($data['nitrogen_more']) ? $data['nitrogen_more'] : '') }}">
                        @error('nitrogen_more')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group w-45">
                        <label for="nitrogen_less">До</label>
                        <input type="number" class="form-control bg-white" id="nitrogen_less" name="nitrogen_less"
                            placeholder="0.00"
                            value="{{old('input') ? old('input') : (isset($data['nitrogen_less']) ? $data['nitrogen_less'] : '')}}">
                        @error('nitrogen_less')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <label class="fs-5">Норма Фосфор</label>
                <div class="d-flex justify-content-between">
                    <div class="form-group me-2">
                        <label for="phosphorus_more">От</label>
                        <input type="number" class="form-control bg-white" id="phosphorus_more" name="phosphorus_more"
                            placeholder="0.00"
                            value="{{old('input') ? old('input') : (isset($data['phosphorus_more']) ? $data['phosphorus_more'] : '') }}">
                        @error('phosphorus_more')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group w-45">
                        <label for="phosphorus_less">До</label>
                        <input type="number" class="form-control bg-white" id="phosphorus_less" name="phosphorus_less"
                            placeholder="0.00"
                            value="{{old('input') ? old('input') : (isset($data['phosphorus_less']) ? $data['phosphorus_less'] : '')}}">
                        @error('phosphorus_less')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <label class="fs-5">Норма Калий</label>
                <div class="d-flex justify-content-between">
                    <div class="form-group me-2">
                        <label for="potassium_more">От</label>
                        <input type="number" class="form-control bg-white" id="potassium_more" name="potassium_more"
                            placeholder="0.00"
                            value="{{old('input') ? old('input') : (isset($data['potassium_more']) ? $data['potassium_more'] : '') }}">
                        @error('potassium_more')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group w-45">
                        <label for="potassium_less">До</label>
                        <input type="number" class="form-control bg-white" id="potassium_less" name="potassium_less"
                            placeholder="0.00"
                            value="{{old('input') ? old('input') : (isset($data['potassium_less']) ? $data['potassium_less'] : '')}}">
                        @error('potassium_less')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <div class="row gy-2 mb-3">
            <div class="col-lg-4">
                <label class="fs-5">Стоимость, руб.</label>
                <div class="d-flex justify-content-between">
                    <div class="form-group me-2">
                        <label for="price_more">От</label>
                        <input type="number" class="form-control bg-white" id="price_more" name="price_more"
                            placeholder="0.00"
                            value="{{old('input') ? old('input') : (isset($data['price_more']) ? $data['price_more'] : '') }}">
                        @error('price_more')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group w-45">
                        <label for="price_less">До</label>
                        <input type="number" class="form-control bg-white" id="price_less" name="price_less"
                            placeholder="0.00"
                            value="{{old('input') ? old('input') : (isset($data['price_less']) ? $data['price_less'] : '')}}">
                        @error('price_less')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="col-lg-4 form-group">
                <label class="fs-5 mb-4" for="region">Регион</label>
                <select id="region" class="select2 w-100" multiple="multiple" name="region[]">
                    @foreach ($regions as $region)
                    <option value="{{$region->region}}" {{isset($data['region']) && in_array($region->region,
                        $data['region']) ? 'selected' : ''}}>
                        {{$region->region}}</option>
                    @endforeach
                </select>
                @error('region')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>

            <div class="col-lg-4 form-group">
                <label class="fs-5 mb-4" for="culture_id">Группа культур</label>
                <select id="culture_id" class="select2 w-100" multiple="multiple" name="culture_id[]">
                    @foreach ($cultures as $culture)
                    <option value="{{$culture->id}}" {{isset($data['culture_id']) && in_array($culture->id,
                        $data['culture_id']) ? 'selected' : ''}}>
                        {{$culture->name}}</option>
                    @endforeach
                </select>
                @error('culture_id')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
        </div>

        <div class="row d-flex justify-content-end">
            <div class="col-lg-3 mt-3 mb-3">
                <a href="{{route('fertilizer.index')}}" class='btn btn-danger w-100'>Сбросить</a>
            </div>
            <div class="col-lg-3 mt-3 mb-3">
                <input type="submit" class="btn btn-primary w-100" value="Поиск">
            </div>
        </div>
    </form>



    <div class="row d-flex flex-nowrap fertlizer-header">

        <div class="col-lg-1 col-md-1 col-sm-1 col-1">#</div>
        <div class="col-lg-3 col-md-4 col-sm-9 col-7">Наименование <a href="#" id="name-asc"><i
                    class="fas fa-arrow-up"></i></a><a href="#" id="name-desc"><i class="fas fa-arrow-down"></i></a>
        </div>
        <div class="col-lg-1 d-none d-lg-block">Норма Азот</div>
        <div class="col-lg-1 d-none d-lg-block">Норма Фосфор</div>
        <div class="col-lg-1 d-none d-lg-block">Норма Калий</div>
        <div class="col-lg-2 col-md-3 d-none d-md-block">Группа культур</div>
        <div class="col-lg-2 col-md-2 d-none d-md-block">Район</div>
        <div class="col-lg-2 col-md-2 col-sm-2 col-4">Цена <a href="#" id="price-asc"><i
                    class="fas fa-arrow-up"></i></a><a href="#" id="price-desc"><i class="fas fa-arrow-down"></i></a>
        </div>

    </div>


    @foreach ($fertilizers as $fertilizer)
    <a href="{{route('fertilizer.show',$fertilizer->id)}}" class="fertilizer-link">
        <div class="row d-flex  flex-nowrap fertlizer-row">

            <div class="col-lg-1 col-md-1 col-sm-1 col-1">{{$fertilizer->id}}</div>
            <div class="col-lg-3 col-md-4 col-sm-9 col-7">{{$fertilizer->name}}</div>
            <div class="col-lg-1 d-none d-lg-block">{{$fertilizer->nitrogen_rate}}</div>
            <div class="col-lg-1 d-none d-lg-block">{{$fertilizer->phosphorus_rate}}</div>
            <div class="col-lg-1 d-none d-lg-block">{{$fertilizer->potassium_rate}}</div>
            <div class="col-lg-2 col-md-3 d-none d-md-block">{{$fertilizer->culture->name}}</div>
            <div class="col-lg-2 col-md-2 d-none d-md-block">{{$fertilizer->region}}</div>
            <div class="col-lg-1 col-md-2 col-sm-2 col-4">{{$fertilizer->price}}</div>


        </div>
    </a>
    @endforeach



</div>



@endsection