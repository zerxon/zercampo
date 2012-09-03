<?php /* Smarty version 2.6.26, created on 2012-04-04 23:25:19
         compiled from user_manage.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "../../templates/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
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
				<div class="box">
				<table align="center" class="table table-striped table-condensed">
				  <thead>
					<tr class="head">
						<th width="15%">用户名</th>
						<th width="25%">邮箱</th>
						<th width="10%">权限</th>
						<th width="10%">积分</th>
						<th width="25%">注册时间</th>
						<th width="15%">操作</th>
					</tr>
				  </thead>
				  <tbody>
				  <?php $_from = $this->_tpl_vars['USERLIST']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['i']):
?>
					<tr id="<?php echo $this->_tpl_vars['i']['uid']; ?>
">
						<td><a href="/profile/<?php echo $this->_tpl_vars['i']['username']; ?>
" target="_blank"><?php echo $this->_tpl_vars['i']['username']; ?>
</a></td>
						<td><?php echo $this->_tpl_vars['i']['email']; ?>
</td>
						<td><?php if ($this->_tpl_vars['i']['authority'] == 1): ?>站长<?php elseif ($this->_tpl_vars['i']['authority'] == 2): ?>管理员<?php else: ?>会员<?php endif; ?></td>
						<td><?php echo $this->_tpl_vars['i']['score']; ?>
</td>
						<td><?php echo $this->_tpl_vars['i']['join_time']; ?>
</td>
						<td><a href="user_manage.php?type=edit&username=<?php echo $this->_tpl_vars['i']['username']; ?>
" target="_blank">修改</a> | <a href="javascript:void(0);" onclick="del(<?php echo $this->_tpl_vars['i']['uid']; ?>
,'user');">删除</a></td>
					</tr>
				  <?php endforeach; endif; unset($_from); ?>
				  </tbody>
				</table>
				<span><?php echo $this->_tpl_vars['PAGELIST']['left']; ?>
</span><span class="right" style="color:#CCC"><?php echo $this->_tpl_vars['PAGELIST']['right']; ?>
</span>
				</div>
		</div>
  	</div>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "../../templates/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<script src="/js/turn.js"></script>
<script src="/js/delAjax.js"></script>