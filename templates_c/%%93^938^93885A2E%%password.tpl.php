<?php /* Smarty version 2.6.26, created on 2012-04-07 16:41:58
         compiled from password.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
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
			<?php if ($this->_tpl_vars['ISLOGIN']): ?>
				<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "userinfo.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
			<?php endif; ?>
				<div class="box">
					<div><a href="/setting">��������</a></div>
					<div class="line"></div>
					<div>�޸�����</div>
					<div class="line"></div>
					<div><a href="/profile">������ҳ</a></div>
				</div>
			</div>
			
			<div class="span9">
				<?php if ($this->_tpl_vars['SUCCESS']): ?>
				<div class="alert alert-success">
					<a class="close" data-dismiss="alert">��</a>
					�޸ĳɹ�
				</div>
				<?php endif; ?>
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
  
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>