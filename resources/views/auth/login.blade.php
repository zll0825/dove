<!DOCTYPE html>
<html>
<head>
    <title>登录</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta http-equiv="content-type" content="text/html;charset=utf-8">
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="screen-orientation" content="portrait">
    <meta name="x5-orientation" content="portrait">
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <meta name="format-detection" content="telephone=no"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link rel="stylesheet" type="text/css" href="{{asset('/css/base.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('/iconfont/iconfont.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('/css/public.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('/css/logreg.css')}}" />
    <script type="text/javascript" src="{{asset('/js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/org/layer/layer.js')}}"></script>
</head>
<body>
    <div class="canvas"><canvas id="myCanvas"></canvas></div>
    <div class="loginBox">
        <div class="logTitle">
            <h2>登录<span class="noAccount">没有账号？<a href="javascript:;" class="red" id="freereg">免费注册</a></span></h2>
        </div>
        <div class="logCon">
            <div class="users"><input type="text" class="userInp" placeholder="请输入手机号" /><span class="rectang"><i class="iconfont">&#xe60b;</i></span></div>
            <div class="prompt1"></div>
            <div class="secret"><input type="password" class="pwdInp" placeholder="请输入密码" /><span class="rectang"><i class="iconfont">&#xe628;</i></span></div>
            <div class="prompt2"></div>
            <div class="forget" style="margin-bottom:20px;text-align:right"><a href="javascript:;">忘记密码</a></div>
            <button class="btnLog" id="pub">登&nbsp;&nbsp;录</button>
        </div>
    </div>
    <script type="text/javascript">

        $('#pub').click(function(){
            var phonenumber = $(".userInp").val();
            if(!(/^1[3|4|5|7|8]\d{9}$/.test(phonenumber))||$(this).val==''){
                $('.prompt1').html('手机号或用户名不能为空或者输入错误！');
                return false;
            }else{
                $('.prompt1').html('');
            }
            var password = $(".pwdInp").val();
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

        $('#freereg').click(function(){
            var index = parent.layer.getFrameIndex(window.name); //获取窗口索引
            parent.layer.open({
                type: 2,
                closeBtn: 1,
                title: null,
                area: ['300px','435px'],
                content: '{{url('/register')}}',
            }); 
            parent.layer.close(index);
        })

        $('.forget').click(function(){
            var index = parent.layer.getFrameIndex(window.name); //获取窗口索引
            parent.layer.open({
                type: 2,
                closeBtn: 1,
                title: null,
                area: ['300px','435px'],
                content: '{{url('/forget')}}',
            }); 
            parent.layer.close(index);
        })

//canvas
        var canvasPage3 = document.getElementById("myCanvas");
        var log = document.querySelector('.canvas').offsetWidth;
        var wd=parseInt(log);
        canvasPage3.width = wd;
        canvasPage3.height = 64;
        var ctx = canvasPage3.getContext("2d");
        var zhongX = wd/2;
        var zhongY = 32;
        function randomNum(x,y)
        {
            return Math.floor(Math.random() * (y - x + 1) + x);
        }

        function randomColor() {
            return "rgb(" + randomNum(0, 255) + "," + randomNum(0, 255) + "," + randomNum(0, 255) + ")";
        }

        function Ball() {
            this.r = randomNum(0.1, 3);
            this.color = "white";

            this.x = randomNum(this.r, canvasPage3.width - this.r);
            this.y = randomNum(this.r, canvasPage3.height - this.r);

            this.speedX = randomNum(1, 3) * (randomNum(0, 1) ? 1 : -1);
            this.speedY = randomNum(1, 3) * (randomNum(0, 1) ? 1 : -1);
        }

        Ball.prototype.move = function () {
            this.x += this.speedX*0.2;
            this.y += this.speedY*0.2;

            if(this.x<=this.r)
            {
                this.x = this.r;
                this.speedX *= -1;
            }
            if(this.x>=canvasPage3.width -this.r)
            {
                this.x = canvasPage3.width - this.r
                this.speedX *= -1;
            }
            //小球碰到上边界的处理 反弹
            if (this.y <= this.r) {
                this.y = this.r;
                //反弹
                this.speedY *= -1;
            }
            //小球碰到下边界的处理 反弹
            if (this.y >= canvasPage3.height - this.r) {
                this.y = canvasPage3.height - this.r;
                //反弹
                this.speedY *= -1;
            }
        }

        Ball.prototype.draw = function () {
            ctx.beginPath();
            ctx.arc(this.x, this.y, this.r, 0, Math.PI * 2, false);
            ctx.fillStyle = this.color;
            ctx.fill();
        }

        var balls = [];
        var arr = [];
        for (var i = 0; i < 0.0002 * canvasPage3.width * canvasPage3.height; i++) {
            var ball = new Ball();
            balls.push(ball);
        }

        setInterval(function () {
            arr = [];
            ctx.clearRect(0, 0, canvasPage3.width, canvasPage3.height);
            for (var i = 0; i < balls.length; i++) {
                balls[i].move();
                balls[i].draw();
                if (ballAndMouse(balls[i]) < 130) {
                    ctx.lineWidth = (130 - ballAndMouse(balls[i])) * 1.5 / 130;
                    ctx.beginPath();
                    ctx.moveTo(balls[i].x, balls[i].y);
                    ctx.lineTo(zhongX, zhongY);
                    ctx.strokeStyle = balls[i].color;
                    ctx.stroke();
                }
            }


            for (var i = 0; i < balls.length; i++) {
                for (var j = 0; j < balls.length; j++) {
                    if (ballAndBall(balls[i], balls[j]) < 80) {
                        ctx.lineWidth = (80 - ballAndBall(balls[i], balls[j])) * 0.6 / 80;
                        ctx.globalAlpha = (130 - ballAndBall(balls[i], balls[j])) * 1 / 80;
                        ctx.beginPath();
                        ctx.moveTo(balls[i].x, balls[i].y);
                        ctx.lineTo(balls[j].x, balls[j].y);
                        ctx.strokeStyle = balls[i].color;
                        ctx.stroke();
                    }
                }
            }
            ctx.globalAlpha = 1.0;

        }, 30);

        canvasPage3.onmousemove = function (event) {
            event = event || window.event;
            zhongX = event.offsetX;
            zhongY = event.offsetY;
        }

        function ballAndMouse(obj) {
            var disX = Math.abs(zhongX - obj.x);
            var disY = Math.abs(zhongY - obj.y);
            return Math.sqrt(disX * disX + disY * disY);
        }
        function ballAndBall(obj1, obj2) {
            var disX = Math.abs(obj1.x - obj2.x);
            var disY = Math.abs(obj1.y - obj2.y);
            return Math.sqrt(disX * disX + disY * disY);
        }

    </script>
</body>
</html>
