 <?php
/**
 *
 *
 * @link					http://cakephp.org CakePHP(tm) Project
 * @package			 app.View.Pages
 * @since				 CakePHP(tm) v 0.10.0.1076
 */

if (!Configure::read('debug')):
	throw new NotFoundException();
endif;

App::uses('Debugger', 'Utility');
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Login | Admin Control Panel - HTD</title>
		<link rel="stylesheet" type="text/css" href="css/admin_panel_style.css" media="screen" />
		<link href='http://fonts.googleapis.com/css?family=Roboto+Condensed' rel='stylesheet' type='text/css'/>
		<?php echo $this->Html->css(array('login')); ?>
	</head>

	<body>
		<div id="wrap">
			<div id="header">
				<h1><?php echo $this->Html->link('Human Trafficking Data', '/home')?></h1>
			</div>


			<div id="content">
				<form name="form1" method="post" action="index.html">
					<h1>User Login</h1>

					<div class="inset">
						<?php echo $this->Session->flash('auth'); ?>
						<?php echo $this->Form->create('User'); ?>
						<p>
							<?php echo $this->Form->input('username');?>
						</p>
						<p>
							<?php echo $this->Form->input('password');?>
						</p>
					</div>

					<?php echo $this->Form->end(__('Login')); ?>
				</form>
			</div>

			<div id="footer">
				<p>Admin Control Panel HTD V 0.1 | <a target="_blank" href="http://humantraffickingdata.org" title="Human Trafficking Data Website">Human Trafficking Data</a>
				</p>
			</div>

		</div>

	</body>
</html>
