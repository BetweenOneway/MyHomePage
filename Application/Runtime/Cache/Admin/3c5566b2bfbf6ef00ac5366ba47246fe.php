<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>导航 - 登录</title>
        <link rel="stylesheet" href="/APP/Public/css/bootstrap.min.css">
        <link rel="stylesheet" href="/APP/Public/font-awesome/css/font-awesome.css">
        <link rel="stylesheet" href="__public__/css/animate.css">
        <link rel="stylesheet" href="/APP/Public/css/admin-style.css">
        <script src="/APP/Public/js/jQuery-2.1.1.min.js"></script>
        <script src="/APP/Public/static/layer/layer.js"></script>
    </head>

    <body class="gray-bg">
        <div>
            <h1 class="logo-name text-center">WangWei</h1>
        </div>
        <div class="middle-box text-center loginscreen animate fadeInDown">
            <h3>欢迎使用导航管理后台</h3>
            <form id="form" name="form" method="POST" autocomplete="off">
                <div class="form-group">
                    <input name="username" type="text" class="form-control" placeholder="用户名">
                    <input name="password" type="password" class="form-control" placeholder="密码">
                </div>
                <div class="form-group login">
                    <span>验证码</span>
                    <input name="" style="width: 110px" type="text" id="code"/>
                    <a>
                        <!--这里onclick的代码本身无意义不调用任何函数，只是告诉浏览器图片链接发生了变化，图片需要刷新-->
                        <img class="reloadverify" id="imgcode" src="<?php echo U('verify');?>" onclick="this.src=this.src+'?'+Math.random()"/>
                    </a>
                </div>
                <button type="submit" class="btn btn-primary btn-block">登录</button>
            </form>
            
            <p class="text-muted text-center"> <a href="login.html#"><small>忘记密码</small></a> | <a href="register.html">注册一个新账号</a>
        </div>
        <script>
            $('form').submit(function(){
                var username = $("input[name='username']").val();
                var password = $("input[name='password']").val();
                var code = $("#code").val();
                if(!username)
                {
                    layer.msg('用户名不能为空！',{time:2000});
                    return false;    
                }
                if(!password)
                {
                    layer.msg('密码不能为空',{time:2000});
                    return false;
                }
                if(!code)
                {
                    layer.msg('验证码不能为空',{time:2000});
                    return false;
                }
                var url="<?php echo U('checkLogin');?>";//$(this).attr('action');
                $.ajax({
                    type:"post",
                    url:url,
                    data:{username:username,password:password,code:code},
                    success:function(res){
                        if(res.status)
                        {
                            layer.msg(res.message,{time:1000},function(){
                                window.location.href="<?php echo U('Index/index');?>";
                            })
                        }
                        else
                        {
                            $(".reloadverify").click();
                            layer.msg(res.message,{time:2000});
                        }//else
                    }//success
                });//ajax
                return false;
            });//submit
        </script>
    </body>
</html>