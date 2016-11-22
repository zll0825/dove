@extends('layouts.home')

@section('head')
<link rel="stylesheet" type="text/css" href="{{asset('/css/price.css')}}" />
<title>展示鸽子</title>
@endsection

@section('content')
    <div class="gray mtBlank ptb25">
        <div class="section selling clearfix">
            <div class="fl sellList">
                <h5 class="benefit">长城铭鸽</h5>
                <ul class="bedoveList">
                    @foreach($doves as $dove)
                        <li>
                            <a href="{{url('/show/'.$dove->DoveID)}}" class="recImg">
                            <span class="pink"><img src="{{$dove->DovePicture}}" height="134" width="200" /></span>
                            <p class="recName" href="javascript:;">{{$dove->DoveName}}</p>
                            <p class="recOrigin">博翔阁</p>
                            <p class="recHot">人气：{{$dove->ViewCount}}</p>
                            </a>
                        </li>
                    @endforeach
                </ul>
                <div class="pages">
                    {!!$doves->render()!!}
                </div>
            </div>
            <div class="fr pledge sellRight">
                <div class="pleTop">
                    在线买鸽安全保证<div>Buy Your Pigeon<span>Security Assurance</span></div>         
                </div>
                <div class="pleMiddle">
                <a href="{{url('/help')}}">新手买鸽</a><a href="{{url('/help')}}">如何付款</a><a href="{{url('/help')}}">买鸽保险</a><a href="{{url('/help')}}">购买帮忙</a>
                </div>
                <div class="pleBottom">
                    <ul>
                        @foreach($latestsales as $latestsale)
                            <li><a href="{{url('/sale/'.$latestsale->DoveID)}}"><span class="dove">{{$latestsale->DoveName}}</span><span class="bid">已被（{{substr_replace('*',$latestsale->username,1)}}）得标</span></a></li>
                        @endforeach
                    </ul>
                </div>
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
