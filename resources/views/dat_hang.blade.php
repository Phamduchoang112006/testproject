@extends('layouts.master')
@section('title', 'Đặt hàng')

@section('content')
<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">Đặt hàng</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb">
                <a href="{{ route('banhang.index') }}">Trang chủ</a> / <span>Đặt hàng</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<div class="container">
    <div id="content">
        @if(Session::has('thongbao'))
            <div class="alert alert-success">{{ Session::get('thongbao') }}</div>
        @endif
        <form action="{{ route('banhang.postcheckout') }}" method="post" class="beta-form-checkout">
            @csrf
            <div class="row">
                <div class="col-sm-6">
                    <h4>Thông tin khách hàng</h4>
                    <div class="space20">&nbsp;</div>

                    <div class="form-block">
                        <label for="name">Họ tên*</label>
                        <input type="text" name="name" id="name" placeholder="Họ tên" required value="{{ Auth::check() ? Auth::user()->full_name : '' }}">
                    </div>
                    <div class="form-block">
                        <label>Giới tính </label>
                        <input id="gender" type="radio" class="input-radio" name="gender" value="nam" checked="checked" style="width: 10%"><span style="margin-right: 10%">Nam</span>
                        <input id="gender" type="radio" class="input-radio" name="gender" value="nữ" style="width: 10%"><span>Nữ</span>
                    </div>

                    <div class="form-block">
                        <label for="email">Email*</label>
                        <input type="email" name="email" id="email" required placeholder="example@gmail.com" value="{{ Auth::check() ? Auth::user()->email : '' }}">
                    </div>

                    <div class="form-block">
                        <label for="address">Địa chỉ*</label>
                        <input type="text" name="address" id="address" placeholder="Địa chỉ giao hàng" required value="{{ Auth::check() ? Auth::user()->address : '' }}">
                    </div>

                    <div class="form-block">
                        <label for="phone">Điện thoại*</label>
                        <input type="text" name="phone" id="phone" required value="{{ Auth::check() ? Auth::user()->phone : '' }}">
                    </div>
                    
                    <div class="form-block">
                        <label for="notes">Ghi chú</label>
                        <textarea name="notes" id="notes"></textarea>
                    </div>

                    <div class="form-block">
                        <label for="coupon">Mã giảm giá</label>
                        <input type="text" name="coupon" id="coupon" placeholder="Nhập mã giảm giá nếu có">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="your-order">
                        <div class="your-order-head"><h5>Đơn hàng của bạn</h5></div>
                        <div class="your-order-body" style="padding: 0px 10px">
                            <div class="your-order-item">
                                @if(Session::has('cart'))
                                @foreach(Session('cart')->items as $cart)
                                <div class="media">
                                    <img width="25%" src="{{ asset('images/product/'.$cart['item']['image']) }}" alt="" class="pull-left">
                                    <div class="media-body">
                                        <p class="font-large">{{ $cart['item']['name'] }}</p>
                                        <span class="color-gray your-order-info">Số lượng: {{ $cart['qty'] }}</span>
                                        <span class="color-gray your-order-info">Đơn giá: {{ number_format($cart['item']['promotion_price'] == 0 ? $cart['item']['unit_price'] : $cart['item']['promotion_price']) }} đồng</span>
                                    </div>
                                </div>
                                <div class="space10">&nbsp;</div>
                                @endforeach
                                @endif
                            </div>
                            <div class="your-order-item">
                                <div class="pull-left"><p class="your-order-f18">Tạm tính:</p></div>
                                <div class="pull-right"><h5 class="color-black">@if(Session::has('cart')) {{ number_format(Session('cart')->totalPrice) }} @else 0 @endif đồng</h5></div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="your-order-item">
                                <div class="pull-left"><p class="your-order-f18">Phí vận chuyển:</p></div>
                                <div class="pull-right"><h5 class="color-black">30,000 đồng</h5></div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="your-order-item">
                                <div class="pull-left"><p class="your-order-f18">Tổng cộng:</p></div>
                                <div class="pull-right"><h5 class="color-black">@if(Session::has('cart')) {{ number_format(Session('cart')->totalPrice + 30000) }} @else 0 @endif đồng</h5></div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="your-order-head"><h5>Hình thức thanh toán</h5></div>
                        
                        <div class="your-order-body">
                            <ul class="payment_methods methods">
                                <li class="payment_method_bacs">
                                    <input id="payment_method_bacs" type="radio" class="input-radio" name="payment_method" value="COD" checked="checked">
                                    <label for="payment_method_bacs">Thanh toán khi nhận hàng </label>
                                    <div class="payment_box payment_method_bacs" style="display: block;">
                                        Cửa hàng sẽ gửi hàng đến địa chỉ của bạn, bạn xem hàng rồi thanh toán tiền cho nhân viên giao hàng
                                    </div>						
                                </li>

                                <li class="payment_method_cheque">
                                    <input id="payment_method_cheque" type="radio" class="input-radio" name="payment_method" value="ATM">
                                    <label for="payment_method_cheque">Chuyển khoản </label>
                                    <div class="payment_box payment_method_cheque" style="display: none;">
                                        Chuyển tiền đến tài khoản sau:
                                        <br>- Số tài khoản: 123 456 789
                                        <br>- Chủ TK: Nguyễn A
                                        <br>- Ngân hàng ACB, Chi nhánh TPHCM
                                    </div>						
                                </li>
                            </ul>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="beta-btn primary">Đặt hàng <i class="fa fa-chevron-right"></i></button>
                        </div>
                    </div> <!-- .your-order -->
                </div>
            </div>
        </form>
    </div> <!-- #content -->
</div> <!-- .container -->
@endsection

@section('script')
<script>
    $(document).ready(function() {
        $('input[name="payment_method"]').on('change', function() {
            if ($(this).val() == 'ATM') {
                $('.payment_box.payment_method_cheque').show();
                $('.payment_box.payment_method_bacs').hide();
            } else {
                $('.payment_box.payment_method_cheque').hide();
                $('.payment_box.payment_method_bacs').show();
            }
        });
    });
</script>
@endsection
