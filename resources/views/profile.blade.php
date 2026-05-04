@extends('layouts.master')
@section('title', 'Thông tin cá nhân')

@section('content')
<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">Thông tin cá nhân</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb font-large">
                <a href="{{ route('banhang.index') }}">Trang chủ</a> / <span>Thông tin</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<div class="container">
    <div id="content">
        <div class="row">
            <div class="col-sm-4">
                <h4>Cập nhật thông tin</h4>
                <div class="space20">&nbsp;</div>
                @if(session('thongbao'))
                    <div class="alert alert-success">{{ session('thongbao') }}</div>
                @endif
                <form action="{{ route('khachhang.postProfile') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Họ tên</label>
                        <input type="text" name="full_name" class="form-control" value="{{ $user->full_name }}" required>
                    </div>
                    <div class="form-group">
                        <label>Email (Không thể thay đổi)</label>
                        <input type="email" class="form-control" value="{{ $user->email }}" readonly>
                    </div>
                    <div class="form-group">
                        <label>Số điện thoại</label>
                        <input type="text" name="phone" class="form-control" value="{{ $user->phone }}" required>
                    </div>
                    <div class="form-group">
                        <label>Địa chỉ</label>
                        <input type="text" name="address" class="form-control" value="{{ $user->address }}" required>
                    </div>
                    <div class="form-group">
                        <label>Đổi mật khẩu (Để trống nếu không đổi)</label>
                        <input type="password" name="password" class="form-control">
                    </div>
                    <button type="submit" class="beta-btn primary">Cập nhật <i class="fa fa-chevron-right"></i></button>
                </form>
            </div>
            
            <div class="col-sm-8">
                <h4>Đơn hàng của bạn</h4>
                <div class="space20">&nbsp;</div>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Mã ĐH</th>
                            <th>Ngày đặt</th>
                            <th>Tổng tiền</th>
                            <th>Thanh toán</th>
                            <th>Trạng thái</th>
                            <th>Chi tiết</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($bills as $bill)
                        <tr>
                            <td>#{{ $bill->id }}</td>
                            <td>{{ $bill->date_order }}</td>
                            <td>{{ number_format($bill->total) }} đ</td>
                            <td>{{ $bill->payment }}</td>
                            <td><span class="label label-info">{{ $bill->status ?? 'mới' }}</span></td>
                            <td>
                                <ul>
                                    @foreach($bill->bill_detail as $detail)
                                    <li>SP_ID: {{ $detail->id_product }} (x{{ $detail->quantity }})</li>
                                    @endforeach
                                </ul>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div> <!-- #content -->
</div> <!-- .container -->
@endsection
