<?php /* Smarty version 2.6.26, created on 2012-04-07 16:38:00
         compiled from favorites.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<div class="container">
		<ul class="breadcrumb">
		  <li>
		    <a href="/profile"><?php echo $_SESSION['user']['username']; ?>
</a> <span class="divider">/</span>
		  </li>
		  <li>我的收藏夹</li>
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
					<header>收藏统计</header>
					<ul>
						<li>博客：<?php echo $this->_tpl_vars['total_blog']; ?>
</li>
						<li>问答：<?php echo $this->_tpl_vars['total_ask']; ?>
</li>
						<li>分享：<?php echo $this->_tpl_vars['total_share']; ?>
</li>
					</ul>
				</div>
			</div>
			
			<div class="span9">
				<div class="box" id="board">
					<div class="header">我的收藏夹</div>
					<ul class="nav nav-tabs">
					  <li class="active"><a href="#blog" data-toggle="tab">博客</a></li>
					  <li><a href="#ask" data-toggle="tab">问答</a></li>
					  <li><a href="#share" data-toggle="tab">资源</a></li>
					</ul>
					<div id="myTabContent" class="tab-content">
            <div class="tab-pane fade in active" id="blog">
			<table class="list" width="100%" cellpadding="3">
			<?php $_from = $this->_tpl_vars['BLOGLIST']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['i']):
?>
				<tr>
					<td><a href="/topic/<?php echo $this->_tpl_vars['i']['date']; ?>
" target="_blank"><?php echo $this->_tpl_vars['i']['title']; ?>
</a></td>
				</tr>
			<?php endforeach; endif; unset($_from); ?>
			</table>
            </div>
            <div class="tab-pane fade" id="ask">
			<table class="list" width="100%" cellpadding="3">
			<?php $_from = $this->_tpl_vars['ASKLIST']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['i']):
?>
				<tr>
					<td><a href="/topic/<?php echo $this->_tpl_vars['i']['date']; ?>
" target="_blank"><?php echo $this->_tpl_vars['i']['title']; ?>
</a></td>
				</tr>
			<?php endforeach; endif; unset($_from); ?>
			</table>
            </div>
            <div class="tab-pane fade" id="share">
			<table class="list" width="100%" cellpadding="3">
			<?php $_from = $this->_tpl_vars['SHARELIST']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['i']):
?>
				<tr>
					<td><a href="<?php echo $this->_tpl_vars['i']['url']; ?>
" target="_blank"><?php echo $this->_tpl_vars['i']['title']; ?>
</a></td>
				</tr>
			<?php endforeach; endif; unset($_from); ?>
			</table>
            </div>
          </div>
				</div>
			</div>
			
		</div>
  </div>
  
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>