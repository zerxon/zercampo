<?php /* Smarty version 2.6.26, created on 2012-04-21 12:23:44
         compiled from share_manage.tpl */ ?>
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
						<th width="40%">标题</th>
						<th width="10%">作者</th>
						<th width="25%">发布于</th>
						<th width="10%">收藏量</th>
						<th width="15%">操作</th>
					</tr>
				  </thead>
				  <tbody>
				  <?php $_from = $this->_tpl_vars['SHARELIST']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['i']):
?>
					<tr id="<?php echo $this->_tpl_vars['i']['date']; ?>
">
						<td><a href="<?php echo $this->_tpl_vars['i']['url']; ?>
" target="_blank"><?php echo $this->_tpl_vars['i']['title']; ?>
</a></td>
						<td><?php echo $this->_tpl_vars['i']['author']; ?>
</td>
						<td><?php echo $this->_tpl_vars['i']['nicedate']; ?>
</td>
						<td><?php echo $this->_tpl_vars['i']['collect_count']; ?>
</td>
						<td><a class="pointer" onclick="del(<?php echo $this->_tpl_vars['i']['date']; ?>
,'share');">删除</a></td>
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