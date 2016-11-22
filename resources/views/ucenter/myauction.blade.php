@extends('layouts.home')

@section('head')
<link rel="stylesheet" type="text/css" href="{{asset('/css/system.css')}}" />
<title>我的竞拍</title>
@endsection

@section('content')
	<div class="content section clearfix">
		<!-- public usercenter ／ start -->
		<div class="fl userCenter">
			<h2 class="userTitle">个人中心</h2>
			<ul class="userList">
				<li><a href="{{url('/ucenter/index')}}"><i class="iconfont">&#xe6e1;</i>用户信息</a></li>
                <li class="current"><a href="{{url('/ucenter/myauction')}}"><i class="iconfont">&#xe606;</i>我的竞拍</a></li>
                <li><a href="{{url('/ucenter/myorder')}}"><i class="iconfont">&#xe64e;</i>我的购买</a></li>
                <li><a href="{{url('/ucenter/mymsg')}}"><i class="iconfont">&#xe619;</i>消息中心</a></li>
			</ul>
		</div>
		<!-- public usercenter ／ end -->
		<div class="fr mybid">
			<div class="swiper-container" id="table">
                <div class="swiper-wrapper table">
                    <div class="swiper-slide">
                        <div class="bidTitle">我的竞拍</div>
                        <div class="bidList">
                            <ul class="bidUl">
                                @foreach($auctions as $auction)
                                <li>
                                    <a href="javascript:;" class="bidImg"><img src="/img/zhanwei.png" /></a>
                                    <a href="javascript:;" class="commer">
                                    	<span class="w2">商品名称：<strong>{{$auction->DoveName}}</strong></span>
                                        <span class="w3">编号：<strong>{{$auction->DoveNumber}}</strong></span>
                                        <span class="w4">起拍价：<strong>{{$auction->StartPrice/100}}</strong>元</span>
                                    </a>
                                    <a href="javascript:;" class="prices">
                                    	<span class="w5">当前价：<strong class="f18">{{$auction->EndPrice/100}}</strong>元</span>
                                        <span class="w6">我的出价：<strong class="red f18">{{$auction->Offer/100}}</strong>元</span>
                                        <span class="w7">结拍日期：{{$auction->EndTime}}</span>
                                    </a>
                                    <div class="state">
                                        @if($auction->BStatus == 1)
                                        <span class="bidState">状态：领先</span>
                                        @else
                                    	<a href="{{url('/auction/'.$auction->AuctionID)}}" class="goon">继续出价</a>
                                    	<span class="bidState">状态：出局</span>
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
        var bidSwiper = new Swiper('#table',{
            slidesPerView: 'auto',
            freeMode: true
        })
    })
</script>
@endsection('js')
