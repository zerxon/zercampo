<?php /* Smarty version 2.6.26, created on 2012-08-05 04:24:00
         compiled from ../../templates/userinfo.tpl */ ?>
<div class="box">
	<div class="profile">
		<div class="image">
			<a href="/profile"><img class="pic s64" src="http://gravatar.com/avatar/<?php echo $_SESSION['user']['gravatar']; ?>
.png?r=G&amp;s=64"></a>
		</div>
		<div class="info">
			<h3><?php echo $_SESSION['user']['username']; ?>
</h3>
		</div>
	</div>
</div>