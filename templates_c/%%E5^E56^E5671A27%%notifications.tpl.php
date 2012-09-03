<?php /* Smarty version 2.6.26, created on 2012-06-07 09:48:00
         compiled from notifications.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>	
	<div class="container">
		<div class="row">
			<div class="span9" id="board">
				<div class="alert" id="label_error" style="display:none">
					<a class="close" id="close">×</a>
					<div id="error_txt"></div>
				</div>
				<div class="box" id="replies">
					<div class="title">消息</div>
					<?php $_from = $this->_tpl_vars['NOTICE']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['i']):
?>
					<div id="<?php echo $this->_tpl_vars['i']['nid']; ?>
">
						<div id="reply">
							<div class="pull-left face"><a href="/profile/<?php echo $this->_tpl_vars['i']['author']; ?>
"><img class="pic s48" src="http://gravatar.com/avatar/<?php echo $this->_tpl_vars['i']['img']; ?>
.png?r=G&amp;s=48" /></a></div>
							<div class="infos">
								<div class="info"  style="color:#999;">
									<span class="author"><a href="/profile/<?php echo $this->_tpl_vars['i']['author']; ?>
" data-name=""><?php echo $this->_tpl_vars['i']['author']; ?>
</a> 于 <?php echo $this->_tpl_vars['i']['nicedate']; ?>
 在 <a href="/<?php if ($this->_tpl_vars['i']['type'] == 1 || $this->_tpl_vars['i']['type'] == 3 || $this->_tpl_vars['i']['type'] == 5): ?>topic<?php elseif ($this->_tpl_vars['i']['type'] == 2 || $this->_tpl_vars['i']['type'] == 4 || $this->_tpl_vars['i']['type'] == 6): ?>asktopic<?php endif; ?>/<?php echo $this->_tpl_vars['i']['id']; ?>
"><?php echo $this->_tpl_vars['i']['title']; ?>
</a> <?php if ($this->_tpl_vars['i']['type'] == 1): ?>回复你：<?php elseif ($this->_tpl_vars['i']['type'] == 2): ?>回答你：<?php else: ?>提及你：<?php endif; ?><?php if ($this->_tpl_vars['i']['is_read'] == 0): ?><span class="label label-warning">New</span><?php endif; ?></span>
									<span class="date"><a class="pointer" onclick="del(<?php echo $this->_tpl_vars['i']['nid']; ?>
,'notifications')"><span class="icon-remove"></span></a></span>
								</div>
								<div class="body">
									<?php echo $this->_tpl_vars['i']['content']; ?>

								</div>
							</div>
						</div>
					</div>
		  			<?php endforeach; endif; unset($_from); ?>
				</div>
			</div>
			
			<div class="span3" id="sidebar">
			<?php if ($this->_tpl_vars['ISLOGIN']): ?>
				<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "userinfo.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
			<?php endif; ?>
			</div>
		</div>
	</div>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<script src="/js/delAjax.js"></script>