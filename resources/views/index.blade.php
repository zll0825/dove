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
					<h2 class="noteTitle"><i class="iconfont">&#xe617;</i>公告<span class="calendar">{{date('Y年m月d日',time())}}</span><span>{{$week}}</span></h2>
					<div class="notelist">
						<ul>
                            @foreach($notices as $notice)
                            <li class="major"><a href="{{url('/notice/'.$notice->NewsID)}}">{{$notice->NewsTitle}}</a></li>
                            @endforeach
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
                    <h4 class="auctionH4"><a href="{{url('/auction')}}">点击进入拍卖列表</a></h4>
                    <div class="auctionList">
                        <ul>
                            @foreach($auctions as $auction)
                            <li>
                                <a href="{{url('/auction/intro/'.$auction->ThemeID)}}" class="aucLink">
                                    <span class="auctionImg"><img src="{{$auction->ThemePicture}}" /></span>
                                    <div class="auctionRight fl clearfix">
                                        <span class="periods">{{$auction->ThemeName}}</span>
                                        <!-- <div class="sale">{{$auction->EndTime}}结拍<span>出价：<strong class="red">{{$auction->OfferCount}}</strong> 次</span></div> -->
                                        @if($auction->EndDays>=0)
                                        <span class="remaining">剩&nbsp;<strong class="red">{{$auction->EndDays}}</strong>&nbsp;天</span>
                                        @else
                                        <span class="remaining">已结束</span>
                                        @endif
                                    </div>
                                </a>
                            </li>
                            @endforeach
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
                    @foreach($latestauctions as $latestauction)
                    <li><a href="javascript:;"><span class="dove">{{$latestauction->DoveName}}</span><span class="bid">已被（{{substr_replace('*',$latestauction->username,1)}}）得标</span></a></li>
                    @endforeach
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
                <h5 class="benefit">优惠鸽最新推荐<a href="{{url('/sale')}}" class="more">更多>></a></h5>
                <ul class="bedoveList">
                    @foreach($sales as $sale)
                    <li>
                        <a href="{{url('/sale/'.$sale->DoveID)}}" class="pink"><img src="{{$sale->DovePicture}}" /></a>
                        <a href="{{url('/sale/'.$sale->DoveID)}}" class="name mt8">{{$sale->DoveName}}</a>
                        <span class="hot red"><i class="iconfont">&#xe63b;</i>人气：{{$sale->ViewCount}}</span>
                        <span class="primecost">原价：<s>{{$sale->OriginPrice/100}}</s>元</span>
                        <span class="price">优惠价：<em class="red">{{$sale->DovePrice/100}}</em>元</span>
                        <a href="{{url('/sale/'.$sale->DoveID)}}" class="buy mt6">在线购买</a>
                    </li>
                    @endforeach
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
                        @foreach($latestsales as $latestsale)
                        <li><a href="{{url('/sale/'.$latestsale->DoveID)}}"><span class="dove">{{$latestsale->DoveName}}</span><span class="bid">已被（{{substr_replace('*',$latestsale->username,1)}}）购买</span></a></li>
                        @endforeach
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
            <h5 class="benefit">推荐铭鸽<a href="{{url('/show')}}" class="more">更多>></a></h5>
            <div class="recommend">
                <ul>
                    @foreach($recommends as $recommend)
                    <li>
                        <a href="{{url('/show/'.$recommend->DoveID)}}" class="recImg">
                            <span class="pink"><img src="{{$recommend->DovePicture}}" height="134" width="200" /></span>
                            <p class="recName" href="{{url('/show/'.$recommend->DoveID)}}">{{$recommend->DoveName}}</p>
                            <p class="recHot">人气：{{$recommend->ViewCount}}</p>
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <!-- recommend / end -->
    <!-- news / start -->
    <div class="section clearfix information">
        <div class="fl doveInfo">
            <div class="infoTitle"><span class="litTitle">赛鸽资讯</span><a href="{{url('/news')}}" class="more">更多>></a></div>
            <ul>
                @foreach($infomations as $infomation)
                <li><a href="{{url('/news/'.$infomation->NewsID)}}">{{$infomation->NewsTitle}}</a><span class="time">{{$infomation->PublishTime}}</span></li>
                @endforeach
            </ul>
        </div>
        <div class="fr score">
            <div class="infoTitle"><span class="litTitle">鸽友之家</span><a href="{{url('/home')}}" class="more">更多>></a></div>
            <ul>
                @foreach($homes as $home)
                    <li><a href="{{url('/home/'.$home->NewsID)}}">{{$home->NewsTitle}}</a><span class="person" style="font-size:12px;">{{$home->PublishTime}}</span></li>
                @endforeach
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