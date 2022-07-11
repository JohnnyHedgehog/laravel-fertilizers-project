<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Dashboard</title>

    <link rel="stylesheet" href="{{asset('plugins/select2/css/select2.min.css')}}">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="{{ asset('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/loading.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">





</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTELogo" height="60"
                width="60">
        </div>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <div class="row w-100">
                <div class="d-flex col-12 justify-content-between">
                    <!-- Left navbar links -->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" data-widget="pushmenu" href="{{ asset('#') }}" role="button"><i
                                    class="fas fa-bars"></i></a>
                        </li>
                    </ul>

                    <div class="navbar-nav">
                        <form action="{{route('logout')}}" method="POST" class='b-0 p-o'>
                            <a href="{{route('fertilizer.index')}}" class="btn btn-outline-success mr-2">Вернуться на
                                сайт</a>
                            @csrf
                            <input type="submit" class="btn btn-outline-dark" value="Выйти">
                        </form>
                    </div>
                </div>
            </div>
        </nav>

        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('includes.admin.sidebar')
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            <!-- Main content -->
            <section class="content ml-3 mr-3">
                <div class="h-100">
                    @yield('content')
                </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2022 <a href="{{ asset(' ') }}">Удобрения ИП Иванов</a>.</strong>
            Все права защищены.

        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{asset('plugins/select2/js/select2.full.min.js')}}"></script>
    <!-- daterangepicker -->
    <script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/adminlte.js') }}"></script>
    <script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>

    <script>
        // СКРИПТЫ ДЛЯ СТРАНИЦЫ С ПОИСКОМ

         // Функция для работы кнопок сортировки
         function filterLinks(){      
            const url = new URL(window.location.href);
            url.searchParams.delete('name_sort');
            url.searchParams.delete('purchase_sort');         
            if (url.search == ''){
                document.getElementById('purchase-asc').href = url.href + '?purchase_sort=asc';
                document.getElementById('purchase-desc').href = url.href + '?purchase=desc';
                document.getElementById('name-asc').href = url.href + '?name_sort=asc';
                document.getElementById('name-desc').href = url.href + '?name_sort=desc';
             } else {
                document.getElementById('purchase-asc').href = url.href + '&purchase_sort=asc';
                document.getElementById('purchase-desc').href = url.href + '&purchase_sort=desc';
                document.getElementById('name-asc').href = url.href + '&name_sort=asc';
                document.getElementById('name-desc').href = url.href + '&name_sort=desc';
            }
        };
        window.onload = filterLinks;

        // подключаем множественный select2
        // подключаем custom file input
        $(document).ready(function() {
        $('.select2').select2();       
            bsCustomFileInput.init(); 
       
        })

      


        // делаем поиск на странице клиентов открытым, если в него введены данные
        const search = document.getElementById('collapseClientSearch');
        if(window.location.search) {
        search.classList.add('show');
        }
        
          // подключаем bs-custom-file-input
        $(function () {
            bsCustomFileInput.init();
        });
        
    </script>
</body>

</html>