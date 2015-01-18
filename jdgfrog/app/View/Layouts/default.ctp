<?php
/**
 *
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>

<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />

<!--[if lt IE 9]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
	<?php
		echo $this->Html->meta('icon');
    	echo $this->Html->css(array('reset', 'styles', 'responsive'));
    	echo $this->Html->script(array('jquery', 'slider', 'superfish', 'custom'));
		//echo $this->fetch('meta');
		// echo $this->fetch('css');
		//echo $this->fetch('script');
	?>
	<title> 
		<?php 
			if (isset($title)) 
			{
				$this->assign('title', $title);
			}
			echo $this->fetch('title'); 
		?> 
	</title>
</head>

<body>
		<div id="header">
		</div>
		<div id="content">

			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
			
			<?php echo $this->element('sql_dump'); ?>
		</div>
</body>

   <footer>
        <div class="footer-content width">

            <label style="padding-top: 20px;">Copyright &copy; 2015 | Human Trafficking Data</label>
            <br><br>
            <label><span style="font-weight: bold">HumanTraffickingData.org</span> was created by Texas Christian University with support from the National Institute of Justice.</label>

        <div style="padding-top:50px">
            <hr style="color:#999; border-bottom: .02em dashed #ccc;">
            <br>
            <label style="color:#999"><span style="font-weight: bold">Disclaimer:</span> Information contained on this website does not represent the views or policies of Texas Christian University, the National Institute of Justice, or the U.S. Department of Justice.</label>
        </div>
</html>