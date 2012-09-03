<?php /* Smarty version 2.6.26, created on 2012-04-10 21:58:10
         compiled from blog.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<div class="container">
		<div class="row">
			<div class="span9" id="board">
				<div class="box" id="content">
				<?php $_from = $this->_tpl_vars['ITEMS_ARRAY']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['i']):
?>
					<div id="blog_item">
					<table width="100%">
						<tr>
							<td rowspan="2" width="54px;"><a href="/profile/<?php echo $this->_tpl_vars['i']['author']; ?>
"><img class="pic s48" src="http://gravatar.com/avatar/<?php echo $this->_tpl_vars['i']['img']; ?>
.png?r=G&amp;s=48"></a></td>
							<td><strong><a href="/topic/<?php echo $this->_tpl_vars['i']['id']; ?>
"><?php echo $this->_tpl_vars['i']['title']; ?>
</a></strong><span class="badge badge-info right"><?php echo $this->_tpl_vars['i']['replies']; ?>
</span></td>
						</tr>
						<tr>
							<td><a href="/profile/<?php echo $this->_tpl_vars['i']['author']; ?>
"><?php echo $this->_tpl_vars['i']['author']; ?>
</a> 发布于 <?php echo $this->_tpl_vars['i']['date']; ?>
<?php if ($this->_tpl_vars['i']['last_replyer'] != '' && $this->_tpl_vars['i']['r_date'] != ''): ?>，<a href="/profile/<?php echo $this->_tpl_vars['i']['last_replyer']; ?>
"><?php echo $this->_tpl_vars['i']['last_replyer']; ?>
</a> 回复于 <?php echo $this->_tpl_vars['i']['r_date']; ?>
<?php endif; ?><?php if ($this->_tpl_vars['i']['label'] != ''): ?><?php $_from = $this->_tpl_vars['i']['label']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['label']):
?>&nbsp;<span class="label"><?php echo $this->_tpl_vars['label']; ?>
</span><?php endforeach; endif; unset($_from); ?><?php endif; ?></td>
						</tr>
					</table>
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
					<a href="/newtopic" class="btn btn-success">发布文章</a>
				</div>
			<?php endif; ?>
				<div class="box">
					<header>热门文章</header>
					<ul>
					<?php $_from = $this->_tpl_vars['HOTARRAY']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['i']):
?>
						<li><a href="/topic/<?php echo $this->_tpl_vars['i']['date']; ?>
"><?php echo $this->_tpl_vars['i']['title']; ?>
</a></li>
					<?php endforeach; endif; unset($_from); ?>
					</ul>
				</div>
				<div class="box">
					<header>统计信息</header>
					<ul>
						<li>文章数：<?php echo $this->_tpl_vars['COUNTLIST']['blog']; ?>
</li>
						<li>回帖数：<?php echo $this->_tpl_vars['COUNTLIST']['review']; ?>
</li>
					</ul>
				</div>
			</div>
			
		</div>
  </div>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>