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
		  	<li>个人设置</li><span class="divider">/</span>
		  <li>
		    修改密码
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
					<div><a href="/setting">基本资料</a></div>
					<div class="line"></div>
					<div>修改密码</div>
					<div class="line"></div>
					<div><a href="/profile">个人主页</a></div>
				</div>
			</div>
			
			<div class="span9">
				<?php if ($this->_tpl_vars['SUCCESS']): ?>
				<div class="alert alert-success">
					<a class="close" data-dismiss="alert">×</a>
					修改成功
				</div>
				<?php endif; ?>
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
  
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>