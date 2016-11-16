<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta http-equiv="content-type" content="text/html;charset=utf-8">
	<meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="screen-orientation" content="portrait">
    <meta name="x5-orientation" content="portrait">
	<meta name="apple-mobile-web-app-status-bar-style" content="black" />
	<meta name="format-detection" content="telephone=no"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<link rel="stylesheet" type="text/css" href="{{asset('/css/base.css')}}" />
	<link rel="stylesheet" type="text/css" href="{{asset('/iconfont/iconfont.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('/css/public.css')}}" />
	<link rel="stylesheet" type="text/css" href="{{asset('/css/logreg.css')}}" />
	<script type="text/javascript" src="{{asset('/js/jquery.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('/js/swiper-3.4.0.jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/js/jquery.pagination.js')}}"></script>
    <script type="text/javascript" src="{{asset('/js/public.js')}}"></script>
    <script type="text/javascript" src="{{asset('/org/layer/layer.js')}}"></script>
    @yield('head')
</head>
<body>
<!-- header/start -->
	<div class="header">
		<div class="headerTop">
			<div class="highest">
				<div class="fl connection">
					<i class="iconfont tel">&#xe651;</i><span class="conLink1">010-89256988</span><i class="iconfont">&#xe731;</i><span>010-89256988</span>
				</div>
				<div class="fr topnav">
					<a href="{{url('/help')}}">交易流程</a>|
					<a href="javascript:;"onclick="AddFavorite('我的网站',location.href)">收藏本站</a>|
					<a href="{{url('/help')}}">帮助中心</a>
				</div>
			</div>
		</div>
		<h1 class="logo"><a href="javascript:;"><img src="/img/logo.png" alt="长城鸽业"></a></h1>
		<div class="higher"><img src="/img/banner-2.png" /></div>
        <div class="nav">
            <div class="navbar">
                <ul class="navlist">
                    <li id="index"><a href="{{url('/')}}">首页</a></li>
                    <li id="auction"><a href="{{url('/auction')}}">在线拍卖</a></li>
                    <li id="sale"><a href="{{url('/sale')}}">定价展销</a></li>
                    <li id="show"><a href="{{url('/show')}}">长城铭鸽</a></li>
                    <li id="news"><a href="{{url('/news')}}">赛鸽资讯</a></li>
                    <li id="home"><a href="{{url('/home')}}">鸽友之家</a></li>
                </ul>
            </div>
            <div class="swiper-container" id="nav">
                <ul class="navlist swiper-wrapper">
                    <li class="swiper-slide" id="index1"><a href="{{url('/')}}">首页</a></li>
                    <li class="swiper-slide" id="auction1"><a href="{{url('/auction')}}">在线拍卖</a></li>
                    <li class="swiper-slide" id="sale1"><a href="{{url('/sale')}}">定价展销</a></li>
                    <li class="swiper-slide" id="show1"><a href="{{url('/show')}}">长城铭哥</a></li>
                    <li class="swiper-slide" id="news1"><a href="{{url('/news')}}">赛鸽资讯</a></li>
                    <li class="swiper-slide" id="home1"><a href="{{url('/home')}}">鸽友之家</a></li>
                </ul>
            </div>
            <div class="section user">
                @if(!Request::user())
                <div class="logReg">
                    <a href="javascript:;" id="login">登录</a>
                    <a href="javascript:;" id="register">注册</a>
                </div>
                @else
                <div class="hideUser"><a href="{{url('/ucenter/index')}}">个人中心</a><a href="{{url('/auth/logout')}}">退出</a></div>
                @endif
            </div>
        </div>
	</div>
<!-- header/end -->
   @yield('content')
    <div class="gray">
        <div class="section footer">
            <div class="fl gLogo"><img src="/img/g_logo.png" height="68" width="171" /></div>
            <div class="fl companyInfo">
                <span class="fleft"><i class="iconfont">&#xe6e1;</i><b>联系人：</b>邵先生</span>
                <span class="fright"><i class="iconfont">&#xe608;</i><b>Email：</b>greatwallccgy@126.com</span>
                <span class="fleft"><i class="iconfont">&#xe651;</i><b>电话：</b>010-89256988&nbsp;&nbsp;13611691900</span>
                <span class="fright"><i class="iconfont">&#xe6b8;</i><b>网址：</b>http://www.ccgy999.com</span>
                <span class="fleft"><i class="iconfont">&#xe731;</i><b>传真：</b>010-89256988</span>
                <span class="fright"><i class="iconfont">&#xe652;</i><b>地址：</b>北京市大兴区庞各庄镇常各庄村南1000米 邮政编码：100041</span>
            </div>
        </div>
        <div class="lowest">
            <p class="character">www.ccgy999.com<span>&nbsp;长城鸽业&nbsp;版权所有</span></p>
        </div>
    </div>

</body>
</html>
<script>
	//导航样式
    $(function(){
        var Url = window.location.pathname;
        var index = $('#index');
        var auction = $('#auction');
        var sale = $('#sale');
        var show = $('#show');
        var news = $('#news');
        var home = $('#home');
        var index1 = $('#index1');
        var auction1 = $('#auction1');
        var sale1 = $('#sale1');
        var show1 = $('#show1');
        var news1 = $('#news1');
        var home1 = $('#home1');
        if (Url.indexOf("auction") >= 0 && Url.indexOf("myauction") < 0) {
            auction.addClass("cur");
            auction1.addClass("cur");
        } else if (Url.indexOf("sale") >= 0 ) {
            sale.addClass("cur");
            sale1.addClass("cur");
        }else if (Url.indexOf("show") >= 0) {
            show.addClass("cur");
            show1.addClass("cur");
        } else if (Url.indexOf("news") >= 0) {
            news.addClass("cur");
            news1.addClass("cur");
        } else if (Url.indexOf("home") >= 0) {
            home.addClass("cur");
            home1.addClass("cur");
        } else if (Url.indexOf("help") >= 0) {
        } else if (Url.indexOf("ucenter") >= 0) {
        } else if (Url.indexOf("notice") >= 0) {
        } else {
            index.addClass("cur");
            index1.addClass("cur");
        }


        var curli = null;
        $('#nav li').each(function(index){
            if($(this).hasClass('cur')){
                curli = index;
            }
        })
        var win = $(window).width();
        var move = curli * 125;
        var minus = 750 - win;
        if(move > minus){
            move = minus;
        }
        $('#nav ul').css('transform', 'translate3d(-'+move+'px, 0px, 0px)');



        $("#login").click(function(){
            layer.open({
                type: 2,
                closeBtn: 1,
                title: null,
                area: ['300px','332px'],
                content: "{{url('/login')}}",
            });   
        });

        $("#register").click(function(){
            layer.open({
                type: 2,
                closeBtn: 1,
                title: null,
                area: ['300px','435px'],
                content: "{{url('/register')}}",
                
            }); 
        });
    }); 

</script>
@yield('js')