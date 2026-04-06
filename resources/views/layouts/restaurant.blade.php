<!doctype html>
<html lang="vi">
<head>
    <title>@yield('title', 'ATOO FOODS - Tinh Hoa Ẩm Thực')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #FFD200;
            --dark: #111;
            --light-grey: #f9f9f9;
        }
        body {
            font-family: 'Montserrat', sans-serif;
            background-color: #fff;
            color: #333;
            overflow-x: hidden;
        }
        h1, h2, h3, .dish-title {
            font-family: 'Playfair Display', serif;
        }
        .top-bar {
            background: #000;
            color: #fff;
            font-size: 11px;
            padding: 5px 0;
        }
        .navbar-custom {
            background-color: #111;
            padding: 10px 0;
        }
        .navbar-brand img {
            height: 50px;
        }
        .nav-link {
            color: #fff !important;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 13px;
            margin: 0 10px;
            transition: 0.3s;
        }
        .nav-link:hover, .nav-link.active {
            color: var(--primary) !important;
        }
        .hero-section {
            background: url('https://images.unsplash.com/photo-1541518763669-27fef04b14ea?q=80&w=2666&auto=format&fit=crop') center/cover no-repeat;
            height: 600px;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }
        .hero-overlay {
            position: absolute;
            top: 0; left: 0; width: 100%; height: 100%;
            background: rgba(0,0,0,0.3);
        }
        .divider-title {
            display: flex;
            align-items: center;
            text-align: center;
            margin: 50px 0;
        }
        .divider-title::before, .divider-title::after {
            content: '';
            flex: 1;
            border-bottom: 2px double #ccc;
        }
        .divider-title span {
            padding: 0 20px;
            font-size: 2.5rem;
            color: #111;
            font-family: 'Playfair Display', serif;
        }
        .dish-item {
            margin-bottom: 30px;
            transition: 0.3s;
        }
        .dish-card {
            display: flex;
            align-items: flex-start;
            gap: 15px;
        }
        .dish-img {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 5px;
        }
        .dish-info {
            flex-grow: 1;
        }
        .dish-header {
            display: flex;
            justify-content: space-between;
            align-items: baseline;
            border-bottom: 1px dotted #ccc;
            padding-bottom: 5px;
            margin-bottom: 5px;
        }
        .dish-name {
            font-weight: 700;
            color: #111;
            text-transform: uppercase;
        }
        .dish-price {
            font-weight: 700;
            color: #111;
        }
        .dish-desc {
            font-size: 11px;
            color: #999;
        }
        footer {
            background-color: #111;
            color: #888;
            padding: 60px 0 30px;
            font-size: 13px;
        }
        footer h5 {
            color: #fff;
            text-transform: uppercase;
            font-weight: 700;
            margin-bottom: 25px;
            font-size: 16px;
        }
        .footer-logo {
            height: 40px;
            margin-bottom: 20px;
        }
        .btn-primary-custom {
            background-color: var(--primary);
            border: none;
            color: #000;
            font-weight: 700;
            text-transform: uppercase;
            padding: 10px 25px;
            border-radius: 0;
        }
        .btn-primary-custom:hover {
            background-color: #e6bd00;
            color: #000;
        }
    </style>
    @yield('styles')
</head>
<body>
    <div class="top-bar">
        <div class="container d-flex justify-content-between align-items-center">
            <div>
                Mạng xã hội: <i class="fab fa-facebook-f ml-2"></i> <i class="fab fa-twitter ml-2"></i> <i class="fab fa-instagram ml-2"></i>
            </div>
            <div>
                BÁNH MÌ NGON - 0123 456 789 <i class="fas fa-shopping-cart ml-3"></i>
            </div>
        </div>
    </div>

    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom sticky-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('restaurant.index') }}">
                <img src="https://via.placeholder.com/150x50.png?text=ATOO+FOODS&bg=FFD200" alt="Logo">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link active" href="{{ route('restaurant.index') }}"><i class="fas fa-home"></i> Trang chủ</a></li>
                    <li class="nav-item"><a class="nav-link" href="#"><i class="fas fa-utensils"></i> Menu chính</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('restaurant.create') }}"><i class="fas fa-plus"></i> Thêm món</a></li>
                    <li class="nav-item"><a class="nav-link" href="#"><i class="fas fa-info-circle"></i> Giới thiệu</a></li>
                    <li class="nav-item"><a class="nav-link" href="#"><i class="fas fa-envelope"></i> Liên hệ</a></li>
                </ul>
                <form class="form-inline ml-lg-4">
                    <div class="input-group">
                        <input type="text" class="form-control form-control-sm" placeholder="Tìm kiếm...">
                        <div class="input-group-append">
                            <button class="btn btn-sm btn-warning" type="button"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </nav>

    @yield('content')

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <h5>ATOO FOODS</h5>
                    <p>Món mới mỗi ngày</p>
                    <p><i class="fas fa-envelope mr-2"></i> contact@atoo.com</p>
                    <p><i class="fas fa-phone mr-2"></i> 0123 456 789</p>
                    <p><i class="fas fa-map-marker-alt mr-2"></i> Số 123 Đường Phan Chu Trinh, TP.HCM</p>
                </div>
                <div class="col-md-3">
                    <h5>GIỜ MỞ CỬA</h5>
                    <p>Thứ 2 - Thứ 6: 08:30 - 21:00</p>
                    <p>Thứ 7: 10:00 - 22:00</p>
                    <p>Chủ nhật: 10:00 - 21:00</p>
                </div>
                <div class="col-md-3">
                    <h5>DANH MỤC</h5>
                    <ul class="list-unstyled">
                        <li>Cơm Dĩa</li>
                        <li>Bánh mỳ</li>
                        <li>Bú phở</li>
                    </ul>
                </div>
                <div class="col-md-3 text-center">
                    <img src="https://via.placeholder.com/150x50.png?text=ATOO+FOODS&bg=FFD200" alt="Logo" class="footer-logo">
                    <p>&copy; 2026 ATOO FOODS. All rights reserved.</p>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    @yield('scripts')
</body>
</html>
