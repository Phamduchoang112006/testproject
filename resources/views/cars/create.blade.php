@extends('layouts.car_app')

@section('title', 'Thêm Xe Mới')

@section('styles')
<style>
    .form-group label {
        font-weight: 700;
        color: #1a1a1a;
        margin-bottom: 10px;
        text-transform: uppercase;
        font-size: 0.85rem;
    }
    .form-control {
        border-radius: 12px;
        padding: 12px 18px;
        border: 2px solid #eaedf0;
        transition: border-color 0.3s;
    }
    .form-control:focus {
        border-color: #007bff;
        box-shadow: none;
    }
    .btn-submit {
        border-radius: 15px;
        padding: 15px;
        font-weight: 800;
        letter-spacing: 1.5px;
        text-transform: uppercase;
        background: linear-gradient(to right, #007bff, #0056b3);
        border: none;
        transition: transform 0.2s, box-shadow 0.2s;
    }
    .btn-submit:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 20px rgba(0, 123, 255, 0.2);
    }
    .card-header {
        background-color: transparent;
        border-bottom: 2px solid #f8f9fa;
        padding-bottom: 25px;
        text-align: center;
    }
    .container-box {
        max-width: 700px;
        margin: auto;
    }
</style>
@endsection

@section('content')
<div class="container pb-5">
    <div class="container-box shadow-lg rounded-xl overflow-hidden bg-white p-5">
        <div class="card-header mb-5">
            <h2 class="font-weight-bold text-primary mb-2">🚗 THÊM XE MỚI</h2>
            <p class="text-muted">Điền đầy đủ các thông tin bên dưới để đăng ký xe mới vào hệ thống.</p>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger border-0 shadow-sm rounded-lg py-3 px-4 mb-5">
                <strong class="h5">Lỗi!</strong> Vui lòng kiểm tra lại:<br><br>
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('cars.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label>Hãng Sản Xuất <span class="text-danger">*</span></label>
                        <input type="text" name="make" class="form-control" placeholder="Toyota, BMW, Honda..." value="{{ old('make') }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label>Mẫu Xe (Model) <span class="text-danger">*</span></label>
                        <input type="text" name="model" class="form-control" placeholder="Innova, X5, CR-V..." value="{{ old('model') }}">
                    </div>
                </div>
            </div>

            <div class="form-group mb-4">
                <label>Ngày Sản Xuất <span class="text-danger">*</span></label>
                <input type="date" name="produced_on" class="form-control" value="{{ old('produced_on') }}">
            </div>

            <div class="form-group mb-5">
                <label>Hình Ảnh Minh Họa</label>
                <div class="custom-file mb-2">
                    <input type="file" name="image" class="custom-file-input" id="car_image">
                    <label class="custom-file-label" for="car_image">Chọn tệp tin ảnh...</label>
                </div>
                <small class="text-muted font-italic">Định dạng chấp nhận: jpg, png, jpeg (Tối đa 2MB).</small>
            </div>

            <div class="d-flex align-items-center justify-content-between pt-4 border-top">
                <a href="{{ route('cars.index') }}" class="btn btn-outline-secondary px-4 font-weight-bold rounded-pill">HỦY BỎ</a>
                <button type="submit" class="btn btn-primary px-5 btn-submit shadow">LƯU THÔNG TIN</button>
            </div>
        </form>
    </div>
</div>

@section('scripts')
<script>
    // Xử lý hiển thị tên file khi chọn
    document.querySelector('.custom-file-input').addEventListener('change', function(e) {
        var fileName = document.getElementById("car_image").files[0].name;
        var nextSibling = e.target.nextElementSibling;
        nextSibling.innerText = fileName;
    });
</script>
@endsection

@endsection
