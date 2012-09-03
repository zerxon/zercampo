<?php /* Smarty version 2.6.26, created on 2012-04-13 19:24:20
         compiled from reply.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<div class="container">
		<ul class="breadcrumb">
		  <li>
		    <?php if ($this->_tpl_vars['LOCATE'] == 'blog'): ?><a href="/blog">博客</a><?php else: ?><a href="/ask">问答</a><?php endif; ?> <span class="divider">/</span>
		  </li>
		  <li class="active"> <?php if ($this->_tpl_vars['LOCATE'] == 'blog'): ?>评论修改<?php else: ?>答案修改<?php endif; ?></li>
		</ul>
	</div>
	
	<div class="container">
		<div class="row">
			<div class="span9" id="board">
				<div class="alert" id="label_error" style="display:none">
					<a class="close" id="close">×</a>
					<div id="error_txt"></div>
				</div>
				<div class="alert" id="label_error" style="display:none">
					<a class="close" id="close">×</a>
					<div id="error_txt"></div>
				</div>
				<div class="box">
				<form method="post" action="/reply/<?php echo $this->_tpl_vars['REPLY']['rid']; ?>
/<?php echo $this->_tpl_vars['REPLY']['type']; ?>
/<?php echo $this->_tpl_vars['REPLY']['bid']; ?>
">
					<div id="wmd-button-bar"></div>
					<div><textarea style="width:98%;" id="textarea" name="content" rows="8"><?php echo $this->_tpl_vars['REPLY']['content']; ?>
</textarea></div>
					<div style="text-align:right;margin-bottom:6px;"><input class="btn" id="submit" name="submit" value="更新" type="submit" /></div>
					<div id="wmd-preview"></div>
					<div><input id="wmd-html" name="wmd-html" type="hidden"></input></div>
				</form>
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

<link rel="stylesheet" type="text/css" href="/js/wmd/wmd.css"/>
<script src="/js/wmd/wmd.combined.min.js"></script>
<script src="/js/wmd/wmd.js"></script>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php echo '
<script language="javascript">
$(document).ready(function(){
	$("#submit").click(function(){
		if(!$.trim($("#textarea").val())){
			$("#label_error").slideDown();
			$("#error_txt").text(\'内容不能为空\');
			return false;
		}
	});
	
	$("#close").click(function(){
		$("#label_error").slideUp();
	});
});
</script>
'; ?>