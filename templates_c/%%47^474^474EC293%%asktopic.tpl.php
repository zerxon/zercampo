<?php /* Smarty version 2.6.26, created on 2012-04-22 23:15:29
         compiled from asktopic.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<div id="loading"><span class="label label-warning">loading...</span></div>
	<div class="container">
		<ul class="breadcrumb">
		  <li>
		    <a href="/ask">问答</a> <span class="divider">/</span>
		  </li>
		  <li class="active"><?php echo $this->_tpl_vars['ASK']['title']; ?>
</li>
		</ul>
	</div>
	
	<div class="container">
		<div class="row">
			<div class="span9" id="board">
				<div class="box" id="content">
					<div id="header">
						<div><span class="title"><?php echo $this->_tpl_vars['ASK']['title']; ?>
</span></div>
						<?php if ($this->_tpl_vars['ASK']['label'] != ''): ?><div><?php $_from = $this->_tpl_vars['ASK']['label']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['label']):
?><span class="label"><?php echo $this->_tpl_vars['label']; ?>
</span>&nbsp;<?php endforeach; endif; unset($_from); ?></div><?php endif; ?>
						<div class="info">
							<a href="/profile/<?php echo $this->_tpl_vars['ASK']['author']; ?>
"><?php echo $this->_tpl_vars['ASK']['author']; ?>
</a> 提问于 <?php echo $this->_tpl_vars['ASK']['nicedate']; ?>
，<?php if ($this->_tpl_vars['ASK']['last_edit_time'] != ''): ?>最后更新于 <?php echo $this->_tpl_vars['ASK']['last_edit_time']; ?>
，<?php endif; ?><?php echo $this->_tpl_vars['ASK']['answer_count']; ?>
条回答，<?php echo $this->_tpl_vars['ASK']['score']; ?>
分&nbsp;&nbsp;<?php if ($this->_tpl_vars['ISLOGIN'] && $_SESSION['user']['username'] == $this->_tpl_vars['ASK']['author']): ?><a href="/asktopic/<?php echo $this->_tpl_vars['ASK']['date']; ?>
/edit">编辑</a><?php endif; ?>
							<span class="right"><?php if ($this->_tpl_vars['ISLOGIN']): ?><a class="pointer" id="mark" name="ask|<?php echo $this->_tpl_vars['ASK']['date']; ?>
"><?php if ($this->_tpl_vars['ASK']['mark']): ?>已收藏<?php else: ?>收藏<?php endif; ?></a><?php endif; ?> <span id="collect_total"><?php if ($this->_tpl_vars['ASK']['collect_count'] > 0): ?><?php echo $this->_tpl_vars['ASK']['collect_count']; ?>
人收藏<?php endif; ?></span></span>
						</div>
					</div>
						<?php echo $this->_tpl_vars['ASK']['content']; ?>

			  </div>
				
			 	<div class="box" id="replies">
			 		<div class="title">回答</div>
			 		<?php $_from = $this->_tpl_vars['ANSWERARRAY']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['i']):
?>
					<div id="reply">
						<div class="pull-left face"><a href="/profile/<?php echo $this->_tpl_vars['i']['author']; ?>
"><img class="pic s48" src="http://gravatar.com/avatar/<?php echo $this->_tpl_vars['i']['img']; ?>
.png?r=G&amp;s=48" /></a></div>
							<div class="infos">
							<div class="info">
							<span class="author"><a href="/profile/<?php echo $this->_tpl_vars['i']['author']; ?>
" data-name=""><?php echo $this->_tpl_vars['i']['author']; ?>
</a></span>
							<span class="date"><?php if (! $this->_tpl_vars['ASK']['is_adopt'] && $_SESSION['user']['username'] == $this->_tpl_vars['ASK']['author']): ?><a href="/asktopic/<?php echo $this->_tpl_vars['ASK']['date']; ?>
/pick/<?php echo $this->_tpl_vars['i']['date']; ?>
">选择为最佳答案</a><?php endif; ?><?php if ($this->_tpl_vars['i']['be_adopt'] == 1): ?>最佳答案<?php endif; ?>&nbsp;&nbsp;<?php if ($_SESSION['user']['username'] == $this->_tpl_vars['i']['author']): ?><a href="/reply/<?php echo $this->_tpl_vars['i']['date']; ?>
/asktopic/<?php echo $this->_tpl_vars['ASK']['date']; ?>
">编辑</a><?php endif; ?>&nbsp;&nbsp;<?php echo $this->_tpl_vars['i']['nicedate']; ?>
<?php if ($this->_tpl_vars['i']['last_edit_time'] != ""): ?>,更新于 <?php echo $this->_tpl_vars['i']['last_edit_time']; ?>
<?php endif; ?>&nbsp;&nbsp;#<?php echo $this->_tpl_vars['i']['order_id']; ?>
&nbsp;<span class="pointer" id="<?php echo $this->_tpl_vars['i']['order_id']; ?>
|<?php echo $this->_tpl_vars['i']['author']; ?>
">@</span></span>
							</div>
							<div class="body">
						  		<?php echo $this->_tpl_vars['i']['answer_content']; ?>

							</div>
						</div>
					</div>
		  			<?php endforeach; endif; unset($_from); ?>
				</div>
				
				<div class="box">
					<form>
						<input type="hidden" id="bid" value="<?php echo $this->_tpl_vars['ASK']['date']; ?>
" />
						<input type="hidden" id="owner" value="<?php echo $this->_tpl_vars['ASK']['author']; ?>
" />
						<input type="hidden" id="tp" value="ar" />
						<div><div id="wmd-button-bar"></div><textarea style="width:99%;height:80px;" id="textarea" name="textarea"></textarea></div>
						<div style="text-align:right"><span class="error" id="label_error"></span> <input class="btn" id="submit" value="回复" type="button" /></div>
						<div id="wmd-preview"></div>
						<input id="wmd-html" type="hidden"></input>
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
			<div class="box">
				<header>相关文章</header>
				<ul>
				<?php $_from = $this->_tpl_vars['SIMILAR']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['i']):
?><li><a href="/asktopic/<?php echo $this->_tpl_vars['i']['date']; ?>
"><?php echo $this->_tpl_vars['i']['title']; ?>
</a></li><?php endforeach; endif; unset($_from); ?>
				</ul>
			</div>
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
<script type="text/javascript" src="/js/markAjax.js"></script>
<script type="text/javascript" src="/js/replyAjax.js"></script>
<script type="text/javascript" src="/js/at.js"></script>