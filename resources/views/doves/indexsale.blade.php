@extends('layouts.home')

@section('head')
<link rel="stylesheet" type="text/css" href="{{asset('/css/price.css')}}" />
<title>定价鸽子</title>
@endsection

@section('content')
    <div class="gray mtBlank ptb25">
        <div class="section selling clearfix">
            <div class="fl sellList">
                <h5 class="benefit">优惠鸽最新推荐</h5>
                <ul class="bedoveList">
                    @foreach($doves as $dove)
                    <li>
                        <a href="{{url('/sale/'.$dove->DoveID)}}" class="pink"><img src="{{$dove->DovePicture}}" /></a>
                        <a href="{{url('/sale/'.$dove->DoveID)}}" class="name mt8">{{$dove->DoveName}}</a>
                        <span class="origin">北京李记种赛鸽中心</span>
                        <span class="hot red"><i class="iconfont">&#xe63b;</i>人气：{{$dove->ViewCount}}</span>
                        <span class="primecost">原价：<s>10000</s>元</span>
                        <span class="price">优惠价：<em class="red">{{$dove->DovePrice/100}}</em>元</span>
                        <a href="{{url('/sale/'.$dove->DoveID)}}" class="buy mt6">在线购买</a>
                    </li>
                    @endforeach
                </ul>
                <div class="pages">
                    {!!$doves->render()!!}
                </div>
            </div>
            <div class="fr pledge sellRight">
                <div class="pleTop">
                    在线买鸽安全保证<div>Buy Your Pigeon<span>Security Assurance</span></div>         
                </div>
                <div class="pleMiddle">
                <a href="{{url('/help')}}">新手买鸽</a><a href="{{url('/help')}}">如何付款</a><a href="{{url('/help')}}">买鸽保险</a><a href="{{url('/help')}}">购买帮忙</a>
                </div>
                <div class="pleBottom">
                    <ul>
                        @foreach($latestsales as $latestsale)
                            <li><a href="{{url('/sale/'.$latestsale->DoveID)}}"><span class="dove">{{$latestsale->DoveName}}</span><span class="bid">已被（{{substr_replace('*',$latestsales->username,1)}}）得标</span></a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- onsale / end -->
@endsection('content')

@section('js')
<script type="text/javascript">
    $(function(){
        $("#Pagination").pagination("15");

        var lunboSwiper = new Swiper('.aside .swiper-container',{
            pagination: '.swiper-pagination',
            loop:true,
            autoplay : 2000,
            grabCursor: true,
            paginationClickable: true
        })
        var navSwiper = new Swiper('.nav .swiper-container',{
            slidesPerView: 'auto',
            freeMode: true
        })

        
    })
</script>
@endsection('js')
