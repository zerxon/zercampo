{include file="header.tpl"}
  <div class="container">
  	<div class="row">
		<div class="span9">
			<div class="box">
			<table width="100%" cellpadding="3">
				<tr>
					<td width="15%"></td>
					<td width="60%"><span style="color:#CCCCCC"><h4>��{$USER.uid}λ��Ա</h4></span>{if $USER.authority==1}<span class="label label-warning">վ��</span>{elseif $USER.authority==2}<span class="label label-warning">����Ա</span>{else}<span class="label label-success">��ͨ��Ա</span>{/if}</td>
					<td >&nbsp;</td>
				</tr>
				<tr>
					<td>�û�����</td>
					<td>{$USER.username}</td>
					<td width="15%" rowspan="6" align="right"><img class="pic s145" src="http://gravatar.com/avatar/{$USER.gravatar}.png?r=G&amp;s=145"></td>
				</tr>
				<tr>
					<td>���֣�</td>
					<td>{$USER.score}</td>
				</tr>
				<tr>
					<td>����ʱ�䣺</td>
					<td>{$USER.join_time}</td>
				</tr>
				<tr>
					<td>����¼��</td>
					<td>{$USER.lastlogin_time}</td>
				</tr>
				<tr>
					<td>QQ��</td>
					<td>{$USER.qq}</td>
				</tr>
				<tr>
					<td>΢����</td>
					<td><a href="{$USER.weibo}" target="_bank">{$USER.weibo}</a></td>
				</tr>
				<tr>
					<td>������ҳ��</td>
					<td><a href="{$USER.web_url}" target="_blank">{$USER.web_url}</a></td>
				</tr>
			</table>
			</div>
			
			{if $USER.description}
			<div class="box">
				{$USER.description}
			</div>
			{/if}
			
			<div class="box" id="board">
				<div class="header">�������</div>
				<div class="line"></div>
				<table width="100%" class="list" cellpadding="6">
				  <tr class="head">
					<td width="20%">����</td>
					<td width="60%">����</td>
					<td width="20%">������</td>
				  </tr>
				{foreach from=$ARTLIST item=i name=foo}
					{if $smarty.foreach.foo.index%2}
					<tr class="topic">
					{else}
					<tr class="topic odd">
					{/if}
						<td>{if $i.type=='topic'}����{elseif $i.type=='asktopic'}�ʴ�{/if}</td>
						<td><a href="/{$i.type}/{$i.date}">{$i.title}</a></td>
						<td>{$i.nicedate}</td>
					</tr>
				{/foreach}
				</table>
			</div>
			
			<div class="box" id="board">
				<div class="header">����ظ�</div>
				<div class="line"></div>
				<table width="100%" class="list" cellpadding="6">
				  <tr class="head">
					<td width="20%">����</td>
					<td width="60%">����</td>
					<td width="20%">�ظ���</td>
				  </tr>
				{foreach from=$REPLYLIST item=i name=foo}
					{if $smarty.foreach.foo.index%2}
					<tr class="topic">
					{else}
					<tr class="topic odd">
					{/if}
						<td>{if $i.type=='topic'}����{elseif $i.type=='asktopic'}�ʴ�{/if}</td>
						<td><a href="/{$i.type}/{$i.date}">{$i.title}</a></td>
						<td>{$i.reply_date}</td>
					</tr>
				{/foreach}
				</table>
			</div>
		</div>
	
		<div class="span3" id="sidebar">
			<div class="box">
				<header>����ͳ��</header>
				<ul>
					<li>��������{$COUNTLIST.blog}</li>
					<li>�ʴ�����{$COUNTLIST.ask}</li>
					<li>��Դ����{$COUNTLIST.share}</li>
				</ul>
			</div>
		{if $ISLOGIN && $USER.username==$smarty.session.user.username}
			<div class="box">
				<header>����</header>
				<a class="btn" href="/setting">�༭������Ϣ</a>
			</div>
			<div class="box">
				<header>�ղؼ�</header>
				<a class="btn btn-info" href="/favorites">�����ҵ��ղ�</a>
			</div>
		{/if}
		</div>
	</div>
  </div>
  
{include file="footer.tpl"}