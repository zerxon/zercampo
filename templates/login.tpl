{include file="header.tpl"}
<div class="container">
  	<div class="row">
  		<div class="span6 offset3">
			{if $ERROR}
			<div class="alert">
				<a class="close" data-dismiss="alert">��</a>
				�û��������������
			</div>
			{/if}
			
			<div class="box">
				<h4>�û���¼</h4>
			</div>

			<div class="box">
				<div id="field">
					<form class="form-inline" method="post" action="/account/login">
						�û���������<br />
						<input class="span4" name="name" type="text"><br /><br />
						����<br />
						<input class="span4" name="pwd" type="password"><br /><br />
						<button class="btn btn-success" name="submit" type="submit">��¼</button>
						<label class="checkbox">
							<input type="checkbox" name="keep">30�����¼
						</label>
					</form>
				</div>
			</div>
		</div>
  </div>
</div>
  
{include file="footer.tpl"}