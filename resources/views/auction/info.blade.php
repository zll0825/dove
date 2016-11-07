@extends('layouts.home')

@section('head')
<link rel="stylesheet" type="text/css" href="{{asset('/css/auction.css')}}" />
<title>拍卖鸽子</title>
@endsection('head')

@section('content')
    <div class="section">
        <div class="goods">
            <h2 class="goodsTitle"><span>商品信息</span></h2>
            <div class="goodsCon">
                <dl>
                    <dt>商品编号：<strong>463711</strong></dt>
                    <dd>数量：<strong>1羽</strong></dd>
                    <dt>开拍时间：<strong>2016-10-31 22:00:00</strong></dt>
                    <dd>结拍时间：<strong class="red f24">2016-11-10 22:00:00</strong></dd>
                    <dt>当前时间：<strong class="red f24">2016-11-01 09:00:00</strong></dt>
                    <dd>血统书：查看大图</dd>
                    <dt class="addPrice">加价幅度：<strong>200元</strong></dt>
                    <dd class="moreDet"><span>详细介绍：</span>BELG2002-2326224雄，功勋老种鸽，子代、孙代发挥多羽，适合300-700公里坚难赛事，好鸽子，不多介绍。鸽子中大体型，质量高级，体质极佳，状态良好，春季仍能正常作育子代，偶尔出现无精，特价商品，换地不保作育，不提供血统书，介意勿拍，谢谢！BELG2002-2326224雄，功勋老种鸽，子代、孙代发挥多羽，适合300-700公里坚难赛事，好鸽子，不多介绍。鸽子中大体型，质量高级，体质极佳，状态良好，春季仍能正常作育子代，偶尔出现无精，特价商品，换地不保作育、</dd>
                </dl>
            </div>
        </div>
    </div> 
    <div class="section buyerInfo">
        <h3 class="process">竞标过程<span>（共4次出价）</span></h3>
        <div class="swiper-container" id="table">
            <div class="swiper-wrapper table">
                <div class="swiper-slide">
                    <div class="buyer">
                        <span class="wd1">买家</span>
                        <span class="wd2">出价</span>
                        <span class="wd3">出价时间</span>
                        <span class="wd4">状态</span>
                    </div>
                    <div class="buyerList">
                        <ul>
                            <li>
                                <a href="javascript:;">
                                    <span class="wd1">ab198</span>
                                    <span class="wd2">¥ <em class="red">290</em>元</span>
                                    <span class="wd3">2016-11-01 12:01:21</span>
                                    <span class="wd4">领先</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <a href="javascript:;" class="mybid">我要竞拍</a>
        <div class="transfer">
            <h3 class="process">运输及特别提示</h3>
            <div class="transferCon">
                <p>①汽车运输（一般情况下）：按次数计算，得标2羽以内，每次按200元计算,每增加1羽增加30元（东北地区及部分地区除外）; 东北三省汽车运输费用：按羽数计算,得标1羽按150元计算，每增加1羽增加150元。</p>
                <p>②火车运输：按次数计算,每次200元；得标3羽以上，每增加一羽增加运费40元。</p>
                <p>③空运：按次数计算，得标4羽以内，每次均按400元支付（机场鲜活货物最低收费,包含动检证＋消毒证），每增加一羽增加运费50元。</p>
                <p>④以上运输如需中转，根据实际费用收费。</p>
                <p>⑤鸽友必须自行到指定机场或可到达的长途车站、火车站等地点取鸽。</p>
                <p>⑥到本鸽舍自取无费用！</p>
                <p class="red special">特别说明：接鸽时间和地点是根据汽车、火车及飞机到达的时间和地点而确定，如果给您带来不便请谅解！</p>
            </div>
        </div>
        <span class="imgIntro"><img src="/img/zhanwei2.png" /></span>
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
        var navSwiper = new Swiper('#table',{
            slidesPerView: 'auto',
            freeMode: true
        })
    })
</script>
@endsection('js')