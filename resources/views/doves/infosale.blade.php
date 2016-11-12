@extends('layouts.home')

@section('head')
<link rel="stylesheet" type="text/css" href="{{asset('/css/priceinfo.css')}}" />
<title>定价鸽子</title>
@endsection

@section('content')
    <div class="section clearfix">
        <div class="fr product">
            <div class="line"></div>
            <h2 class="proTitle"><span>特价两周&nbsp;&nbsp;{{$dove->DoveName}}</span></h2>
            <div class="proImg">
                <img src="/img/zhanwei2.png" />
            </div>
            <div class="feature">
                <h3 class="h20">信鸽特征</h3>
                <dl class="featureCon">
                    <dt><b>编<em>号</em>：</b>{{$dove->DoveNumber}}</dt>
                    <dd><b>环<em>号</em>：</b>{{$dove->DoveRing}}</dd>
                    <dt><b>鸽<em>名</em>：</b>{{$dove->DoveName}}</dt>
                    <dd><b>性<em>别</em>：</b>{{$dove->DoveSex}}</dd>
                    <dt><b>羽<em>色</em>：</b>{{$dove->DoveColor}}</dt>
                    <dd><b>目<em>录</em>：</b>{{$dove->DoveIndex}}</dd>
                    <dt><b>眼<em>砂</em>：</b>{{$dove->DoveEye}}</dt>
                    <dd><b>人<em>气</em>：</b><strong class="red f20">{{$dove->ViewCount}}</strong>次</dd>
                    <dt><b>数<em>量</em>：</b><strong class="green f20">1</strong></dt>
                    <dd><b>血<em>统</em>：</b>{{$dove->DoveBlood}}</dd>
                    <dt><b>价<em>格</em>：</b>￥<strong class="red f24">{{$dove->OriginPrice}}</strong></dt>
                    <dd><b>会员价：</b>￥<strong class="red f24">{{$dove->DovePrice}}</strong></dd>
                </dl>
                <div class="btnBox">
                    <a href="javascript:;" class="btnCar" id="addcart"><span><i class="iconfont">&#xe689;</i>加入购物车</span></a>
                    <a href="javascript:;" class="btnBuy" id="buynow"><span><i class="iconfont">&#xe622;</i>立即购买</span></a>
                </div>
            </div>
            <div class="introduce">
                <h3 class="h20">详细介绍</h3>
                <div class="introduceCon">
                    {{$dove->DoveInfo}}
                </div>
            </div>
            <div class="other">
                <h3 class="h20">其他推荐</h3>
                <div class="otherCon">
                    <ul class="bedoveList">
                        <li>
                            <a href="javascript:;" class="pink"><img src="/img/zhanwei.png" /></a>
                            <a href="javascript:;" class="name mt8">亚军枭雄</a>
                            <span class="origin">北京李记种赛鸽中心</span>
                            <span class="hot red"><i class="iconfont">&#xe63b;</i>人气：365</span>
                            <span class="primecost">原价：<s>10000</s>元</span>
                            <span class="price">优惠价：<em class="red">8000</em>元</span>
                            <a href="javascript:;" class="buy mt6">在线购买</a>
                        </li>
                        <li>
                            <a href="javascript:;" class="pink"><img src="/img/zhanwei.png" /></a>
                            <a href="javascript:;" class="name mt8">亚军枭雄</a>
                            <span class="origin">北京李记种赛鸽中心</span>
                            <span class="hot red"><i class="iconfont">&#xe63b;</i>人气：365</span>
                            <span class="primecost">原价：<s>10000</s>元</span>
                            <span class="price">优惠价：<em class="red">8000</em>元</span>
                            <a href="javascript:;" class="buy mt6">在线购买</a>
                        </li>
                        <li>
                            <a href="javascript:;" class="pink"><img src="/img/zhanwei.png" /></a>
                            <a href="javascript:;" class="name mt8">亚军枭雄</a>
                            <span class="origin">北京李记种赛鸽中心</span>
                            <span class="hot red"><i class="iconfont">&#xe63b;</i>人气：365</span>
                            <span class="primecost">原价：<s>10000</s>元</span>
                            <span class="price">优惠价：<em class="red">8000</em>元</span>
                            <a href="javascript:;" class="buy mt6">在线购买</a>
                        </li>
                        <li>
                            <a href="javascript:;" class="pink"><img src="/img/zhanwei.png" /></a>
                            <a href="javascript:;" class="name mt8">亚军枭雄</a>
                            <span class="origin">北京李记种赛鸽中心</span>
                            <span class="hot red"><i class="iconfont">&#xe63b;</i>人气：365</span>
                            <span class="primecost">原价：<s>10000</s>元</span>
                            <span class="price">优惠价：<em class="red">8000</em>元</span>
                            <a href="javascript:;" class="buy mt6">在线购买</a>
                        </li>
                        <li>
                            <a href="javascript:;" class="pink"><img src="/img/zhanwei.png" /></a>
                            <a href="javascript:;" class="name mt8">亚军枭雄</a>
                            <span class="origin">北京李记种赛鸽中心</span>
                            <span class="hot red"><i class="iconfont">&#xe63b;</i>人气：365</span>
                            <span class="primecost">原价：<s>10000</s>元</span>
                            <span class="price">优惠价：<em class="red">8000</em>元</span>
                            <a href="javascript:;" class="buy mt6">在线购买</a>
                        </li>
                        <li>
                            <a href="javascript:;" class="pink"><img src="/img/zhanwei.png" /></a>
                            <a href="javascript:;" class="name mt8">亚军枭雄</a>
                            <span class="origin">北京李记种赛鸽中心</span>
                            <span class="hot red"><i class="iconfont">&#xe63b;</i>人气：365</span>
                            <span class="primecost">原价：<s>10000</s>元</span>
                            <span class="price">优惠价：<em class="red">8000</em>元</span>
                            <a href="javascript:;" class="buy mt6">在线购买</a>
                        </li>
                        <li>
                            <a href="javascript:;" class="pink"><img src="/img/zhanwei.png" /></a>
                            <a href="javascript:;" class="name mt8">亚军枭雄</a>
                            <span class="origin">北京李记种赛鸽中心</span>
                            <span class="hot red"><i class="iconfont">&#xe63b;</i>人气：365</span>
                            <span class="primecost">原价：<s>10000</s>元</span>
                            <span class="price">优惠价：<em class="red">8000</em>元</span>
                            <a href="javascript:;" class="buy mt6">在线购买</a>
                        </li>
                        <li>
                            <a href="javascript:;" class="pink"><img src="/img/zhanwei.png" /></a>
                            <a href="javascript:;" class="name mt8">亚军枭雄</a>
                            <span class="origin">北京李记种赛鸽中心</span>
                            <span class="hot red"><i class="iconfont">&#xe63b;</i>人气：365</span>
                            <span class="primecost">原价：<s>10000</s>元</span>
                            <span class="price">优惠价：<em class="red">8000</em>元</span>
                            <a href="javascript:;" class="buy mt6">在线购买</a>
                        </li>
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
                            <li>
                                <a href="javascript:;"><span class="senName">宏金公棚三关鸽王</span><span class="heat"><strong class="red">157575</strong><i class="iconfont">&#xe772;</i></span></a>
                            </li>
                            <li>
                                <a href="javascript:;"><span class="senName">宏金公棚三关鸽王</span><span class="heat"><strong class="red">157575</strong><i class="iconfont">&#xe607;</i></span></a>
                            </li>
                            <li>
                                <a href="javascript:;"><span class="senName">宏金公棚三关鸽王</span><span class="heat"><strong class="red">157575</strong><i class="iconfont">&#xe772;</i></span></a>
                            </li>
                            <li>
                                <a href="javascript:;"><span class="senName">宏金公棚三关鸽王</span><span class="heat"><strong class="red">157575</strong><i class="iconfont">&#xe772;</i></span></a>
                            </li>
                            <li>
                                <a href="javascript:;"><span class="senName">宏金公棚三关鸽王</span><span class="heat"><strong class="red">157575</strong><i class="iconfont">&#xe772;</i></span></a>
                            </li>
                            <li>
                                <a href="javascript:;"><span class="senName">宏金公棚三关鸽王</span><span class="heat"><strong class="red">157575</strong><i class="iconfont">&#xe772;</i></span></a>
                            </li>
                            <li>
                                <a href="javascript:;"><span class="senName">宏金公棚三关鸽王</span><span class="heat"><strong class="red">157575</strong><i class="iconfont">&#xe772;</i></span></a>
                            </li>
                            <li>
                                <a href="javascript:;"><span class="senName">宏金公棚三关鸽王</span><span class="heat"><strong class="red">157575</strong><i class="iconfont">&#xe772;</i></span></a>
                            </li>
                            <li>
                                <a href="javascript:;"><span class="senName">宏金公棚三关鸽王</span><span class="heat"><strong class="red">157575</strong><i class="iconfont">&#xe772;</i></span></a>
                            </li>
                            <li>
                                <a href="javascript:;"><span class="senName">宏金公棚三关鸽王</span><span class="heat"><strong class="red">157575</strong><i class="iconfont">&#xe772;</i></span></a>
                            </li>
                            <li>
                                <a href="javascript:;"><span class="senName">宏金公棚三关鸽王</span><span class="heat"><strong class="red">157575</strong><i class="iconfont">&#xe772;</i></span></a>
                            </li>
                            <li>
                                <a href="javascript:;"><span class="senName">宏金公棚三关鸽王</span><span class="heat"><strong class="red">157575</strong><i class="iconfont">&#xe772;</i></span></a>
                            </li>
                            <li>
                                <a href="javascript:;"><span class="senName">宏金公棚三关鸽王</span><span class="heat"><strong class="red">157575</strong><i class="iconfont">&#xe772;</i></span></a>
                            </li>
                        </ul>
                    </div>
                    <div class="seniority">
                        <ul>
                            <li>
                                <a href="javascript:;"><span class="senName">宏金公棚三关鸽王</span><span class="heat"><strong class="red">157575</strong><i class="iconfont">&#xe772;</i></span></a>
                            </li>
                            <li>
                                <a href="javascript:;"><span class="senName">宏金公棚三关鸽王</span><span class="heat"><strong class="red">157575</strong><i class="iconfont">&#xe607;</i></span></a>
                            </li>
                            <li>
                                <a href="javascript:;"><span class="senName">宏金公棚三关鸽王</span><span class="heat"><strong class="red">157575</strong><i class="iconfont">&#xe772;</i></span></a>
                            </li>
                            <li>
                                <a href="javascript:;"><span class="senName">宏金公棚三关鸽王</span><span class="heat"><strong class="red">157575</strong><i class="iconfont">&#xe772;</i></span></a>
                            </li>
                            <li>
                                <a href="javascript:;"><span class="senName">宏金公棚三关鸽王</span><span class="heat"><strong class="red">157575</strong><i class="iconfont">&#xe772;</i></span></a>
                            </li>
                            <li>
                                <a href="javascript:;"><span class="senName">宏金公棚三关鸽王</span><span class="heat"><strong class="red">157575</strong><i class="iconfont">&#xe772;</i></span></a>
                            </li>
                            <li>
                                <a href="javascript:;"><span class="senName">宏金公棚三关鸽王</span><span class="heat"><strong class="red">157575</strong><i class="iconfont">&#xe772;</i></span></a>
                            </li>
                            <li>
                                <a href="javascript:;"><span class="senName">宏金公棚三关鸽王</span><span class="heat"><strong class="red">157575</strong><i class="iconfont">&#xe772;</i></span></a>
                            </li>
                            <li>
                                <a href="javascript:;"><span class="senName">宏金公棚三关鸽王</span><span class="heat"><strong class="red">157575</strong><i class="iconfont">&#xe772;</i></span></a>
                            </li>
                            <li>
                                <a href="javascript:;"><span class="senName">宏金公棚三关鸽王</span><span class="heat"><strong class="red">157575</strong><i class="iconfont">&#xe772;</i></span></a>
                            </li>
                            <li>
                                <a href="javascript:;"><span class="senName">宏金公棚三关鸽王</span><span class="heat"><strong class="red">157575</strong><i class="iconfont">&#xe772;</i></span></a>
                            </li>
                            <li>
                                <a href="javascript:;"><span class="senName">宏金公棚三关鸽王</span><span class="heat"><strong class="red">157575</strong><i class="iconfont">&#xe772;</i></span></a>
                            </li>
                            <li>
                                <a href="javascript:;"><span class="senName">宏金公棚三关鸽王</span><span class="heat"><strong class="red">157575</strong><i class="iconfont">&#xe772;</i></span></a>
                            </li>
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
        $("#Pagination").pagination("15");

        $('.tabBtn a').click(function() {
            $(this).addClass('current').siblings().removeClass('current');
            var move = $(this).index()*100;
            $('.tabCon2').animate({'left': -move +'%'}, 300);
        });
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
    @if(Request::user())

    $('#addcart').click(function(){
        layer.confirm('确定加入购物车吗？', {icon: 3, title:'提示'}, function(index){
            $.ajax({
                url: "{{url('/addcart')}}",
                type: "POST",
                dataType: "json",
                data: { 'userid' : "{{Request::user()->userid}}", "doveid" : "{{$doveid}}", "_token" : "{{csrf_token()}}"},
                error: function(){
                    layer.alert('异常，请刷新重试！');
                },
                success: function(json){
                    if(json.status_code == "200"){
                        layer.alert('加入购物车成功！');
                    }else if(json.status_code == "409"){
                        layer.alert('加入购物车失败，请稍候重试！');
                    }else if(json.status_code == "404"){
                        layer.alert('您已经购买过了，请到个人中心查看！');
                    }
                }
            })
            layer.close(index);
        });
    })

    $('#buynow').click(function(){
        layer.confirm('确定购买吗？', {icon: 3, title:'提示'}, function(index){
            $.ajax({
                url: "{{url('/purchase')}}",
                type: "POST",
                dataType: "json",
                data: { 'userid' : "{{Request::user()->userid}}", "doveid" : "{{$doveid}}", "_token" : "{{csrf_token()}}"},
                error: function(){
                    layer.alert('异常，请刷新重试！');
                },
                success: function(json){
                    if(json.status_code == "200"){
                        layer.alert('购买成功，请及时付款，并且到个人中心上传付款凭证！');
                    }else if(json.status_code == "409"){
                        layer.alert('购买失败，请稍候重试！');
                    }else if(json.status_code == "404"){
                        layer.alert('您已经购买过了，请到个人中心查看！');
                    }
                }
            })
            layer.close(index);
        });
    })
    @else
        $('#buynow,#addcart').click(function(){
            layer.open({
                type: 2,
                closeBtn: 1,
                title: null,
                area: ['300px','332px'],
                content: "{{url('/register')}}",
            });
        })
    @endif
</script>
@endsection('js')
