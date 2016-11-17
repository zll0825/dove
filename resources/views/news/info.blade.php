@extends('layouts.home')

@section('head')
<link rel="stylesheet" type="text/css" href="{{asset('/css/news.css')}}" />
<title>新闻中心</title>
@endsection

@section('content')
    <div class="internews section clearfix newsInfo">
        <div class="fl newsCenter">
            <div class="bigTitle">
                <span>赛鸽资讯</span>
                <div class="shareBox">
                    <div class="jiathis_style">
                        <a href="http://www.jiathis.com/share" class="jiathis jiathis_txt jtico jtico_jiathis" target="_blank" id="share_asign">&nbsp;分享</a>
                    </div>
                </div>
            </div>
            <script type="text/javascript" src="http://v3.jiathis.com/code/jia.js" charset="utf-8"></script>
            <div class="newsArtical">
                <h2 class="articalTitle">{{$news->NewsTitle}}</h2>
                <div class="articalTime">{{$news->PublishTime}}<span>来源:{{$news->NewsAuthor}}</span></div>
                <div class="paragraph">
                    {!! $news->NewsContent!!}
                </div>
                <dl class="piece prevEssay">
                    @if($pre)
                        <dt>上一篇：</dt><dd><a href="{{url('/news/'.$pre->NewsID)}}">{{$pre->NewsTitle}}</a></dd>
                    @else
                        <dt>上一篇：</dt><dd><a href="javascript:;">没有上一篇了</a></dd>
                    @endif
                </dl>
                <dl class="piece nextEssay">
                    @if($next)
                        <dt>下一篇：</dt><dd><a href="{{url('/news/'.$next->NewsID)}}">{{$next->NewsTitle}}</a></dd>
                    @else
                        <dt>下一篇：</dt><dd><a href="javascript:;">没有下一篇了</a></dd>
                    @endif
                </dl>
            </div>
        </div>
        <div class="fr about">
            <div class="headline">
                <h2>鸽友之家</h2>
                <span>THE DOVE NEWS</span>
            </div>
            @if($home)
            <a href="{{url('/home/'.$home->NewsID)}}" class="picNews">
                <span class="littleImg fl"><img src="{{$home->NewsLogo}}" /></span>
                <div class="fl littleNews">
                    <h3>{{$home->NewsTitle}}</h3>
                    <p class="summary">{{$home->NewsBrief}}</p>
                </div>
            </a>
            @else
            <li>
                暂无新闻
            </li>
            @endif
            <ul class="titleList">
                @if(!empty($homes))
                @foreach($homes as $hom)
                    <li><a href="{{url('/news/'.$hom->NewsID)}}">{{$hom->NewsTitle}}</a></li>
                @endforeach
                @else
                    <li>
                        暂无新闻
                    </li>
                @endif
            </ul>
        </div>
    </div>
    <!-- onsale / end -->
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
@endsection('js')
