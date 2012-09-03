{include file="header.tpl"}
	<div class="container">
		<ul class="breadcrumb">
		  <li>
		    <a href="/profile/xenon">xenon</a> <span class="divider">/</span>
		  </li>
		  	<li>个人设置</li><span class="divider">/</span>
		  <li>
		    修改密码
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
					<div><a href="/setting">基本资料</a></div>
					<div class="line"></div>
					<div>修改密码</div>
					<div class="line"></div>
					<div><a href="/profile">个人主页</a></div>
				</div>
			</div>
			
			<div class="span9">
				{if $SUCCESS}
				<div class="alert alert-success">
					<a class="close" data-dismiss="alert">×</a>
					修改成功
				</div>
				{/if}
				<div class="box" id="board">
					<div class="header">密码修改</div>
					<form method="post" action="/setting/password">
						<table width="100%">
							<tr>
								<td width="70px">原密码：</td>
								<td><input class="span3" name="pwd" type="password"></td>
							</tr>
							<tr>
								<td>新密码：</td>
								<td><input class="span3" name="npwd" type="password"></td>
							</tr>
							<tr>
								<td>确认密码：</td>
								<td><input class="span3" name="cpwd" type="password"></td>
							</tr>
							<tr>
								<td>&nbsp;</td>
								<td><button class="btn btn-success" name="password_submit" type="submit">修改密码</button></td>
							</tr>
						</table>
					</form>
				</div>
			</div>
			
		</div>
  </div>
  
{include file="footer.tpl"}