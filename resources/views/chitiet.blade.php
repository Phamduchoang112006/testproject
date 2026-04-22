@extends('layouts.master')
@section('title', 'Chi tiết sản phẩm')
@section('content')
<div class="row">
    <div class="col-sm-9">
        <div class="row">
            <div class="col-sm-4">
                <img src="{{ asset('images/product/'.$sanpham->image) }}" alt="" height="250px">
            </div>
            <div class="col-sm-8">
                <div class="single-item-body">
                    <p class="single-item-title" style="font-size: 25px; font-weight: bold;">{{$sanpham->name}}</p>
                    <p class="single-item-price" style="font-size: 18px; font-weight: bold; margin-top: 10px;">
                        @if($sanpham->promotion_price==0)
                        <span class="flash-sale">{{ number_format($sanpham->unit_price) }} đồng</span>
                        @else
                        <span class="flash-del">{{ number_format($sanpham->unit_price) }} đồng</span>
                        <span class="flash-sale">{{ number_format($sanpham->promotion_price) }} đồng</span>
                        @endif
                    </p>
                </div>

                <div class="clearfix"></div>
                <div class="space20">&nbsp;</div>

                <div class="single-item-desc">
                    <p>{{$sanpham->description}}</p>
                </div>
                <div class="space20">&nbsp;</div>

                <p>Số lượng:</p>
                <div class="single-item-options">
                    <select class="wc-select" name="color">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                    <a class="add-to-cart" href="{{ route('banhang.addtocart',$sanpham->id) }}"><i class="fa fa-shopping-cart"></i></a>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>

        <div class="space40">&nbsp;</div>
        <div class="woocommerce-tabs">
            <ul class="tabs">
                <li><a href="#tab-description">Mô tả</a></li>
                <li><a href="#tab-reviews">Reviews (0)</a></li>
            </ul>

            <div class="panel" id="tab-description">
                <p>{{$sanpham->description}}</p>
            </div>
            <div class="panel" id="tab-reviews">
                <p>Chưa có đánh giá nào.</p>
            </div>
        </div>
        <div class="space50">&nbsp;</div>
    </div>
    <div class="col-sm-3 aside">
        <div class="widget">
            <h3 class="widget-title">Sản phẩm bán chạy</h3>
            <div class="widget-body">
                <div class="beta-sales beta-lists">
                    <!-- Placeholder for best sellers if data is available -->
                </div>
            </div>
        </div> <!-- best sellers widget -->
    </div>
</div>
@endsection
