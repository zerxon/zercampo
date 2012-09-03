{include file="header.tpl"}
	<div class="container">
		<ul class="breadcrumb">
		  <li>
		    <a href="/profile/xenon">xenon</a> <span class="divider">/</span>
		  </li>
		  	��������</a><span class="divider">/</span>
		  <li>
		    �ҵ�����
		  </li>
		</ul>
	</div>
	
	<div class="container">
		<div class="row">
			<div class="span3" id="sidebar">
			{if $ISLOGIN}
				{include file="userinfo.tpl"}
			{/if}
				<div class="box">
					<div>��������</div>
					<div class="line"></div>
					<div><a href="/setting/password">�޸�����</a></div>
					<div class="line"></div>
					<div><a href="/profile">������ҳ</a></div>
				</div>
			</div>
			
			<div class="span9">
				{if $SUCCESS}
				<div class="alert alert-success">
					<a class="close" data-dismiss="alert">��</a>
					�޸ĳɹ�
				</div>
				{/if}
				<div class="box" id="board">
					<div class="header">�����޸�</div>
					<form method="post" action="/setting">
						<table width="100%">
							<tr>
								<td width="70px">ͷ��</td>
								<td><img class="pic s130" src="http://gravatar.com/avatar/{$USER.gravatar}.png?r=G&amp;s=130"><div id="gravatar"><a href="http://www.gravatar.com/" target="_blank">gravatar.com</a></div></td>
							</tr>
							<tr>
								<td>�û�����</td>
								<td><input class="span4" name="name" value="{$USER.username}" disabled="disabled" type="text"></td>
							</tr>
							<tr>
								<td>E-mail��</td>
								<td><input class="span4" name="email" value="{$USER.email}" disabled="disabled" type="text"></td>
							</tr>
							<tr>
								<td>QQ��</td>
								<td><input class="span4" id="qq" name="qq"  value="{$USER.qq}" type="text"> <span class="error" id="label_qq"></span></td>
							</tr>
							<tr>
								<td>΢����</td>
								<td><input class="span4" id="weibo" name="weibo"  value="{$USER.weibo}" type="text"> <span class="error" id="label_weibo"></span></td>
							</tr>
							<tr>
								<td>������ҳ��</td>
								<td><input class="span4" id="url" name="url"  value="{$USER.web_url}" type="text"> <span class="error" id="label_url"></span></td>
							</tr>
							<tr>
								<td>����������</td>
								<td><textarea class="span6" rows="4" name="desc">{$USER.description}</textarea></td>
							</tr>
							<tr>
								<td>&nbsp;</td>
								<td><button class="btn btn-success" id="info_submit" name="info_submit" type="submit">�����޸�</button></td>
							</tr>
						</table>
					</form>
				</div>
			</div>
		</div>
  </div>
  
{include file="footer.tpl"}
<script type="text/javascript" src="/js/setting.js"></script>