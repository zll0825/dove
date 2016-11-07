@extends('layouts.home')

@section('head')
<link rel="stylesheet" type="text/css" href="{{asset('/css/index.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('/css/system.css')}}" />
<script type="text/javascript" src="{{asset('/js/public.js')}}"></script>
<title>帮助中心</title>
@endsection('head')

@section('content')
    <div class="content section clearfix">
        <!-- public helpcenter ／ start -->
        <div class="fl userCenter">
            <h2 class="userTitle">帮助中心</h2>
            <ul class="userList">
                <li class="current"><a href="{{'/help'}}">帮助中心</a></li>
                <li><a href="{{'/help'}}">交易流程</a></li>
                <li><a href="{{'/help'}}">新手买鸽</a></li>
                <li><a href="{{'/help'}}">如何付款</a></li>
                <li><a href="{{'/help'}}">买鸽保险</a></li>
                <li><a href="{{'/help'}}">购买帮忙</a></li>
            </ul>
        </div>
        <!-- public helpcenter ／ end -->
        <div class="fr help">
            <h2 class="helpTit">帮助中心</h2>
            <div class="helpCon">
                <p>湖南惠农科技有限公司成立于2013年2月，由湖南著名企业家、第十一届全国人大代表姜仕先生独资创建，实收资本1亿元，是一家专业从事农业电子商务和农业信息化服务的国家级高新技术企业。</p>
                <p>公司经过两年多的探索与发展，从北、上、广、深引进了大批如IBM、阿里巴巴、京东、百度等知名互联网企业的高端技术和管理人才，组建了400多人的团队，成功开发并运营着目前在国内农业电商领域具有领先地位的电子商务平台——中国惠农网（www.cnhnb.com）,率先推出农产品电子商务的B2B2C模式，切实有效解决农产品因信息不对称而导致的滞销、卖难买贵问题。公司创新孵化出基于农业电子商务的"农批通"、"惠农宝"、"真源码"等应用产品，通过区域"培训中心+产业带+服务中心+溯源平台"的落地方式，促进互联网与农业融合发展，探索现代农业发展新模式。</p>
                <p>公司经过两年多的探索与发展，从北、上、广、深引进了大批如IBM、阿里巴巴、京东、百度等知名互联网企业的高端技术和管理人才，组建了400多人的团队，成功开发并运营着目前在国内农业电商领域具有领先地位的电子商务平台——中国惠农网（www.cnhnb.com）,率先推出农产品电子商务的B2B2C模式</p>
            </div>
        </div>
    </div>
@endsection('content')

@section('js')
<script type="text/javascript">
    $(function(){

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
        
        var navSwiper = new Swiper('.nav .swiper-container',{
            slidesPerView: 'auto',
            freeMode: true
        })
        
    })
</script>
@endsection('js')
