<?php /* Smarty version 2.6.26, created on 2012-04-07 16:41:52
         compiled from newask.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<div class="container">
		<ul class="breadcrumb">
		  <li>
		    <a href="/blog">问答</a> <span class="divider">/</span>
		  </li>
		  <li class="active">发布提问</li>
		</ul>
	</div>
	
	<div class="container">
		<div class="row">
			<div class="span9" id="board">
				<div class="box">
				<form method="post" action="<?php if ($this->_tpl_vars['ASK']): ?>/asktopic/<?php echo $this->_tpl_vars['ASK']['date']; ?>
/edit<?php else: ?>/newask<?php endif; ?>">
				<table width="100%" cellpadding="3">
					<tr>
						<td width="9%">标题：</td>
						<td><input class="span4" id="title" name="title" value="<?php echo $this->_tpl_vars['ASK']['title']; ?>
" type="text" /></td>
					</tr>
					<tr>
						<td>标签：</td>
						<td><input class="span4" id="label" name="label" value="<?php if ($this->_tpl_vars['ASK']['label'] != ""): ?><?php $_from = $this->_tpl_vars['ASK']['label']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['i']):
?><?php echo $this->_tpl_vars['i']; ?>
<?php endforeach; endif; unset($_from); ?><?php endif; ?>" type="text" /><span style="margin-left:5px;color:#999">中间用"|"号隔开，如：php|ruby</span></td>
					</tr>
					<tr>
						<td>分数：</td>
						<td>
						<?php if ($this->_tpl_vars['ASK']['score']): ?><?php echo $this->_tpl_vars['ASK']['score']; ?>
分 +<?php endif; ?>
						<select id="select" name="score">
							<option value="0">0分</option>
							<option value="3">3分</option>
							<option value="5">5分</option>
							<option value="10">10分</option>
							<option value="15">15分</option>
							<option value="30">30分</option>
							<option value="60">60分</option>
						</select>
						<span id="label_select"></span>
						</td>
					</tr>
					<tr>
						<td>正文：</td>
						<td>
							<div id="wmd-button-bar"></div>
							<textarea class="span8" id="textarea" name="content" rows="20"><?php echo $this->_tpl_vars['ASK']['content']; ?>
</textarea>
						</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td><input class="btn right" id="submit" name="submit" value="发布" type="submit" /></td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td><div id="wmd-preview"></div></td>
					</tr>
				</table>
				<input id="wmd-html" name="wmd-html" type="hidden"></input>
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
<script type="text/javascript" src="/js/topicAjax.js"></script>