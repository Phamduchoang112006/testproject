@extends('layouts.master')
@section('title', 'Giỏ hàng')

@section('content')
<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">Giỏ hàng</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb font-large">
                <a href="{{ route('banhang.index') }}">Trang chủ</a> / <span>Giỏ hàng</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<div class="container">
    <div id="content">
        <div class="table-responsive">
            <table class="shop_table beta-shopping-cart-table" cellspacing="0">
                <thead>
                    <tr>
                        <th class="product-name">Sản phẩm</th>
                        <th class="product-price">Đơn giá</th>
                        <th class="product-quantity">Số lượng</th>
                        <th class="product-subtotal">Thành tiền</th>
                        <th class="product-remove">Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    @if(Session::has('cart'))
                    @foreach($item_cart as $cart)
                    <tr class="cart_item">
                        <td class="product-name">
                            <div class="media">
                                <img class="pull-left" src="{{ asset('images/product/'.$cart['item']['image']) }}" alt="" width="100px">
                                <div class="media-body">
                                    <p class="font-large table-title">{{ $cart['item']['name'] }}</p>
                                </div>
                            </div>
                        </td>

                        <td class="product-price">
                            <span class="amount">{{ number_format($cart['item']['promotion_price'] == 0 ? $cart['item']['unit_price'] : $cart['item']['promotion_price']) }} đồng</span>
                        </td>

                        <td class="product-quantity">
                            <input type="number" value="{{ $cart['qty'] }}" style="width: 50px" readonly>
                        </td>

                        <td class="product-subtotal">
                            <span class="amount">{{ number_format($cart['price']) }} đồng</span>
                        </td>

                        <td class="product-remove">
                            <a href="{{ route('banhang.delcart', $cart['item']['id']) }}" class="remove" title="Remove this item"><i class="fa fa-trash-o"></i></a>
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <tr><td colspan="5" class="text-center">Giỏ hàng trống</td></tr>
                    @endif
                </tbody>

                <tfoot>
                    <tr>
                        <td colspan="6" class="actions text-right">
                            <a href="{{ route('banhang.getcheckout') }}" class="beta-btn primary">Đặt hàng <i class="fa fa-chevron-right"></i></a>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
        <div class="cart-totals text-right">
            <div class="cart-totals-row"><h5 class="cart-total-title">Tổng tiền: @if(Session::has('cart')) {{ number_format($totalPrice) }} @else 0 @endif đồng</h5></div>
        </div>
        <div class="clearfix"></div>
    </div> <!-- #content -->
</div> <!-- .container -->
@endsection
