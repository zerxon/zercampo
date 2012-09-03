{include file="../../templates/header.tpl"}
	<div class="container">
		<div class="row">
			<div class="span3" id="sidebar">
			{if $ISLOGIN}
				{include file="../../templates/userinfo.tpl"}
			{/if}
			
				{include file="list.tpl"}
			</div>
			
			<div class="span9">
				<div class="alert" id="label_error" style="display:none">
					<a class="close" id="close">×</a>
					<div id="error_txt"></div>
				</div>
				<div class="box">
				{if $TOPICLIST}
				<table align="center" class="table table-striped table-condensed">
				  <thead>
					<tr class="head">
						<th width="30%">标题</th>
						<th width="10%">作者</th>
						<th width="20%">发布于</th>
						<th width="10%">浏览量</th>
						<th width="10%">回复量</th>
						<th width="20%">操作</th>
					</tr>
				  </thead>
				  <tbody>
				  {foreach from=$TOPICLIST item=i}
					<tr id="{$i.date}">
						<td><a href="/topic/{$i.date}" target="_blank">{$i.title}</a></td>
						<td><a href="/profile/{$i.author}" target="_blank">{$i.author}</a></td>
						<td>{$i.nicedate}</td>
						<td>{$i.view_count}</td>
						<td>{$i.reply_count}</td>
						<td><a href="/topic/{$i.date}/edit" target="_blank">编辑</a> | <a class="pointer" onclick="del({$i.date},'blog');">删除</a> | <a href="blog_manage.php?bid={$i.date}&type=reply">查看回复</a></td>
					</tr>
				  {/foreach}
				  </tbody>
				</table>
				{elseif $REPLYLIST}
				<table align="center" class="table table-striped table-condensed">
				  <thead>
					<tr class="head">
						<th width="40%">内容</th>
						<th width="10%">作者</th>
						<th width="25%">发布于</th>
						<th width="10%">序号</th>
						<th width="15%">操作</th>
					</tr>
				  </thead>
				  <tbody>
				  {foreach from=$REPLYLIST item=i}
					<tr id="{$i.date}">
						<td>{$i.reply_content}</td>
						<td><a href="/profile/{$i.author}" target="_blank">{$i.author}</a></td>
						<td>{$i.nicedate}</td>
						<td>#{$i.order_id}</td>
						<td><a href="/reply/{$i.date}/topic/{$BID}" target="_blank">编辑</a> | <a href="javascript:void(0);" onclick="del({$i.date},'review');">删除</a></td>
					</tr>
				  {/foreach}
				  </tbody>
			    </table>
			    {/if}
			    <span>{$PAGELIST.left}</span>&nbsp;&nbsp;<span class="right" style="color:#CCC">{$PAGELIST.right}</span>
			    </div>
			</div>
			
		</div>
  	</div>

{include file="../../templates/footer.tpl"}
<script src="/js/turn.js"></script>
<script src="/js/delAjax.js"></script>