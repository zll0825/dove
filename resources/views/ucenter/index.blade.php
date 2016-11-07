@extends('layouts.home')

@section('head')
<link rel="stylesheet" type="text/css" href="{{asset('/css/system.css')}}" />
<title>个人中心</title>
@endsection

@section('content')
	<div class="content section clearfix">
		<!-- public usercenter ／ start -->
		<div class="fl userCenter">
			<h2 class="userTitle">个人中心</h2>
			<ul class="userList">
				<li class="current"><a href="{{url('/ucenter/index')}}"><i class="iconfont">&#xe6e1;</i>用户信息</a></li>
                <li><a href="{{url('/ucenter/myauction')}}"><i class="iconfont">&#xe606;</i>我的竞拍</a></li>
                <li><a href="{{url('/ucenter/myorder')}}"><i class="iconfont">&#xe64e;</i>我的购买</a></li>
                <li><a href="{{url('/ucenter/mymsg')}}"><i class="iconfont">&#xe619;</i>消息中心</a></li>
			</ul>
		</div>
		<!-- public usercenter ／ end -->
		<div class="fr upload">
			<h2 class="source">基本资料</h2>
			<div class="primary clearfix">
				<a href="javascript:;" class="fl avatar"><img src="/img/avatar.png" /></a>
				<div class="fl primInfo">
					<div class="phoneNumber"><strong>手机号：</strong>{{Request::user()->phonenumber}}</div>
                    <div class="userName"><strong>用户名：</strong><input type="text" class="inpName" value="{{Request::user()->username}}" readonly="readonly" /><a href="javascript:;" class="green change1">修改</a><a href="javascript:;" class="red nameChan">确定</a></div>
                    <div class="prompt"></div>
                    <div class="userPwd getCode"><strong>验证码：</strong><input type="text" class="codetest" /><span class="get">获取验证码</span></div>
                    <div class="prompt"></div>
                    <div class="userPwd originPwd"><strong>密<em>码</em>：</strong><input type="password" value="******" readonly="readonly" class="inpPwd" /><a href="javascript:;" class="green change2">修改</a><a href="javascript:;" class="red pwdChan">确定</a></div>
                    <div class="prompt"></div>
				</div>
			</div>
<!-- 头像上传 -->
<script src="{{asset('/org/jqupload/js/jquery.ui.widget.js')}}"></script>
<script src="{{asset('/org/jqupload/js/jquery.fileupload.js')}}"></script>
<script src="{{asset('/org/jqupload/js/jquery.iframe-transport.js')}}"></script>
<script src="{{asset('/org/jqupload/js/jquery.fileupload-process.js')}}"></script>
<script src="{{asset('/org/jqupload/js/jquery.fileupload-validate.js')}}"></script>
        <input id="fileupload" type="file" name="files[]" data-url="{{url('/ucenter/upload')}}" multiple accept="image/png, image/gif, image/jpg, image/jpeg">
<script type="text/javascript">
$(function () {
    $('#fileupload').fileupload({
        dataType: 'json',
        maxFileSize: 1 * 1024 * 1024,
        done: function (e, data) {
            $.each(data.result.files, function (index, file) {
                // console.log(file.name);
                // $("#avatar").attr('src','http://images.ziyawang.com/user/'+file.name).show();
                // var UserPicture = '/user/'+file.name;
                // $.ajax({
                //         url: "{{url('/ucenter/upload')}}",
                //         data: {'UserPicture':UserPicture},
                //         type: 'POST',
                //         dataType:'json',
                //         success:function(msg){
                //             layer.msg(msg.msg);
                //         }
                //     });
            });
        }
    });
});
</script>
<!-- 头像上传 -->
            <div class="assure">
                <h3 class="cert">保证金认证</h3>
                <div class="photo clearfix">
                    <div class="rect fl"><img id="thumb" src="/img/zhanwei.png" /></div><!-- 上传的图片摆放位置 -->
                    <div class="explain fl">
                        <div class="wordIntro">认证说明：<span>请上传身份证正面照片</span></div>
                        <span class="sub fileinput-button">
                            <span>点击上传</span>
                            <input id="fileupload" type="file" name="files[]" data-url="{{url('/upload')}}" multiple accept="image/png, image/gif, image/jpg, image/jpeg">
                        </span>
                    </div>
                </div>
                <div class="photo clearfix">
                    <div class="rect fl"><img src="/img/zhanwei.png" /></div><!-- 上传的图片摆放位置 -->
                    <div class="explain fl">
                        <div class="wordIntro">认证说明：<span>请上传打印凭证图片，管理员确认后，给予认证通过</span></div>
                        <span class="sub fileinput-button">
                            <span>点击上传</span>
                            <input id="" type="file" name="files[]" data-url="" multiple="" accept="image/png, image/gif, image/jpg, image/jpeg">
                        </span>
                    </div>
                </div>
                <button class="certain">确认提交</button>
            </div>
        </div>
    </div>
@endsection('content')

@section('js')
<script type="text/javascript">
	$(function(){
        var textWidth = function(text){ 
            var sensor = $('<pre>'+ text +'</pre>').css({display: 'none'}); 
            $('body').append(sensor); 
            var width = sensor.width()+20;
            sensor.remove(); 
            return width;
        };
        $('.change1').click(function() {
            $('.inpName').removeAttr('readonly').css('border', '1px solid #ccc');
            $(this).hide();
            $('.nameChan').show();
        });
        $('.nameChan').click(function() {
            if($('.inpName').val() == ''){
                $(this).parent().next('.prompt').html('请输入用户名');
            }else if($('.inpName').val().length > 16){
                $(this).parent().next('.prompt').html('用户名不能超过16个字哦~');
            }else{
                $(this).parent().next('.prompt').html('');
                $('.inpName').attr('readonly', 'readonly').css('border', 'none');
                $(this).hide();
                $('.inpName').width(textWidth($('.inpName').val()));
                $('.change1').show();
            }
        });
        $('.codetest').blur(function() {
            if($('.codetest').val()==''){
                $(this).parent().next('.prompt').html('验证码不能为空哦~');
            }else{
                $(this).parent().next('.prompt').html('');
            }
        });
        $('.change2').click(function() {
            $(this).hide();
            $('.getCode').show();
            $('.inpPwd').removeAttr('readonly').css('border', '1px solid #ccc');
            $('.pwdChan').show();
        });
        $('.pwdChan').click(function() {
            if($('.inpPwd').val() == ''){
                $(this).parent().next('.prompt').html('密码不能为空哦~');
            }else{
                $(this).parent().next('.prompt').html('');
                $('.inpPwd').attr('readonly', 'readonly').css('border', 'none');
                $(this).hide();
                $('.getCode').hide();
                $('.change2').show();
            }
        });
		
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