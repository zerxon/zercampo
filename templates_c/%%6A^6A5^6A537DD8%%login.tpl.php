<?php /* Smarty version 2.6.26, created on 2012-04-06 10:08:23
         compiled from login.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div class="container">
  	<div class="row">
  		<div class="span6 offset3">
			<?php if ($this->_tpl_vars['ERROR']): ?>
			<div class="alert">
				<a class="close" data-dismiss="alert">��</a>
				�û��������������
			</div>
			<?php endif; ?>
			
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
  
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>