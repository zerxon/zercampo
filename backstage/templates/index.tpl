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
					<header>��Աͳ��</header>
					<ul>
						<li>��Ա����{$COUNTLIST.user}</li>
						<li>����Ա��{$COUNTLIST.admin}</li>
					</ul>
				</div>
				<div class="box" id="sidebar">
					<header>����ͳ��</header>
					<ul>
						<li>��������{$COUNTLIST.blog}</li>
						<li>��������{$COUNTLIST.review}</li>
					</ul>
				</div>
				<div class="box" id="sidebar">
					<header>�ʴ�ͳ��</header>
					<ul>
						<li>��������{$COUNTLIST.ask}</li>
						<li>�ش�����{$COUNTLIST.answer}</li>
					</ul>
				</div>
				<div class="box" id="sidebar">
					<header>����ͳ��</header>
					<ul>
						<li>��������{$COUNTLIST.share}</li>
					</ul>
				</div>
			</div>
		</div>
  	</div>

{include file="../../templates/footer.tpl"}