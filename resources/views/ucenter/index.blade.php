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
				<a href="javascript:;" class="fl avatar">
                    @if(Request::user()->userpicture == '')
                        <img id="avatar" src="/img/avatar.png" />
                    @else
                        <img id="avatar" src="{{Request::user()->userpicture}}" />
                    @endif
                    <input id="fileupload2" type="file" name="files[]" data-url="{{url('/ucenter/upload')}}" multiple accept="image/png, image/gif, image/jpg, image/jpeg">
                </a>
				<div class="fl primInfo">
					<div class="phoneNumber"><strong>手机号：</strong>{{Request::user()->phonenumber}}</div>
                    <div class="userName"><strong>用户名：</strong><input type="text" class="inpName" value="{{Request::user()->username}}" readonly="readonly" /><a href="javascript:;" class="green change1">修改</a><a href="javascript:;" class="red nameChan">确定</a></div>
                    <div class="prompt"></div>
                    <div class="userPwd getCode"><strong>验证码：</strong><input type="text" class="codetest" /><input type="button" class="get" value="获取验证码" id="getSmsCode"/></div>
                    <div class="prompt"></div>
                    <div class="userPwd originPwd"><strong>密<em>码</em>：</strong><input type="password" value="******" readonly="readonly" class="inpPwd" /><a href="javascript:;" class="green change2">修改</a><a href="javascript:;" class="red pwdChan">确定</a></div>
                    <div class="prompt"></div>
				</div>
			</div>
<!-- 图片上传 -->
<script src="{{asset('/org/jqupload/js/jquery.ui.widget.js')}}"></script>
<script src="{{asset('/org/jqupload/js/jquery.fileupload.js')}}"></script>
<script src="{{asset('/org/jqupload/js/jquery.iframe-transport.js')}}"></script>
<script src="{{asset('/org/jqupload/js/jquery.fileupload-process.js')}}"></script>
<script src="{{asset('/org/jqupload/js/jquery.fileupload-validate.js')}}"></script>
<script type="text/javascript">
$(function () {
    $('#fileupload').fileupload({
        dataType: 'json',
        maxFileSize: 1 * 1024 * 1024,
        done: function (e, data) {
            $.each(data.result.files, function (index, file) {
                $("#thumb").attr('src',file.url).show();
                var IDCard = '/uploads/images/'+file.name;
                $('#IDCard').val(IDCard);
            });
        }
    });
    $('#fileupload1').fileupload({
        dataType: 'json',
        maxFileSize: 1 * 1024 * 1024,
        done: function (e, data) {
            $.each(data.result.files, function (index, file) {
                $("#thumb1").attr('src',file.url).show();
                var Deposit = '/uploads/images/'+file.name;
                $('#Deposit').val(Deposit);
            });
        }
    });
    $('#fileupload2').fileupload({
        dataType: 'json',
        maxFileSize: 1 * 1024 * 1024,
        done: function (e, data) {
            $.each(data.result.files, function (index, file) {
                var userpicture = '/uploads/images/'+file.name;
                $.ajax({
                    url: "{{url('/ucenter/chuserpicture')}}",
                    data: {'userpicture': userpicture, 'userid': "{{Request::user()->userid}}"},
                    type: 'POST',
                    dataType: 'json',
                    success: function (msg) {
                        var json = eval(msg);
                        if (json.status_code == '409') {
                            layer.alert('修改头像失败，请刷新重试！');
                        } else if (json.status_code == '200') {
                            layer.msg('头像修改成功！');
                            $('#avatar').attr('src',file.url);
                        }
                    }
                });
            });
        }
    });
});
</script>
<!-- 图片上传 -->
            <div class="assure">
                <h3 class="cert">保证金认证</h3>
                <div class="photo clearfix">
                    @if(Request::user()->idcardpicture != '')
                    <div class="rect fl"><img id="thumb" src="{{url(Request::user()->idcardpicture)}}" /></div><!-- 上传的图片摆放位置 -->
                    @else
                    <div class="rect fl"><img id="thumb" src="/img/zhanwei.png" /></div><!-- 上传的图片摆放位置 -->
                    @endif
                        <div class="explain fl">
                        <div class="wordIntro">认证说明：<span>请上传身份证正面照片</span></div>
                        <span class="sub fileinput-button">
                            <span>点击上传</span>
                            <input id="fileupload" type="file" name="files[]" data-url="{{url('/ucenter/upload')}}" multiple accept="image/png, image/gif, image/jpg, image/jpeg">
                        </span>
                    </div>
                </div>
                <div class="photo clearfix">
                    @if(Request::user()->depositpicture != '')
                    <div class="rect fl"><img id="thumb1" src="{{url(Request::user()->depositpicture)}}" /></div><!-- 上传的图片摆放位置 -->
                    @else
                    <div class="rect fl"><img id="thumb1" src="/img/zhanwei.png" /></div><!-- 上传的图片摆放位置 -->
                    @endif
                    <div class="explain fl">
                        <div class="wordIntro">认证说明：<span>请上传打印凭证图片，管理员确认后，给予认证通过</span></div>
                        <span class="sub fileinput-button">
                            <span>点击上传</span>
                            <input id="fileupload1" type="file" name="files[]" data-url="{{url('/ucenter/upload')}}" multiple accept="image/png, image/gif, image/jpg, image/jpeg">

                        </span>
                    </div>
                </div>
                @if(Request::user()->certifystate == 10)
                <button class="certain" id="confirm">确认提交</button>
                @elseif(Request::user()->certifystate == 0)
                <button class="certain">待审核中</button>
                @elseif(Request::user()->certifystate == 1)
                <button class="certain">审核通过</button>
                @elseif(Request::user()->certifystate == 2)
                <button class="certain">保证金冻结</button>
                @elseif(Request::user()->certifystate == 9)
                <button class="certain" id="confirm">重新提交</button>
                @endif
            </div>
        </div>
    </div>
    <form>
        <input type="hidden" name="idcardpicture" id="IDCard" value="">
        <input type="hidden" name="depositpicture" id="Deposit" value="">
        <input type="hidden" name="phonenumber" id="phonenumber" value="{{Request::user()->phonenumber}}">
        <input type="hidden" name="userid" id="userid" value="{{Request::user()->userid}}">
        {!! csrf_field() !!}}
    </form>
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
            var _this = this;
            if($('.inpName').val() == ''){
                $(this).parent().next('.prompt').html('请输入用户名');
                return false;
            }else if($('.inpName').val().length > 16){
                $(this).parent().next('.prompt').html('用户名不能超过16个字哦~');
                return false;
            }else{
                var username = $('.inpName').val();
                $.ajax({
                    url : "{{url('/ucenter/chusername')}}",
                    data : {'username' : username, 'userid' : "{{Request::user()->userid}}"},
                    type : 'POST',
                    dataType : 'json',
                    success : function(msg){
                        var json = eval(msg);
                        if(json.status_code == '419'){
                            layer.alert('此昵称已被其他用户抢注，请修改');
                        } else if(json.status_code == '200'){
                            $(_this).parent().next('.prompt').html('');
                            $('.inpName').attr('readonly', 'readonly').css('border', 'none');
                            $(_this).hide();
                            $('.inpName').width(textWidth($('.inpName').val()));
                            $('.change1').show();
                        } else if(json.status_code == '420'){
                            layer.alert('未知错误，请稍后重试');
                        }
                    }
                });
            }
        });
        var wait=60;
        function time() {
            var o = document.getElementById("getSmsCode");
            if (wait == 0) {
                o.removeAttribute("disabled");
                o.value = "获取验证码";
                wait = 60;
            } else {
                o.setAttribute("disabled", true);
                o.value = wait + "秒";
                wait--;
                setTimeout(function() {
                    time(o)
                },
                1000)
            }
        }
        $('#getSmsCode').click(function(){
            $.ajax({
                url:"{{url('/smscode')}}",
                type:"POST",
                data:{"phonenumber":"{{Request::user()->phonenumber}}","action":"login","_token":"{{csrf_token()}}"},
                dataType:"json",
                success:function(msg){
                    if(msg.status_code == 200){
                        $(".get_test").attr('disabled',true);
                        layer.alert('发送验证码成功,请注意查收！');
                        time();
                    }else{
                        layer.alert('发送验证码失败，请稍后重试！');
                    }
                }
            });
        });

        $('#confirm').click(function(){
            if($('#IDCrad').val() == ''){
                layer.alert('请上传身份证正面照！');
                return false;
            }

            if($('#Deposit').val() == ''){
                layer.alert('请上传保证金打款凭证！');
                return false;
            }
            var data = $('form').serialize();
            $.ajax({
                url : "{{url('/ucenter/confirm')}}",
                data : data,
                type : 'POST',
                dataType : 'json',
                error: function(){
                  layer.alert('网络异常，请刷新重试！');
                },
                success : function(msg){
                    var json = eval(msg);
                    if(json.status_code == '200'){
                        layer.alert('提交成功');
//                        window.location.reload();
                    } else if(json.status_code == "409"){
                        layer.alert("提交失败，请稍候重试！");
                    } else {
                        layer.alert('未知错误，请稍后重试！');
                    }
                }
            });
        });

        $('.codetest').blur(function() {
            if($('.codetest').val()==''){
                $(this).parent().next('.prompt').html('验证码不能为空哦~');
            }else{
                $(this).parent().next('.prompt').html('');
            }
        });
        $('.change2').click(function() {
            $('.inpPwd').val('');
            $(this).hide();
            $('.getCode').show();
            $('.inpPwd').removeAttr('readonly').css('border', '1px solid #ccc');
            $('.pwdChan').show();
        });
        $('.pwdChan').click(function() {
            var _this = this;
            if($('.inpPwd').val() == ''){
                $(this).parent().next('.prompt').html('密码不能为空哦~');
            }else if($('.inpPwd').val().length > 16 || $('.inpPwd').val().length < 6){
                $(this).parent().next('.prompt').html('密码长度为6-16位！');
            }else{
                $.ajax({
                    url : "{{url('/ucenter/chpassword')}}",
                    data : {'smscode' : $('.codetest').val(),'password' : $('inpPwd').val(), 'userid' : "{{Request::user()->userid}}", 'phonenumber' : $('#phonenumber').val()},
                    type : 'POST',
                    dataType : 'json',
                    success : function(msg){
                        var json = eval(msg);
                        if(json.status_code == '200'){
                            layer.alert('密码修改成功！');
                            $(_this).parent().next('.prompt').html('');
                            $('.inpPwd').attr('readonly', 'readonly').css('border', 'none');
                            $(_this).hide();
                            $('.getCode').hide();
                            $('.change2').show();
                        } else if(json.status_code == "404"){
                            layer.alert("手机验证码错误，请填写正确的验证码！");
                        } else {
                            layer.alert('未知错误，请稍后重试');
                        }
                    }
                });
            }
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
@endsection('js')