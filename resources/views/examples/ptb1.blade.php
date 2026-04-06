<!doctype html>
<html lang="en">
<head>
    <title>Giải Phương Trình Bậc Nhất</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    
    <style>
        body {
            background-color: antiquewhite;
            font-family: 'Inter', sans-serif;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
        }
        .card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.2);
            overflow: hidden;
            background: rgba(255, 255, 255, 0.95);
        }
        .card-header {
            background: #ffffff;
            border-bottom: 1px solid #eee;
            padding: 25px;
        }
        .card-header h3 {
            margin: 0;
            font-weight: 600;
            color: #333;
            letter-spacing: -0.5px;
        }
        .form-control {
            border-radius: 10px;
            padding: 12px;
            border: 1px solid #ddd;
            transition: all 0.3s;
        }
        .form-control:focus {
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.25);
            border-color: #667eea;
        }
        .btn {
            padding: 12px;
            border-radius: 10px;
            font-weight: 600;
            transition: transform 0.2s;
        }
        .btn:active {
            transform: scale(0.98);
        }
        .btn-primary {
            background-color: chartreuse;
            border: none;
        }
        .btn-outline-secondary {
            border: 2px solid #ddd;
            color: #666;
        }
        .result-box {
            background: #f1f3f9;
            padding: 15px;
            border-radius: 12px;
            min-height: 55px;
            font-size: 1.1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 2px dashed #cbd5e0;
        }
        .math-symbol {
            color: #764ba2;
            font-style: italic;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header text-center">
                        <h3>Giải Phương Trình</h3>
                        <small class="text-muted">Dạng: <span class="math-symbol">ax + b = 0</span></small>
                    </div>
                    
                    <div class="card-body p-4">
                        <form method="post" action="/ptb1">
                            @csrf
                            <div class="form-group mb-3">
                                <label class="small font-weight-bold">Hệ số a</label>
                                <input type="number" step="any" name="hsa" id="hsa" 
                                       value="{{ $a ?? '' }}" class="form-control" placeholder="Nhập giá trị a..." required autofocus>
                            </div>

                            <div class="form-group mb-4">
                                <label class="small font-weight-bold">Hệ số b</label>
                                <input type="number" step="any" name="hsb" id="hsb" 
                                       value="{{ $b ?? '' }}" class="form-control" placeholder="Nhập giá trị b..." required>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <button type="submit" class="btn btn-primary btn-block text-white shadow">Tính toán</button>
                                </div>
                                <div class="col-6">
                                    <a href="{{ url('ptb1') }}" class="btn btn-outline-secondary btn-block">Làm mới</a>
                                </div>
                            </div>

                            <div class="mt-4">
                                <label class="small font-weight-bold text-muted">Kết quả hiển thị:</label>
                                <div id="ketqua" class="result-box text-primary font-weight-bold">
                                    {{ $kq ?? 'Đang chờ nhập liệu...' }}
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <p class="text-center mt-3 text-white-50"><small>&copy; 2024 Laravel Math Tool</small></p>
            </div>
        </div>
    </div>

</body>
</html>