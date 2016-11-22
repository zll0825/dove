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
                            @foreach($notices as $notice)
                                <li class="major"><a href="{{url('/news/'.$notice->NewsID)}}">{{$notice->NewsTitle}}</a></li>
                            @endforeach
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
                        <p class="username"><label for="" class="red">手机号：</label><input type="text" id="phonenumber"/></p>
                        <div class="prompt1"></div>
                        <p class="password"><label for="" class="red">密<em>码</em>：</label><input type="password" id="password"/></p>
                        <div class="prompt2"></div>
                        <div class="doveLogin">
                            <button class="login" id="denglu">登录</button>
                            <button class="register" id="zhuce">注册</button>
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
                            @foreach($auctions as $auction)
                            <li>
                                <a href="{{url('/auction/intro/'.$auction->ThemeID)}}" class="aucLink">
                                    <span class="auctionImg"><img src="/img/zhanwei.png" /></span>
                                    <div class="auctionRight fl clearfix">
                                        <span class="periods">{{$auction->DoveName}}</span>
                                        <div class="sale">{{$auction->EndTime}}结拍<span>出价：<strong class="red">{{$auction->OfferCount}}</strong> 次</span></div>
                                        @if($auction->EndDays>0)
                                        <span class="remaining">剩&nbsp;<strong class="red">{{$auction->EndDays}}</strong>&nbsp;天</span>
                                        @else
                                        <span class="remaining">已结束</span>
                                        @endif
                                    </div>
                                </a>
                            </li>
                            @endforeach
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
                                    @foreach($latests as $latest)
                                    <li>
                                        <a href="{{url('/auction/'.$latest->AuctionID)}}">
                                            <span class="w1"><img src="/img/zhanwei.png" /></span>
                                            <span class="w2">{{$latest->DoveNumber}}</span>
                                            <span class="w3"><em>{{$latest->DoveName}}</em></span>
                                            <span class="w4 red f18">{{$latest->StartPrice/100}}</span>
                                            <span class="w5 red f18">{{$latest->HighPrice/100}}</span>
                                            <span class="w6">共 {{$latest->OfferCount}} 次出价<em class="noWei">浏览：{{$latest->ViewCount}}次</em></span>
                                            @if($auction->EndDays>0)
                                            <span class="w7">剩 <em class="f18">{{$latest->EndDays}}</em> 天</span>
                                            @else
                                            <span class="w7">已结束</span>
                                            @endif
                                        </a>
                                    </li>
                                    @endforeach
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
    $('#zhuce').click(function(){
        layer.open({
            type: 2,
            closeBtn: 1,
            title: null,
            area: ['300px','435px'],
            content: "{{url('/register')}}",

        });
    })
    $('#denglu').click(function(){
        var phonenumber = $("#phonenumber").val();
        if(!(/^1[3|4|5|7|8]\d{9}$/.test(phonenumber))||$(this).val==''){
            $('.prompt1').html('手机号或用户名不能为空或者输入错误！');
            return false;
        }else{
            $('.prompt1').html('');
        }
        var password = $("#password").val();
        if(!(/^[a-zA-Z0-9_-]{6,18}$/).test(password)){
            $('.prompt2').html('密码只能输入6-18位的数字或者字母!');
            return false;
        }else{
            $('.prompt2').html('');
        }

        $(this).val('登录中...');
        $.ajax({
            url:"{{url('/auth/login')}}",
            type:"POST",
            data:"phonenumber=" + phonenumber + "&password=" + password  + "&_token={{csrf_token()}}",
            dataType:'json',
            error:function(e){
                layer.alert('帐号或者密码不正确！');
            },
            success:function(msg){
                if(msg.status_code == "200"){
                    var index = parent.layer.getFrameIndex(window.name); //获取窗口索引
                    parent.window.location.reload();
                    parent.layer.close(index);
                } else {
                    layer.alert('帐号或者密码不正确！');
                }
            }
        });
    })
</script>
@endsection('js')