@extends('layouts.admin')
@section('content')
<div class="row d-flex justify-content-center">
    <p class="mt-5">Данные импортируются</p>
    <div class="col-12 mt-5">
        <div class="loading">
            <svg class="spinner" viewBox="0 0 50 50">
                <circle class="path" cx="25" cy="25" r="20" fill="none" stroke-width="5"></circle>
            </svg>
        </div>
    </div>
</div>
<script>
    window.addEventListener("load", function() {
    setTimeout( function() {
        document.location.replace('{{route('admin.excel-import.index')}}');
    }, 2000);});
   
</script>
@endsection