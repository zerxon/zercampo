{include file="header.tpl"}
	<div id="loading"><span class="label label-warning">loading...</span></div>
	<div class="container">
		<ul class="breadcrumb">
		  <li>
		    <a href="/ask">问答</a> <span class="divider">/</span>
		  </li>
		  <li class="active">{$ASK.title}</li>
		</ul>
	</div>
	
	<div class="container">
		<div class="row">
			<div class="span9" id="board">
				<div class="box" id="content">
					<div id="header">
						<div><span class="title">{$ASK.title}</span></div>
						{if $ASK.label!=''}<div>{foreach from=$ASK.label item=label}<span class="label">{$label}</span>&nbsp;{/foreach}</div>{/if}
						<div class="info">
							<a href="/profile/{$ASK.author}">{$ASK.author}</a> 提问于 {$ASK.nicedate}，{if $ASK.last_edit_time!=''}最后更新于 {$ASK.last_edit_time}，{/if}{$ASK.answer_count}条回答，{$ASK.score}分&nbsp;&nbsp;{if $ISLOGIN && $smarty.session.user.username==$ASK.author}<a href="/asktopic/{$ASK.date}/edit">编辑</a>{/if}
							<span class="right">{if $ISLOGIN}<a class="pointer" id="mark" name="ask|{$ASK.date}">{if $ASK.mark}已收藏{else}收藏{/if}</a>{/if} <span id="collect_total">{if $ASK.collect_count>0}{$ASK.collect_count}人收藏{/if}</span></span>
						</div>
					</div>
						{$ASK.content}
			  </div>
				
			 	<div class="box" id="replies">
			 		<div class="title">回答</div>
			 		{foreach from=$ANSWERARRAY item=i}
					<div id="reply">
						<div class="pull-left face"><a href="/profile/{$i.author}"><img class="pic s48" src="http://gravatar.com/avatar/{$i.img}.png?r=G&amp;s=48" /></a></div>
							<div class="infos">
							<div class="info">
							<span class="author"><a href="/profile/{$i.author}" data-name="">{$i.author}</a></span>
							<span class="date">{if !$ASK.is_adopt && $smarty.session.user.username==$ASK.author}<a href="/asktopic/{$ASK.date}/pick/{$i.date}">选择为最佳答案</a>{/if}{if $i.be_adopt==1}最佳答案{/if}&nbsp;&nbsp;{if $smarty.session.user.username==$i.author}<a href="/reply/{$i.date}/asktopic/{$ASK.date}">编辑</a>{/if}&nbsp;&nbsp;{$i.nicedate}{if $i.last_edit_time!=""},更新于 {$i.last_edit_time}{/if}&nbsp;&nbsp;#{$i.order_id}&nbsp;<span class="pointer" id="{$i.order_id}|{$i.author}">@</span></span>
							</div>
							<div class="body">
						  		{$i.answer_content}
							</div>
						</div>
					</div>
		  			{/foreach}
				</div>
				
				<div class="box">
					<form>
						<input type="hidden" id="bid" value="{$ASK.date}" />
						<input type="hidden" id="owner" value="{$ASK.author}" />
						<input type="hidden" id="tp" value="ar" />
						<div><div id="wmd-button-bar"></div><textarea style="width:99%;height:80px;" id="textarea" name="textarea"></textarea></div>
						<div style="text-align:right"><span class="error" id="label_error"></span> <input class="btn" id="submit" value="回复" type="button" /></div>
						<div id="wmd-preview"></div>
						<input id="wmd-html" type="hidden"></input>
					</form>
				</div>
					
			</div>
	
		<div class="span3" id="sidebar">
			{if $ISLOGIN}
				{include file="userinfo.tpl"}
			{/if}
			<div class="box">
				<header>相关文章</header>
				<ul>
				{foreach from=$SIMILAR item=i}<li><a href="/asktopic/{$i.date}">{$i.title}</a></li>{/foreach}
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