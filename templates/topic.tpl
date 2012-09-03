{include file="header.tpl"}
	<div id="loading"><span class="label label-warning">loading...</span></div>
	<div class="container">
		<ul class="breadcrumb">
		  <li>
		    <a href="/blog">����</a> <span class="divider">/</span>
		  </li>
		  <li class="active">{$TOPIC.title}</li>
		</ul>
	</div>
	
	<div class="container">
		<div class="row">
			<div class="span9" id="board">
				<div class="box" id="content">
					<div id="header">
						<div><span class="title">{$TOPIC.title}</span></div>
						{if $TOPIC.label!=''}<div>{foreach from=$TOPIC.label item=label}<span class="label">{$label}</span>&nbsp;{/foreach}</div>{/if}
						<div class="info">
							<a href="/profile/{$TOPIC.author}">{$TOPIC.author}</a> ������ {$TOPIC.nicedate}��{if $TOPIC.last_edit_time!=''}������ {$TOPIC.last_edit_time}��{/if}{$TOPIC.view_count}�������{$TOPIC.reply_count}������&nbsp;&nbsp;{if $ISLOGIN && $smarty.session.user.username==$TOPIC.author}<a href="/topic/{$TOPIC.date}/edit">�༭</a>{/if}
							<span class="right">{if $ISLOGIN}<a class="pointer" id="mark" name="blog|{$TOPIC.date}">{if $TOPIC.mark}���ղ�{else}�ղ�{/if}</a>{/if} <span id="collect_total">{if $TOPIC.collect_count>0}{$TOPIC.collect_count}���ղ�{/if}</span></span>
						</div>
					</div>
						{$TOPIC.content}
			  </div>
				
			 	<div class="box" id="replies">
				<div class="title">����</div>
				{if $REPLYARRAY|@count!=0}
			 		{foreach from=$REPLYARRAY item=i}
					<div id="reply">
						<div class="pull-left face"><a href="/profile/{$i.author}"><img class="pic s48" src="http://gravatar.com/avatar/{$i.img}.png?r=G&amp;s=48" /></a></div>
							<div class="infos">
							<div class="info">
							<span class="author"><a href="/profile/{$i.author}">{$i.author}</a></span>
							<span class="date">{if $smarty.session.user.username==$i.author}<a href="/reply/{$i.date}/topic/{$TOPIC.date}">�༭</a>{/if}&nbsp;&nbsp;{$i.nicedate}{if $i.last_edit_time!=""},������ {$i.last_edit_time}{/if}&nbsp;&nbsp;#{$i.order_id}&nbsp;<span class="pointer" id="{$i.order_id}|{$i.author}">@</span></span>
							</div>
							<div class="body">
						  	{$i.reply_content}
							</div>
						</div>
					</div>
		  			{/foreach}
				{/if}
				</div>
				
				{if $ISLOGIN}
				<div class="box">
				<form>
					<input type="hidden" id="bid" value="{$TOPIC.date}" />
					<input type="hidden" id="owner" value="{$TOPIC.author}" />
					<input type="hidden" id="tp" value="br" />
					<div><div id="wmd-button-bar"></div><textarea style="width:99%;height:80px;" id="textarea" name="textarea"></textarea></div>
					<div style="text-align:right"><span class="error" id="label_error"></span> <input class="btn" id="submit" value="�ظ�" type="button" /></div>
					<div id="wmd-preview"></div>
					<input id="wmd-html" type="hidden"></input>
				</form>
				</div>
				{/if}
					
			</div>
	
		<div class="span3" id="sidebar">
			{if $ISLOGIN}
				{include file="userinfo.tpl"}
			{/if}
			<div class="box">
				<header>�������</header>
				<ul>
				{foreach from=$SIMILAR item=i}<li><a href="/topic/{$i.date}">{$i.title}</a></li>{/foreach}
				</ul>
			</div>
		</div>
	</div>
  </div>

<link rel="stylesheet" type="text/css" href="/js/wmd/wmd.css"/>
<script src="/js/wmd/wmd.combined.min.js"></script>
<script src="/js/wmd/wmd.js"></script>
{include file="footer.tpl"}
<script type="text/javascript" src="/js/markAjax.js"></script>
<script type="text/javascript" src="/js/replyAjax.js"></script>
<script type="text/javascript" src="/js/at.js"></script>