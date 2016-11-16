@extends('layouts.home')

@section('head')
<link rel="stylesheet" type="text/css" href="{{asset('/css/news.css')}}" />
<title>新闻中心</title>
@endsection

@section('content')
    <div class="internews section clearfix">
        <div class="fl newsCenter">
            <div class="bigTitle"><span>赛鸽资讯</span></div>
            <div class="listNews">
                <ul class="listNewsUl">
                    @if(!empty($newss))
                        @foreach($newss as $news)
                        <li>
                            <a href="{{url('/news/'.$news->NewsID)}}">
                                <span class="newsImg fl"><img src="{{$news->NewsLabel}}" /></span>
                                <div class="newsCon fl">
                                    <h3>{{$news->NewsTitle}}</h3>
                                    <span class="publishTime">发表于：{{$news->PublicTime}}</span>
                                    <p class="summary">{{$news->Brief}}</p>
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
                    {!!$newss->render()!!}
                </div>
            </div>
        </div>
        <div class="fr about">
            <div class="headline">
                <h2>鸽友之家</h2>
                <span>THE DOVE NEWS</span>
            </div>
            <div class="press">
                <a href="{{url('/home/'.$home->NewsID)}}" class="picNews">
                    <span class="littleImg fl"><img src="{{$home->NewsLogo}}" /></span>
                    <div class="fl littleNews">
                        <h3>{{$home->NewsTitle}}</h3>
                        <p class="summary">{{$home->NewsBrief}}</p>
                    </div>
                </a>
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
    </div>
    <!-- onsale / end -->
@endsection('content')


@section('js')
<script type="text/javascript">
    $(function(){
        $("#Pagination").pagination("15");

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
