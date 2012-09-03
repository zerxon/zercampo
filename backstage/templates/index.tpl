{include file="../../templates/header.tpl"}	
	<div class="container">
		<div class="row">
			<div class="span3" id="sidebar">
			{if $ISLOGIN}
				{include file="../../templates/userinfo.tpl"}
			{/if}
			
				{include file="list.tpl"}	
			</div>
			
			<div class="span9">
				<div class="box" id="sidebar">
					<header>会员统计</header>
					<ul>
						<li>会员数：{$COUNTLIST.user}</li>
						<li>管理员：{$COUNTLIST.admin}</li>
					</ul>
				</div>
				<div class="box" id="sidebar">
					<header>博客统计</header>
					<ul>
						<li>文章数：{$COUNTLIST.blog}</li>
						<li>回帖数：{$COUNTLIST.review}</li>
					</ul>
				</div>
				<div class="box" id="sidebar">
					<header>问答统计</header>
					<ul>
						<li>提问数：{$COUNTLIST.ask}</li>
						<li>回答数：{$COUNTLIST.answer}</li>
					</ul>
				</div>
				<div class="box" id="sidebar">
					<header>分享统计</header>
					<ul>
						<li>分享数：{$COUNTLIST.share}</li>
					</ul>
				</div>
			</div>
		</div>
  	</div>

{include file="../../templates/footer.tpl"}