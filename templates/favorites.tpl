{include file="header.tpl"}
	<div class="container">
		<ul class="breadcrumb">
		  <li>
		    <a href="/profile">{$smarty.session.user.username}</a> <span class="divider">/</span>
		  </li>
		  <li>我的收藏夹</li>
		</ul>
	</div>
	
	<div class="container">
		<div class="row">
			<div class="span3" id="sidebar">
			{if $ISLOGIN}
				{include file="userinfo.tpl"}
			{/if}
				<div class="box">
					<header>收藏统计</header>
					<ul>
						<li>博客：{$total_blog}</li>
						<li>问答：{$total_ask}</li>
						<li>分享：{$total_share}</li>
					</ul>
				</div>
			</div>
			
			<div class="span9">
				<div class="box" id="board">
					<div class="header">我的收藏夹</div>
					<ul class="nav nav-tabs">
					  <li class="active"><a href="#blog" data-toggle="tab">博客</a></li>
					  <li><a href="#ask" data-toggle="tab">问答</a></li>
					  <li><a href="#share" data-toggle="tab">资源</a></li>
					</ul>
					<div id="myTabContent" class="tab-content">
            <div class="tab-pane fade in active" id="blog">
			<table class="list" width="100%" cellpadding="3">
			{foreach from=$BLOGLIST item=i}
				<tr>
					<td><a href="/topic/{$i.date}" target="_blank">{$i.title}</a></td>
				</tr>
			{/foreach}
			</table>
            </div>
            <div class="tab-pane fade" id="ask">
			<table class="list" width="100%" cellpadding="3">
			{foreach from=$ASKLIST item=i}
				<tr>
					<td><a href="/topic/{$i.date}" target="_blank">{$i.title}</a></td>
				</tr>
			{/foreach}
			</table>
            </div>
            <div class="tab-pane fade" id="share">
			<table class="list" width="100%" cellpadding="3">
			{foreach from=$SHARELIST item=i}
				<tr>
					<td><a href="{$i.url}" target="_blank">{$i.title}</a></td>
				</tr>
			{/foreach}
			</table>
            </div>
          </div>
				</div>
			</div>
			
		</div>
  </div>
  
{include file="footer.tpl"}