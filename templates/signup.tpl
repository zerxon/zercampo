{include file="header.tpl"}
<div class="container">
  	<div class="row">
  		<div class="span6 offset3">
			<div class="box">
				<h4>用户注册</h4>
			</div>
		</div>
	</div>
	<div class="row">
  		<div class="span6 offset3">
				<div class="box">
					<div id="field">
						<form class="form-inline" method="post" action="/account/signup">
							用户名<br />
							<input class="span4" id="name" name="name" type="text"><br />
							<div class="tip" id="label_name">仅限英文、数字、下划线，3-10字符</div><br />
							邮箱<br />
							<input class="span4" id="email" name="email" type="text"><br />
							<div class="tip" id="label_email">用于登录和 Gravatar</div><br />
							密码<br />
							<input class="span4" id="pwd" name="pwd" type="password"><br />
							<div class="tip" id="label_pwd">6-20个字符</div><br />
							确认密码<br />
							<input class="span4" id="cpwd" name="cpwd" type="password"><br />
							<div class="tip" id="label_cpwd">与密码一致</div><br />
							<button class="btn btn-success" name="submit" id="submit" type="submit">注册</button>
							<label class="checkbox">
								<input type="checkbox">30天免登录
							</label>
						</form>
					</div>
				</div>
			</div>
		</div>
  </div>

{include file="footer.tpl"}
<script src="/js/regAjax.js"></script>