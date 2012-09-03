<?php /* Smarty version 2.6.26, created on 2012-08-25 05:22:38
         compiled from header.tpl */ ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="gbk">
		<title>Zerxon</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="���С��������,programing - zerxon">
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
            <li <?php if ($this->_tpl_vars['LOCATE'] == 'index'): ?>class="active"<?php endif; ?>><a href="/">��ҳ</a></li>
            <li <?php if ($this->_tpl_vars['LOCATE'] == 'blog'): ?>class="active"<?php endif; ?>><a href="/blog">����</a></li>
            <li <?php if ($this->_tpl_vars['LOCATE'] == 'ask'): ?>class="active"<?php endif; ?>><a href="/ask">�ʴ�</a></li>
            <li <?php if ($this->_tpl_vars['LOCATE'] == 'share'): ?>class="active"<?php endif; ?>><a href="/share">��Դ</a></li>
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
                <li><a href="/profile">������ҳ</a></li>
                <li><a href="/setting">��������</a></li>
                <li><a href="/favorites">�ҵ��ղؼ�</a></li>
				<?php if ($_SESSION['user']['authority'] < 3): ?>
				<li><a href="/backstage/">��վ����</a></li>
				<?php endif; ?>
                <li class="divider"></li>
                <li><a href="/account/logout">�˳�</a></li>
              </ul>
            </li>
          <?php else: ?>
          	<li <?php if ($this->_tpl_vars['LOCATE'] == 'signup'): ?>class="active"<?php endif; ?>><a href="/account/signup">ע��</a></li>
          	<li <?php if ($this->_tpl_vars['LOCATE'] == 'login'): ?>class="active"<?php endif; ?>><a href="/account/login">��¼</a></li>
          <?php endif; ?>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
  </div>