<?php /* Smarty version 2.6.26, created on 2012-04-05 11:08:03
         compiled from user_edit.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "../../templates/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<div class="container">
		<ul class="breadcrumb">
		  <li>
		    <a href="./user_manage.php">会员管理</a> <span class="divider">/</span>
		  </li>
		  <li>
		    会员编辑
		  </li>
		</ul>
	</div>
	
	<div class="container">
		<div class="row">
			<div class="span3" id="sidebar">
			<?php if ($this->_tpl_vars['ISLOGIN']): ?>
				<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "../../templates/userinfo.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
			<?php endif; ?>
			
				<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "list.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
			</div>
			
			<div class="span9">
				<?php if ($this->_tpl_vars['SUCCESS']): ?>
				<div class="alert alert-success">
					<a class="close" data-dismiss="alert">×</a>
					修改成功
				</div>
				<?php endif; ?>
				<div class="box" id="board">
					<div class="header">资料修改</div>
					<form method="post" action="./user_manage.php?type=edit&username=<?php echo $this->_tpl_vars['USER']['username']; ?>
">
						<table width="100%">
							<tr>
								<td width="70px">头像：</td>
								<td><img class="pic s130" src="http://gravatar.com/avatar/<?php echo $this->_tpl_vars['USER']['gravatar']; ?>
.png?r=G&amp;s=130"><div id="gravatar"><a href="http://www.gravatar.com/" target="_blank">gravatar.com</a></div></td>
							</tr>
							<tr>
								<td>用户名：</td>
								<td><input class="span4" name="name" value="<?php echo $this->_tpl_vars['USER']['username']; ?>
" type="text"></td>
							</tr>
							<tr>
								<td>E-mail：</td>
								<td><input class="span4" name="email" value="<?php echo $this->_tpl_vars['USER']['email']; ?>
" type="text"></td>
							</tr>
							<tr>
								<td>权限：</td>
								<td>
								<select id="select" name="authority">
									<option <?php if ($this->_tpl_vars['USER']['authority'] == 2): ?>selected="selected"<?php endif; ?> value="2">管理员</option>
									<option <?php if ($this->_tpl_vars['USER']['authority'] == 3): ?>selected="selected"<?php endif; ?> value="3">普通会员</option>
								</select>
								</td>
							</tr>
							<tr>
								<td>积分：</td>
								<td><input class="span4" name="score"  value="<?php echo $this->_tpl_vars['USER']['score']; ?>
" type="text"></td>
							</tr>
							<tr>
								<td>QQ：</td>
								<td><input class="span4" name="qq"  value="<?php echo $this->_tpl_vars['USER']['qq']; ?>
" type="text"></td>
							</tr>
							<tr>
								<td>微博：</td>
								<td><input class="span4" name="weibo"  value="<?php echo $this->_tpl_vars['USER']['weibo']; ?>
" type="text"></td>
							</tr>
							<tr>
								<td>个人主页：</td>
								<td><input class="span4" id="prependedInput" name="url"  value="<?php echo $this->_tpl_vars['USER']['web_url']; ?>
" type="text"></td>
							</tr>
							<tr>
								<td>个人描述：</td>
								<td><textarea class="span6" rows="4" name="desc"><?php echo $this->_tpl_vars['USER']['description']; ?>
</textarea></td>
							</tr>
							<tr>
								<td><input name="uid" value="<?php echo $this->_tpl_vars['USER']['uid']; ?>
" type="hidden" /></td>
								<td><button class="btn btn-success" name="submit" type="submit">保存修改</button></td>
							</tr>
						</table>
					</form>
				</div>
			</div>
		</div>
  </div>
  
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "../../templates/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>