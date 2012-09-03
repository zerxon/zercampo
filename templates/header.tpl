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
            <li {if $LOCATE=='index'}class="active"{/if}><a href="/">��ҳ</a></li>
            <li {if $LOCATE=='blog'}class="active"{/if}><a href="/blog">����</a></li>
            <li {if $LOCATE=='ask'}class="active"{/if}><a href="/ask">�ʴ�</a></li>
            <li {if $LOCATE=='share'}class="active"{/if}><a href="/share">��Դ</a></li>
          </ul>
          <ul class="nav pull-right">
          {if $ISLOGIN}
		  	<li class="notifications{if $LOCATE=='notifications'} active{/if}{if $smarty.session.user.ncount>0} unread{/if}">
   				<a href="/notifications"><span class="count">{$smarty.session.user.ncount}</span></a>
			</li>
          	<li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">{$smarty.session.user.username}<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="/profile">������ҳ</a></li>
                <li><a href="/setting">��������</a></li>
                <li><a href="/favorites">�ҵ��ղؼ�</a></li>
				{if $smarty.session.user.authority<3}
				<li><a href="/backstage/">��վ����</a></li>
				{/if}
                <li class="divider"></li>
                <li><a href="/account/logout">�˳�</a></li>
              </ul>
            </li>
          {else}
          	<li {if $LOCATE=='signup'}class="active"{/if}><a href="/account/signup">ע��</a></li>
          	<li {if $LOCATE=='login'}class="active"{/if}><a href="/account/login">��¼</a></li>
          {/if}
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
  </div>