<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Font Awesome -->


    <link rel="stylesheet" href="{{asset('plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">


    <title>Удобрения ИП Иванова</title>
</head>

<body class='bg-white'>
    @auth


    <nav class="navbar sticky-top bg-light">
        <div class="container-fluid">
            <div class="container d-flex justify-content-end">
                <form action="{{route('logout')}}" method="POST" class='b-0 p-o'>
                    <a href="{{route('admin.index')}}" class="btn btn-outline-success mr-2">Панель управления</a>
                    @csrf
                    <input type="submit" class="btn btn-outline-dark" value="Выйти">
                </form>

            </div>

        </div>
    </nav>
    @endauth
    <div class="container">
        @yield('content')
    </div>
    <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{asset('plugins/select2/js/select2.full.min.js')}}"></script>

    <script>
        // Функция для работы кнопок сортировки
        function filterLinks(){      
            const url = new URL(window.location.href);
            url.searchParams.delete('name_sort');
            url.searchParams.delete('price_sort');         
            if (url.search == ''){
                document.getElementById('price-asc').href = url.href + '?price_sort=asc';
                document.getElementById('price-desc').href = url.href + '?price_sort=desc';
                document.getElementById('name-asc').href = url.href + '?name_sort=asc';
                document.getElementById('name-desc').href = url.href + '?name_sort=desc';
             } else {
                document.getElementById('price-asc').href = url.href + '&price_sort=asc';
                document.getElementById('price-desc').href = url.href + '&price_sort=desc';
                document.getElementById('name-asc').href = url.href + '&name_sort=asc';
                document.getElementById('name-desc').href = url.href + '&name_sort=desc';
            }
        };
        window.onload = filterLinks;
    
       
        // подключаем множественный select2
        $(document).ready(function() {
        $('.select2').select2();
        })
    </script>
</body>

</html>