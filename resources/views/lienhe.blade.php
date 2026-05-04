@extends('layouts.master')
@section('title', 'Liên hệ')

@section('content')
<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">Liên hệ</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb font-large">
                <a href="{{ route('banhang.index') }}">Trang chủ</a> / <span>Liên hệ</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<div class="container">
    <div id="content" class="space-top-none">
        <div class="space50">&nbsp;</div>
        <div class="row">
            <div class="col-sm-8">
                <h2>Form liên hệ</h2>
                <div class="space20">&nbsp;</div>
                <p>Vui lòng điền thông tin để chúng tôi có thể hỗ trợ bạn tốt nhất.</p>
                <div class="space20">&nbsp;</div>
                @if(session('thongbao'))
                    <div class="alert alert-success">{{ session('thongbao') }}</div>
                @endif
                <form action="{{ route('banhang.postcontact') }}" method="post" class="contact-form">
                    @csrf
                    <div class="form-block">
                        <input name="name" type="text" placeholder="Họ và tên (bắt buộc)" required>
                    </div>
                    <div class="form-block">
                        <input name="email" type="email" placeholder="Email (bắt buộc)" required>
                    </div>
                    <div class="form-block">
                        <textarea name="message" placeholder="Nội dung liên hệ (bắt buộc)" required></textarea>
                    </div>
                    <div class="form-block">
                        <button type="submit" class="beta-btn primary">Gửi thông báo <i class="fa fa-chevron-right"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div> <!-- #content -->
</div> <!-- .container -->
@endsection
