<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title> - 个人资料</title>
    <meta name="keywords" content="">
    <meta name="description" content="">

    <link rel="shortcut icon" href="/Public/Common/favicon.ico"> <link href="/Public/Common/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <link href="/Public/Common/css/font-awesome.css?v=4.4.0" rel="stylesheet">
    <link href="/Public/Common/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="/Public/Common/css/animate.css" rel="stylesheet">
    <link href="/Public/Common/css/style.css?v=4.1.0" rel="stylesheet">
    <link href="/Public/Common/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">

</head>

<body class="gray-bg">
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>个人资料- <small>修改个人资料</small></h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="form_basic.html#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="form_basic.html#">选项1</a>
                                </li>
                                <li><a href="form_basic.html#">选项2</a>
                                </li>
                            </ul>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <form method="get" class="form-horizontal">
							<div class="form-group">
								<label class="col-sm-2 control-label">用户名</label>

								<div class="col-sm-10">
									<p class="form-control-static"><?php echo ($_SESSION['uinfo']['user_name']); ?></p>
								</div>
							</div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">昵称</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="<?php echo ($_SESSION['uinfo']['user_nickname']); ?>">
                                </div>
                            </div>

							<div class="hr-line-dashed"></div>
							<div class="form-group">
								<label class="col-sm-2 control-label">地址</label>
								<div class="col-sm-10">
									<select data-placeholder="请选择一个省份" class="chosen-select from-control" style="width:350px;height:30px;" tabindex="2">
										<option value="">请选择省份</option>
										<option value="United States">United States</option>
										<option value="United Kingdom">United Kingdom</option>
										<option value="Afghanistan">Afghanistan</option>
										<option value="Aland Islands">Aland Islands</option>
										<option value="Cape Verde">Cape Verde</option>
										<option value="Netherlands">Netherlands</option>
										<option value="Peru">Peru</option>
										<option value="Philippines">Philippines</option>
										<option value="Saint Lucia">Saint Lucia</option>
										<option value="Turkmenistan">Turkmenistan</option>
									</select>
								</div>
							</div>

                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">个人介绍</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control"> <span class="help-block m-b-none">将会显示在您的主页上</span>
                                </div>
                            </div>

							<div class="hr-line-dashed"></div>
							<div class="form-group">
								<label class="col-sm-2 control-label">邮箱地址</label>

								<div class="col-sm-10">
									<div class="input-group">
										<input type="text" disabled="" value="<?php echo ($_SESSION['uinfo']['user_email']); ?>" placeholder="未填写" class="form-control">
										<span class="input-group-btn">
											<?php if($_SESSION['uinfo']['user_check']== 0): ?><button type="button" class="btn btn-primary">未验证，点击验证
												</button>
											<?php else: ?>
												<button type="button" class="btn btn-success">已验证
												</button><?php endif; ?>

										</span>
									</div>
								</div>
							</div>

							<div class="hr-line-dashed"></div>
							<div class="form-group">
								<label class="col-sm-2 control-label">手机号</label>

								<div class="col-sm-10">
									<div class="input-group">
										<input type="text" disabled="" value="<?php echo ($_SESSION['uinfo']['user_tel']); ?>" placeholder="未填写" class="form-control">
										<span class="input-group-btn">
											<?php if($_SESSION['uinfo']['tel']== NULL): ?><button type="button" class="btn btn-default">填写
												</button><?php endif; ?>
											<?php if($_SESSION['uinfo']['telcheck']== 1): ?><button type="button" class="btn btn-primary">未验证，点击验证
												</button><?php endif; ?>
											<?php if($_SESSION['uinfo']['telcheck']== 2): ?><button type="button" class="btn btn-success">已验证
												</button><?php endif; ?>

										</span>
									</div>
									
								</div>
							</div>

							<div class="hr-line-dashed"></div>
							<div class="form-group">
								<label class="col-sm-2 control-label">性别</label>
								<div class="col-sm-10">
									<div class="radio  radio-inline">

											<input type="radio" id="nan" value="option1" name="sex"> <label for="nan">男</label>
									</div>
									<div class="radio  radio-inline">

											<input type="radio" id="nv" value="option2" name="sex"> <label for="nv">女</label>
									</div>
									<div class="radio  radio-inline">

											<input type="radio" id="mi" value="option2" name="sex"> <label for="mi">保密</label>
									</div>
									<div class="radio radio-danger">
										<input type="radio" name="radio2" id="radio3" value="option1">
										<label for="radio3">
											文本 03
										</label>
									</div>
									<div class="radio radio-danger">
										<input type="radio" name="radio2" id="radio4" value="option2" checked="">
										<label for="radio4">
											文本 04
										</label>
									</div>
								</div>
							</div>

                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">密码</label>

                                <div class="col-sm-10">
                                    <input type="password" class="form-control" name="password">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">提示</label>

                                <div class="col-sm-10">
                                    <input type="text" placeholder="提示信息" class="form-control">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">禁用</label>

                                <div class="col-sm-10">
                                    <input type="text" disabled="" placeholder="已被禁用" class="form-control">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">静态控制</label>

                                <div class="col-sm-10">
                                    <p class="form-control-static">497915773@qq.com</p>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">复选框&amp;单选框
                                    <br/>
                                    <small class="text-navy">普通Bootstrap元素</small>
                                </label>

                                <div class="col-sm-10">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" value="">选项1</label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" checked="" value="option1" id="optionsRadios1" name="optionsRadios">选项1</label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" value="option2" id="optionsRadios2" name="optionsRadios">选项2</label>
                                    </div>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">内联复选框</label>

                                <div class="col-sm-10">
                                    <label class="checkbox-inline">
                                        <input type="checkbox" value="option1" id="inlineCheckbox1">a</label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" value="option2" id="inlineCheckbox2">b</label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" value="option3" id="inlineCheckbox3">c</label>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">复选框&amp;单选框
                                    <br/><small class="text-navy">自定义样式</small>
                                </label>

                                <div class="col-sm-10">
                                    <div class="checkbox i-checks">
                                        <label>
                                            <input type="checkbox" value=""> <i></i> 选项1</label>
                                    </div>
                                    <div class="checkbox i-checks">
                                        <label>
                                            <input type="checkbox" value="" checked=""> <i></i> 选项2（选中）</label>
                                    </div>
                                    <div class="checkbox i-checks">
                                        <label>
                                            <input type="checkbox" value="" disabled="" checked=""> <i></i> 选项3（选中并禁用）</label>
                                    </div>
                                    <div class="checkbox i-checks">
                                        <label>
                                            <input type="checkbox" value="" disabled=""> <i></i> 选项4（禁用）</label>
                                    </div>
                                    <div class="radio i-checks">
                                        <label>
                                            <input type="radio" value="option1" name="a"> <i></i> 选项1</label>
                                    </div>
                                    <div class="radio i-checks">
                                        <label>
                                            <input type="radio" checked="" value="option2" name="a"> <i></i> 选项2（选中）</label>
                                    </div>
                                    <div class="radio i-checks">
                                        <label>
                                            <input type="radio" disabled="" checked="" value="option2"> <i></i> 选项3（选中并禁用）</label>
                                    </div>
                                    <div class="radio i-checks">
                                        <label>
                                            <input type="radio" disabled="" name="a"> <i></i> 选项4（禁用）</label>
                                    </div>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">内联复选框</label>

                                <div class="col-sm-10">
                                    <label class="checkbox-inline i-checks">
                                        <input type="checkbox" value="option1">a</label>
                                    <label class="checkbox-inline i-checks">
                                        <input type="checkbox" value="option2">b</label>
                                    <label class="checkbox-inline i-checks">
                                        <input type="checkbox" value="option3">c</label>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Select</label>

                                <div class="col-sm-10">
                                    <select class="form-control m-b" name="account">
                                        <option>选项 1</option>
                                        <option>选项 2</option>
                                        <option>选项 3</option>
                                        <option>选项 4</option>
                                    </select>

                                    <div class="col-sm-4 m-l-n">
                                        <select class="form-control" multiple="">
                                            <option>选项 1</option>
                                            <option>选项 2</option>
                                            <option>选项 3</option>
                                            <option>选项 4</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group has-success">
                                <label class="col-sm-2 control-label">验证通过</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group has-warning">
                                <label class="col-sm-2 control-label">未填写</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group has-error">
                                <label class="col-sm-2 control-label">验证未通过</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">自定义尺寸</label>

                                <div class="col-sm-10">
                                    <input type="text" placeholder=".input-lg" class="form-control input-lg m-b">
                                    <input type="text" placeholder="Default input" class="form-control m-b">
                                    <input type="text" placeholder=".input-sm" class="form-control input-sm">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">列尺寸</label>

                                <div class="col-sm-10">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <input type="text" placeholder=".col-md-2" class="form-control">
                                        </div>
                                        <div class="col-md-3">
                                            <input type="text" placeholder=".col-md-3" class="form-control">
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" placeholder=".col-md-4" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">文本框组</label>

                                <div class="col-sm-10">
                                    <div class="input-group m-b"><span class="input-group-addon">@</span>
                                        <input type="text" placeholder="用户名" class="form-control">
                                    </div>
                                    <div class="input-group m-b">
                                        <input type="text" class="form-control"> <span class="input-group-addon">.00</span>
                                    </div>
                                    <div class="input-group m-b"><span class="input-group-addon">&yen;</span>
                                        <input type="text" class="form-control"> <span class="input-group-addon">.00</span>
                                    </div>
                                    <div class="input-group m-b"><span class="input-group-addon"> <input type="checkbox"> </span>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="input-group"><span class="input-group-addon"> <input type="radio"> </span>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">按钮插件</label>

                                <div class="col-sm-10">
                                    <div class="input-group m-b"><span class="input-group-btn">
                                            <button type="button" class="btn btn-primary">搜</button> </span>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="input-group">
                                        <input type="text" class="form-control"> <span class="input-group-btn"> <button type="button" class="btn btn-primary">搜索
                                        </button> </span>
                                    </div>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">带下拉框</label>

                                <div class="col-sm-10">
                                    <div class="input-group m-b">
                                        <div class="input-group-btn">
                                            <button data-toggle="dropdown" class="btn btn-white dropdown-toggle" type="button">操作 <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a href="form_basic.html#">选项1</a>
                                                </li>
                                                <li><a href="form_basic.html#">选项2</a>
                                                </li>
                                                <li><a href="form_basic.html#">选项3</a>
                                                </li>
                                                <li class="divider"></li>
                                                <li><a href="form_basic.html#">选项4</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="input-group">
                                        <input type="text" class="form-control">

                                        <div class="input-group-btn">
                                            <button data-toggle="dropdown" class="btn btn-white dropdown-toggle" type="button">操作 <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu pull-right">
                                                <li><a href="form_basic.html#">选项1</a>
                                                </li>
                                                <li><a href="form_basic.html#">选项2</a>
                                                </li>
                                                <li><a href="form_basic.html#">选项3</a>
                                                </li>
                                                <li class="divider"></li>
                                                <li><a href="form_basic.html#">选项4</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">分段</label>

                                <div class="col-sm-10">
                                    <div class="input-group m-b">
                                        <div class="input-group-btn">
                                            <button tabindex="-1" class="btn btn-white" type="button">操作</button>
                                            <button data-toggle="dropdown" class="btn btn-white dropdown-toggle" type="button"><span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a href="form_basic.html#">选项1</a>
                                                </li>
                                                <li><a href="form_basic.html#">选项2</a>
                                                </li>
                                                <li><a href="form_basic.html#">选项3</a>
                                                </li>
                                                <li class="divider"></li>
                                                <li><a href="form_basic.html#">选项4</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="input-group">
                                        <input type="text" class="form-control">

                                        <div class="input-group-btn">
                                            <button tabindex="-1" class="btn btn-white" type="button">操作</button>
                                            <button data-toggle="dropdown" class="btn btn-white dropdown-toggle" type="button"><span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu pull-right">
                                                分段
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-2">
                                    <button class="btn btn-primary" type="submit">保存内容</button>
                                    <button class="btn btn-white" type="submit">取消</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="modal-form" class="modal fade" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-6 b-r">
                            <h3 class="m-t-none m-b">登录</h3>
                            <form role="form">
                                <div class="form-group">
                                    <label>用户名：</label>
                                    <input type="email" placeholder="请输入用户名" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>密码：</label>
                                    <input type="password" placeholder="请输入密码" class="form-control">
                                </div>
                                <div>
                                    <button class="btn btn-sm btn-primary pull-right m-t-n-xs" type="submit"><strong>登录</strong>
                                    </button>
                                    <label>
                                        <input type="checkbox" class="i-checks">自动登录</label>
                                </div>
                            </form>
                        </div>
                        <div class="col-sm-6">
                            <h4>还不是会员？</h4>
                            <p>您可以注册一个账户</p>
                            <p class="text-center">
                                <a href="form_basic.html"><i class="fa fa-sign-in big-icon"></i></a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- 全局js -->
    <script src="/Public/Common/js/jquery.min.js?v=2.1.4"></script>
    <script src="/Public/Common/js/bootstrap.min.js?v=3.3.6"></script>

    <!-- 自定义js -->
    <script src="/Public/Common/js/content.js?v=1.0.0"></script>

    <!-- iCheck -->
    <script src="/Public/Common/js/plugins/iCheck/icheck.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });
        });
    </script>

    
    

</body>

</html>