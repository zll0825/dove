@extends('layouts.home')

@section('head')
<link rel="stylesheet" type="text/css" href="{{asset('/css/auction.css')}}" />
<title>拍卖专题</title>
@endsection

@section('content')
<!-- first screen / start -->
    <div class="main section clearfix">
        <div class="fl aside">
            <div class="asideTop">
                <div class="notice fl">
                    <h2 class="noteTitle"><i class="iconfont">&#xe617;</i>公告<span class="calendar">2016年10月20日</span><span>星期四</span></h2>
                    <div class="notelist">
                        <ul>
                            <li class="major"><a href="javascript:;">航空运费变更通知</a></li>
                            <li class="major"><a href="javascript:;">航空运费变更通知</a></li>
                            <li><a href="javascript:;">第二百五十八期发货时间定为春</a></li>
                            <li><a href="javascript:;">第二百五十八期发货时间定为春</a></li>
                            <li><a href="javascript:;">第二百五十八期发货时间定为春</a></li>
                            <li><a href="javascript:;">第二百五十八期发货时间定为春</a></li>
                        </ul>
                    </div>
                </div>
                <div class="fl flowsheet">
                    <div class="procedure">
                        <img src="/img/procedure.png" />
                        <span class="proceNum">
                            <a href="javascript:;" class="first"></a>
                            <a href="javascript:;" class="second"></a>
                            <a href="javascript:;" class="third"></a>
                            <a href="javascript:;" class="forth"></a>
                        </span>
                    </div>
                    <div class="desciption">
                        <span>1语言描述：撒花多长时间换成撒很合适 山东省空间按回车键会接受调查很上档次电话促进市场决定好成绩都是好的好的机会。</span>
                        <span>2语言描述：撒花多长时间换成撒很合适 山东省空间按回车键会接受调查很上档次电话促进市场决定好成绩都是好的好的机会。</span>
                        <span>3语言描述：撒花多长时间换成撒很合适 山东省空间按回车键会接受调查很上档次电话促进市场决定好成绩都是好的好的机会。</span>
                        <span>4语言描述：撒花多长时间换成撒很合适 山东省空间按回车键会接受调查很上档次电话促进市场决定好成绩都是好的好的机会。</span>
                    </div>
                </div>
                <div class="fr member">
                    <h2 class="noteTitle"><span class="online">在线拍鸽会员登录</span></h2>
                    @if(!Request::user())
                    <div class="onlineDove">
                        <p class="username"><label for="" class="red">会员名：</label><input type="text" /></p>
                        <div class="prompt1"></div>
                        <p class="password"><label for="" class="red">密<em>码</em>：</label><input type="password" /></p>
                        <div class="prompt2"></div>
                        <div class="doveLogin">
                            <button class="login">登录</button>
                            <button class="register">注册</button>
                        </div>
                    </div>
                    @else
                    <!-- 若已登录则展示userNav -->
                    <div class="userNav">
                        <a href="{{url('/ucenter/index')}}"><i class="iconfont">&#xe6e1;</i>用户信息</a>
                        <a href="{{url('/ucenter/myauction')}}"><i class="iconfont">&#xe606;</i>我的竞拍</a>
                        <a href="{{url('/ucenter/myorder')}}"><i class="iconfont">&#xe64e;</i>我的购买</a>
                        <a href="{{url('/ucenter/mymsg')}}"><i class="iconfont">&#xe619;</i>消息中心</a>
                    </div>
                    @endif
                    <!-- <div class="remit">
                        <a href="javascript:;" class="regMem">注册会员</a>
                        <a href="javascript:;" class="remittance">保证金汇款</a>
                    </div>
                    <a href="javascript:;" class="more consult red">更多咨询>></a> -->
                </div>
            </div>
            <!-- under auction / start  -->
            <div class="auction">
                <div class="auctionCon">
                    <h4 class="auctionH4"><a href="javascript:;">拍卖列表</a></h4>
                    <div class="auctionList">
                        <ul>
                            <li>
                                <a href="javascript:;" class="aucLink">
                                    <span class="auctionImg"><img src="/img/zhanwei.png" /></span>
                                    <div class="auctionRight fl clearfix">
                                        <span class="periods">中国长城鸽业—网络拍卖2016秋季网拍26期&nbsp;&nbsp;总第109期</span>
                                        <div class="sale">10月27日结拍<span>出价：<strong class="red">25</strong> 次</span></div>
                                        <span class="remaining">剩&nbsp;<strong class="red">5</strong>&nbsp;天</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:;" class="aucLink">
                                    <span class="auctionImg"><img src="/img/zhanwei.png" /></span>
                                    <div class="auctionRight fl clearfix">
                                        <span class="periods">中国长城鸽业—网络拍卖2016秋季网拍26期&nbsp;&nbsp;总第109期</span>
                                        <div class="sale">10月27日结拍<span>出价：<strong class="orange">25</strong> 次</span></div>
                                        <span class="remaining">剩&nbsp;<strong class="orange">5</strong>&nbsp;天</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:;" class="aucLink">
                                    <span class="auctionImg"><img src="/img/zhanwei.png" /></span>
                                    <div class="auctionRight fl clearfix">
                                        <span class="periods">中国长城鸽业—网络拍卖2016秋季网拍26期&nbsp;&nbsp;总第109期</span>
                                        <div class="sale">10月27日结拍<span>出价：<strong class="red">25</strong> 次</span></div>
                                        <span class="remaining">剩&nbsp;<strong class="red">5</strong>&nbsp;天</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:;" class="aucLink">
                                    <span class="auctionImg"><img src="/img/zhanwei.png" /></span>
                                    <div class="auctionRight fl clearfix">
                                        <span class="periods">中国长城鸽业—网络拍卖2016秋季网拍26期&nbsp;&nbsp;总第109期</span>
                                        <div class="sale">10月27日结拍<span>出价：<strong class="orange">25</strong> 次</span></div>
                                        <span class="remaining">剩&nbsp;<strong class="orange">5</strong>&nbsp;天</span>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- under auction / end -->
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
        var navSwiper = new Swiper('#table',{
            slidesPerView: 'auto',
            freeMode: true
        })
    })
</script>
@endsection('js')