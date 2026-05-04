@extends('admin.master')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Liên hệ
                    <small>Danh sách</small>
                </h1>
            </div>
            @if(session('thongbao'))
                <div class="alert alert-success">{{ session('thongbao') }}</div>
            @endif
            @if(session('loi'))
                <div class="alert alert-danger">{{ session('loi') }}</div>
            @endif
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Tên</th>
                        <th>Email</th>
                        <th>Nội dung</th>
                        <th>Trạng thái</th>
                        <th>Phản hồi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($contacts as $c)
                    <tr class="odd gradeX" align="center">
                        <td>{{ $c->id }}</td>
                        <td>{{ $c->name }}</td>
                        <td>{{ $c->email }}</td>
                        <td>{{ $c->message }}</td>
                        <td>{{ $c->status }}</td>
                        <td>
                            @if($c->status == 'chưa liên hệ')
                            <form action="{{ route('admin.postContactReply', $c->id) }}" method="POST" style="display:flex; flex-direction: column; gap: 5px;">
                                @csrf
                                <textarea name="reply_message" class="form-control" placeholder="Nội dung phản hồi" required></textarea>
                                <button type="submit" class="btn btn-primary btn-sm">Gửi mail</button>
                            </form>
                            @else
                            <span class="text-success"><i class="fa fa-check"></i> Đã phản hồi</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
