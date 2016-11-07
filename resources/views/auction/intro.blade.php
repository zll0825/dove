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
            <h2 class="topicTitle"><span>拍卖专题:柏乡鸽会千公里优胜鸽拍卖专场</span></h2>
            <div class="instruction">
                <h3>拍卖说明</h3>
                <p>1.先注册中信网会员名，通过中信网拍卖保证金认证(交纳1000元保证金)，详情请参考拍卖帮助中心，http://help.ag188.com。(中信网会员区拍卖认证资料管理栏目操作) </p>
                <p>为保证拍买者权益，请使用会员账户支付！</p>
                <p>2.参拍出价前请先确认您需要到达的运输地点，然后电话跟我们确认是否可以运达，以免得标后因无法运达而造成不必要的纠纷。运输方式确认电话：13582498842.13653391332</p>
                <p>3.运输费用：与竞拍款一并支付，汽运及火车运输：按羽数计算，每羽100元，得标2羽及以上按200元计算。空运：按次数计算，得标1羽及多羽，每次均按300元支付（除新疆地区一般不需要空运），鸽友必须自行到指定机场或可到达之长途车站取鸽。</p>
                <p>4.拍卖过程中，如出现网络异常情况（需经中信网核实认定）,河北柏乡信鸽协会有权中止拍卖，并有权决定否需要重新拍卖或延长结标时间。</p>
                <p>5.拍卖结束后，得标鸽友必须按时支付全额拍卖款，河北柏乡信鸽协会在鸽友拍卖订单结算后， 7 个工作日统一将赛鸽寄出。</p>
                <p>6.性别无法100％保证，拍卖拍鸽标注的性别仅供大家参考，如出现差错，我们无法提供任何的补偿。</p>
                <p>7.在照片制作中，通常会使用PHOTOSHOP的图片翻转功能，造成视觉上足环位置的颠倒（左右脚互换），鸽子足环的位置以实物为准，照片不能作为参考依据。</p>
                <p>8.联系方式：电话：13582498842 运输电话13653391332</p>
                <p>请所有参与拍卖的鸽友，事先阅读拍卖规则(http://help.ag188.com)，参与拍卖，即视为同意此规则，相关事项将遵照中信网拍卖规则执行。</p>
            </div>
            <div class="storeInfo">
                <dl>
                    <dt>商家名称：</dt>
                    <dd class="bdr">河北柏乡信鸽协会 <a href="javascript:;" class="red">(查看信用评价)</a></dd>
                    <dt>所在地：</dt>
                    <dd>河北 石家庄</dd>
                    <dt>联系电话：</dt>
                    <dd class="bdr">13582498842</dd>
                    <dt>结拍时间：</dt>
                    <dd>2016年5月10日</dd>
                </dl>
            </div>
        </div>
        <div class="fr newtopic">
            <h3>最新拍卖专题</h3>
            <div class="latest">
                <ul>
                    <li><a href="javascript:;">中国长城鸽业精品种鸽拍</a></li>
                    <li><a href="javascript:;">中国长城鸽业精品种鸽拍</a></li>
                    <li><a href="javascript:;">中国长城鸽业精品种鸽拍</a></li>
                    <li><a href="javascript:;">中国长城鸽业精品种鸽拍</a></li>
                    <li><a href="javascript:;">中国长城鸽业精品种鸽拍</a></li>
                    <li><a href="javascript:;">中国长城鸽业精品种鸽拍</a></li>
                    <li><a href="javascript:;">中国长城鸽业精品种鸽拍</a></li>
                    <li><a href="javascript:;">中国长城鸽业精品种鸽拍</a></li>
                    <li><a href="javascript:;">中国长城鸽业精品种鸽拍</a></li>
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
                                    <li>
                                        <a href="javascript:;">
                                            <span class="w1"><img src="/img/zhanwei.png" /></span>
                                            <span class="w2">43758</span>
                                            <span class="w3"><em>【年青超級克拉克】</em></span>
                                            <span class="w4 red f18">290</span>
                                            <span class="w5 red f18">290</span>
                                            <span class="w6">共 0 次出价<em class="noWei">浏览：25次</em></span>
                                            <span class="w7">剩 <em class="f18">5</em> 天</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <span class="w1"><img src="/img/zhanwei.png" /></span>
                                            <span class="w2">43758</span>
                                            <span class="w3"><em>【年青超級克拉克】</em></span>
                                            <span class="w4 red f18">290</span>
                                            <span class="w5 red f18">290</span>
                                            <span class="w6">共 0 次出价<em class="noWei">浏览：25次</em></span>
                                            <span class="w7">剩 <em class="f18">5</em> 天</span>
                                        </a>
                                    </li>
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