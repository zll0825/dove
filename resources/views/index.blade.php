@extends('layouts.home')

@section('head')
<link rel="stylesheet" type="text/css" href="{{asset('/css/index.css')}}" />
<title>鸽子首页</title>
@endsection('head')

@section('content')
<!-- first screen / start -->
	<div class="main section clearfix">
		<div class="fl aside">
			<div class="asideTop">
				<div class="notice fl">
					<h2 class="noteTitle"><i class="iconfont">&#xe617;</i>公告<span class="calendar">2016年10月20日</span><span>星期四</span></h2>
					<div class="notelist">
						<ul>
							<li class="major"><a href="javascript:;">航空运费变更通知</a></li>
							<li class="major"><a href="javascript:;">航空运费变更通知</a></li>
							<li><a href="javascript:;">第二百五十八期发货时间定为春</a></li>
							<li><a href="javascript:;">第二百五十八期发货时间定为春</a></li>
							<li><a href="javascript:;">第二百五十八期发货时间定为春</a></li>
                            <li><a href="javascript:;">第二百五十八期发货时间定为春</a></li>
						</ul>
						<!-- <a href="javascript:;" class="more red">更多>></a> -->
					</div>
				</div>
                <div class="fl banner">
                    <div class="swiper-container lunbo" id="proSwiper">
                        <ul class="swiper-wrapper lunboCon">
                            <li class="swiper-slide conImg"><a href="javascript:;"><img src="/img/banner1.png" /></a></li>
                            <li class="swiper-slide conImg"><a href="javascript:;"><img src="/img/banner2.png" /></a></li>
                            <li class="swiper-slide conImg"><a href="javascript:;"><img src="/img/banner3.png" /></a></li>
                        </ul>
                        <div class="yuandian swiper-pagination"></div>
                    </div>
                </div>
			</div>
			
			<!-- under auction / start  -->
			<div class="auction">
				<div class="isTitle"></div>
				<h3 class="under">正在拍卖<span>Is The Auction</span></h3>
                <div class="auctionCon">
                    <h4 class="auctionH4"><a href="javascript:;">点击进入拍卖列表</a></h4>
                    <div class="auctionList">
                        <ul>
                            <li>
                                <a href="javascript:;" class="aucLink">
                                    <span class="auctionImg"><img src="/img/zhanwei.png" /></span>
                                    <div class="auctionRight fl clearfix">
                                        <span class="periods">中国长城鸽业—网络拍卖2016秋季网拍26期&nbsp;&nbsp;总第109期</span>
                                        <div class="sale">10月27日结拍<span>出价：<strong class="red">25</strong> 次</span></div>
                                        <span class="remaining">剩&nbsp;<strong class="red">5</strong>&nbsp;天</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:;" class="aucLink">
                                    <span class="auctionImg"><img src="/img/zhanwei.png" /></span>
                                    <div class="auctionRight fl clearfix">
                                        <span class="periods">中国长城鸽业—网络拍卖2016秋季网拍26期&nbsp;&nbsp;总第109期</span>
                                        <div class="sale">10月27日结拍<span>出价：<strong class="orange">25</strong> 次</span></div>
                                        <span class="remaining">剩&nbsp;<strong class="orange">5</strong>&nbsp;天</span>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
			</div>
			<!-- under auction / end -->
		</div>
		<div class="fr pledge">
			<div class="pleTop">
                在线买鸽安全保证<div>Buy Your Pigeon<span>Security Assurance</span></div>         
            </div>
            <div class="pleMiddle">
                <a href="{{url('/help')}}">新手买鸽</a><a href="{{url('/help')}}">如何付款</a><a href="{{url('/help')}}">买鸽保险</a><a href="{{url('/help')}}">购买帮忙</a>
            </div>
            <div class="pleBottom">
                <ul>
                    <li><a href="javascript:;"><span class="dove">【109期】年轻克拉克近血</span><span class="bid">已被（郑**）得标</span></a></li>
                    <li><a href="javascript:;"><span class="dove">【109期】年轻克拉克近血</span><span class="bid">已被（郑**）得标</span></a></li>
                    <li><a href="javascript:;"><span class="dove">【109期】年轻克拉克近血</span><span class="bid">已被（郑**）得标</span></a></li>
                    <li><a href="javascript:;"><span class="dove">【109期】年轻克拉克近血</span><span class="bid">已被（郑**）得标</span></a></li>
                    <li><a href="javascript:;"><span class="dove">【109期】年轻克拉克近血</span><span class="bid">已被（郑**）得标</span></a></li>
                    <li><a href="javascript:;"><span class="dove">【109期】年轻克拉克近血</span><span class="bid">已被（郑**）得标</span></a></li>
                </ul>
            </div>
		</div>
	</div>
    <!-- first screen / end -->
    <!-- onsale / start -->
    <div class="section onsale">
        <div class="line"></div>
        <h4>正在出售<span>Is For Sale</span></h4>
    </div>
    <div class="gray ptb25">
        <div class="section selling clearfix">
            <div class="fl sellList">
                <h5 class="benefit">优惠鸽最新推荐<a href="javascript:;" class="more">更多>></a></h5>
                <ul class="bedoveList">
                    <li>
                        <a href="javascript:;" class="pink"><img src="/img/zhanwei.png" /></a>
                        <a href="javascript:;" class="name mt8">亚军枭雄</a>
                        <span class="origin">北京李记种赛鸽中心</span>
                        <span class="hot red"><i class="iconfont">&#xe63b;</i>人气：365</span>
                        <span class="primecost">原价：<s>10000</s>元</span>
                        <span class="price">优惠价：<em class="red">8000</em>元</span>
                        <a href="javascript:;" class="buy mt6">在线购买</a>
                    </li>
                    <li>
                        <a href="javascript:;" class="pink"><img src="/img/zhanwei.png" /></a>
                        <a href="javascript:;" class="name mt8">亚军枭雄</a>
                        <span class="origin">北京李记种赛鸽中心</span>
                        <span class="hot red"><i class="iconfont">&#xe63b;</i>人气：365</span>
                        <span class="primecost">原价：<s>10000</s>元</span>
                        <span class="price">优惠价：<em class="red">8000</em>元</span>
                        <a href="javascript:;" class="buy mt6">在线购买</a>
                    </li>
                    <li>
                        <a href="javascript:;" class="pink"><img src="/img/zhanwei.png" /></a>
                        <a href="javascript:;" class="name mt8">亚军枭雄</a>
                        <span class="origin">北京李记种赛鸽中心</span>
                        <span class="hot red"><i class="iconfont">&#xe63b;</i>人气：365</span>
                        <span class="primecost">原价：<s>10000</s>元</span>
                        <span class="price">优惠价：<em class="red">8000</em>元</span>
                        <a href="javascript:;" class="buy mt6">在线购买</a>
                    </li>
                    <li>
                        <a href="javascript:;" class="pink"><img src="/img/zhanwei.png" /></a>
                        <a href="javascript:;" class="name mt8">亚军枭雄</a>
                        <span class="origin">北京李记种赛鸽中心</span>
                        <span class="hot red"><i class="iconfont">&#xe63b;</i>人气：365</span>
                        <span class="primecost">原价：<s>10000</s>元</span>
                        <span class="price">优惠价：<em class="red">8000</em>元</span>
                        <a href="javascript:;" class="buy mt6">在线购买</a>
                    </li>
                    <li>
                        <a href="javascript:;" class="pink"><img src="/img/zhanwei.png" /></a>
                        <a href="javascript:;" class="name mt8">亚军枭雄</a>
                        <span class="origin">北京李记种赛鸽中心</span>
                        <span class="hot red"><i class="iconfont">&#xe63b;</i>人气：365</span>
                        <span class="primecost">原价：<s>10000</s>元</span>
                        <span class="price">优惠价：<em class="red">8000</em>元</span>
                        <a href="javascript:;" class="buy mt6">在线购买</a>
                    </li>
                    <li>
                        <a href="javascript:;" class="pink"><img src="/img/zhanwei.png" /></a>
                        <a href="javascript:;" class="name mt8">亚军枭雄</a>
                        <span class="origin">北京李记种赛鸽中心</span>
                        <span class="hot red"><i class="iconfont">&#xe63b;</i>人气：365</span>
                        <span class="primecost">原价：<s>10000</s>元</span>
                        <span class="price">优惠价：<em class="red">8000</em>元</span>
                        <a href="javascript:;" class="buy mt6">在线购买</a>
                    </li>
                    <li>
                        <a href="javascript:;" class="pink"><img src="/img/zhanwei.png" /></a>
                        <a href="javascript:;" class="name mt8">亚军枭雄</a>
                        <span class="origin">北京李记种赛鸽中心</span>
                        <span class="hot red"><i class="iconfont">&#xe63b;</i>人气：365</span>
                        <span class="primecost">原价：<s>10000</s>元</span>
                        <span class="price">优惠价：<em class="red">8000</em>元</span>
                        <a href="javascript:;" class="buy mt6">在线购买</a>
                    </li>
                    <li>
                        <a href="javascript:;" class="pink"><img src="/img/zhanwei.png" /></a>
                        <a href="javascript:;" class="name mt8">亚军枭雄</a>
                        <span class="origin">北京李记种赛鸽中心</span>
                        <span class="hot red"><i class="iconfont">&#xe63b;</i>人气：365</span>
                        <span class="primecost">原价：<s>10000</s>元</span>
                        <span class="price">优惠价：<em class="red">8000</em>元</span>
                        <a href="javascript:;" class="buy mt6">在线购买</a>
                    </li>
                </ul>
            </div>
            <div class="fr pledge sellRight">
                <div class="pleTop">
                    在线买鸽安全保证<div>Buy Your Pigeon<span>Security Assurance</span></div>         
                </div>
                <div class="pleMiddle">
                    <a href="javascript:;">新手买鸽</a><a href="javascript:;">如何付款</a><a href="javascript:;">买鸽保险</a><a href="javascript:;">购买帮忙</a>
                </div>
                <div class="pleBottom">
                    <ul>
                        <li><a href="javascript:;"><span class="dove">【109期】年轻克拉克近血</span><span class="bid">已被（郑**）得标</span></a></li>
                        <li><a href="javascript:;"><span class="dove">【109期】年轻克拉克近血</span><span class="bid">已被（郑**）得标</span></a></li>
                        <li><a href="javascript:;"><span class="dove">【109期】年轻克拉克近血</span><span class="bid">已被（郑**）得标</span></a></li>
                        <li><a href="javascript:;"><span class="dove">【109期】年轻克拉克近血</span><span class="bid">已被（郑**）得标</span></a></li>
                        <li><a href="javascript:;"><span class="dove">【109期】年轻克拉克近血</span><span class="bid">已被（郑**）得标</span></a></li>
                        <li><a href="javascript:;"><span class="dove">【109期】年轻克拉克近血</span><span class="bid">已被（郑**）得标</span></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- onsale / end -->
    <!-- recommend /start -->
    <div class="section onsale">
        <div class="line"></div>
        <h4>长城铭鸽<span>Ming Great Wall Pigeon</span></h4>
    </div>
    <div class="gray wall">
        <div class="section">
            <h5 class="benefit">推荐铭鸽<a href="javascript:;" class="more">更多>></a></h5>
            <div class="recommend">
                <ul>
                    <li>
                        <a href="javascript:;" class="recImg">
                            <span class="pink"><img src="/img/zhanwei.png" height="134" width="200" /></span>
                            <p class="recName" href="javascript:;">亚军枭雄</p>
                            <p class="recOrigin">博翔阁</p>
                            <p class="recHot">人气：1280</p>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;" class="recImg">
                            <span class="pink"><img src="/img/zhanwei.png" height="134" width="200" /></span>
                            <p class="recName" href="javascript:;">亚军枭雄</p>
                            <p class="recOrigin">博翔阁</p>
                            <p class="recHot">人气：1280</p>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;" class="recImg">
                            <span class="pink"><img src="/img/zhanwei.png" height="134" width="200" /></span>
                            <p class="recName" href="javascript:;">亚军枭雄</p>
                            <p class="recOrigin">博翔阁</p>
                            <p class="recHot">人气：1280</p>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;" class="recImg">
                            <span class="pink"><img src="/img/zhanwei.png" height="134" width="200" /></span>
                            <p class="recName" href="javascript:;">亚军枭雄</p>
                            <p class="recOrigin">博翔阁</p>
                            <p class="recHot">人气：1280</p>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;" class="recImg">
                            <span class="pink"><img src="/img/zhanwei.png" height="134" width="200" /></span>
                            <p class="recName" href="javascript:;">亚军枭雄</p>
                            <p class="recOrigin">博翔阁</p>
                            <p class="recHot">人气：1280</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- recommend / end -->
    <!-- news / start -->
    <div class="section clearfix information">
        <div class="fl doveInfo">
            <div class="infoTitle"><span class="litTitle">赛鸽资讯</span><a href="javascript:;" class="more">更多>></a></div>
            <ul>
                <li><a href="javascript:;">398羽勇士出征宁镇杨嘉峪关2000公里超远程</a><span class="time">2016-10-26</span></li>
                <li><a href="javascript:;">398羽勇士出征宁镇杨嘉峪关2000公里超远程</a><span class="time">2016-10-26</span></li>
                <li><a href="javascript:;">398羽勇士出征宁镇杨嘉峪关2000公里超远程</a><span class="time">2016-10-26</span></li>
                <li><a href="javascript:;">398羽勇士出征宁镇杨嘉峪关2000公里超远程</a><span class="time">2016-10-26</span></li>
                <li><a href="javascript:;">398羽勇士出征宁镇杨嘉峪关2000公里超远程</a><span class="time">2016-10-26</span></li>
                <li><a href="javascript:;">398羽勇士出征宁镇杨嘉峪关2000公里超远程</a><span class="time">2016-10-26</span></li>
            </ul>
        </div>
        <div class="fr score">
            <div class="infoTitle"><span class="litTitle">长城鸽业及支援鸽友最新赛绩</span><a href="javascript:;" class="more">更多>></a></div>
            <ul>
                <li><a href="javascript:;">2004年北京爱亚卡普预赛10名、14名、32名、决赛季军</a><span class="person">河北鸽友刘芳使翔</span></li>
                <li><a href="javascript:;">2004年北京爱亚卡普预赛10名、14名、32名、决赛季军</a><span class="person">河北鸽友刘芳使翔</span></li>
                <li><a href="javascript:;">2004年北京爱亚卡普预赛10名、14名、32名、决赛季军</a><span class="person">河北鸽友刘芳使翔</span></li>
                <li><a href="javascript:;">2004年北京爱亚卡普预赛10名、14名、32名、决赛季军</a><span class="person">河北鸽友刘芳使翔</span></li>
                <li><a href="javascript:;">2004年北京爱亚卡普预赛10名、14名、32名、决赛季军</a><span class="person">河北鸽友刘芳使翔</span></li>
                <li><a href="javascript:;">2004年北京爱亚卡普预赛10名、14名、32名、决赛季军</a><span class="person">河北鸽友刘芳使翔</span></li>
            </ul>
        </div>
    </div>
    <!-- news / end -->
@endsection('content')

@section('js')
<script type="text/javascript">
    
    $(function(){
        
        var lunboSwiper = new Swiper('.aside .swiper-container',{
            pagination: '.swiper-pagination',
            loop:true,
            autoplay : 2000,
            autoplayDisableOnInteraction : false,
            paginationClickable: true
        })
        var navSwiper = new Swiper('.nav .swiper-container',{
            slidesPerView: 'auto',
            freeMode: true
        })
    })
</script>
@endsection('js')