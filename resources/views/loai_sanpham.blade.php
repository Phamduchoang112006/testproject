@extends('layouts.master')
@section('title', 'Sản phẩm theo loại')

@section('content')
<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">Sản phẩm {{ $category->name }}</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb font-large">
                <a href="{{ route('banhang.index') }}">Trang chủ</a> / <span>{{ $category->name }}</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<div class="container">
    <div id="content" class="space-top-none">
        <div class="main-content">
            <div class="space60">&nbsp;</div>
            <div class="row">
                <div class="col-sm-3">
                    <ul class="aside-menu">
                        @foreach(\App\Models\Category::all() as $cat)
                            <li><a href="{{ route('banhang.category', $cat->id) }}">{{ $cat->name }}</a></li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-sm-9">
                    <div class="beta-products-list">
                        <h4>{{ $category->name }}</h4>
                        <div class="beta-products-details">
                            <p class="pull-left">Tìm thấy {{ count($products) }} sản phẩm</p>
                            <div class="clearfix"></div>
                        </div>

                        <div class="row">
                            @foreach($products as $product)
                            <div class="col-sm-4" style="margin-bottom: 20px;">
                                <div class="single-item">
                                    <div class="single-item-header">
                                        <a href="{{ route('banhang.chitiet', $product->id) }}"><img src="{{ asset('images/product/'.$product->image) }}" alt="" height="250px"></a>
                                    </div>
                                    <div class="single-item-body">
                                        <p class="single-item-title">{{ $product->name }}</p>
                                        <p class="single-item-price">
                                            @if($product->promotion_price == 0)
                                                <span class="flash-sale">{{ number_format($product->unit_price) }} đồng</span>
                                            @else
                                                <span class="flash-del">{{ number_format($product->unit_price) }} đồng</span>
                                                <span class="flash-sale">{{ number_format($product->promotion_price) }} đồng</span>
                                            @endif
                                        </p>
                                    </div>
                                    <div class="single-item-caption">
                                        <a class="add-to-cart pull-left" href="{{ route('banhang.addtocart', $product->id) }}"><i class="fa fa-shopping-cart"></i></a>
                                        <a class="beta-btn primary" href="{{ route('banhang.chitiet', $product->id) }}">Chi tiết <i class="fa fa-chevron-right"></i></a>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="row">{{ $products->links() }}</div>
                    </div> <!-- .beta-products-list -->
                </div>
            </div> <!-- end section with sidebar and main content -->
        </div> <!-- .main-content -->
    </div> <!-- #content -->
</div> <!-- .container -->
@endsection
