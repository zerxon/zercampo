{include file="header.tpl"}
	<div class="container">
		<ul class="breadcrumb">
		  <li>
		    <a href="/profile/xenon">xenon</a> <span class="divider">/</span>
		  </li>
		  	<li>��������</li><span class="divider">/</span>
		  <li>
		    �޸�����
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
					<div><a href="/setting">��������</a></div>
					<div class="line"></div>
					<div>�޸�����</div>
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
					<form method="post" action="/setting/password">
						<table width="100%">
							<tr>
								<td width="70px">ԭ���룺</td>
								<td><input class="span3" name="pwd" type="password"></td>
							</tr>
							<tr>
								<td>�����룺</td>
								<td><input class="span3" name="npwd" type="password"></td>
							</tr>
							<tr>
								<td>ȷ�����룺</td>
								<td><input class="span3" name="cpwd" type="password"></td>
							</tr>
							<tr>
								<td>&nbsp;</td>
								<td><button class="btn btn-success" name="password_submit" type="submit">�޸�����</button></td>
							</tr>
						</table>
					</form>
				</div>
			</div>
			
		</div>
  </div>
  
{include file="footer.tpl"}