@extends('layouts.home')

@section('head')
<link rel="stylesheet" type="text/css" href="{{asset('/css/system.css')}}" />
<title>我的订单</title>
@endsection

@section('content')
	<div class="content section clearfix">
		<!-- public usercenter ／ start -->
		<div class="fl userCenter">
			<h2 class="userTitle">个人中心</h2>
			<ul class="userList">
				<li><a href="{{url('/ucenter/index')}}"><i class="iconfont">&#xe6e1;</i>用户信息</a></li>
                <li><a href="{{url('/ucenter/myauction')}}"><i class="iconfont">&#xe606;</i>我的竞拍</a></li>
                <li class="current"><a href="{{url('/ucenter/myorder')}}"><i class="iconfont">&#xe64e;</i>我的购买</a></li>
                <li><a href="{{url('/ucenter/mymsg')}}"><i class="iconfont">&#xe619;</i>消息中心</a></li>
			</ul>
		</div>
		<!-- public usercenter ／ end -->
		<div class="fr mybid">
			<div class="swiper-container mb" id="table1">
                <div class="swiper-wrapper table">
                    <div class="swiper-slide">
                        <div class="buyTitle">购买记录</div>
                        <div class="bidList">
                            <ul class="bidUl">
                                @foreach($orders as $order)
                                <li>
                                    <a href="javascript:;" class="bidImg"><img src="/img/zhanwei.png" /></a>
                                    <a href="javascript:;" class="information fl">
                                    	<span class="s1"><strong>{{$order->DoveName}}</strong></span>
                                    	<span class="s2"><em>{{$order->DoveIndex}}</em></span>
                                    	<span class="red s3"><i class="iconfont">&#xe63b;</i>人气：{{$order->ViewCount}}</span>
                                    	<div class="cost fl">
                                    		<span class="s4">原价：<s>{{$order->OriginPrice}}</s>元</span>
                                    		<strong>优惠价：<span class="red">{{$order->DovePrice}}</span>元</strong>
                                    	</div>
                                    </a>
                                    <div class="payfor fl">
                                        @if($order->PayFlag == 0)
                                            <a href="javascript:;" class="nopay">立即购买</a>
                                            <span class="payInfo">已加入购物车</span>
                                        @elseif($order->PayFlag == 1)
                                            <a href="javascript:;" class="nopay upCer">上传付款凭证</a>
                                        <span class="payInfo">已购买，未上传付款凭证</span>
                                        @elseif($order->PayFlag == 2)
                                            <span class="paying">确认付款中…</span>
                                        @elseif($order->PayFlag == 3)
                                            <a href="javascript:;" class="nopay payed">已付款，等待发货</a>
                                        @elseif($order->PayFlag == 4)
                                            <a href="javascript:;" class="nopay upCer">上传付款凭证</a>
                                            <span class="payInfo">审核不通过，请重新上传付款凭证</span>
                                        @elseif($order->PayFlag == 5)
                                            <a href="javascript:;" class="nopay sure">确认收货</a>
                                            <span class="payInfo had">已发货</span>
                                        @elseif($order->PayFlag == 6)
                                            <a href="javascript:;" class="nopay payed">已收货</a>
                                        @endif
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
		</div>
	</div>
@endsection('content')

@section('js')
<script type="text/javascript">
	$(function(){
        $("#Pagination").pagination("15");
        $('#nav li').click(function(event) {
            var ind = $(this).index();
            var win = $(window).width();
            var move = ind * 125;
            var minus = 750 - win;
            if(move > minus){
                move = minus;
            }
            $(this).addClass('cur').siblings().removeClass('cur');
            $('#nav ul').css('transform', 'translate3d(-'+move+'px, 0px, 0px)');
        });
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
        var buySwiper1 = new Swiper('#table1',{
            slidesPerView: 'auto',
            freeMode: true
        })
        var buySwiper2 = new Swiper('#table2',{
            slidesPerView: 'auto',
            freeMode: true
        })
        var buySwiper3 = new Swiper('#table3',{
            slidesPerView: 'auto',
            freeMode: true
        })
        var buySwiper4 = new Swiper('#table4',{
            slidesPerView: 'auto',
            freeMode: true
        })
    })


</script>
@endsection('js')