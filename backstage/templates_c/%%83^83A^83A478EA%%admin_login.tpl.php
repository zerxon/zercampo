<?php /* Smarty version 2.6.26, created on 2012-04-05 20:02:50
         compiled from admin_login.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "../../templates/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div class="container">
  	<div class="row">
  		<div class="span6 offset3">
			<?php if ($this->_tpl_vars['ERROR']): ?>
			<div class="alert">
				<a class="close" data-dismiss="alert">��</a>
				�������
			</div>
			<?php endif; ?>
			
			<div class="box">
				<h4>��̨��¼</h4>
			</div>

			<div class="box">
				<div id="field">
					<form class="form-inline" method="post" action="./admin_login.php">
						����Ա<br />
						<input class="span4" name="name" value="<?php echo $_SESSION['user']['username']; ?>
" disabled="disabled" type="text"><br /><br />
						����<br />
						<input class="span4" name="pwd" type="password"><br /><br />
						<button class="btn btn-success" name="submit" type="submit">��¼</button>
					</form>
				</div>
			</div>
		</div>
  </div>
</div>
  
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "../../templates/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>