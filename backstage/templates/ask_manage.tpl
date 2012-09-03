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
				{if $ASKLIST}
				<table align="center" class="table table-striped table-condensed">
				  <thead>
					<tr class="head">
						<th width="30%">标题</th>
						<th width="10%">作者</th>
						<th width="20%">提问于</th>
						<th width="10%">回答量</th>
						<th width="10%">已选答案</th>
						<th width="20%">操作</th>
					</tr>
				  </thead>
				  <tbody>
				  {foreach from=$ASKLIST item=i}
					<tr id="{$i.date}">
						<td><a href="/asktopic/{$i.date}" target="_blank">{$i.title}</a></td>
						<td>{$i.author}</td>
						<td>{$i.nicedate}</td>
						<td>{$i.answer_count}</td>
						<td>{if $i.is_adopt==1}Yes{else}No{/if}</td>
						<td><a href="/asktopic/{$i.date}/edit" target="_blank">编辑</a> | <a class="pointer" onclick="del({$i.date},'ask');">删除</a> | <a href="ask_manage.php?aid={$i.date}&type=answer">查看回答</a></td>
					</tr>
				  {/foreach}
				  </tbody>
				</table>
				{elseif $ANSWERLIST}
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
				  {foreach from=$ANSWERLIST item=i}
					<tr id="{$i.date}">
						<td>{$i.answer_content}</td>
						<td><a href="/profile/{$i.author}" target="_blank">{$i.author}</a></td>
						<td>{$i.nicedate}</td>
						<td>#{$i.order_id}</td>
						<td><a href="/reply/{$i.date}/asktopic/{$AID}" target="_blank">编辑</a> | <a class="pointer" onclick="del({$i.date},'answer');">删除</a></td>
					</tr>
				  {/foreach}
				  </tbody>
			    </table>
			    {/if}
				<span>{$PAGELIST.left}</span><span class="right" style="color:#CCC">{$PAGELIST.right}</span>
				</div>
		</div>
  	</div>

{include file="../../templates/footer.tpl"}
<script src="/js/turn.js"></script>
<script src="/js/delAjax.js"></script>