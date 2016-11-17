@extends('layouts.home')

@section('head')
<link rel="stylesheet" type="text/css" href="{{asset('/css/system.css')}}" />
<title>我的消息</title>
@endsection

@section('content')
	<!-- header/end -->
	<div class="content section clearfix">
		<!-- public usercenter ／ start -->
		<div class="fl userCenter">
			<h2 class="userTitle">个人中心</h2>
			<ul class="userList">
				<li><a href="{{url('/ucenter/index')}}"><i class="iconfont">&#xe6e1;</i>用户信息</a></li>
                <li><a href="{{url('/ucenter/myauction')}}"><i class="iconfont">&#xe606;</i>我的竞拍</a></li>
                <li><a href="{{url('/ucenter/myorder')}}"><i class="iconfont">&#xe64e;</i>我的购买</a></li>
                <li class="current"><a href="{{url('/ucenter/mymsg')}}"><i class="iconfont">&#xe619;</i>消息中心</a></li>
			</ul>
		</div>
		<!-- public usercenter ／ end -->
		<div class="fr system">
			<div class="firstTitle">
				<input class="all check check_all" type="checkbox" id="checkAll">
				<button class="sign_read">标记所选为已读</button>
				<button class="empty" id="delete">删除所选</button>
				<span class="sys_time">时 间</span>
			</div>
			<ul>
				@foreach($messages as $message)
				<li>
					<div class="present">
						<span class="td_check"><input type="checkbox" class="msgbox" value="{{$message->TextID}}"></span>
						<span class="td_email
						@if($message->Status == 1)
							read
						@else
						@endif"></span>
						<span class="td_title" TextID="{{$message->TextID}}">{{$message->Title}}</span>
						<span class="td_time">{{$message->created_at}}</span>
					</div>
					<div class="system_details">{!!$message->Text!!}</div>
				</li>
				@endforeach
			</ul>
		</div>
	</div>
@endsection('content')

@section('js')
<script type="text/javascript">
	$(function(){
		$('.td_title').click(function() {
			var TextID = $(this).attr('TextID');
			if(!$(this).hasClass('read')){
				$.ajax({
					url: "{{url('/readmsg')}}",
					type: 'POST',
					data: {'TextID':TextID,'userid':"{{Request::user()->userid}}"},
					dataType: 'json',
					success: function(msg){
						// console.log(msg);
					}
				});
			}
			$(this).prev().addClass('read');
			$(this).parent().next().slideToggle('fast');
		});

		$('#delete').click(function(){
			var check = $('.msgbox:checked');
			var TextID = [];
			for (var i = check.length - 1; i >= 0; i--) {
				TextID[i] = check[i].value;
			};

			$.ajax({
				url: "{{url('/delmsg')}}",
				type: 'POST',
				data: {'TextID':TextID,'userid':"{{Request::user()->userid}}"},
				dataType: 'json',
				success: function(msg){
					// console.log(msg);
					// for (var i = check.length - 1; i >= 0; i--) {
					//     check[i].closest('li').remove();
					// };
					// var counts = $('#counts').html();
					// counts = counts - check.length;
					// $('#counts').html(counts);
					window.location.reload();
				}
			});
		})

		$('#checkAll').click(function(){
			var state = parseInt($(this).attr('state')); //0是全选1是取消
			if(state == 0){
				$(".msgbox").prop("checked", false);
				$(this).attr('state', '1');
			} else {
				$(".msgbox").prop("checked", true);
				$(this).attr('state', '0');
			}
		})

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
</script>
@endsection
