<!doctype html>
<html lang="en">
<head>
    <title>@yield('title', 'Quản Lý Xe - Car Manager')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        :root {
            --primary-color: #007bff;
            --secondary-color: #6c757d;
            --bg-gradient: linear-gradient(135deg, #f3f5f5 0%, #fdfdfd 100%);
        }
        body {
            background: var(--bg-gradient);
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
        }
        .navbar-custom {
            background-color: #fff;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            padding: 15px 0;
            margin-bottom: 40px;
        }
        .navbar-brand {
            font-weight: 800;
            color: var(--primary-color) !important;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        .main-content {
            padding-bottom: 50px;
        }
        .container-box {
            background: #fff;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.1);
        }
        footer {
            text-align: center;
            padding: 20px;
            color: var(--secondary-color);
            font-size: 0.9rem;
            margin-top: auto;
        }
    </style>
    @yield('styles')
</head>
<body class="d-flex flex-column">

    <nav class="navbar navbar-expand-lg navbar-light navbar-custom">
        <div class="container">
            <a class="navbar-brand" href="{{ route('cars.index') }}">🚗 CAR MANAGER</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link font-weight-bold {{ request()->routeIs('cars.index') ? 'active text-primary' : '' }}" href="{{ route('cars.index') }}">DANH SÁCH</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link font-weight-bold {{ request()->routeIs('cars.create') ? 'active text-primary' : '' }}" href="{{ route('cars.create') }}">THÊM MỚI</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="main-content flex-grow-1">
        @yield('content')
    </main>

    <footer>
        <div class="container">
            <hr>
            <p>&copy; 2026 Car Manager System | Project Xe Riêng Biệt</p>
        </div>
    </footer>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    @yield('scripts')

</body>
</html>
