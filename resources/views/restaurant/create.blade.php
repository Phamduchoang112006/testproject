@extends('layouts.restaurant')

@section('title', 'Thêm Món Ăn Mới - ATOO FOODS')

@section('content')
<div class="container my-5 py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0 shadow-lg" style="border-radius: 15px; overflow: hidden;">
                <div class="card-header bg-dark text-white p-4">
                    <h3 class="mb-0 font-weight-bold"><i class="fas fa-plus-circle mr-2"></i> THÊM MÓN ĂN MỚI</h3>
                    <p class="small text-muted mb-0">Nhập đầy đủ thông tin để thêm món mới vào thực đơn.</p>
                </div>
                <div class="card-body p-5">
                    @if ($errors->any())
                        <div class="alert alert-danger mb-4" style="border-radius: 10px;">
                            <h6 class="font-weight-bold">Phát hiện lỗi nhập liệu!</h6>
                            <ul class="mb-0 small">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('restaurant.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label class="font-weight-bold text-uppercase small">Tên món ăn <span class="text-danger">*</span></label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="VD: Bánh mì Heo Quay">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-4">
                                <label class="font-weight-bold text-uppercase small">Danh mục <span class="text-danger">*</span></label>
                                <select name="category" class="form-control @error('category') is-invalid @enderror">
                                    <option value="">-- Chọn danh mục --</option>
                                    <option value="Cơm Dĩa" {{ old('category') == 'Cơm Dĩa' ? 'selected' : '' }}>Cơm Dĩa</option>
                                    <option value="Bánh mì" {{ old('category') == 'Bánh mì' ? 'selected' : '' }}>Bánh mì</option>
                                    <option value="Bú phở" {{ old('category') == 'Bú phở' ? 'selected' : '' }}>Bú phở</option>
                                </select>
                                @error('category')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label class="font-weight-bold text-uppercase small">Giá (₫) <span class="text-danger">*</span></label>
                                <input type="number" name="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price') }}" placeholder="VD: 69000">
                                @error('price')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-4">
                                <label class="font-weight-bold text-uppercase small">Hình ảnh</label>
                                <input type="file" name="image_file" class="form-control-file @error('image_file') is-invalid @enderror">
                                @error('image_file')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="font-weight-bold text-uppercase small">Mô tả món ăn <span class="text-danger">*</span></label>
                            <textarea name="description" rows="3" class="form-control @error('description') is-invalid @enderror" placeholder="Nhập một vài mô tả sơ qua về món ăn...">{{ old('description') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-5">
                            <label class="font-weight-bold text-uppercase small">Thành phần món ăn</label>
                            <textarea name="ingredients" rows="2" class="form-control @error('ingredients') is-invalid @enderror" placeholder="VD: thịt bò, hành tây, bún tươi, nước lèo...">{{ old('ingredients') }}</textarea>
                            @error('ingredients')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="text-right">
                            <a href="{{ route('restaurant.index') }}" class="btn btn-light px-4 mr-2">Hủy bỏ</a>
                            <button type="submit" class="btn btn-primary-custom px-5">Lưu món ăn</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
