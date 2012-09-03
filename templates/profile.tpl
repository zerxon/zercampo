{include file="header.tpl"}
  <div class="container">
  	<div class="row">
		<div class="span9">
			<div class="box">
			<table width="100%" cellpadding="3">
				<tr>
					<td width="15%"></td>
					<td width="60%"><span style="color:#CCCCCC"><h4>第{$USER.uid}位会员</h4></span>{if $USER.authority==1}<span class="label label-warning">站长</span>{elseif $USER.authority==2}<span class="label label-warning">管理员</span>{else}<span class="label label-success">普通会员</span>{/if}</td>
					<td >&nbsp;</td>
				</tr>
				<tr>
					<td>用户名：</td>
					<td>{$USER.username}</td>
					<td width="15%" rowspan="6" align="right"><img class="pic s145" src="http://gravatar.com/avatar/{$USER.gravatar}.png?r=G&amp;s=145"></td>
				</tr>
				<tr>
					<td>积分：</td>
					<td>{$USER.score}</td>
				</tr>
				<tr>
					<td>加入时间：</td>
					<td>{$USER.join_time}</td>
				</tr>
				<tr>
					<td>最后登录：</td>
					<td>{$USER.lastlogin_time}</td>
				</tr>
				<tr>
					<td>QQ：</td>
					<td>{$USER.qq}</td>
				</tr>
				<tr>
					<td>微博：</td>
					<td><a href="{$USER.weibo}" target="_bank">{$USER.weibo}</a></td>
				</tr>
				<tr>
					<td>个人主页：</td>
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
				<div class="header">最近发布</div>
				<div class="line"></div>
				<table width="100%" class="list" cellpadding="6">
				  <tr class="head">
					<td width="20%">类型</td>
					<td width="60%">标题</td>
					<td width="20%">发布于</td>
				  </tr>
				{foreach from=$ARTLIST item=i name=foo}
					{if $smarty.foreach.foo.index%2}
					<tr class="topic">
					{else}
					<tr class="topic odd">
					{/if}
						<td>{if $i.type=='topic'}博客{elseif $i.type=='asktopic'}问答{/if}</td>
						<td><a href="/{$i.type}/{$i.date}">{$i.title}</a></td>
						<td>{$i.nicedate}</td>
					</tr>
				{/foreach}
				</table>
			</div>
			
			<div class="box" id="board">
				<div class="header">最近回复</div>
				<div class="line"></div>
				<table width="100%" class="list" cellpadding="6">
				  <tr class="head">
					<td width="20%">类型</td>
					<td width="60%">标题</td>
					<td width="20%">回复于</td>
				  </tr>
				{foreach from=$REPLYLIST item=i name=foo}
					{if $smarty.foreach.foo.index%2}
					<tr class="topic">
					{else}
					<tr class="topic odd">
					{/if}
						<td>{if $i.type=='topic'}博客{elseif $i.type=='asktopic'}问答{/if}</td>
						<td><a href="/{$i.type}/{$i.date}">{$i.title}</a></td>
						<td>{$i.reply_date}</td>
					</tr>
				{/foreach}
				</table>
			</div>
		</div>
	
		<div class="span3" id="sidebar">
			<div class="box">
				<header>个人统计</header>
				<ul>
					<li>博客数：{$COUNTLIST.blog}</li>
					<li>问答数：{$COUNTLIST.ask}</li>
					<li>资源数：{$COUNTLIST.share}</li>
				</ul>
			</div>
		{if $ISLOGIN && $USER.username==$smarty.session.user.username}
			<div class="box">
				<header>设置</header>
				<a class="btn" href="/setting">编辑个人信息</a>
			</div>
			<div class="box">
				<header>收藏夹</header>
				<a class="btn btn-info" href="/favorites">进入我的收藏</a>
			</div>
		{/if}
		</div>
	</div>
  </div>
  
{include file="footer.tpl"}