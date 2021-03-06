<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin.index') }}" class="brand-link">
        <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Панель управления</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#">ИП Иванов</a>
            </div>
        </div>


        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{route('admin.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Главная
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('admin.fertilizer.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-align-justify"></i>
                        <p>
                            Удобрения
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('admin.culture.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-leaf"></i>
                        <p>
                            Группы культур
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.client.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-user-tie"></i>
                        <p>
                            Клиенты
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.user.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-house-user"></i>
                        <p>
                            Пользователи
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.excel-import.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-file-import"></i>
                        <p>
                            Импорт Excel
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>