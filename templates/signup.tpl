{include file="header.tpl"}
<div class="container">
  	<div class="row">
  		<div class="span6 offset3">
			<div class="box">
				<h4>�û�ע��</h4>
			</div>
		</div>
	</div>
	<div class="row">
  		<div class="span6 offset3">
				<div class="box">
					<div id="field">
						<form class="form-inline" method="post" action="/account/signup">
							�û���<br />
							<input class="span4" id="name" name="name" type="text"><br />
							<div class="tip" id="label_name">����Ӣ�ġ����֡��»��ߣ�3-10�ַ�</div><br />
							����<br />
							<input class="span4" id="email" name="email" type="text"><br />
							<div class="tip" id="label_email">���ڵ�¼�� Gravatar</div><br />
							����<br />
							<input class="span4" id="pwd" name="pwd" type="password"><br />
							<div class="tip" id="label_pwd">6-20���ַ�</div><br />
							ȷ������<br />
							<input class="span4" id="cpwd" name="cpwd" type="password"><br />
							<div class="tip" id="label_cpwd">������һ��</div><br />
							<button class="btn btn-success" name="submit" id="submit" type="submit">ע��</button>
							<label class="checkbox">
								<input type="checkbox">30�����¼
							</label>
						</form>
					</div>
				</div>
			</div>
		</div>
  </div>

{include file="footer.tpl"}
<script src="/js/regAjax.js"></script>