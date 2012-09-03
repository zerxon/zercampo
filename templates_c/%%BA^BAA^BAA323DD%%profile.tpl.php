<?php /* Smarty version 2.6.26, created on 2012-04-22 10:56:51
         compiled from profile.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
  <div class="container">
  	<div class="row">
		<div class="span9">
			<div class="box">
			<table width="100%" cellpadding="3">
				<tr>
					<td width="15%"></td>
					<td width="60%"><span style="color:#CCCCCC"><h4>第<?php echo $this->_tpl_vars['USER']['uid']; ?>
位会员</h4></span><?php if ($this->_tpl_vars['USER']['authority'] == 1): ?><span class="label label-warning">站长</span><?php elseif ($this->_tpl_vars['USER']['authority'] == 2): ?><span class="label label-warning">管理员</span><?php else: ?><span class="label label-success">普通会员</span><?php endif; ?></td>
					<td >&nbsp;</td>
				</tr>
				<tr>
					<td>用户名：</td>
					<td><?php echo $this->_tpl_vars['USER']['username']; ?>
</td>
					<td width="15%" rowspan="6" align="right"><img class="pic s145" src="http://gravatar.com/avatar/<?php echo $this->_tpl_vars['USER']['gravatar']; ?>
.png?r=G&amp;s=145"></td>
				</tr>
				<tr>
					<td>积分：</td>
					<td><?php echo $this->_tpl_vars['USER']['score']; ?>
</td>
				</tr>
				<tr>
					<td>加入时间：</td>
					<td><?php echo $this->_tpl_vars['USER']['join_time']; ?>
</td>
				</tr>
				<tr>
					<td>最后登录：</td>
					<td><?php echo $this->_tpl_vars['USER']['lastlogin_time']; ?>
</td>
				</tr>
				<tr>
					<td>QQ：</td>
					<td><?php echo $this->_tpl_vars['USER']['qq']; ?>
</td>
				</tr>
				<tr>
					<td>微博：</td>
					<td><a href="<?php echo $this->_tpl_vars['USER']['weibo']; ?>
" target="_bank"><?php echo $this->_tpl_vars['USER']['weibo']; ?>
</a></td>
				</tr>
				<tr>
					<td>个人主页：</td>
					<td><a href="<?php echo $this->_tpl_vars['USER']['web_url']; ?>
" target="_blank"><?php echo $this->_tpl_vars['USER']['web_url']; ?>
</a></td>
				</tr>
			</table>
			</div>
			
			<?php if ($this->_tpl_vars['USER']['description']): ?>
			<div class="box">
				<?php echo $this->_tpl_vars['USER']['description']; ?>

			</div>
			<?php endif; ?>
			
			<div class="box" id="board">
				<div class="header">最近发布</div>
				<div class="line"></div>
				<table width="100%" class="list" cellpadding="6">
				  <tr class="head">
					<td width="20%">类型</td>
					<td width="60%">标题</td>
					<td width="20%">发布于</td>
				  </tr>
				<?php $_from = $this->_tpl_vars['ARTLIST']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['foo'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['foo']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['i']):
        $this->_foreach['foo']['iteration']++;
?>
					<?php if (($this->_foreach['foo']['iteration']-1)%2): ?>
					<tr class="topic">
					<?php else: ?>
					<tr class="topic odd">
					<?php endif; ?>
						<td><?php if ($this->_tpl_vars['i']['type'] == 'topic'): ?>博客<?php elseif ($this->_tpl_vars['i']['type'] == 'asktopic'): ?>问答<?php endif; ?></td>
						<td><a href="/<?php echo $this->_tpl_vars['i']['type']; ?>
/<?php echo $this->_tpl_vars['i']['date']; ?>
"><?php echo $this->_tpl_vars['i']['title']; ?>
</a></td>
						<td><?php echo $this->_tpl_vars['i']['nicedate']; ?>
</td>
					</tr>
				<?php endforeach; endif; unset($_from); ?>
				</table>
			</div>
			
			<div class="box" id="board">
				<div class="header">最近回复</div>
				<div class="line"></div>
				<table width="100%" class="list" cellpadding="6">
				  <tr class="head">
					<td width="20%">类型</td>
					<td width="60%">标题</td>
					<td width="20%">回复于</td>
				  </tr>
				<?php $_from = $this->_tpl_vars['REPLYLIST']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['foo'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['foo']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['i']):
        $this->_foreach['foo']['iteration']++;
?>
					<?php if (($this->_foreach['foo']['iteration']-1)%2): ?>
					<tr class="topic">
					<?php else: ?>
					<tr class="topic odd">
					<?php endif; ?>
						<td><?php if ($this->_tpl_vars['i']['type'] == 'topic'): ?>博客<?php elseif ($this->_tpl_vars['i']['type'] == 'asktopic'): ?>问答<?php endif; ?></td>
						<td><a href="/<?php echo $this->_tpl_vars['i']['type']; ?>
/<?php echo $this->_tpl_vars['i']['date']; ?>
"><?php echo $this->_tpl_vars['i']['title']; ?>
</a></td>
						<td><?php echo $this->_tpl_vars['i']['reply_date']; ?>
</td>
					</tr>
				<?php endforeach; endif; unset($_from); ?>
				</table>
			</div>
		</div>
	
		<div class="span3" id="sidebar">
			<div class="box">
				<header>个人统计</header>
				<ul>
					<li>博客数：<?php echo $this->_tpl_vars['COUNTLIST']['blog']; ?>
</li>
					<li>问答数：<?php echo $this->_tpl_vars['COUNTLIST']['ask']; ?>
</li>
					<li>资源数：<?php echo $this->_tpl_vars['COUNTLIST']['share']; ?>
</li>
				</ul>
			</div>
		<?php if ($this->_tpl_vars['ISLOGIN'] && $this->_tpl_vars['USER']['username'] == $_SESSION['user']['username']): ?>
			<div class="box">
				<header>设置</header>
				<a class="btn" href="/setting">编辑个人信息</a>
			</div>
			<div class="box">
				<header>收藏夹</header>
				<a class="btn btn-info" href="/favorites">进入我的收藏</a>
			</div>
		<?php endif; ?>
		</div>
	</div>
  </div>
  
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>