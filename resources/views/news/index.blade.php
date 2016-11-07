@extends('layouts.home')

@section('head')
<link rel="stylesheet" type="text/css" href="{{asset('/css/news.css')}}" />
<title>新闻中心</title>
@endsection

@section('content')
    <div class="internews section clearfix">
        <div class="fl newsCenter">
            <div class="bigTitle"><span>新闻中心</span></div>
            <div class="listNews">
                <ul>
                    <li>
                        <a href="javascript:;">
                            <span class="newsImg fl"><img src="/img/zhanwei.png" /></span>
                            <div class="newsCon fl">
                                <h3>鸽子崖：一户人家的坚守</h3>
                                <span class="publishTime">发表于：2016-7-1 10:03</span>
                                <p class="summary">近两年来，温州面对2011年9月份以来受宏观经济环境和民间借贷风波影响，银行业不良贷款迅猛攀升的状况，通过“细、强、优、深、净”五化促进新常态下信用风险化解，有效遏制不良上升势头。据温 ...</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;">
                            <span class="newsImg fl"><img src="/img/zhanwei.png" /></span>
                            <div class="newsCon fl">
                                <h3>鸽子崖：一户人家的坚守</h3>
                                <span class="publishTime">发表于：2016-7-1 10:03</span>
                                <p class="summary">近两年来，温州面对2011年9月份以来受宏观经济环境和民间借贷风波影响，银行业不良贷款迅猛攀升的状况，通过“细、强、优、深、净”五化促进新常态下信用风险化解，有效遏制不良上升势头。据温 ...</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;">
                            <span class="newsImg fl"><img src="/img/zhanwei.png" /></span>
                            <div class="newsCon fl">
                                <h3>鸽子崖：一户人家的坚守</h3>
                                <span class="publishTime">发表于：2016-7-1 10:03</span>
                                <p class="summary">近两年来，温州面对2011年9月份以来受宏观经济环境和民间借贷风波影响，银行业不良贷款迅猛攀升的状况，通过“细、强、优、深、净”五化促进新常态下信用风险化解，有效遏制不良上升势头。据温 ...</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;">
                            <span class="newsImg fl"><img src="/img/zhanwei.png" /></span>
                            <div class="newsCon fl">
                                <h3>鸽子崖：一户人家的坚守</h3>
                                <span class="publishTime">发表于：2016-7-1 10:03</span>
                                <p class="summary">近两年来，温州面对2011年9月份以来受宏观经济环境和民间借贷风波影响，银行业不良贷款迅猛攀升的状况，通过“细、强、优、深、净”五化促进新常态下信用风险化解，有效遏制不良上升势头。据温 ...</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;">
                            <span class="newsImg fl"><img src="/img/zhanwei.png" /></span>
                            <div class="newsCon fl">
                                <h3>鸽子崖：一户人家的坚守</h3>
                                <span class="publishTime">发表于：2016-7-1 10:03</span>
                                <p class="summary">近两年来，温州面对2011年9月份以来受宏观经济环境和民间借贷风波影响，银行业不良贷款迅猛攀升的状况，通过“细、强、优、深、净”五化促进新常态下信用风险化解，有效遏制不良上升势头。据温 ...</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;">
                            <span class="newsImg fl"><img src="/img/zhanwei.png" /></span>
                            <div class="newsCon fl">
                                <h3>鸽子崖：一户人家的坚守</h3>
                                <span class="publishTime">发表于：2016-7-1 10:03</span>
                                <p class="summary">近两年来，温州面对2011年9月份以来受宏观经济环境和民间借贷风波影响，银行业不良贷款迅猛攀升的状况，通过“细、强、优、深、净”五化促进新常态下信用风险化解，有效遏制不良上升势头。据温 ...</p>
                            </div>
                        </a>
                    </li>
                </ul>
                <div class="pages">
                    <div class="oh"><div id="Pagination"></div><span class="page-sum">共<strong class="allPage">15</strong>页</span></div>
                </div>
            </div>
        </div>
        <div class="fr about">
            <div class="headline">
                <h2>鸽子新闻</h2>
                <span>THE DOVE NEWS</span>
            </div>
            <div class="press">
                <a href="javascript:;" class="picNews">
                    <span class="littleImg fl"><img src="/img/zhanwei.png" /></span>
                    <div class="fl littleNews">
                        <h3>鸽子崖：一户人家的坚守</h3>
                        <p class="summary">近两年来，温州面对2011年9月份以来受宏观经济环境和民间借贷风波影响，银行业不良贷</p>
                    </div>
                </a>
                <ul class="titleList">
                    <li><a href="javascript:;">甘肃省成立丝绸之路大数据公司，三 ...</a></li>
                    <li><a href="javascript:;">甘肃省成立丝绸之路大数据公司，三 ...</a></li>
                    <li><a href="javascript:;">甘肃省成立丝绸之路大数据公司，三 ...</a></li>
                    <li><a href="javascript:;">甘肃省成立丝绸之路大数据公司，三 ...</a></li>
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
