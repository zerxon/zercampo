<?php /* Smarty version 2.6.26, created on 2012-04-05 11:10:36
         compiled from list.tpl */ ?>
<div class="box">
	<ul class="nav nav-pills nav-stacked">
		<li class="nav-header">MANAGER LIST</li>
		<li<?php if ($this->_tpl_vars['LOCATE'] == 'home'): ?> class="active"<?php endif; ?>><a href="./"><i class="icon-home"></i> ��̨��ҳ</a></li>
		<li<?php if ($this->_tpl_vars['LOCATE'] == 'blog_manage'): ?> class="active"<?php endif; ?>><a href="./blog_manage.php"><i class="icon-th-list"></i> ���͹���</a></li>
		<li<?php if ($this->_tpl_vars['LOCATE'] == 'ask_manage'): ?> class="active"<?php endif; ?>><a href="./ask_manage.php"><i class="icon-list"></i> �ʴ����</a></li>
		<li<?php if ($this->_tpl_vars['LOCATE'] == 'share_manage'): ?> class="active"<?php endif; ?>><a href="./share_manage.php"><i class="icon-share"></i> ��Դ����</a></li>
		<?php if ($_SESSION['user']['authority'] == 1): ?><li<?php if ($this->_tpl_vars['LOCATE'] == 'user_manage'): ?> class="active"<?php endif; ?>><a href="./user_manage.php"><i class="icon-user"></i> ��Ա����</a></li><?php endif; ?>
	</ul>
</div>

<?php if ($this->_tpl_vars['LOCATE'] != 'home'): ?>
<div class="box">
	<span class="form-inline"><input class="span2" id="page" type="text" /><a class="btn right" name="<?php echo $this->_tpl_vars['LOCATE']; ?>
" id="turn">��ת</a></span>
</div>
<?php endif; ?>