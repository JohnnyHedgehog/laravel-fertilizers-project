@extends('layouts.admin')
@section('content')
<h1>Клиенты</h1>
<div class="row d-flex justify-content-between">
    <a href="{{route('admin.client.create')}}" class="btn btn-success mb-3">Добавить</a>
    <a href="{{route('admin.client.trash.index')}}" class="btn btn-outline-danger mb-3">Удаленные позиции</a>
</div>
<div class="row">
    <p>
        <a class="btn btn-outline-primary collapsed" id="collapsedClientSearch" data-toggle="collapse"
            href="#collapseClientSearch" role="button" aria-expanded="true" aria-controls="collapseClientSearch">
            <i class="fas fa-search"></i> Поиск
        </a>
    </p>
</div>
<div class="row ">
    <div class="collapse w-100" id="collapseClientSearch">
        <div class="card card-body">
            <form action="{{route('admin.client.index')}}" id="main-form" method="GET">
                <div class="row gy-2 mb-3">
                    <div class="col-lg-3">
                        <div>
                            <label class="fs-5" for="name">Наименование</label>
                        </div>
                        <div>
                            <label class="fs-5" for="name">клиента</label>
                        </div>
                        {{-- В value проверяем, есть ли старое значение до отправки формы. Если нет, то проверяем, есть
                        ли
                        введенные
                        данные в форму. Если нет, ты выводим пустую строку в value --}}
                        <input type="text" class="form-control" id="name" name="name" placeholder="Что ищем?"
                            value="{{old('input') ? old('input') : (isset($data['name']) ? $data['name'] : '')}}">
                        @error('name')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="col-lg-3 pr-3">
                        <label class="">Дата договора</label>
                        <div class="d-flex justify-content-between">
                            <div class="form-group w-50 mr-2">
                                <label for="date_of_signed_more">От</label>
                                <input type="date" class="form-control" id="date_of_signed_more"
                                    name="date_of_signed_more" placeholder="0.00"
                                    value="{{old('input') ? old('input') : (isset($data['date_of_signed_more']) ? $data['date_of_signed_more'] : '') }}">
                                @error('date_of_signed_more')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="form-group w-50 mr-2 ">
                                <label for="date_of_signed_less">До</label>
                                <input type="date" class="form-control " id="date_of_signed_less"
                                    name="date_of_signed_less" placeholder="0.00"
                                    value="{{old('input') ? old('input') : (isset($data['date_of_signed_less']) ? $data['date_of_signed_less'] : '')}}">
                                @error('date_of_signed_less')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 align-items-stretch">
                        <label class="fs-5">Стоимость поставки, руб.</label>
                        <div class="d-flex justify-content-between">
                            <div class="form-group mr-2">
                                <label for="purchase_more">От</label>
                                <input type="number" class="form-control" id="purchase_more" name="purchase_more"
                                    placeholder="0.00"
                                    value="{{old('input') ? old('input') : (isset($data['purchase_more']) ? $data['purchase_more'] : '') }}">
                                @error('purchase_more')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="purchase_less">До</label>
                                <input type="number" class="form-control" id="purchase_less" name="purchase_less"
                                    placeholder="0.00"
                                    value="{{old('input') ? old('input') : (isset($data['purchase_less']) ? $data['purchase_less'] : '')}}">
                                @error('purchase_less')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 form-group">
                        <div>
                            <label class="fs-5" for="region">Регион</label>
                        </div>
                        <div>
                            <label class="fs-5" for="region">клиента</label>
                        </div>
                        <select id="region" class="select2 col-12 d-flex justify-content-betweeb" multiple="multiple"
                            name="region[]">
                            @foreach ($regions as $region)
                            <option class="w-100" value="{{$region->region}}" {{isset($data['region']) &&
                                in_array($region->region,
                                $data['region']) ? 'selected' : ''}}>
                                {{$region->region}}</option>
                            @endforeach
                        </select>
                        @error('region')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                </div>

                <div class="row d-flex justify-content-end">
                    <div class="col-lg-3 mb-3">
                        <a href="{{route('admin.client.index').'?reset=true'}}"
                            class='btn btn-danger w-100'>Сбросить</a>
                    </div>
                    <div class="col-lg-3 mb-3">
                        <input type="submit" class="btn btn-primary w-100" value="Поиск">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="row">
    <div class="table-responsive">
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Наименование <a href="#" id="name-asc"><i class="fas fa-arrow-up"></i></a><a
                            href="#" id="name-desc"><i class="fas fa-arrow-down"></i></a></th>
                    <th scope="col">Дата договора</th>
                    <th scope="col">Стоимость поставки, руб. <a href="#" id="purchase-asc"><i
                                class="fas fa-arrow-up"></i></a><a href="#" id="purchase-desc"><i
                                class="fas fa-arrow-down"></i></a></th>
                    <th scope="col">Регион</th>
                    <th scope="col" colspan="3" class="text-center">Действия</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clients as $client)
                <tr>
                    <th scope="row">{{$client->id}}</th>
                    <td><a href="{{route('admin.client.show',$client->id)}}">{{$client->name}}</a></td>
                    <td>{{$client->dateOfSigned()->translatedFormat('d.m.Y')}}</td>
                    <td>{{$client->purchaseFormatted()}}</td>
                    <td>{{$client->region}}</td>
                    <td class="text-center">
                        <a href="{{route('admin.client.show',$client->id)}}"><i class="fas fa-eye"></i></a>
                    </td>
                    <td>
                        <a href="{{route('admin.client.edit',$client->id)}}"><i class="fas fa-pen text-success"></i></a>
                    </td>
                    <td>
                        <form action="{{route('admin.client.delete', $client->id)}}" method="POST">
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