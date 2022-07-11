@extends('layouts.admin')
@section('content')
<h1>Импорт удобрений</h1>
<div class="row pl-2">
    <a href="{{asset('storage/excel/import/samples/Импорт_удобрений.xlsx')}}" class="btn btn-outline-success">Скачать
        образец</a>
</div>
<div class="row">
    <form class='col-sm-8 col-lg-6 col-xl-4' action="{{route('admin.fertilizer.import.store')}}" method="POST"
        enctype="multipart/form-data">
        @csrf
        <div class="input-group mt-3">
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="inputGroupFile01" name="import-file"
                    accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" />
                >
                <label class="custom-file-label input-file-label" for="inputGroupFile01">Выберите файл</label>
            </div>

        </div>
        <button type="submit" class="btn btn-primary mt-3">Импортировать</button>
    </form>
</div>
@endsection