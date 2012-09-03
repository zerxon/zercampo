<?php /* Smarty version 2.6.26, created on 2012-04-04 21:58:22
         compiled from index.tpl */ ?>
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
				<div class="box" id="sidebar">
					<header>会员统计</header>
					<ul>
						<li>会员数：<?php echo $this->_tpl_vars['COUNTLIST']['user']; ?>
</li>
						<li>管理员：<?php echo $this->_tpl_vars['COUNTLIST']['admin']; ?>
</li>
					</ul>
				</div>
				<div class="box" id="sidebar">
					<header>博客统计</header>
					<ul>
						<li>文章数：<?php echo $this->_tpl_vars['COUNTLIST']['blog']; ?>
</li>
						<li>回帖数：<?php echo $this->_tpl_vars['COUNTLIST']['review']; ?>
</li>
					</ul>
				</div>
				<div class="box" id="sidebar">
					<header>问答统计</header>
					<ul>
						<li>提问数：<?php echo $this->_tpl_vars['COUNTLIST']['ask']; ?>
</li>
						<li>回答数：<?php echo $this->_tpl_vars['COUNTLIST']['answer']; ?>
</li>
					</ul>
				</div>
				<div class="box" id="sidebar">
					<header>分享统计</header>
					<ul>
						<li>分享数：<?php echo $this->_tpl_vars['COUNTLIST']['share']; ?>
</li>
					</ul>
				</div>
			</div>
		</div>
  	</div>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "../../templates/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>