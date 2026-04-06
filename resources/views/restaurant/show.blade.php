@extends('layouts.restaurant')

@section('title', $restaurant->name . ' - ATOO FOODS')

@section('content')
<div class="container my-5 py-5">
    <div class="row align-items-center">
        <!-- Dish Image with some premium hover effect or framing -->
        <div class="col-md-7 mb-4">
            <div class="position-relative overflow-hidden shadow-lg p-2 bg-white" style="border-radius: 10px;">
                <img src="{{ $restaurant->image }}" alt="{{ $restaurant->name }}" class="img-fluid w-100" style="border-radius: 5px; height: 500px; object-fit: cover;">
                <div class="badge badge-warning position-absolute p-3" style="top: 20px; right: 20px; font-size: 20px; font-weight: bold; border-radius: 50%;">
                    {{ number_format($restaurant->price, 0, ',', '.') }} ₫
                </div>
            </div>
        </div>

        <!-- Dish Details -->
        <div class="col-md-5 p-lg-5">
            <h6 class="text-warning font-weight-bold text-uppercase mb-2">{{ $restaurant->category }}</h6>
            <h1 class="display-4 font-weight-bold mb-3 dish-title text-dark">{{ $restaurant->name }}</h1>
            <p class="text-muted mb-5 lead">{{ $restaurant->description }}</p>

            <h5 class="font-weight-bold border-bottom pb-2 mb-4 text-uppercase">Thành phần món ăn</h5>
            <ul class="list-unstyled mb-5">
                @if($restaurant->ingredients)
                    @php
                        $ingredients = explode(',', $restaurant->ingredients);
                    @endphp
                    @foreach($ingredients as $ingredient)
                        <li class="mb-3 d-flex align-items-center">
                            <i class="fas fa-check-circle text-warning mr-3" style="font-size: 1.2rem;"></i>
                            <span class="text-dark font-weight-bold text-capitalize">{{ trim($ingredient) }}</span>
                        </li>
                    @endforeach
                @else
                    <li class="text-muted">Đang cập nhật thành phần...</li>
                @endif
            </ul>

            <div class="d-flex gap-3">
                <a href="{{ route('restaurant.index') }}" class="btn btn-outline-dark px-4 mr-3" style="border-radius: 0; font-weight: bold;">TRỞ VỀ MENU</a>
                <button class="btn btn-primary-custom px-5" style="font-weight: bold;">ĐẶT MÓN NGAY</button>
            </div>
        </div>
    </div>

    <!-- Related Section (Optional for extra "WOW") -->
    <div class="mt-5 pt-5">
        <h3 class="font-weight-bold text-center mb-4">Món ngon đi kèm</h3>
        <hr class="w-25 mx-auto mb-5 border-warning" style="border-width: 3px;">
        <div class="row">
            <div class="col-md-3">
                <div class="text-center shadow-sm p-4 bg-light rounded hover-lift" style="transition: 0.3s; transform: scale(1);">
                    <img src="https://images.unsplash.com/photo-1544333346-64e4fe18ead3?q=80&w=2670&auto=format&fit=crop" class="img-fluid mb-3 rounded-circle" style="width: 100px; height: 100px; object-fit: cover;">
                    <p class="font-weight-bold mb-1">Trà đá vỉa hè</p>
                    <p class="text-warning font-weight-bold">5.000 ₫</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="text-center shadow-sm p-4 bg-light rounded hover-lift">
                    <img src="https://images.unsplash.com/photo-1541167760496-162955ed2a9f?q=80&w=2670&auto=format&fit=crop" class="img-fluid mb-3 rounded-circle" style="width: 100px; height: 100px; object-fit: cover;">
                    <p class="font-weight-bold mb-1">Cà phê sữa đá</p>
                    <p class="text-warning font-weight-bold">15.000 ₫</p>
                </div>
            </div>
             <div class="col-md-3">
                <div class="text-center shadow-sm p-4 bg-light rounded hover-lift">
                    <img src="https://images.unsplash.com/photo-1512621776951-a57141f2eefd?q=80&w=2670&auto=format&fit=crop" class="img-fluid mb-3 rounded-circle" style="width: 100px; height: 100px; object-fit: cover;">
                    <p class="font-weight-bold mb-1">Kim chi / Salad</p>
                    <p class="text-warning font-weight-bold">10.000 ₫</p>
                </div>
            </div>
             <div class="col-md-3">
                <div class="text-center shadow-sm p-4 bg-light rounded hover-lift">
                    <img src="https://images.unsplash.com/photo-1619410283995-43d9134e7656?q=80&w=2670&auto=format&fit=crop" class="img-fluid mb-3 rounded-circle" style="width: 100px; height: 100px; object-fit: cover;">
                    <p class="font-weight-bold mb-1">Khoai tây chiên</p>
                    <p class="text-warning font-weight-bold">20.000 ₫</p>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .hover-lift:hover {
        transform: translateY(-10px) !important;
        box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
    }
</style>
@endsection
