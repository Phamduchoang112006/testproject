@extends('layouts.food')

@section('title', 'Website Food - Sản Phẩm')

@section('content')

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="text-end mb-4">
    <a href="{{ route('food.create') }}" class="btn btn-success"><i class="fa fa-plus"></i> Thêm Món Mới</a>
</div>

<!-- Tabs -->
<div class="category-tabs">
    <a href="#" class="category-tab">HOA QUẢ</a>
    <a href="#" class="category-tab">THỰC PHẨM KHÔ</a>
    <a href="#" class="category-tab active">RAU HỮU CƠ</a>
</div>

<!-- Product Grid -->
<div class="row row-cols-1 row-cols-md-4 g-4">
    @foreach($foodsByCategory as $category => $foods)
        @foreach($foods as $food)
        <div class="col">
            <div class="card h-100 product-card text-center p-3">
                <img src="{{ $food->image ?? 'https://via.placeholder.com/300x200.png?text=No+Image' }}" class="card-img-top mx-auto" alt="{{ $food->name }}" style="max-height: 200px; object-fit: cover;">
                <div class="card-body">
                    <div class="product-category mb-1">{{ mb_strtoupper($food->category) }}</div>
                    <h5 class="card-title product-title">{{ $food->name }}</h5>
                    <p class="card-text product-price">{{ number_format($food->price, 0, ',', '.') }} VNĐ</p>
                </div>
            </div>
        </div>
        @endforeach
    @endforeach
</div>

@endsection
