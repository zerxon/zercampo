{include file="header.tpl"}
	<div class="container">
		<ul class="breadcrumb">
		  <li>
		    <a href="/blog">博客</a> <span class="divider">/</span>
		  </li>
		  <li class="active">发布文章</li>
		</ul>
	</div>
	
	<div class="container">
		<div class="row">
			<div class="span9" id="board">
				<div class="alert" id="label_error" style="display:none">
					<a class="close" id="close">×</a>
					<div id="error_txt"></div>
				</div>
				<div class="box">
				<form method="post" action="{if $TOPIC}/topic/{$TOPIC.date}/edit{else}/newtopic{/if}">
				<table width="100%" cellpadding="3">
					<tr>
						<td width="9%">标题：</td>
						<td><input class="span4" id="title" name="title" value="{$TOPIC.title}" type="text" /></td>
					</tr>
					<tr>
						<td>标签：</td>
						<td><input class="span4" id="label" name="label" value="{if $TOPIC.label!=""}{foreach from=$TOPIC.label item=i}{$i}{/foreach}{/if}" type="text" /><span style="margin-left:5px;color:#999">中间用"|"号隔开，如：php|ruby</span></td>
					</tr>
					<tr>
						<td>正文：</td>
						<td>
							<div id="wmd-button-bar"></div>
							<textarea class="span8" id="textarea" name="content" rows="20">{$TOPIC.content}</textarea>
						</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td><input class="btn right" id="submit" name="submit" value="发布" type="submit" /></td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td><div id="wmd-preview"></div></td>
					</tr>
				</table>
				<input id="wmd-html" name="wmd-html" type="hidden"></input>
				</form>
			  	</div>
			</div>
	
		<div class="span3" id="sidebar">
			{if $ISLOGIN}
				{include file="userinfo.tpl"}
			{/if}
		</div>
	</div>
</div>

<link rel="stylesheet" type="text/css" href="/js/wmd/wmd.css"/>
<script src="/js/wmd/wmd.combined.min.js"></script>
<script src="/js/wmd/wmd.js"></script>
{include file="footer.tpl"}
<script type="text/javascript" src="/js/topicAjax.js"></script>