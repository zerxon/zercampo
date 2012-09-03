{include file="header.tpl"}
<div id="loading"><span class="label label-warning">loading...</span></div>
<div class="container">
	<div class="row">
		<div class="span9" id="board">
			<div class="box">
			{foreach from=$ITEMARRAY item=i}
				<div id="ask_item">
					<div><strong><a href="{$i.url}" target="_blank">{$i.title}</a></strong><span id="{$i.date}_count" class="badge badge-warning right">{$i.collect_count}</span></div>
					<div><a href="http://{$i.website}" target="_blank">{$i.website}</a> -<a href="/profile/{$i.author}"> {$i.author} </a>������{$i.nicedate} {if $smarty.session.user!=""}[<a class="pointer" id="{$i.date}" onclick="collect('{$i.date}')">{if $i.mark}���ղ�{else}�ղ�{/if}</a>]{/if}</div>
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
				<a class="btn btn-success" data-toggle="modal" href="#newshare" >������Դ</a>
			</div>
		{/if}
			<div class="box">
				<header>������Դ</header>
				<ul>
				{foreach from=$HOTARRAY item=i}
					<li><a href="{$i.url}">{$i.title}</a></li>
				{/foreach}
				</ul>
			</div>
			<div class="box">
				<header>ͳ����Ϣ</header>
				<ul>
					<li>��Դ����{$TOTAL}</li>
				</ul>
			</div>
			
		</div>
	</div>
	
	<form method="post" action="/share">
		<div class="modal hide fade" id="newshare">
		  <div class="modal-header">
			<a class="close" data-dismiss="modal">��</a>
			<h3>������Դ</h3>
		  </div>
		  <div class="modal-body">
			<table width="100%">
				<tr>
					<td width="15%">���⣺</td>
					<td><input style="width:95%" name="sharetitle" type="text" /></td>
				</tr>
				<tr>
					<td>URL��</td>
					<td><input style="width:95%" name="shareurl" type="text" /></td>
				</tr>
			</table>
		  </div>
		  <div class="modal-footer">
			<input class="btn btn-success" name="submit" value="����" type="submit" />
		  </div>
		</div>
	</form>
	
{include file="footer.tpl"}
<script src="/js/shareAjax.js"></script>