<?php /* Smarty version 2.6.26, created on 2012-04-07 13:44:54
         compiled from ask.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div class="container">
	<div class="row">
		<div class="span9" id="board">
			<div class="box">
			<?php $_from = $this->_tpl_vars['ITEMSARRAY']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['i']):
?>
				<div id="ask_item">
					<div><strong><a href="/asktopic/<?php echo $this->_tpl_vars['i']['date']; ?>
"><?php echo $this->_tpl_vars['i']['title']; ?>
</a></strong><span class="tips"><?php echo $this->_tpl_vars['i']['score']; ?>
分</span><?php if ($this->_tpl_vars['i']['is_adopt'] == 1): ?><span class="badge badge-success right">已选最佳答案</span><?php else: ?><span class="badge right"><?php echo $this->_tpl_vars['i']['answer_count']; ?>
</span><?php endif; ?></div>
					<div> <a href="/profile/<?php echo $this->_tpl_vars['i']['author']; ?>
"><?php echo $this->_tpl_vars['i']['author']; ?>
</a> 发问于<?php echo $this->_tpl_vars['i']['nicedate']; ?>
<?php if ($this->_tpl_vars['i']['last_replyer'] != ''): ?>，<a href="/profile/<?php echo $this->_tpl_vars['i']['author']; ?>
"><?php echo $this->_tpl_vars['i']['last_replyer']; ?>
</a> 回答于 <?php echo $this->_tpl_vars['i']['r_date']; ?>
<?php endif; ?><?php if ($this->_tpl_vars['i']['label'] != ''): ?><?php $_from = $this->_tpl_vars['i']['label']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['label']):
?>&nbsp;<span class="label"><?php echo $this->_tpl_vars['label']; ?>
</span><?php endforeach; endif; unset($_from); ?><?php endif; ?></div>
				</div>
			<?php endforeach; endif; unset($_from); ?>
			</div>
			
			<div class="box" id="footer">
				Copyright 2012 | All Rights Reserved
			</div>
			
			<div class="pagination">
			  <ul>
				<?php echo $this->_tpl_vars['PAGELIST']; ?>

			  </ul>
			</div>
		</div>
	
		<div class="span3" id="sidebar">
		<?php if ($this->_tpl_vars['ISLOGIN']): ?>
			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "userinfo.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
			<div class="box">
				<a class="btn btn-success" href="/newask">发布提问</a>
			</div>
		<?php endif; ?>
			<div class="box">
				<header>热门提问</header>
				<ul>
				<?php $_from = $this->_tpl_vars['HOTARRAY']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['i']):
?>
					<li><a href="/asktopic/<?php echo $this->_tpl_vars['i']['date']; ?>
"><?php echo $this->_tpl_vars['i']['title']; ?>
</a></li>
				<?php endforeach; endif; unset($_from); ?>
				</ul>
			</div>
			<div class="box">
				<header>统计信息</header>
				<ul>
					<li>提问数：<?php echo $this->_tpl_vars['COUNTLIST']['ask']; ?>
</li>
					<li>回答数：<?php echo $this->_tpl_vars['COUNTLIST']['answer']; ?>
</li>
				</ul>
			</div>
			
		</div>
	</div>
	
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>