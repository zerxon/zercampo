{include file="header.tpl"}	
	<div class="container">
		<div class="row">
			<div class="span9" id="board">
				<div class="alert" id="label_error" style="display:none">
					<a class="close" id="close">×</a>
					<div id="error_txt"></div>
				</div>
				<div class="box" id="replies">
					<div class="title">消息</div>
					{foreach from=$NOTICE item=i}
					<div id="{$i.nid}">
						<div id="reply">
							<div class="pull-left face"><a href="/profile/{$i.author}"><img class="pic s48" src="http://gravatar.com/avatar/{$i.img}.png?r=G&amp;s=48" /></a></div>
							<div class="infos">
								<div class="info"  style="color:#999;">
									<span class="author"><a href="/profile/{$i.author}" data-name="">{$i.author}</a> 于 {$i.nicedate} 在 <a href="/{if $i.type==1 || $i.type==3 || $i.type==5}topic{elseif $i.type==2 || $i.type==4 || $i.type==6}asktopic{/if}/{$i.id}">{$i.title}</a> {if $i.type==1}回复你：{elseif $i.type==2}回答你：{else}提及你：{/if}{if $i.is_read==0}<span class="label label-warning">New</span>{/if}</span>
									<span class="date"><a class="pointer" onclick="del({$i.nid},'notifications')"><span class="icon-remove"></span></a></span>
								</div>
								<div class="body">
									{$i.content}
								</div>
							</div>
						</div>
					</div>
		  			{/foreach}
				</div>
			</div>
			
			<div class="span3" id="sidebar">
			{if $ISLOGIN}
				{include file="userinfo.tpl"}
			{/if}
			</div>
		</div>
	</div>

{include file="footer.tpl"}
<script src="/js/delAjax.js"></script>