@extends('layouts.admin')
@section('content')
<h1 class='pt-1'>Главная страница</h1>
<!-- Main content -->
<section class="content mt-4">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row h-100">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{$data['fertilizers']}}</h3>
                        <p>Удобрения</p>
                    </div>
                    <div class="icon">
                        <i class="nav-icon fas fa-align-justify"></i>
                    </div>
                    <a href="{{route('admin.fertilizer.index')}}" class="small-box-footer">Подробнее <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{$data['cultures']}}</h3>

                        <p>Группы культур</p>
                    </div>
                    <div class="icon">
                        <i class="nav-icon fas fa-leaf"></i>
                    </div>
                    <a href="{{route('admin.culture.index')}}" class="small-box-footer">Подробнее<i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{$data['clients']}}</h3>

                        <p>Клиенты</p>
                    </div>
                    <div class="icon">
                        <i class="nav-icon fas fa-user-tie"></i>
                    </div>
                    <a href="{{route('admin.client.index')}}" class="small-box-footer">Подробнее <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->

                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{$data['users']}}</h3>

                        <p>Пользователи</p>
                    </div>
                    <div class="icon">
                        <i class="nav-icon fas fa-house-user"></i>
                    </div>
                    <a href="{{route('admin.user.index')}}" class="small-box-footer">Подробнее <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>
    </div>
</section>
@endsection