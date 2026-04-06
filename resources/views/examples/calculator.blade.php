<!doctype html>
<html lang="en">
<head>
    <title>Bảng Tính</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card p-4 shadow mx-auto" style="max-width: 450px;">
            <h3 class="text-center text-success mb-4">MÁY TÍNH 2 SỐ</h3>
            
            <form method="post" action="/calculator">
                @csrf
                <div class="form-group">
                    <label>Số thứ nhất:</label>
                    <input type="text" name="num1" id="num1" class="form-control" value="{{ $n1 ?? '' }}" autofocus>
                </div>
                <div class="form-group">
                    <label>Số thứ hai:</label>
                    <input type="text" name="num2" id="num2" class="form-control" value="{{ $n2 ?? '' }}">
                </div>
                <div class="d-flex justify-content-between mb-3">
                    <button type="submit" name="op" value="+" class="btn btn-outline-primary">+</button>
                    <button type="submit" name="op" value="-" class="btn btn-outline-primary">-</button>
                    <button type="submit" name="op" value="*" class="btn btn-outline-primary">x</button>
                    <button type="submit" name="op" value="/" class="btn btn-outline-primary">:</button>
                </div>
                <button type="button" onclick="resetForm()" class="btn btn-secondary btn-block">Làm mới (Reset)</button>
            </form>

            <div class="alert alert-info mt-4 text-center">
                Kết quả: <strong>{{ $res ?? '...' }}</strong>
            </div>
            <a href="/" class="text-center d-block">Quay lại Menu</a>
        </div>
    </div>

    <script>
        function resetForm() {
            document.getElementById('num1').value = '';
            document.getElementById('num2').value = '';
            document.getElementById('num1').focus(); // Đặt con trỏ vào ô đầu tiên
        }
    </script>
</body>
</html>