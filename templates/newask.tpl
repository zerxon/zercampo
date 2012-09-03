{include file="header.tpl"}
	<div class="container">
		<ul class="breadcrumb">
		  <li>
		    <a href="/blog">问答</a> <span class="divider">/</span>
		  </li>
		  <li class="active">发布提问</li>
		</ul>
	</div>
	
	<div class="container">
		<div class="row">
			<div class="span9" id="board">
				<div class="box">
				<form method="post" action="{if $ASK}/asktopic/{$ASK.date}/edit{else}/newask{/if}">
				<table width="100%" cellpadding="3">
					<tr>
						<td width="9%">标题：</td>
						<td><input class="span4" id="title" name="title" value="{$ASK.title}" type="text" /></td>
					</tr>
					<tr>
						<td>标签：</td>
						<td><input class="span4" id="label" name="label" value="{if $ASK.label!=""}{foreach from=$ASK.label item=i}{$i}{/foreach}{/if}" type="text" /><span style="margin-left:5px;color:#999">中间用"|"号隔开，如：php|ruby</span></td>
					</tr>
					<tr>
						<td>分数：</td>
						<td>
						{if $ASK.score}{$ASK.score}分 +{/if}
						<select id="select" name="score">
							<option value="0">0分</option>
							<option value="3">3分</option>
							<option value="5">5分</option>
							<option value="10">10分</option>
							<option value="15">15分</option>
							<option value="30">30分</option>
							<option value="60">60分</option>
						</select>
						<span id="label_select"></span>
						</td>
					</tr>
					<tr>
						<td>正文：</td>
						<td>
							<div id="wmd-button-bar"></div>
							<textarea class="span8" id="textarea" name="content" rows="20">{$ASK.content}</textarea>
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