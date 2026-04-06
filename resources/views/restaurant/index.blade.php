@extends('layouts.restaurant')

@section('content')
<div class="hero-section text-center text-white">
    <div class="hero-overlay"></div>
    <div class="container position-relative">
        <h1 class="display-3 font-weight-bold">ATOO FOODS</h1>
        <p class="lead text-uppercase tracking-widest">Hương vị quê hương - Bánh mì giòn tan</p>
        <a href="#menu" class="btn btn-primary-custom mt-4">XEM MENU NGAY</a>
    </div>
</div>

<div id="menu" class="container my-5">
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show mb-5" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @foreach($dishesByCategories as $categoryName => $dishes)
        @if($dishes->count() > 0)
            <div class="divider-title">
                <span>{{ $categoryName }}</span>
            </div>

            <div class="row">
                @foreach($dishes as $dish)
                    <div class="col-md-6 dish-item">
                        <a href="{{ route('restaurant.show', $dish->id) }}" class="text-decoration-none">
                            <div class="dish-card">
                                <img src="{{ $dish->image }}" alt="{{ $dish->name }}" class="dish-img">
                                <div class="dish-info">
                                    <div class="dish-header">
                                        <span class="dish-name text-dark">{{ $dish->name }}</span>
                                        <span class="dish-price text-dark">{{ number_format($dish->price, 0, ',', '.') }} ₫</span>
                                    </div>
                                    <p class="dish-desc m-0">{{ $dish->description }}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        @endif
    @endforeach
</div>

<div class="container overflow-hidden my-5">
    <div class="row text-center">
        <div class="col-md-3 mb-4">
            <div class="card border-0 shadow-sm">
                <img src="https://images.unsplash.com/photo-1509722747041-619f38d78241?q=80&w=1500&auto=format&fit=crop" class="card-img-top" style="height:150px; object-fit:cover;">
                <div class="card-body">
                    <h6 class="font-weight-bold">BÁNH MÌ</h6>
                    <p class="small text-muted">Chúng tôi đã tập hợp thực đơn tiếng Việt truyền thống.</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card border-0 shadow-sm">
                <img src="https://images.unsplash.com/photo-1546069901-ba9599a7e63c?q=80&w=1500&auto=format&fit=crop" class="card-img-top" style="height:150px; object-fit:cover;">
                <div class="card-body">
                    <h6 class="font-weight-bold">CƠM DĨA</h6>
                    <p class="small text-muted">Chúng tôi đã tập hợp thực đơn tiếng Việt truyền thống.</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card border-0 shadow-sm">
                <img src="https://images.unsplash.com/photo-1582878826629-29b7ad1cdc43?q=80&w=1500&auto=format&fit=crop" class="card-img-top" style="height:150px; object-fit:cover;">
                <div class="card-body">
                    <h6 class="font-weight-bold">BÚN PHỞ</h6>
                    <p class="small text-muted">Chúng tôi đã tập hợp thực đơn tiếng Việt truyền thống.</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card border-0 shadow-sm">
                <img src="https://images.unsplash.com/photo-1543339308-43e59d6b73a6?q=80&w=1500&auto=format&fit=crop" class="card-img-top" style="height:150px; object-fit:cover;">
                <div class="card-body">
                    <h6 class="font-weight-bold">MÓN CHAY</h6>
                    <p class="small text-muted">Chúng tôi đã tập hợp thực đơn tiếng Việt truyền thống.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
