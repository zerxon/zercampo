<?php /* Smarty version 2.6.26, created on 2012-04-21 12:22:36
         compiled from blog_manage.tpl */ ?>
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
				<div class="alert" id="label_error" style="display:none">
					<a class="close" id="close">×</a>
					<div id="error_txt"></div>
				</div>
				<div class="box">
				<?php if ($this->_tpl_vars['TOPICLIST']): ?>
				<table align="center" class="table table-striped table-condensed">
				  <thead>
					<tr class="head">
						<th width="30%">标题</th>
						<th width="10%">作者</th>
						<th width="20%">发布于</th>
						<th width="10%">浏览量</th>
						<th width="10%">回复量</th>
						<th width="20%">操作</th>
					</tr>
				  </thead>
				  <tbody>
				  <?php $_from = $this->_tpl_vars['TOPICLIST']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['i']):
?>
					<tr id="<?php echo $this->_tpl_vars['i']['date']; ?>
">
						<td><a href="/topic/<?php echo $this->_tpl_vars['i']['date']; ?>
" target="_blank"><?php echo $this->_tpl_vars['i']['title']; ?>
</a></td>
						<td><a href="/profile/<?php echo $this->_tpl_vars['i']['author']; ?>
" target="_blank"><?php echo $this->_tpl_vars['i']['author']; ?>
</a></td>
						<td><?php echo $this->_tpl_vars['i']['nicedate']; ?>
</td>
						<td><?php echo $this->_tpl_vars['i']['view_count']; ?>
</td>
						<td><?php echo $this->_tpl_vars['i']['reply_count']; ?>
</td>
						<td><a href="/topic/<?php echo $this->_tpl_vars['i']['date']; ?>
/edit" target="_blank">编辑</a> | <a class="pointer" onclick="del(<?php echo $this->_tpl_vars['i']['date']; ?>
,'blog');">删除</a> | <a href="blog_manage.php?bid=<?php echo $this->_tpl_vars['i']['date']; ?>
&type=reply">查看回复</a></td>
					</tr>
				  <?php endforeach; endif; unset($_from); ?>
				  </tbody>
				</table>
				<?php elseif ($this->_tpl_vars['REPLYLIST']): ?>
				<table align="center" class="table table-striped table-condensed">
				  <thead>
					<tr class="head">
						<th width="40%">内容</th>
						<th width="10%">作者</th>
						<th width="25%">发布于</th>
						<th width="10%">序号</th>
						<th width="15%">操作</th>
					</tr>
				  </thead>
				  <tbody>
				  <?php $_from = $this->_tpl_vars['REPLYLIST']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['i']):
?>
					<tr id="<?php echo $this->_tpl_vars['i']['date']; ?>
">
						<td><?php echo $this->_tpl_vars['i']['reply_content']; ?>
</td>
						<td><a href="/profile/<?php echo $this->_tpl_vars['i']['author']; ?>
" target="_blank"><?php echo $this->_tpl_vars['i']['author']; ?>
</a></td>
						<td><?php echo $this->_tpl_vars['i']['nicedate']; ?>
</td>
						<td>#<?php echo $this->_tpl_vars['i']['order_id']; ?>
</td>
						<td><a href="/reply/<?php echo $this->_tpl_vars['i']['date']; ?>
/topic/<?php echo $this->_tpl_vars['BID']; ?>
" target="_blank">编辑</a> | <a href="javascript:void(0);" onclick="del(<?php echo $this->_tpl_vars['i']['date']; ?>
,'review');">删除</a></td>
					</tr>
				  <?php endforeach; endif; unset($_from); ?>
				  </tbody>
			    </table>
			    <?php endif; ?>
			    <span><?php echo $this->_tpl_vars['PAGELIST']['left']; ?>
</span>&nbsp;&nbsp;<span class="right" style="color:#CCC"><?php echo $this->_tpl_vars['PAGELIST']['right']; ?>
</span>
			    </div>
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