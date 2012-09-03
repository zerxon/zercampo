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
				<div class="box">
				<table align="center" class="table table-striped table-condensed">
				  <thead>
					<tr class="head">
						<th width="40%">����</th>
						<th width="10%">����</th>
						<th width="25%">������</th>
						<th width="10%">�ղ���</th>
						<th width="15%">����</th>
					</tr>
				  </thead>
				  <tbody>
				  {foreach from=$SHARELIST item=i}
					<tr id="{$i.date}">
						<td><a href="{$i.url}" target="_blank">{$i.title}</a></td>
						<td>{$i.author}</td>
						<td>{$i.nicedate}</td>
						<td>{$i.collect_count}</td>
						<td><a class="pointer" onclick="del({$i.date},'share');">ɾ��</a></td>
					</tr>
				  {/foreach}
				  </tbody>
				</table>
				<span>{$PAGELIST.left}</span><span class="right" style="color:#CCC">{$PAGELIST.right}</span>
				</div>
		</div>
  	</div>

{include file="../../templates/footer.tpl"}
<script src="/js/turn.js"></script>
<script src="/js/delAjax.js"></script>