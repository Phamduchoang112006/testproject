<!doctype html>
<html lang="en">
<head>
    <title>Hệ Thống Toán Học</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #f3f5f5 0%, #fdfdfd 100%);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .menu-container {
            background: #fff;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.2);
            text-align: center;
            width: 100%;
            max-width: 500px;
        }
        .btn-choice {
            padding: 20px;
            font-size: 1.2rem;
            font-weight: bold;
            border-radius: 15px;
            margin-bottom: 20px;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none !important;
        }
        .btn-choice:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 15px rgba(0,0,0,0.1);
        }
        .icon { font-size: 2rem; margin-right: 15px; }
    </style>
</head>
<body>

    <div class="menu-container">
        <h2 class="mb-5 text-secondary">VUI LÒNG CHỌN</h2>
        
        <a href="{{ url('ptb1') }}" class="btn-choice bg-primary text-white">
            <span class="icon"></span> Giải Phương Trình Bậc Nhất
        </a>

        <a href="{{ url('calculator') }}" class="btn-choice bg-success text-white">
            <span class="icon"></span> Bảng Tính Hai Số
        </a>

        <p class="mt-4 text-muted small"></p>


    </div>

</body>
</html>