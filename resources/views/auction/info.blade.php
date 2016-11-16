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
                    <dt>商品编号：<strong>{{$auction->DoveNumber}}</strong></dt>
                    <dd>数量：<strong>1羽</strong></dd>
                    <dt>开拍时间：<strong>{{$auction->StartTime}}</strong></dt>
                    <dd>结拍时间：<strong class="red f24">{{$auction->EndTime}}</strong></dd>
                    <dt>当前时间：<strong class="red f24">{{date('Y-m-d H:i:s', time())}}</strong></dt>
                    <dd>血统书：查看大图</dd>
                    <dt class="addPrice">加价幅度：<strong>{{$auction->AddPrice}}元</strong></dt>
                    <dd class="moreDet"><span>详细介绍：</span>{!!$auction->DoveIntro!!}</dd>
                </dl>
            </div>
        </div>
    </div> 
    <div class="section buyerInfo">
        <h3 class="process">竞标过程<span>（共{{$auction->OfferCount}}次出价）</span></h3>
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
                            @foreach($processs as $process)
                            <li>
                                <a href="javascript:;">
                                    <span class="wd1">{{$process->username}}</span>
                                    <span class="wd2">¥ <em class="red">{{$process->Offer}}</em>元</span>
                                    <span class="wd3">{{$process->created_at}}</span>
                                    <span class="wd4">@if($process->Status == 0)出局@elseif($process->Status == 1)领先@endif</span>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <a href="javascript:;" class="mybid" id="iwillauction">我要竞拍</a>
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
        <span class="imgIntro"><img src="{{$auction->DovePicture}}" /></span>
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
    @if(Request::user())

    $('#iwillauction').click(function(){
        layer.open({
            type: 1,
            class: 'offerprice',
//            area: ['500px'], //宽高
            content: "<div class='inps'><div>请输入价格：<input type='number' id='offer'/></div><div>加价幅度：<span id='addprice'>{{$auction->AddPrice}}</span></div><div>当前最高出价：<span id='highprice'>{{$highprice}}</span></div></div>",
            btn: ['确定','取消'], btn1:function(){
                var offer = $('#offer').val() ? parseInt($('#offer').val()) : '';
                var addprice = parseInt($('#addprice').html());
                var highprice = parseInt($('#highprice').html());
                if(offer == '' || offer <= (addprice+highprice)){
                    layer.msg('请正确出价，至少等于当前最高价加上最少加价幅度！');
                    return false;
                }else {
                    $.ajax({
                        url: "{{url('/offerprice')}}",
                        type: "POST",
                        dataType: "json",
                        data: { 'userid' : "{{Request::user()->userid}}", "auctionid" : "{{$auction->AuctionID}}", "offer" : offer, "_token" : "{{csrf_token()}}"},
                        error: function(){
                            layer.alert('异常，请刷新重试！');
                        },
                        success: function(json){
                            if(json.status_code == "200"){
                                layer.confirm('出价成功', {
                                    btn: ['确定'] //按钮
                                }, function(){
                                    window.location.reload();
                                });
                            }else if(json.status_code == "409"){
                                layer.alert('出价失败，请稍候重试！');
                            }
                        }
                    })
                }
            }, close:function(){

            }});
    });
    @else
        $('#iwillauction').click(function(){
            layer.open({
                type: 2,
                closeBtn: 1,
                title: null,
                area: ['300px','332px'],
                content: "{{url('/login')}}",
            });
        })
    @endif
</script>
@endsection('js')