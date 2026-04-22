@extends('layouts.master')
@section('title', 'Tìm kiếm')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="beta-products-list">
            <h4>Tìm kiếm</h4>
            <div class="beta-products-details">
                <p class="pull-left">Tìm thấy {{count($product)}} sản phẩm</p>
                <div class="clearfix"></div>
            </div>

            <div class="row">
                @php $stt=0; @endphp
                @foreach($product as $p)
                @php $stt++; @endphp
                <div class="col-sm-3">
                    <div class="single-item">
                        @if($p->promotion_price!=0)
                        <div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
                        @endif
                        <div class="single-item-header">
                            <a href="{{ route('banhang.chitiet',$p->id) }}"><img src="{{ asset('images/product/'.$p->image) }}" alt="" height="250px"></a>
                        </div>
                        <div class="single-item-body">
                            <p class="single-item-title">{{$p->name}}</p>
                            <p class="single-item-price" style="font-size: 18px; font-weight: bold;">
                                @if($p->promotion_price==0)
                                <span class="flash-sale">{{ number_format($p->unit_price) }} đồng</span>
                                @else
                                <span class="flash-del">{{ number_format($p->unit_price) }} đồng</span>
                                <span class="flash-sale">{{ number_format($p->promotion_price) }} đồng</span>
                                @endif
                            </p>
                        </div>
                        <div class="single-item-caption">
                            <a class="add-to-cart pull-left" href="{{ route('banhang.addtocart',$p->id) }}"><i class="fa fa-shopping-cart"></i></a>
                            <a class="beta-btn primary" href="{{ route('banhang.chitiet',$p->id) }}">Chi tiết <i class="fa fa-chevron-right"></i></a>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                @if($stt % 4==0)
                <div class="space40">&nbsp;</div>
                @endif
                @endforeach
            </div>
        </div> <!-- .beta-products-list -->
    </div>
</div>
@endsection
