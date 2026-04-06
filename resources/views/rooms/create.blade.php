@extends('layouts.restaurant')

@section('title', 'Thêm Phòng Mới - Hệ Thống Quản Lý')

@section('content')
<div class="container my-5 pt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg border-0" style="border-radius: 15px;">
                <div class="card-header bg-primary text-white p-4" style="border-radius: 15px 15px 0 0;">
                    <h4 class="mb-0 font-weight-bold"><i class="fas fa-bed mr-2"></i> THÊM PHÒNG MỚI</h4>
                    <p class="mb-0 small opacity-75">Yêu cầu 4: Xác thực biểu mẫu và hiển thị lỗi</p>
                </div>
                <div class="card-body p-4">
                    
                    {{-- THÔNG BÁO LỖI Ở ĐẦU BIỂU MẪU (Theo yêu cầu 4) --}}
                    @if ($errors->any())
                        <div class="alert alert-danger shadow-sm mb-4">
                            <h6 class="font-weight-bold text-dark"><i class="fas fa-exclamation-triangle mr-2"></i> Phát hiện lỗi nhập liệu!</h6>
                            <ul class="mb-0 small text-dark">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if(session('success'))
                        <div class="alert alert-success shadow-sm mb-4">
                            <i class="fas fa-check-circle mr-2"></i> {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('rooms.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="row">
                            {{-- Room Number --}}
                            <div class="col-md-6 mb-3">
                                <label class="font-weight-bold">Số phòng <span class="text-danger">*</span></label>
                                <input type="text" name="room_number" 
                                       class="form-control @error('room_number') is-invalid @enderror" 
                                       value="{{ old('room_number') }}" placeholder="VD: P.101">
                                {{-- HIỂN THỊ LỖI TẠI TỪNG TRƯỜNG (Theo yêu cầu 4) --}}
                                @error('room_number')
                                    <div class="invalid-feedback font-weight-bold">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Room Type --}}
                            <div class="col-md-6 mb-3">
                                <label class="font-weight-bold">Loại phòng <span class="text-danger">*</span></label>
                                <select name="type" class="form-control @error('type') is-invalid @enderror">
                                    <option value="">-- Chọn loại phòng --</option>
                                    <option value="Standard" {{ old('type') == 'Standard' ? 'selected' : '' }}>Standard</option>
                                    <option value="VIP" {{ old('type') == 'VIP' ? 'selected' : '' }}>VIP</option>
                                    <option value="Double" {{ old('type') == 'Double' ? 'selected' : '' }}>Double</option>
                                </select>
                                @error('type')
                                    <div class="invalid-feedback font-weight-bold">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            {{-- Price --}}
                            <div class="col-md-6 mb-3">
                                <label class="font-weight-bold">Giá phòng (VNĐ) <span class="text-danger">*</span></label>
                                <input type="number" name="price" 
                                       class="form-control @error('price') is-invalid @enderror" 
                                       value="{{ old('price') }}" placeholder="VD: 500000">
                                @error('price')
                                    <div class="invalid-feedback font-weight-bold">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Image --}}
                            <div class="col-md-6 mb-3">
                                <label class="font-weight-bold">Hình ảnh phòng</label>
                                <input type="file" name="image" class="form-control-file @error('image') is-invalid @enderror">
                                @error('image')
                                    <div class="invalid-feedback font-weight-bold text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- Description --}}
                        <div class="mb-3">
                            <label class="font-weight-bold">Mô tả phòng <span class="text-danger">*</span></label>
                            <textarea name="description" rows="3" 
                                      class="form-control @error('description') is-invalid @enderror" 
                                      placeholder="Mô tả tiện nghi phòng...">{{ old('description') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback font-weight-bold">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Status Checkbox --}}
                        <div class="mb-4">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="is_booked" class="custom-control-input" id="isBooked" {{ old('is_booked') ? 'checked' : '' }}>
                                <label class="custom-control-label font-weight-bold" for="isBooked">Đã có người đặt (Is Booked)</label>
                            </div>
                            @error('is_booked')
                                <small class="text-danger font-weight-bold">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="text-right">
                            <button type="reset" class="btn btn-light px-4 border">Làm mới</button>
                            <button type="submit" class="btn btn-primary px-5 font-weight-bold">LƯU PHÒNG</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
