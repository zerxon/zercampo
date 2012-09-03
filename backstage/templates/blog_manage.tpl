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
					<a class="close" id="close">��</a>
					<div id="error_txt"></div>
				</div>
				<div class="box">
				{if $TOPICLIST}
				<table align="center" class="table table-striped table-condensed">
				  <thead>
					<tr class="head">
						<th width="30%">����</th>
						<th width="10%">����</th>
						<th width="20%">������</th>
						<th width="10%">�����</th>
						<th width="10%">�ظ���</th>
						<th width="20%">����</th>
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
						<td><a href="/topic/{$i.date}/edit" target="_blank">�༭</a> | <a class="pointer" onclick="del({$i.date},'blog');">ɾ��</a> | <a href="blog_manage.php?bid={$i.date}&type=reply">�鿴�ظ�</a></td>
					</tr>
				  {/foreach}
				  </tbody>
				</table>
				{elseif $REPLYLIST}
				<table align="center" class="table table-striped table-condensed">
				  <thead>
					<tr class="head">
						<th width="40%">����</th>
						<th width="10%">����</th>
						<th width="25%">������</th>
						<th width="10%">���</th>
						<th width="15%">����</th>
					</tr>
				  </thead>
				  <tbody>
				  {foreach from=$REPLYLIST item=i}
					<tr id="{$i.date}">
						<td>{$i.reply_content}</td>
						<td><a href="/profile/{$i.author}" target="_blank">{$i.author}</a></td>
						<td>{$i.nicedate}</td>
						<td>#{$i.order_id}</td>
						<td><a href="/reply/{$i.date}/topic/{$BID}" target="_blank">�༭</a> | <a href="javascript:void(0);" onclick="del({$i.date},'review');">ɾ��</a></td>
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