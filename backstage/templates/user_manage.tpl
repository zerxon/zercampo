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
						<th width="15%">用户名</th>
						<th width="25%">邮箱</th>
						<th width="10%">权限</th>
						<th width="10%">积分</th>
						<th width="25%">注册时间</th>
						<th width="15%">操作</th>
					</tr>
				  </thead>
				  <tbody>
				  {foreach from=$USERLIST item=i}
					<tr id="{$i.uid}">
						<td><a href="/profile/{$i.username}" target="_blank">{$i.username}</a></td>
						<td>{$i.email}</td>
						<td>{if $i.authority==1}站长{elseif $i.authority==2}管理员{else}会员{/if}</td>
						<td>{$i.score}</td>
						<td>{$i.join_time}</td>
						<td><a href="user_manage.php?type=edit&username={$i.username}" target="_blank">修改</a> | <a class="pointer" onclick="del({$i.uid},'user');">删除</a></td>
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