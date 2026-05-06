@extends('layouts.master')
@section('title', 'Sản phẩm yêu thích')
@section('content')
<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">Sản phẩm yêu thích</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb font-body">
                <a href="{{ route('banhang.index') }}">Trang chủ</a> / <span>Sản phẩm yêu thích</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<div class="container">
    <div id="content">
        <div class="table-responsive">
            <!-- Shop Products Table -->
            <table class="shop_table beta-shopping-cart-table" cellspacing="0">
                <thead>
                    <tr>
                        <th class="product-name">Sản phẩm</th>
                        <th class="product-price">Giá</th>
                        <th class="product-remove">Xóa</th>
                        <th class="product-add-to-cart">Giỏ hàng</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($wishlist) > 0)
                    @foreach($wishlist as $item)
                    <tr class="cart_item">
                        <td class="product-name">
                            <div class="media">
                                <img class="pull-left" src="{{ asset('images/product/'.$item->product->image) }}" alt="" height="100px">
                                <div class="media-body">
                                    <p class="font-large">{{ $item->product->name }}</p>
                                </div>
                            </div>
                        </td>

                        <td class="product-price">
                            <span class="amount">
                                @if($item->product->promotion_price == 0)
                                {{ number_format($item->product->unit_price) }} đồng
                                @else
                                {{ number_format($item->product->promotion_price) }} đồng
                                @endif
                            </span>
                        </td>

                        <td class="product-remove">
                            <a href="{{ route('khachhang.delwishlist', $item->id_product) }}" class="remove" title="Remove this item"><i class="fa fa-trash-o"></i></a>
                        </td>

                        <td class="product-add-to-cart">
                            <a class="add-to-cart" href="{{ route('banhang.addtocart', $item->id_product) }}"><i class="fa fa-shopping-cart"></i></a>
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="4" class="text-center">Chưa có sản phẩm yêu thích nào.</td>
                    </tr>
                    @endif
                </tbody>
            </table>
            <!-- End of Shop Table Products -->
        </div>
        <div class="clearfix"></div>
    </div> <!-- #content -->
</div> <!-- .container -->
@endsection
