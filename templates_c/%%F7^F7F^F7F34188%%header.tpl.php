<?php /* Smarty version 2.6.26, created on 2012-08-25 05:22:38
         compiled from header.tpl */ ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="gbk">
		<title>Zerxon</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="编程小型讨论区,programing - zerxon">
		<link href="/css/bootstrap.min.css" rel="stylesheet">
		<link href="/css/global.css" rel="stylesheet">
		<link href="/css/bootstrap-responsive.css" rel="stylesheet">
		<link rel="shortcut icon" href="/ico/favicon.ico">
	</head>

<body>
	<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
      <div class="container">
        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </a>
        <a class="brand" href="/">Zerxon</a>
        <div class="nav-collapse">
          <ul class="nav">
            <li <?php if ($this->_tpl_vars['LOCATE'] == 'index'): ?>class="active"<?php endif; ?>><a href="/">主页</a></li>
            <li <?php if ($this->_tpl_vars['LOCATE'] == 'blog'): ?>class="active"<?php endif; ?>><a href="/blog">博客</a></li>
            <li <?php if ($this->_tpl_vars['LOCATE'] == 'ask'): ?>class="active"<?php endif; ?>><a href="/ask">问答</a></li>
            <li <?php if ($this->_tpl_vars['LOCATE'] == 'share'): ?>class="active"<?php endif; ?>><a href="/share">资源</a></li>
          </ul>
          <ul class="nav pull-right">
          <?php if ($this->_tpl_vars['ISLOGIN']): ?>
		  	<li class="notifications<?php if ($this->_tpl_vars['LOCATE'] == 'notifications'): ?> active<?php endif; ?><?php if ($_SESSION['user']['ncount'] > 0): ?> unread<?php endif; ?>">
   				<a href="/notifications"><span class="count"><?php echo $_SESSION['user']['ncount']; ?>
</span></a>
			</li>
          	<li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION['user']['username']; ?>
<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="/profile">个人主页</a></li>
                <li><a href="/setting">个人设置</a></li>
                <li><a href="/favorites">我的收藏夹</a></li>
				<?php if ($_SESSION['user']['authority'] < 3): ?>
				<li><a href="/backstage/">网站管理</a></li>
				<?php endif; ?>
                <li class="divider"></li>
                <li><a href="/account/logout">退出</a></li>
              </ul>
            </li>
          <?php else: ?>
          	<li <?php if ($this->_tpl_vars['LOCATE'] == 'signup'): ?>class="active"<?php endif; ?>><a href="/account/signup">注册</a></li>
          	<li <?php if ($this->_tpl_vars['LOCATE'] == 'login'): ?>class="active"<?php endif; ?>><a href="/account/login">登录</a></li>
          <?php endif; ?>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
  </div>