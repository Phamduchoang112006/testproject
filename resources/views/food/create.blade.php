@extends('layouts.food')

@section('title', 'Thêm Món Mới')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header bg-success text-white">
                <h4 class="mb-0">Thêm Sản Phẩm Mới</h4>
            </div>
            <div class="card-body">
                <!-- Hiển thị lỗi ở đầu form nếu có -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <h5 class="alert-heading">Vui lòng kiểm tra lại thông tin:</h5>
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('food.store') }}" method="POST">
                    @csrf
                    
                    <div class="mb-3">
                        <label for="name" class="form-label">Tên sản phẩm <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="category" class="form-label">Danh mục <span class="text-danger">*</span></label>
                        <select class="form-select @error('category') is-invalid @enderror" id="category" name="category">
                            <option value="">-- Chọn danh mục --</option>
                            <option value="Hoa quả" {{ old('category') == 'Hoa quả' ? 'selected' : '' }}>Hoa quả</option>
                            <option value="Thực phẩm khô" {{ old('category') == 'Thực phẩm khô' ? 'selected' : '' }}>Thực phẩm khô</option>
                            <option value="Rau hữu cơ" {{ old('category') == 'Rau hữu cơ' ? 'selected' : '' }}>Rau hữu cơ</option>
                            <option value="Sản phẩm nổi bật" {{ old('category') == 'Sản phẩm nổi bật' ? 'selected' : '' }}>Sản phẩm nổi bật</option>
                        </select>
                        @error('category')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="price" class="form-label">Giá (VNĐ) <span class="text-danger">*</span></label>
                        <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ old('price') }}">
                        @error('price')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Link Hình Ảnh (URL)</label>
                        <input type="url" class="form-control @error('image') is-invalid @enderror" id="image" name="image" value="{{ old('image') }}">
                        @error('image')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Mô tả chi tiết</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="4">{{ old('description') }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('food.index') }}" class="btn btn-secondary">Quay Lại</a>
                        <button type="submit" class="btn btn-success">Lưu Sản Phẩm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
