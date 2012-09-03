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
							<td><a href="/profile/{$i.author}">{$i.author}</a> ������ {$i.date}{if $i.last_replyer!='' && $i.r_date!=''}��<a href="/profile/{$i.last_replyer}">{$i.last_replyer}</a> �ظ��� {$i.r_date}{/if}{if $i.label!=''}{foreach from=$i.label item=label}&nbsp;<span class="label">{$label}</span>{/foreach}{/if}</td>
						</tr>
					</table>
					</div>
				{/foreach}
				</div>
				
				<div class="box">
				{foreach from=$ITEMARRAY item=i}
					<div id="ask_item">
						<div><strong><a href="{$i.url}" target="_blank">{$i.title}</a></strong><span id="{$i.date}_count" class="badge badge-warning right">{$i.collect_count}</span></div>
						<div><a href="http://{$i.website}" target="_blank">{$i.website}</a> -<a href="/profile/{$i.author}"> {$i.author} </a>������{$i.nicedate} {if $smarty.session.user!=""}[<a id="{$i.date}" onclick="collect('{$i.date}')" href="javascript:void(0);">{if $i.mark}���ղ�{else}�ղ�{/if}</a>]{/if}</div>
					</div>
				{/foreach}
				</div>
				
				<div class="box">
				{foreach from=$ITEMSARRAY item=i}
					<div id="ask_item">
						<div><strong><a href="/asktopic/{$i.date}">{$i.title}</a></strong><span class="tips">{$i.score}��</span>{if $i.is_adopt==1}<span class="badge badge-success right">��ѡ��Ѵ�</span>{else}<span class="badge right">{$i.answer_count}</span>{/if}</div>
						<div> <a href="/profile/{$i.author}">{$i.author}</a> ������{$i.nicedate}{if $i.last_replyer!=''}��<a href="/profile/{$i.author}">{$i.last_replyer}</a> �ش��� {$i.r_date}{/if}{if $i.label!=''}{foreach from=$i.label item=label}&nbsp;<span class="label">{$label}</span>{/foreach}{/if}</div>
					</div>
				{/foreach}
				</div>
				
				<div class="box" id="footer">
					Copyright 2012 | All Rights Reserved
				</div>
			</div>
			
			<div class="span3" id="sidebar">
			{if $ISLOGIN}
				{include file="userinfo.tpl"}
			{/if}
				<div class="box">
					<header>ͳ����Ϣ</header>
					<ul>
						<li>��Ա����{$COUNTLIST.user}</li>
						<li>��������{$COUNTLIST.blog}</li>
						<li>��Դ����{$COUNTLIST.share}</li>
						<li>��������{$COUNTLIST.ask}</li>
					</ul>
				</div>
			</div>
			
		</div>
	</div>
	
{include file="footer.tpl"}
<script src="/js/shareAjax.js"></script>