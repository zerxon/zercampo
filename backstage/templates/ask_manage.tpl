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
				{if $ASKLIST}
				<table align="center" class="table table-striped table-condensed">
				  <thead>
					<tr class="head">
						<th width="30%">����</th>
						<th width="10%">����</th>
						<th width="20%">������</th>
						<th width="10%">�ش���</th>
						<th width="10%">��ѡ��</th>
						<th width="20%">����</th>
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
						<td><a href="/asktopic/{$i.date}/edit" target="_blank">�༭</a> | <a class="pointer" onclick="del({$i.date},'ask');">ɾ��</a> | <a href="ask_manage.php?aid={$i.date}&type=answer">�鿴�ش�</a></td>
					</tr>
				  {/foreach}
				  </tbody>
				</table>
				{elseif $ANSWERLIST}
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
				  {foreach from=$ANSWERLIST item=i}
					<tr id="{$i.date}">
						<td>{$i.answer_content}</td>
						<td><a href="/profile/{$i.author}" target="_blank">{$i.author}</a></td>
						<td>{$i.nicedate}</td>
						<td>#{$i.order_id}</td>
						<td><a href="/reply/{$i.date}/asktopic/{$AID}" target="_blank">�༭</a> | <a class="pointer" onclick="del({$i.date},'answer');">ɾ��</a></td>
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