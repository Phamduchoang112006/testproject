@extends('layouts.master')
@section('title', 'Trang chủ')
@section('content_header')
<div class="fullwidthbanner-container">
    <div class="fullwidthbanner">
        <div class="bannercontainer">
            <div class="banner">
                <ul>
                    @foreach($slides as $sl)
                    <li data-transition="boxfade" data-slotamount="20" class="active-revslide" style="width: 100%; height: 100%; overflow: hidden; z-index: 18; visibility: hidden; opacity: 0;">
                        <div class="slotholder" style="width:100%;height:100%;" data-duration="undefined" data-zoomstart="undefined" data-zoomend="undefined" data-rotationstart="undefined" data-rotationend="undefined" data-ease="undefined" data-bgpositionend="undefined" data-bgposition="undefined" data-kenburns="undefined" data-easeme="undefined" data-bgfit="undefined" data-bgfitend="undefined" data-owidth="undefined" data-oheight="undefined">
                            <div class="tp-bgimg defaultimg" data-lazyload="undefined" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat" data-lazydone="undefined" src="{{ asset('images/slide/'.$sl->image) }}" data-src="{{ asset('images/slide/'.$sl->image) }}" style="background-color: rgba(0, 0, 0, 0); background-repeat: no-repeat; background-image: url('{{ asset('images/slide/'.$sl->image) }}'); background-size: cover; background-position: center center; width: 100%; height: 100%; opacity: 1; visibility: inherit;"></div>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="tp-bannertimer"></div>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-sm-12">
        <!-- New Products -->
        <div class="beta-products-list">
            <h4>Sản phẩm mới</h4>
            <div class="beta-products-details">
                <p class="pull-left">{{count($new_products)}} sản phẩm được tìm thấy</p>
                <div class="clearfix"></div>
            </div>

            <div class="row">
                @php $stt=0; @endphp
                @foreach($new_products as $new_product)
                @php $stt++; @endphp
                <div class="col-sm-3">
                    <div class="single-item">
                        @if($new_product->promotion_price!=0)
                        <div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
                        @endif
                        <div class="single-item-header">
                            <a href="{{ route('banhang.chitiet',$new_product->id) }}"><img src="{{ asset('images/product/'.$new_product->image) }}" alt="" height="250px"></a>
                        </div>
                        <div class="single-item-body">
                            <p class="single-item-title">{{$new_product->name}}</p>
                            <p class="single-item-price" style="font-size: 18px; font-weight: bold;">
                                @if($new_product->promotion_price==0)
                                <span class="flash-sale">{{ number_format($new_product->unit_price) }} đồng</span>
                                @else
                                <span class="flash-del">{{ number_format($new_product->unit_price) }} đồng</span>
                                <span class="flash-sale">{{ number_format($new_product->promotion_price) }} đồng</span>
                                @endif
                            </p>
                        </div>
                        <div class="single-item-caption">
                            <a class="add-to-cart pull-left" href="{{ route('banhang.addtocart',$new_product->id) }}"><i class="fa fa-shopping-cart"></i></a>
                            <a class="beta-btn primary" href="{{ route('banhang.chitiet',$new_product->id) }}">Chi tiết <i class="fa fa-chevron-right"></i></a>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                @if($stt % 4==0)
                <div class="space40">&nbsp;</div>
                @endif
                @endforeach
            </div>
            <div class="row">{{$new_products->links()}}</div>
        </div> <!-- .beta-products-list -->

        <div class="space50">&nbsp;</div>

        <!-- Top Products -->
        <div class="beta-products-list">
            <h4>Sản phẩm tiêu biểu</h4>
            <div class="beta-products-details">
                <p class="pull-left">{{count($top_products)}} sản phẩm được tìm thấy</p>
                <div class="clearfix"></div>
            </div>
            <div class="row">
                @php $stt=0; @endphp
                @foreach($top_products as $top)
                @php $stt++; @endphp
                <div class="col-sm-3">
                    <div class="single-item">
                        @if($top->promotion_price!=0)
                        <div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
                        @endif
                        <div class="single-item-header">
                            <a href="{{ route('banhang.chitiet',$top->id) }}"><img src="{{ asset('images/product/'.$top->image) }}" alt="" height="250px"></a>
                        </div>
                        <div class="single-item-body">
                            <p class="single-item-title">{{$top->name}}</p>
                            <p class="single-item-price" style="font-size: 18px; font-weight: bold;">
                                @if($top->promotion_price==0)
                                <span class="flash-sale">{{ number_format($top->unit_price) }} đồng</span>
                                @else
                                <span class="flash-del">{{ number_format($top->unit_price) }} đồng</span>
                                <span class="flash-sale">{{ number_format($top->promotion_price) }} đồng</span>
                                @endif
                            </p>
                        </div>
                        <div class="single-item-caption">
                            <a class="add-to-cart pull-left" href="{{ route('banhang.addtocart',$top->id) }}"><i class="fa fa-shopping-cart"></i></a>
                            <a class="beta-btn primary" href="{{ route('banhang.chitiet',$top->id) }}">Chi tiết <i class="fa fa-chevron-right"></i></a>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                @if($stt % 4==0)
                <div class="space40">&nbsp;</div>
                @endif
                @endforeach
            </div>
            <div class="row">{{$top_products->links()}}</div>
        </div> <!-- .beta-products-list -->

        <div class="space50">&nbsp;</div>

        <!-- Promo Products -->
        <div class="beta-products-list">
            <h4>Sản phẩm khuyến mãi</h4>
            <div class="beta-products-details">
                <p class="pull-left">{{count($promotion_products)}} sản phẩm được tìm thấy</p>
                <div class="clearfix"></div>
            </div>
            <div class="row">
                @php $stt=0; @endphp
                @foreach($promotion_products as $pro)
                @php $stt++; @endphp
                <div class="col-sm-3">
                    <div class="single-item">
                        <div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
                        <div class="single-item-header">
                            <a href="{{ route('banhang.chitiet',$pro->id) }}"><img src="{{ asset('images/product/'.$pro->image) }}" alt="" height="250px"></a>
                        </div>
                        <div class="single-item-body">
                            <p class="single-item-title">{{$pro->name}}</p>
                            <p class="single-item-price" style="font-size: 18px; font-weight: bold;">
                                <span class="flash-del">{{ number_format($pro->unit_price) }} đồng</span>
                                <span class="flash-sale">{{ number_format($pro->promotion_price) }} đồng</span>
                            </p>
                        </div>
                        <div class="single-item-caption">
                            <a class="add-to-cart pull-left" href="{{ route('banhang.addtocart',$pro->id) }}"><i class="fa fa-shopping-cart"></i></a>
                            <a class="beta-btn primary" href="{{ route('banhang.chitiet',$pro->id) }}">Chi tiết <i class="fa fa-chevron-right"></i></a>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                @if($stt % 4==0)
                <div class="space40">&nbsp;</div>
                @endif
                @endforeach
            </div>
            <div class="row">{{$promotion_products->links()}}</div>
        </div> <!-- .beta-products-list -->

        <div class="space50">&nbsp;</div>

        <!-- All Products -->
        <div class="beta-products-list">
            <h4>Tất cả sản phẩm</h4>
            <div class="beta-products-details">
                <p class="pull-left">{{count($all_products)}} sản phẩm được tìm thấy</p>
                <div class="clearfix"></div>
            </div>
            <div class="row">
                @php $stt=0; @endphp
                @foreach($all_products as $all)
                @php $stt++; @endphp
                <div class="col-sm-3">
                    <div class="single-item">
                        @if($all->promotion_price!=0)
                        <div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
                        @endif
                        <div class="single-item-header">
                            <a href="{{ route('banhang.chitiet',$all->id) }}"><img src="{{ asset('images/product/'.$all->image) }}" alt="" height="250px"></a>
                        </div>
                        <div class="single-item-body">
                            <p class="single-item-title">{{$all->name}}</p>
                            <p class="single-item-price" style="font-size: 18px; font-weight: bold;">
                                @if($all->promotion_price==0)
                                <span class="flash-sale">{{ number_format($all->unit_price) }} đồng</span>
                                @else
                                <span class="flash-del">{{ number_format($all->unit_price) }} đồng</span>
                                <span class="flash-sale">{{ number_format($all->promotion_price) }} đồng</span>
                                @endif
                            </p>
                        </div>
                        <div class="single-item-caption">
                            <a class="add-to-cart pull-left" href="{{ route('banhang.addtocart',$all->id) }}"><i class="fa fa-shopping-cart"></i></a>
                            <a class="beta-btn primary" href="{{ route('banhang.chitiet',$all->id) }}">Chi tiết <i class="fa fa-chevron-right"></i></a>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                @if($stt % 4==0)
                <div class="space40">&nbsp;</div>
                @endif
                @endforeach
            </div>
            <div class="row">{{$all_products->links()}}</div>
        </div>
    </div>
</div>
@endsection
