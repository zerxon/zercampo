<?php /* Smarty version 2.6.26, created on 2012-04-07 22:29:28
         compiled from setting.tpl */ ?>
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
		  	个人设置</a><span class="divider">/</span>
		  <li>
		    我的资料
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
					<div>基本资料</div>
					<div class="line"></div>
					<div><a href="/setting/password">修改密码</a></div>
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
					<div class="header">资料修改</div>
					<form method="post" action="/setting">
						<table width="100%">
							<tr>
								<td width="70px">头像：</td>
								<td><img class="pic s130" src="http://gravatar.com/avatar/<?php echo $this->_tpl_vars['USER']['gravatar']; ?>
.png?r=G&amp;s=130"><div id="gravatar"><a href="http://www.gravatar.com/" target="_blank">gravatar.com</a></div></td>
							</tr>
							<tr>
								<td>用户名：</td>
								<td><input class="span4" name="name" value="<?php echo $this->_tpl_vars['USER']['username']; ?>
" disabled="disabled" type="text"></td>
							</tr>
							<tr>
								<td>E-mail：</td>
								<td><input class="span4" name="email" value="<?php echo $this->_tpl_vars['USER']['email']; ?>
" disabled="disabled" type="text"></td>
							</tr>
							<tr>
								<td>QQ：</td>
								<td><input class="span4" id="qq" name="qq"  value="<?php echo $this->_tpl_vars['USER']['qq']; ?>
" type="text"> <span class="error" id="label_qq"></span></td>
							</tr>
							<tr>
								<td>微博：</td>
								<td><input class="span4" id="weibo" name="weibo"  value="<?php echo $this->_tpl_vars['USER']['weibo']; ?>
" type="text"> <span class="error" id="label_weibo"></span></td>
							</tr>
							<tr>
								<td>个人主页：</td>
								<td><input class="span4" id="url" name="url"  value="<?php echo $this->_tpl_vars['USER']['web_url']; ?>
" type="text"> <span class="error" id="label_url"></span></td>
							</tr>
							<tr>
								<td>个人描述：</td>
								<td><textarea class="span6" rows="4" name="desc"><?php echo $this->_tpl_vars['USER']['description']; ?>
</textarea></td>
							</tr>
							<tr>
								<td>&nbsp;</td>
								<td><button class="btn btn-success" id="info_submit" name="info_submit" type="submit">保存修改</button></td>
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
<script type="text/javascript" src="/js/setting.js"></script>