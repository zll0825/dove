@extends('layouts.home')

@section('head')
<link rel="stylesheet" type="text/css" href="{{asset('/css/system.css')}}" />
<title>我的消息</title>
@endsection

@section('content')
	<!-- header/end -->
	<div class="content section clearfix">
		<!-- public usercenter ／ start -->
		<div class="fl userCenter">
			<h2 class="userTitle">个人中心</h2>
			<ul class="userList">
				<li><a href="{{url('/ucenter/index')}}"><i class="iconfont">&#xe6e1;</i>用户信息</a></li>
                <li><a href="{{url('/ucenter/myauction')}}"><i class="iconfont">&#xe606;</i>我的竞拍</a></li>
                <li><a href="{{url('/ucenter/myorder')}}"><i class="iconfont">&#xe64e;</i>我的购买</a></li>
                <li class="current"><a href="{{url('/ucenter/mymsg')}}"><i class="iconfont">&#xe619;</i>消息中心</a></li>
			</ul>
		</div>
		<!-- public usercenter ／ end -->
		<div class="fr system">
			<ul>
				<li class="firstTitle">
					<span class="w30">信息日期</span><span class="w70">内容详情</span>
				</li>
				<li>
					<span class="w30">2016-10-31 10:00:00</span>
					<a href="javascript:;" class="w70">在实际成本好几个大扫除富商大贾房产税的后果出事故调查</a>
				</li>
				<li>
					<span class="w30">2016-10-31 10:00:00</span>
					<a href="javascript:;" class="w70">在实际成本好几个大扫除富商大贾房产税的后果出事故调查</a>
				</li>
				<li>
					<span class="w30">2016-10-31 10:00:00</span>
					<a href="javascript:;" class="w70">在实际成本好几个大扫除富商大贾房产税的后果出事故调查</a>
				</li>
				<li>
					<span class="w30">2016-10-31 10:00:00</span>
					<a href="javascript:;" class="w70">在实际成本好几个大扫除富商大贾房产税的后果出事故调查</a>
				</li>
				<li>
					<span class="w30">2016-10-31 10:00:00</span>
					<a href="javascript:;" class="w70">在实际成本好几个大扫除富商大贾房产税的后果出事故调查</a>
				</li>
			</ul>
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
    })
</script>
@section('js')
