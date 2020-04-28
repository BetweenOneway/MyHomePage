<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="renderer" content="webkit">

<title>网站导航后台</title>
<link href="/APP/Public/css/module.css" rel="stylesheet"/>

<link href="/APP/Public/css/bootstrap.min.css?v=3.4.0" rel="stylesheet">
<link href="/APP/Public/font-awesome/css/font-awesome.css?v=4.3.0" rel="stylesheet">


<link href="/APP/Public/css/animate.css" rel="stylesheet">
<link href="/APP/Public/css/admin-style.css?v=2.2.0" rel="stylesheet">

<!-- Mainly scripts -->
<script src="/APP/Public/js/jquery-2.1.1.min.js"></script>
<script src="/APP/Public/js/bootstrap.min.js?v=3.4.0"></script>



<!--Layer-->
<script src="/APP/Public/static/layer/layer.js"></script>

<script type="text/javascript" src="/APP/Public/js/admin.js"></script>

<script src="/APP/Public/js/jquery.metisMenu.js"></script>


<!-- Custom and plugin javascript -->
<script src="/APP/Public/js/hplus.js?v=2.2.0"></script>




</head>
<body>
<div id="wrapper">
	<script>
    $(function(){
        var controller_name = "<?php echo CONTROLLER_NAME;?>";
        var nav     = $('.nav-second-level a');
        nav.each(function(){
            var url = $(this).attr('href');
            console.log(url);
            if(url.indexOf('/'+controller_name) > 0){
                $(this).parent().addClass('active');
                return false;
            }
        });
    });
</script>

<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="side-menu">
            <li class="nav-header" style="padding: 25px 20px;">
                <div class="dropdown profile-element">
                    <span>
                        <img alt="image" class="img-circle" height="60px" src="/APP/Public/images/profile_small.jpg" />
                    </span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><?php echo (session('admin_username')); ?></strong>
                         </span>  <span class="text-muted text-xs block"><?php if(($_SESSION['admin_id']) == "1"): ?>超级管理员<?php else: ?>管理员<?php endif; ?> <b class="caret"></b></span> </span>
                    </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a href="<?php echo U('Index/changePassword');?>">修改密码</a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo U('Public/logout');?>">安全退出</a>
                        </li>
                    </ul>
                </div>
                <div class="logo-element">
                    MR
                </div>
            </li>
            <li class="active">
                <a href="#"><i class="fa fa-edit" style="width: 18px"></i> <span class="nav-label">管理</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="<?php echo U('HighLevel/lists');?>">高级分类</a></li>
                    <li><a href="<?php echo U('MiddleLevel/lists');?>">中级分类</a></li>
                    <li><a href="<?php echo U('ElementaryLevel/lists');?>">初级分类</a></li>
                    <li><a href="<?php echo U('Datalist/lists');?>">数据管理</a></li>
                    <li><a href="<?php echo U('Hot/lists');?>">热门管理</a></li>
                </ul>
            </li>
        </ul>
    </div>
</nav>





	
    <div id="page-wrapper" class="gray-bg">
        index.html
        <div class="footer">
    <div class="pull-right">
        By<a href="#" target="_blank">Wang Wei</a>
    </div>
    <div>
        <strong>Copyright</strong> WangWei &copy; 2020
    </div>
</div>
    </div>

</div>
</body>
</html>