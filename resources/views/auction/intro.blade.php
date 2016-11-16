@extends('layouts.home')

@section('head')
<link rel="stylesheet" type="text/css" href="{{asset('/css/auction.css')}}" />
<title>专题简介</title>
@endsection('head')

@section('content')
<!-- first screen / start -->
    <div class="main section clearfix">
        <div class="fl theme">
            <div class="line"></div>
            <h2 class="topicTitle"><span>拍卖专题:{{$theme->ThemeName}}</span></h2>
            <div class="instruction">
                {{$theme->ThemeInfo}}
            </div>
            <div class="storeInfo">
                <dl>
                    <dt>商家名称：</dt>
                    <dd class="bdr">{{$theme->ThemeHost}} <a href="javascript:;" class="red">(查看信用评价)</a></dd>
                    <dt>所在地：</dt>
                    <dd>{{$theme->HostLocation}}</dd>
                    <dt>联系电话：</dt>
                    <dd class="bdr">{{$theme->HostPhone}}</dd>
                    <dt>结拍时间：</dt>
                    <dd>{{$theme->EndTime}}</dd>
                </dl>
            </div>
        </div>
        <div class="fr newtopic">
            <h3>最新拍卖专题</h3>
            <div class="latest">
                <ul>
                    @foreach($latestthemes as $l)
                    <li><a href="{{url('/auction/intro/'.$l->ThemeID)}}">{{$l->ThemeName}}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <!-- first screen / end -->
    <div class="doveaucList">
        <div class="auctionBar section">
            <a href="javascript:;" class="cur">最新展拍铭鸽</a>
            <a href="javascript:;">热拍铭鸽</a>
            <a href="javascript:;">即将结束</a>
            <a href="javascript:;">即将开拍</a>
            <a href="javascript:;">拍卖结束</a>
        </div>
        <div class="section">
            <div class="swiper-container" id="table">
                <div class="swiper-wrapper table">
                    <div class="swiper-slide">
                        <div class="stroeTitle">
                            <span class="w1">拍卖鸽图片</span>
                            <span class="w2">商店编号</span>
                            <span class="w3">商品名称/商家</span>
                            <span class="w4">起拍价（元）</span>
                            <span class="w5">最高出价（元）</span>
                            <span class="w6">竞拍次/浏览</span>
                            <span class="w7">拍卖状态</span>
                        </div>
                        <div class="storeList">
                            <div class="storeCon">
                                <ul class="storeUl">
                                    @foreach($auctions as $auction)
                                    <li>
                                        <a href="{{url('/auction/'.$auction->AuctionID)}}">
                                            <span class="w1"><img src="/img/zhanwei.png" /></span>
                                            <span class="w2">{{$auction->DoveNumber}}</span>
                                            <span class="w3"><em>{{$auction->DoveName}}</em></span>
                                            <span class="w4 red f18">{{$auction->StartPrice}}</span>
                                            <span class="w5 red f18">{{$auction->HighPrice}}</span>
                                            <span class="w6">共 {{$auction->OfferCount}} 次出价<em class="noWei">浏览：{{$auction->ViewCount}}次</em></span>
                                            <span class="w7">剩 <em class="f18">{{$auction->EndDays}}</em> 天</span>
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
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
        $('.proceNum a').hover(function() {
            var proceNum = $(this).index();
            $('.desciption span').eq(proceNum).css('display', 'block').siblings().hide();
        });

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