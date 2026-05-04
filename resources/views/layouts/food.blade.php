<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Website Food - AT10')</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
        }
        .navbar-custom {
            background-color: #000;
        }
        .navbar-custom .navbar-brand {
            color: #fff;
            font-weight: bold;
            font-size: 1.5rem;
        }
        .navbar-custom .nav-link {
            color: #fff;
            font-size: 0.9rem;
            text-transform: uppercase;
            margin-right: 15px;
        }
        .navbar-custom .nav-link:hover {
            color: #8cc63f;
        }
        .navbar-custom .fa-search {
            color: #fff;
        }
        .category-tabs {
            display: flex;
            justify-content: center;
            border-bottom: 2px solid #eee;
            margin-bottom: 30px;
        }
        .category-tab {
            padding: 10px 20px;
            color: #666;
            text-transform: uppercase;
            font-weight: bold;
            font-size: 0.9rem;
            cursor: pointer;
            text-decoration: none;
            border-bottom: 3px solid transparent;
        }
        .category-tab:hover, .category-tab.active {
            color: #8cc63f;
            border-bottom-color: #8cc63f;
        }
        .product-card {
            border: 1px solid #eaeaea;
            border-radius: 0;
            transition: transform 0.3s;
            background: #fff;
        }
        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        .product-title {
            font-size: 1rem;
            font-weight: 600;
            color: #333;
        }
        .product-price {
            color: #e74c3c;
            font-weight: bold;
        }
        .product-category {
            font-size: 0.8rem;
            color: #999;
        }
    </style>
</head>
<body>

    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-custom py-3">
        <div class="container">
            <a class="navbar-brand" href="{{ route('food.index') }}">
                <i class="fa-solid fa-leaf" style="color: #8cc63f;"></i> AT10
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav align-items-center">
                    <li class="nav-item"><a class="nav-link" href="#">Trang chủ</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Giới thiệu</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Sản phẩm</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Liên hệ</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Hướng dẫn</a></li>
                    <li class="nav-item ms-3"><a href="#" class="text-white"><i class="fa fa-search"></i></a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container my-5">
        @yield('content')
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
