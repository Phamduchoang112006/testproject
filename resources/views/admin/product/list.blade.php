@extends('admin.master')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Sản phẩm
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
                        <th>Tên</th>
                        <th>Loại</th>
                        <th>Giá</th>
                        <th>Giá KM</th>
                        <th>Hình</th>
                        <th>Xóa</th>
                        <th>Sửa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($product as $p)
                    <tr class="odd gradeX" align="center">
                        <td>{{ $p->id }}</td>
                        <td>{{ $p->name }}</td>
                        <td>{{ $p->id_type }}</td>
                        <td>{{ number_format($p->unit_price) }}</td>
                        <td>{{ number_format($p->promotion_price) }}</td>
                        <td><img src="{{ asset('images/product/'.$p->image) }}" width="100px"></td>
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{{ route('admin.getProductDelete', $p->id) }}">Xóa</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{ route('admin.getProductEdit', $p->id) }}">Sửa</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
