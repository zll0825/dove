@extends('layouts.home')

@section('head')
<link rel="stylesheet" type="text/css" href="{{asset('/css/news.css')}}" />
<title>新闻中心</title>
@endsection

@section('content')
    <div class="internews section clearfix">
        <div class="fl newsCenter">
            <div class="bigTitle"><span>鸽友之家</span></div>
            <div class="listNews">
                <ul class="listNewsUl">
                    @if(!empty($homes))
                    @foreach($homes as $home)
                        <li>
                            <a href="{{url('/home/'.$home->NewsID)}}">
                                <span class="newsImg fl"><img src="{{$home->NewsLabel}}" /></span>
                                <div class="newsCon fl">
                                    <h3>{{$news->NewsTitle}}</h3>
                                    <span class="publishTime">发表于：{{$home->PublishTime}}</span>
                                    <p class="summary">{{$home->Brief}}</p>
                                </div>
                            </a>
                        </li>
                    @endforeach
                    @else
                        <li>
                            暂无新闻
                        </li>
                    @endif
                </ul>
                <div class="pages">
                    {!!$homes->render()!!}
                </div>
            </div>
        </div>
        <div class="fr about">
            <div class="headline">
                <h2>赛鸽资讯</h2>
                <span>THE DOVE NEWS</span>
            </div>
            <div class="press">
                <a href="{{url('/news/'.$news->NewsID)}}" class="picNews">
                    <span class="littleImg fl"><img src="{{$news->NewsLogo}}" /></span>
                    <div class="fl littleNews">
                        <h3>{{$news->NewsTitle}}</h3>
                        <p class="summary">{{$news->NewsBrief}}</p>
                    </div>
                </a>
                <ul class="titleList">
                    @if(!empty($newss))
                    @foreach($newss as $news)
                        <li><a href="{{url('/news/'.$news->NewsID)}}">{{$news->NewsTitle}}</a></li>
                    @endforeach
                    @else
                        <li>
                            暂无新闻
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
    <!-- onsale / end -->
@endsection('content')


@section('js')
<script type="text/javascript">
    $(function(){

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
