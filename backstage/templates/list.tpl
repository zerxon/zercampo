<div class="box">
	<ul class="nav nav-pills nav-stacked">
		<li class="nav-header">MANAGER LIST</li>
		<li{if $LOCATE=='home'} class="active"{/if}><a href="./"><i class="icon-home"></i> 后台首页</a></li>
		<li{if $LOCATE=='blog_manage'} class="active"{/if}><a href="./blog_manage.php"><i class="icon-th-list"></i> 博客管理</a></li>
		<li{if $LOCATE=='ask_manage'} class="active"{/if}><a href="./ask_manage.php"><i class="icon-list"></i> 问答管理</a></li>
		<li{if $LOCATE=='share_manage'} class="active"{/if}><a href="./share_manage.php"><i class="icon-share"></i> 资源管理</a></li>
		{if $smarty.session.user.authority==1}<li{if $LOCATE=='user_manage'} class="active"{/if}><a href="./user_manage.php"><i class="icon-user"></i> 会员管理</a></li>{/if}
	</ul>
</div>

{if $LOCATE!='home'}
<div class="box">
	<span class="form-inline"><input class="span2" id="page" type="text" /><a class="btn right" name="{$LOCATE}" id="turn">跳转</a></span>
</div>
{/if}