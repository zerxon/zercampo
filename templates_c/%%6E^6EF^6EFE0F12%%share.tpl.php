<?php /* Smarty version 2.6.26, created on 2012-04-21 12:21:22
         compiled from share.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div id="loading"><span class="label label-warning">loading...</span></div>
<div class="container">
	<div class="row">
		<div class="span9" id="board">
			<div class="box">
			<?php $_from = $this->_tpl_vars['ITEMARRAY']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['i']):
?>
				<div id="ask_item">
					<div><strong><a href="<?php echo $this->_tpl_vars['i']['url']; ?>
" target="_blank"><?php echo $this->_tpl_vars['i']['title']; ?>
</a></strong><span id="<?php echo $this->_tpl_vars['i']['date']; ?>
_count" class="badge badge-warning right"><?php echo $this->_tpl_vars['i']['collect_count']; ?>
</span></div>
					<div><a href="http://<?php echo $this->_tpl_vars['i']['website']; ?>
" target="_blank"><?php echo $this->_tpl_vars['i']['website']; ?>
</a> -<a href="/profile/<?php echo $this->_tpl_vars['i']['author']; ?>
"> <?php echo $this->_tpl_vars['i']['author']; ?>
 </a>分享于<?php echo $this->_tpl_vars['i']['nicedate']; ?>
 <?php if ($_SESSION['user'] != ""): ?>[<a class="pointer" id="<?php echo $this->_tpl_vars['i']['date']; ?>
" onclick="collect('<?php echo $this->_tpl_vars['i']['date']; ?>
')"><?php if ($this->_tpl_vars['i']['mark']): ?>已收藏<?php else: ?>收藏<?php endif; ?></a>]<?php endif; ?></div>
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
				<a class="btn btn-success" data-toggle="modal" href="#newshare" >分享资源</a>
			</div>
		<?php endif; ?>
			<div class="box">
				<header>热门资源</header>
				<ul>
				<?php $_from = $this->_tpl_vars['HOTARRAY']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['i']):
?>
					<li><a href="<?php echo $this->_tpl_vars['i']['url']; ?>
"><?php echo $this->_tpl_vars['i']['title']; ?>
</a></li>
				<?php endforeach; endif; unset($_from); ?>
				</ul>
			</div>
			<div class="box">
				<header>统计信息</header>
				<ul>
					<li>资源数：<?php echo $this->_tpl_vars['TOTAL']; ?>
</li>
				</ul>
			</div>
			
		</div>
	</div>
	
	<form method="post" action="/share">
		<div class="modal hide fade" id="newshare">
		  <div class="modal-header">
			<a class="close" data-dismiss="modal">×</a>
			<h3>分享资源</h3>
		  </div>
		  <div class="modal-body">
			<table width="100%">
				<tr>
					<td width="15%">标题：</td>
					<td><input style="width:95%" name="sharetitle" type="text" /></td>
				</tr>
				<tr>
					<td>URL：</td>
					<td><input style="width:95%" name="shareurl" type="text" /></td>
				</tr>
			</table>
		  </div>
		  <div class="modal-footer">
			<input class="btn btn-success" name="submit" value="分享" type="submit" />
		  </div>
		</div>
	</form>
	
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<script src="/js/shareAjax.js"></script>