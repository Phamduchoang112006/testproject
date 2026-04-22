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
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Khách hàng</th>
                        <th>Ngày đặt</th>
                        <th>Tổng tiền</th>
                        <th>Thanh toán</th>
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
