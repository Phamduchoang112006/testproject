@extends('admin.master')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Đơn hàng
                    <small>Danh sách</small>
                </h1>
            </div>
            @if(session('thongbao'))
                <div class="alert alert-success">{{ session('thongbao') }}</div>
            @endif

            <ul class="nav nav-tabs" style="margin-bottom: 20px;">
                <li class="{{ $status == 'mới' ? 'active' : '' }}"><a href="{{ route('admin.getOrderList', ['status' => 'mới']) }}">Mới</a></li>
                <li class="{{ $status == 'đang giao' ? 'active' : '' }}"><a href="{{ route('admin.getOrderList', ['status' => 'đang giao']) }}">Đang giao</a></li>
                <li class="{{ $status == 'đã giao' ? 'active' : '' }}"><a href="{{ route('admin.getOrderList', ['status' => 'đã giao']) }}">Đã giao</a></li>
                <li class="{{ $status == 'đã hủy' ? 'active' : '' }}"><a href="{{ route('admin.getOrderList', ['status' => 'đã hủy']) }}">Đã hủy</a></li>
            </ul>

            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Khách hàng</th>
                        <th>Ngày đặt</th>
                        <th>Tổng tiền</th>
                        <th>Thanh toán</th>
                        <th>Trạng thái</th>
                        <th>Chi tiết</th>
                        <th>Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($order as $o)
                    <tr class="odd gradeX" align="center">
                        <td>{{ $o->id }}</td>
                        <td>{{ $o->customer->name ?? 'N/A' }}</td>
                        <td>{{ $o->date_order }}</td>
                        <td>{{ number_format($o->total) }}</td>
                        <td>{{ $o->payment }}</td>
                        <td>
                            <form action="{{ route('admin.postUpdateOrderStatus', $o->id) }}" method="POST" style="display:flex; gap: 5px;">
                                @csrf
                                <select name="status" class="form-control" style="width: auto;">
                                    <option value="mới" {{ $o->status == 'mới' ? 'selected' : '' }}>Mới</option>
                                    <option value="đang giao" {{ $o->status == 'đang giao' ? 'selected' : '' }}>Đang giao</option>
                                    <option value="đã giao" {{ $o->status == 'đã giao' ? 'selected' : '' }}>Đã giao</option>
                                    <option value="đã hủy" {{ $o->status == 'đã hủy' ? 'selected' : '' }}>Đã hủy</option>
                                </select>
                                <button type="submit" class="btn btn-primary btn-sm">Cập nhật</button>
                            </form>
                        </td>
                        <td class="center"><i class="fa fa-info-circle fa-fw"></i> <a href="{{ route('admin.getOrderDetail', $o->id) }}">Xem</a></td>
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{{ route('admin.getOrderDelete', $o->id) }}">Xóa</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
