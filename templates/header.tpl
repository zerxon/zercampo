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
            <li {if $LOCATE=='index'}class="active"{/if}><a href="/">主页</a></li>
            <li {if $LOCATE=='blog'}class="active"{/if}><a href="/blog">博客</a></li>
            <li {if $LOCATE=='ask'}class="active"{/if}><a href="/ask">问答</a></li>
            <li {if $LOCATE=='share'}class="active"{/if}><a href="/share">资源</a></li>
          </ul>
          <ul class="nav pull-right">
          {if $ISLOGIN}
		  	<li class="notifications{if $LOCATE=='notifications'} active{/if}{if $smarty.session.user.ncount>0} unread{/if}">
   				<a href="/notifications"><span class="count">{$smarty.session.user.ncount}</span></a>
			</li>
          	<li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">{$smarty.session.user.username}<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="/profile">个人主页</a></li>
                <li><a href="/setting">个人设置</a></li>
                <li><a href="/favorites">我的收藏夹</a></li>
				{if $smarty.session.user.authority<3}
				<li><a href="/backstage/">网站管理</a></li>
				{/if}
                <li class="divider"></li>
                <li><a href="/account/logout">退出</a></li>
              </ul>
            </li>
          {else}
          	<li {if $LOCATE=='signup'}class="active"{/if}><a href="/account/signup">注册</a></li>
          	<li {if $LOCATE=='login'}class="active"{/if}><a href="/account/login">登录</a></li>
          {/if}
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
  </div>