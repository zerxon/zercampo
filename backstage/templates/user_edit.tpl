{include file="../../templates/header.tpl"}
	<div class="container">
		<ul class="breadcrumb">
		  <li>
		    <a href="./user_manage.php">��Ա����</a> <span class="divider">/</span>
		  </li>
		  <li>
		    ��Ա�༭
		  </li>
		</ul>
	</div>
	
	<div class="container">
		<div class="row">
			<div class="span3" id="sidebar">
			{if $ISLOGIN}
				{include file="../../templates/userinfo.tpl"}
			{/if}
			
				{include file="list.tpl"}
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
					<form method="post" action="./user_manage.php?type=edit&username={$USER.username}">
						<table width="100%">
							<tr>
								<td width="70px">ͷ��</td>
								<td><img class="pic s130" src="http://gravatar.com/avatar/{$USER.gravatar}.png?r=G&amp;s=130"><div id="gravatar"><a href="http://www.gravatar.com/" target="_blank">gravatar.com</a></div></td>
							</tr>
							<tr>
								<td>�û�����</td>
								<td><input class="span4" name="name" value="{$USER.username}" type="text"></td>
							</tr>
							<tr>
								<td>E-mail��</td>
								<td><input class="span4" name="email" value="{$USER.email}" type="text"></td>
							</tr>
							<tr>
								<td>Ȩ�ޣ�</td>
								<td>
								<select id="select" name="authority">
									<option {if $USER.authority==2}selected="selected"{/if} value="2">����Ա</option>
									<option {if $USER.authority==3}selected="selected"{/if} value="3">��ͨ��Ա</option>
								</select>
								</td>
							</tr>
							<tr>
								<td>���֣�</td>
								<td><input class="span4" name="score"  value="{$USER.score}" type="text"></td>
							</tr>
							<tr>
								<td>QQ��</td>
								<td><input class="span4" name="qq"  value="{$USER.qq}" type="text"></td>
							</tr>
							<tr>
								<td>΢����</td>
								<td><input class="span4" name="weibo"  value="{$USER.weibo}" type="text"></td>
							</tr>
							<tr>
								<td>������ҳ��</td>
								<td><input class="span4" id="prependedInput" name="url"  value="{$USER.web_url}" type="text"></td>
							</tr>
							<tr>
								<td>����������</td>
								<td><textarea class="span6" rows="4" name="desc">{$USER.description}</textarea></td>
							</tr>
							<tr>
								<td><input name="uid" value="{$USER.uid}" type="hidden" /></td>
								<td><button class="btn btn-success" name="submit" type="submit">�����޸�</button></td>
							</tr>
						</table>
					</form>
				</div>
			</div>
		</div>
  </div>
  
{include file="../../templates/footer.tpl"}