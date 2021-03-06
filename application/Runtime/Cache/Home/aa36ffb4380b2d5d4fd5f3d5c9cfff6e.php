<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="renderer" content="webkit">

    <title> SS- 主页</title>

    <meta name="keywords" content="">
    <meta name="description" content="">

    <!--[if lt IE 9]>
    <meta http-equiv="refresh" content="0;ie.html" />
    <![endif]-->

    <link rel="shortcut icon" href="favicon.ico"> <link href="/Public/Common/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <link href="/Public/Common/css/font-awesome.min.css?v=4.4.0" rel="stylesheet">
    <link href="/Public/Common/css/animate.css" rel="stylesheet">
    <link href="/Public/Common/css/style.css?v=4.1.0" rel="stylesheet">
</head>

<body class="fixed-sidebar full-height-layout gray-bg" style="overflow:hidden">
    <div id="wrapper">
        <!--左侧导航开始-->
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="nav-close"><i class="fa fa-times-circle"></i>
            </div>
            <div class="sidebar-collapse">
                <ul class="nav" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <span class="clear">
                                    <span class="block m-t-xs" style="font-size:20px;">
                                        <i class="fa fa-area-chart"></i>
                                        <strong class="font-bold">SS</strong>
                                    </span>
                                </span>
                            </a>
                        </div>
                        <div class="logo-element">SS
                        </div>
                    </li>
                    <li>
                        <a class="J_menuItem" href="<?php echo U('Index/index');?>">
                            <i class="fa fa-home"></i>
                            <span class="nav-label">主页</span>
                        </a>
                    </li>
                    <li>
                        <a href="./Email/mailbox.html"><i class="fa fa-envelope"></i> <span class="nav-label">信箱 </span><span class="label label-warning pull-right">16</span></a>
                        <ul class="nav nav-second-level">
                            <li><a class="J_menuItem" href="./Email/mailbox.html">收件箱</a>
                            </li>
                            <li><a class="J_menuItem" href="./Email/mail_detail.html">查看邮件</a>
                            </li>
                            <li><a class="J_menuItem" href="./Email/mail_compose.html">写信</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                       <a href="#"><i class="fa fa-desktop"></i> <span class="nav-label">项目管理</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a class="J_menuItem" href="./Project/projects.html">项目目录</a>
                            </li>
                            <li>
                                <a href="#">项目详情 <span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li><a class="J_menuItem" href="./Project/project_detail.html">项目详情</a>
                                    </li>
                                </ul>
                            </li>                            
                        </ul>
                    </li>
                    <li>
                       <a href="#"><i class="fa fa-desktop"></i> <span class="nav-label">社交</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a class="J_menuItem" href="./Social/contacts.html">联系人</a>
                            </li>
                            <li><a class="J_menuItem" href="<?php echo U('User/myIndex/');?>">个人资料</a>
                            </li>
                            <li><a class="J_menuItem" href="<?php echo U('User/smsgIndex');?>">好友动态</a>
                            </li>
                            <li><a class="J_menuItem" href="<?php echo U('Chat/index');?>">即时聊天</a>
                            </li>
                            <li><a class="J_menuItem" href="./Social/calendar.html">日历</a>
                            </li>
                            <li>
                                <a href="#">博客 <span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li><a class="J_menuItem" href="./Social/blog/blog.html">文章列表</a>
                                    </li>
                                    <li><a class="J_menuItem" href="./Social/blog/article.html">文章详情</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a class="J_menuItem" href="./Forum/forum_main.html"><i class="fa fa-magic"></i> <span class="nav-label">论坛</span></a>
                    </li>
                </ul>
            </div>
        </nav>
        <!--左侧导航结束-->
        <!--右侧部分开始-->
        <div id="page-wrapper" class="gray-bg dashbard-1">
            <div class="row border-bottom">
                <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header"><a class="navbar-minimalize minimalize-styl-2 btn btn-info " href="#"><i class="fa fa-bars"></i> </a>
                        <form name="search" class="navbar-form-custom" method="post" action="<?php echo U('Search/searchUser');?>">
                            <div class="form-group">
                                <input type="text" placeholder="请输入您需要查找的内容 …" class="form-control" name="top-search" id="top-search" > 
                                <!-- <input type='button' class="form-control"></input>  -->
                            </div>
                        </form>
                    </div>
                    <ul class="nav navbar-top-links navbar-right" >
                        <li class="dropdown">
                            <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#" id="logout">
                                退出
                                <!-- <i class="fa fa-pencil-square" ></i> <span class="label label-warning"></span> -->
                            </a>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                                <i class="fa fa-envelope"></i> <span class="label label-warning">16</span>
                            </a>
                            <ul class="dropdown-menu dropdown-messages">
                                <li class="m-t-xs">
                                    <div class="dropdown-messages-box">
                                        <a href="profile.html" class="pull-left">
                                            <img alt="image" class="img-circle" src="img/a7.jpg">
                                        </a>
                                        <div class="media-body">
                                            <small class="pull-right">46小时前</small>
                                            <strong>小四</strong> 是不是只有我死了,你们才不骂爵迹
                                            <br>
                                            <small class="text-muted">3天前 2014.11.8</small>
                                        </div>
                                    </div>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <div class="dropdown-messages-box">
                                        <a href="profile.html" class="pull-left">
                                            <img alt="image" class="img-circle" src="img/a4.jpg">
                                        </a>
                                        <div class="media-body ">
                                            <small class="pull-right text-navy">25小时前</small>
                                            <strong>二愣子</strong> 呵呵
                                            <br>
                                            <small class="text-muted">昨天</small>
                                        </div>
                                    </div>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <div class="text-center link-block">
                                        <a class="J_menuItem" href="mailbox.html">
                                            <i class="fa fa-envelope"></i> <strong> 查看所有消息</strong>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                                <i class="fa fa-bell"></i> <span class="label label-primary">8</span>
                            </a>
                            <ul class="dropdown-menu dropdown-alerts">
                                <li>
                                    <a href="mailbox.html">
                                        <div>
                                            <i class="fa fa-envelope fa-fw"></i> 您有16条未读消息
                                            <span class="pull-right text-muted small">4分钟前</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="profile.html">
                                        <div>
                                            <i class="fa fa-qq fa-fw"></i> 3条新回复
                                            <span class="pull-right text-muted small">12分钟钱</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <div class="text-center link-block">
                                        <a class="J_menuItem" href="notifications.html">
                                            <strong>查看所有 </strong>
                                            <i class="fa fa-angle-right"></i>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="row J_mainContent" id="content-main">
                <iframe id="J_iframe" width="100%" height="100%" src="<?php echo U('Index/index');?>" frameborder="0" data-id="index_v1.html" seamless></iframe>
            </div>
        </div>
        <!--右侧部分结束-->
    </div>

    <!-- 全局js -->
    <script src="/Public/Common/js/jquery.min.js?v=2.1.4"></script>
    <script src="/Public/Common/js/bootstrap.min.js?v=3.3.6"></script>
    <script src="/Public/Common/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="/Public/Common/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="/Public/Common/js/plugins/layer/layer.min.js"></script>

    <!-- 自定义js -->
    <script src="/Public/Common/js/hAdmin.js?v=4.1.0"></script>
    <script type="text/javascript" src="/Public/Common/js/index.js"></script>

    <!-- 第三方插件 -->
    <!--<script src="/Public/Common/js/plugins/pace/pace.min.js"></script>-->
    <script type="text/javascript">
        //添加状态
//        $('#smsgAdd').click(function(){
//            location.href = "<?php echo U('User/smsgAdd');?>";
//        });
        //退出登录
        $('#logout').click(function(){
            location.href = "<?php echo U('Login/logOut');?>";
        });
    </script>
<div style="text-align:center;">
</div>
</body>

</html>