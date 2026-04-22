@extends('admin.master')

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Category
                    <small>List</small>
                </h1>
            </div>
            @if(session('thongbao'))
                <div class="alert alert-success">
                    {{ session('thongbao') }}
                </div>
            @endif
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cates as $cate)
                    <tr class="odd gradeX" align="center">
                        <td>{{ $cate->id }}</td>
                        <td>{{ $cate->name }}</td>
                        <td>{{ $cate->description }}</td>
                        <td><img src="{{ asset('source/image/product/'.$cate->image) }}" width="100px" alt=""></td>
                        <td class="center"><i class="fa fa-trash-o fa-fw"></i><a href="{{ route('admin.getCateDelete', $cate->id) }}"> Delete</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{ route('admin.getCateEdit', $cate->id) }}">Edit</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection
