{include file="header.tpl"}
	<div class="container">
		<ul class="breadcrumb">
		  <li>
		    <a href="/profile">{$smarty.session.user.username}</a> <span class="divider">/</span>
		  </li>
		  <li>�ҵ��ղؼ�</li>
		</ul>
	</div>
	
	<div class="container">
		<div class="row">
			<div class="span3" id="sidebar">
			{if $ISLOGIN}
				{include file="userinfo.tpl"}
			{/if}
				<div class="box">
					<header>�ղ�ͳ��</header>
					<ul>
						<li>���ͣ�{$total_blog}</li>
						<li>�ʴ�{$total_ask}</li>
						<li>����{$total_share}</li>
					</ul>
				</div>
			</div>
			
			<div class="span9">
				<div class="box" id="board">
					<div class="header">�ҵ��ղؼ�</div>
					<ul class="nav nav-tabs">
					  <li class="active"><a href="#blog" data-toggle="tab">����</a></li>
					  <li><a href="#ask" data-toggle="tab">�ʴ�</a></li>
					  <li><a href="#share" data-toggle="tab">��Դ</a></li>
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