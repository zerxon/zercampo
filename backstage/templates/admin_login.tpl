{include file="../../templates/header.tpl"}
<div class="container">
  	<div class="row">
  		<div class="span6 offset3">
			{if $ERROR}
			<div class="alert">
				<a class="close" data-dismiss="alert">��</a>
				�������
			</div>
			{/if}
			
			<div class="box">
				<h4>��̨��¼</h4>
			</div>

			<div class="box">
				<div id="field">
					<form class="form-inline" method="post" action="./admin_login.php">
						����Ա<br />
						<input class="span4" name="name" value="{$smarty.session.user.username}" disabled="disabled" type="text"><br /><br />
						����<br />
						<input class="span4" name="pwd" type="password"><br /><br />
						<button class="btn btn-success" name="submit" type="submit">��¼</button>
					</form>
				</div>
			</div>
		</div>
  </div>
</div>
  
{include file="../../templates/footer.tpl"}