<div class="box">
	<ul class="nav nav-pills nav-stacked">
		<li class="nav-header">MANAGER LIST</li>
		<li{if $LOCATE=='home'} class="active"{/if}><a href="./"><i class="icon-home"></i> ��̨��ҳ</a></li>
		<li{if $LOCATE=='blog_manage'} class="active"{/if}><a href="./blog_manage.php"><i class="icon-th-list"></i> ���͹���</a></li>
		<li{if $LOCATE=='ask_manage'} class="active"{/if}><a href="./ask_manage.php"><i class="icon-list"></i> �ʴ����</a></li>
		<li{if $LOCATE=='share_manage'} class="active"{/if}><a href="./share_manage.php"><i class="icon-share"></i> ��Դ����</a></li>
		{if $smarty.session.user.authority==1}<li{if $LOCATE=='user_manage'} class="active"{/if}><a href="./user_manage.php"><i class="icon-user"></i> ��Ա����</a></li>{/if}
	</ul>
</div>

{if $LOCATE!='home'}
<div class="box">
	<span class="form-inline"><input class="span2" id="page" type="text" /><a class="btn right" name="{$LOCATE}" id="turn">��ת</a></span>
</div>
{/if}