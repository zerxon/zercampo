<?php /* Smarty version 2.6.26, created on 2012-04-21 12:23:41
         compiled from ask_manage.tpl */ ?>
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
					<a class="close" id="close">��</a>
					<div id="error_txt"></div>
				</div>			
				<div class="box">
				<?php if ($this->_tpl_vars['ASKLIST']): ?>
				<table align="center" class="table table-striped table-condensed">
				  <thead>
					<tr class="head">
						<th width="30%">����</th>
						<th width="10%">����</th>
						<th width="20%">������</th>
						<th width="10%">�ش���</th>
						<th width="10%">��ѡ��</th>
						<th width="20%">����</th>
					</tr>
				  </thead>
				  <tbody>
				  <?php $_from = $this->_tpl_vars['ASKLIST']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['i']):
?>
					<tr id="<?php echo $this->_tpl_vars['i']['date']; ?>
">
						<td><a href="/asktopic/<?php echo $this->_tpl_vars['i']['date']; ?>
" target="_blank"><?php echo $this->_tpl_vars['i']['title']; ?>
</a></td>
						<td><?php echo $this->_tpl_vars['i']['author']; ?>
</td>
						<td><?php echo $this->_tpl_vars['i']['nicedate']; ?>
</td>
						<td><?php echo $this->_tpl_vars['i']['answer_count']; ?>
</td>
						<td><?php if ($this->_tpl_vars['i']['is_adopt'] == 1): ?>Yes<?php else: ?>No<?php endif; ?></td>
						<td><a href="/asktopic/<?php echo $this->_tpl_vars['i']['date']; ?>
/edit" target="_blank">�༭</a> | <a class="pointer" onclick="del(<?php echo $this->_tpl_vars['i']['date']; ?>
,'ask');">ɾ��</a> | <a href="ask_manage.php?aid=<?php echo $this->_tpl_vars['i']['date']; ?>
&type=answer">�鿴�ش�</a></td>
					</tr>
				  <?php endforeach; endif; unset($_from); ?>
				  </tbody>
				</table>
				<?php elseif ($this->_tpl_vars['ANSWERLIST']): ?>
				<table align="center" class="table table-striped table-condensed">
				  <thead>
					<tr class="head">
						<th width="40%">����</th>
						<th width="10%">����</th>
						<th width="25%">������</th>
						<th width="10%">���</th>
						<th width="15%">����</th>
					</tr>
				  </thead>
				  <tbody>
				  <?php $_from = $this->_tpl_vars['ANSWERLIST']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['i']):
?>
					<tr id="<?php echo $this->_tpl_vars['i']['date']; ?>
">
						<td><?php echo $this->_tpl_vars['i']['answer_content']; ?>
</td>
						<td><a href="/profile/<?php echo $this->_tpl_vars['i']['author']; ?>
" target="_blank"><?php echo $this->_tpl_vars['i']['author']; ?>
</a></td>
						<td><?php echo $this->_tpl_vars['i']['nicedate']; ?>
</td>
						<td>#<?php echo $this->_tpl_vars['i']['order_id']; ?>
</td>
						<td><a href="/reply/<?php echo $this->_tpl_vars['i']['date']; ?>
/asktopic/<?php echo $this->_tpl_vars['AID']; ?>
" target="_blank">�༭</a> | <a class="pointer" onclick="del(<?php echo $this->_tpl_vars['i']['date']; ?>
,'answer');">ɾ��</a></td>
					</tr>
				  <?php endforeach; endif; unset($_from); ?>
				  </tbody>
			    </table>
			    <?php endif; ?>
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