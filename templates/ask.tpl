{include file="header.tpl"}
<div class="container">
	<div class="row">
		<div class="span9" id="board">
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
				<a class="btn btn-success" href="/newask">��������</a>
			</div>
		{/if}
			<div class="box">
				<header>��������</header>
				<ul>
				{foreach from=$HOTARRAY item=i}
					<li><a href="/asktopic/{$i.date}">{$i.title}</a></li>
				{/foreach}
				</ul>
			</div>
			<div class="box">
				<header>ͳ����Ϣ</header>
				<ul>
					<li>��������{$COUNTLIST.ask}</li>
					<li>�ش�����{$COUNTLIST.answer}</li>
				</ul>
			</div>
			
		</div>
	</div>
	
{include file="footer.tpl"}