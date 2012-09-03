{include file="../../templates/header.tpl"}
<div class="container">
  	<div class="row">
  		<div class="span6 offset3">
			{if $ERROR}
			<div class="alert">
				<a class="close" data-dismiss="alert">×</a>
				密码错误
			</div>
			{/if}
			
			<div class="box">
				<h4>后台登录</h4>
			</div>

			<div class="box">
				<div id="field">
					<form class="form-inline" method="post" action="./admin_login.php">
						管理员<br />
						<input class="span4" name="name" value="{$smarty.session.user.username}" disabled="disabled" type="text"><br /><br />
						密码<br />
						<input class="span4" name="pwd" type="password"><br /><br />
						<button class="btn btn-success" name="submit" type="submit">登录</button>
					</form>
				</div>
			</div>
		</div>
  </div>
</div>
  
{include file="../../templates/footer.tpl"}