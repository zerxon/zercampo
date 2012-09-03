{include file="header.tpl"}
	<div class="container">
		<ul class="breadcrumb">
		  <li>
		    {if $LOCATE=="blog"}<a href="/blog">博客</a>{else}<a href="/ask">问答</a>{/if} <span class="divider">/</span>
		  </li>
		  <li class="active"> {if $LOCATE=="blog"}评论修改{else}答案修改{/if}</li>
		</ul>
	</div>
	
	<div class="container">
		<div class="row">
			<div class="span9" id="board">
				<div class="alert" id="label_error" style="display:none">
					<a class="close" id="close">×</a>
					<div id="error_txt"></div>
				</div>
				<div class="alert" id="label_error" style="display:none">
					<a class="close" id="close">×</a>
					<div id="error_txt"></div>
				</div>
				<div class="box">
				<form method="post" action="/reply/{$REPLY.rid}/{$REPLY.type}/{$REPLY.bid}">
					<div id="wmd-button-bar"></div>
					<div><textarea style="width:98%;" id="textarea" name="content" rows="8">{$REPLY.content}</textarea></div>
					<div style="text-align:right;margin-bottom:6px;"><input class="btn" id="submit" name="submit" value="更新" type="submit" /></div>
					<div id="wmd-preview"></div>
					<div><input id="wmd-html" name="wmd-html" type="hidden"></input></div>
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
{literal}
<script language="javascript">
$(document).ready(function(){
	$("#submit").click(function(){
		if(!$.trim($("#textarea").val())){
			$("#label_error").slideDown();
			$("#error_txt").text('内容不能为空');
			return false;
		}
	});
	
	$("#close").click(function(){
		$("#label_error").slideUp();
	});
});
</script>
{/literal}