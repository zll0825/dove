@extends('layouts.home')

@section('head')
<link rel="stylesheet" type="text/css" href="{{asset('/css/priceinfo.css')}}" />
<title>展示鸽子</title>
@endsection

@section('content')
    <div class="section clearfix">
        <div class="fr product">
            <div class="line"></div>
            <h2 class="proTitle"><span>{{$dove->DoveName}}</span></h2>
            <div class="proImg">
                <img src="{{$dove->DovePicture}}" />
            </div>
            <div class="feature">
                <h3 class="h20">信鸽特征</h3>
                <dl class="featureCon">
                    <dt><b>编<em>号</em>：</b>{{$dove->DoveNumber}}</dt>
                    <dd><b>环<em>号</em>：</b>B11-6167246</dd>
                    <dt><b>鸽<em>名</em>：</b>利奥.贺尔曼斯盖兰托斯直子X欧元直女</dt>
                    <dd><b>性<em>别</em>：</b>雌</dd>
                    <dt><b>羽<em>色</em>：</b>雨点</dt>
                    <dd><b>目<em>录</em>：</b>利奥.赫尔曼斯 原舍种鸽</dd>
                    <dt><b>眼<em>砂</em>：</b>砂眼</dt>
                    <dd><b>人<em>气</em>：</b><strong class="red f20">{{$dove->ViewCount}}</strong>次</dd>
                    <dt><b>数<em>量</em>：</b><strong class="green f20">1</strong></dt>
                    <dd><b>血<em>统</em>：</b>利奥.贺尔曼斯</dd>
                </dl>
            </div>
            <div class="introduce">
                <h3 class="h20">详细介绍</h3>
                <div class="introduceCon">
                    {!!$dove->DoveIntro!!}
                </div>
            </div>
            <div class="other">
                <h3 class="h20">其他推荐</h3>
                <div class="otherCon">
                    <ul class="bedoveList">
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
        <div class="fl tabBar">
            <div class="tabBtn">
                <a href="javascript:;" class="current">最新上架</a>
                <a href="javascript:;">总排行</a>
            </div>
            <div class="tabCon">
                <div class="tabCon2">
                    <div class="seniority">
                        <ul>
                            @foreach($latests as $latest)
                            <li>
                                <a href="javascript:;"><span class="senName">{{$latest->DoveName}}</span><span class="heat"><strong class="red">{{$latest->ViewCount}}</strong><i class="iconfont">&#xe772;</i></span></a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="seniority">
                        <ul>
                            @foreach($totals as $total)
                                <li>
                                    <a href="javascript:;"><span class="senName">{{$total->DoveName}}</span><span class="heat"><strong class="red">{{$total->ViewCount}}</strong><i class="iconfont">&#xe772;</i></span></a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- onsale / end -->
@endsection('content')

@section('js')
<script type="text/javascript">
    $(function(){
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
        $("#Pagination").pagination("15");

        $('.tabBtn a').click(function() {
            $(this).addClass('current').siblings().removeClass('current');
            var move = $(this).index()*100;
            $('.tabCon2').animate({'left': -move +'%'}, 300);
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
@endsection('js')
