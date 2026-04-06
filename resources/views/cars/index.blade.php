@extends('layouts.car_app')

@section('title', 'Quản Lý Danh Sách Xe')

@section('styles')
<style>
    .table thead th { border: none !important; font-weight: 700; color: #495057; }
    .car-badge { background: #e7f3ff; color: #007bff; padding: 6px 15px; border-radius: 20px; font-size: 0.9rem; font-weight: 600; display: inline-block; }
    .table-hover tbody tr:hover { background-color: #f8f9fa; cursor: default; }
    .img-cell img { transition: transform 0.3s ease; box-shadow: 0 4px 10px rgba(0,0,0,0.1); }
    .img-cell img:hover { transform: scale(1.1); }
    .btn-action { margin-top: 5px; min-width: 80px; }
    .container-box { box-shadow: 0 20px 40px rgba(0,0,0,0.08); }
</style>
@endsection

@section('content')
<div class="container container-box mb-5">
    <div class="row align-items-center mb-4">
        <div class="col-md-6">
            <h2 class="text-primary font-weight-bold mb-0">DANH SÁCH XE HIỆN CÓ</h2>
            <p class="text-muted mb-0">Hệ thống quản lý thông tin xe chuyên nghiệp</p>
        </div>
        <div class="col-md-6 text-right">
            <a class="btn btn-primary font-weight-bold shadow px-4 py-2" href="{{ route('cars.create') }}">
                + THÊM XE MỚI
            </a>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show mb-4 border-0 shadow-sm" role="alert" style="background-color: #d4edda; color: #155724;">
            <i class="fas fa-check-circle mr-2"></i><strong>Thành công!</strong> {{ $message }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-borderless table-hover shadow-sm rounded overflow-hidden">
            <thead class="bg-light text-center">
                <tr>
                    <th width="80">ID</th>
                    <th width="150">Hình Ảnh</th>
                    <th>Hãng Sản Xuất</th>
                    <th>Mẫu Xe</th>
                    <th>Ngày Sản Xuất</th>
                    <th width="120">Hành Động</th>
                </tr>
            </thead>
            <tbody>
                @forelse($cars as $car)
                    <tr class="align-middle border-bottom text-center">
                        <td class="font-weight-bold py-4">#{{ $car->id }}</td>
                        <td class="img-cell">
                            @if($car->image)
                                @if(str_starts_with($car->image, 'http'))
                                    <img src="{{ $car->image }}" alt="car image" class="img-fluid rounded shadow-sm" style="max-height: 70px; border: 2px solid #fff;">
                                @else
                                    <img src="{{ asset('images/' . $car->image) }}" alt="car image" class="img-fluid rounded shadow-sm" style="max-height: 70px; border: 2px solid #fff;">
                                @endif
                            @else
                                <span class="text-muted badge badge-light">N/A</span>
                            @endif
                        </td>
                        <td class="font-weight-bold py-4 text-capitalize">{{ $car->make }}</td>
                        <td class="py-4"><span class="car-badge">{{ $car->model }}</span></td>
                        <td class="py-4">{{ date('d/m/Y', strtotime($car->produced_on)) }}</td>
                        <td class="py-4">
                            <form action="{{ route('cars.destroy', $car->id) }}" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xóa chiếc xe này?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger btn-sm btn-action rounded-pill font-weight-bold font-sm">Xóa</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center py-5">
                            <div class="text-muted">
                                <p class="h5 mb-0">Chưa có dữ liệu nào trong bảng.</p>
                                <a href="{{ route('cars.create') }}" class="btn btn-link mt-2">Thêm xe ngay</a>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    <div class="mt-4 d-flex justify-content-between align-items-center">
        <p class="text-muted small mb-0">Tổng cộng: <strong>{{ count($cars) }}</strong> bản ghi</p>
        <span class="badge badge-primary px-3 py-2">Hệ Thống Xe Độc Lập</span>
    </div>
</div>
@endsection
