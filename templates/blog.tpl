{include file="header.tpl"}
	<div class="container">
		<div class="row">
			<div class="span9" id="board">
				<div class="box" id="content">
				{foreach from=$ITEMS_ARRAY item=i}
					<div id="blog_item">
					<table width="100%">
						<tr>
							<td rowspan="2" width="54px;"><a href="/profile/{$i.author}"><img class="pic s48" src="http://gravatar.com/avatar/{$i.img}.png?r=G&amp;s=48"></a></td>
							<td><strong><a href="/topic/{$i.id}">{$i.title}</a></strong><span class="badge badge-info right">{$i.replies}</span></td>
						</tr>
						<tr>
							<td><a href="/profile/{$i.author}">{$i.author}</a> 发布于 {$i.date}{if $i.last_replyer!='' && $i.r_date!=''}，<a href="/profile/{$i.last_replyer}">{$i.last_replyer}</a> 回复于 {$i.r_date}{/if}{if $i.label!=''}{foreach from=$i.label item=label}&nbsp;<span class="label">{$label}</span>{/foreach}{/if}</td>
						</tr>
					</table>
					</div>
				{/foreach}
				</div>
				
				<div class="box" id="footer">
					Copyright 2012 | All Rights Reserved
				</div>
				
				<div class="pagination">
				  <ul>
				    {$PAGELIST}
				  </ul>
				</div>
			</div>
		
			<div class="span3" id="sidebar">
			{if $ISLOGIN}
				{include file="userinfo.tpl"}
				<div class="box">
					<a href="/newtopic" class="btn btn-success">发布文章</a>
				</div>
			{/if}
				<div class="box">
					<header>热门文章</header>
					<ul>
					{foreach from=$HOTARRAY item=i}
						<li><a href="/topic/{$i.date}">{$i.title}</a></li>
					{/foreach}
					</ul>
				</div>
				<div class="box">
					<header>统计信息</header>
					<ul>
						<li>文章数：{$COUNTLIST.blog}</li>
						<li>回帖数：{$COUNTLIST.review}</li>
					</ul>
				</div>
			</div>
			
		</div>
  </div>

{include file="footer.tpl"}