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
		echo $this->Html->css(array('reset', 'styles', 'responsive', 'search_page_css', 'nav_bar_style', 'default','ion.rangeSlider.skinFlat','ion.rangeSlider', 'jquery-ui', 'modal_window_style', 'animation'));
		echo $this->Html->script(array('jquery', 'slider', 'superfish', 'custom', 'jquery-1.10.2', 'jquery-ui', 'modernizr.custom', 'classie','moment','ion.rangeSlider','ion.rangeSlider.min','sliderMod', 'jquery.simplemodal'));
		//echo $this->fetch('meta');
		// echo $this->fetch('css');
		//echo $this->fetch('script');
	?>
<!-- Google charts Script -->
<script type="text/javascript" src="https://www.google.com/jsapi"></script>

	
	<title> 
		<?php 
			if (isset($title)) 
			{
				$this->assign('title', $title);
			}
			echo $this->fetch('title'); 

			if (isset($selected))
			{
				$this->assign('selected', $selected);
			}
			//echo $this->fetch('selected');
		?> 
	</title>
</head>

<body>
	<div id="container" class="width">
			<header>
				<div id="header">
					<h1><a href="home" title="Home"><strong>H</strong>uman <strong>T</strong>rafficking <strong>D</strong>ata</a></h1>
						<nav>
							<ul class="sf-menu dropdown">   

								<!-- HOME PAGE MENU ITEM -->
								<li class="<?php echo ($this->fetch('selected') == 'home') ? 'selected' : ''; ?>"><a href="home">Home</a></li>

								<!-- ABOUT & ABOUT DROPDOWN MENU ITEMS -->
								<li class="<?php echo ($this->fetch('selected') == 'about') ? 'selected' : ''; ?>">
									<a href="about" >About</a>
									<ul>
										<li><?php echo $this->Html->link('Methodology', '/methodology')?></li>
										<li><?php echo $this->Html->link('Principal Investigators', '/principals')?></li>
										<li><?php echo $this->Html->link('Acknowledgements', '/acknowledgements')?></li>
									</ul>
								</li>

								<!-- SEARCH THE DATABASE MENU ITEM -->
								<li class="<?php echo ($this->fetch('selected') == 'search') ? 'selected' : ''; ?>"><a href="search">
								
								Search the Database</a></li>


								<!-- ANALYSE THE DATA MENU ITEM -->
								<li class="<?php echo ($this->fetch('selected') == 'analyze') ? 'selected' : ''; ?>"><?php echo $this->Html->link('Data Analysis', '/analyze')?></li>
								
								<!-- ADDITIONAL RESOURCES DROPDOWN MENU ITEMS -->
								<li class="<?php echo ($this->fetch('selected') == 'resources') ? 'selected' : ''; ?>">
									<a>Additional Resources</a>
									<ul>
										<li><?php echo $this->Html->link('Organization and Government', '/orgAndGovernment')?></li>
										<li><?php echo $this->Html->link('Publications and Reports', '/publications')?></li>
										<li><?php echo $this->Html->link('Federal Statutes', '/federalStatutes')?></li>
									</ul>
								</li>

								<!-- CONTACT US MENU ITEM -->
								<li class="<?php echo ($this->fetch('selected') == 'contact') ? 'selected' : ''; ?>"><?php echo $this->Html->link('Contact Us', '/contact')?></li>

							</ul>
						<div class="clear"></div>
					</nav>
				</div>
			</header>
		</div>

	<div id="content">

		<?php echo $this->Session->flash(); ?>

		<?php echo $this->fetch('content'); ?>
		
		<?php echo $this->element('sql_dump'); ?>
	</div>
</body>


<!-- FOOTER SECTION -->
   <footer>
		<div class="footer-content width">

			<label style="padding-top: 20px;">Copyright &copy; 
			<?php $initialYear = 2014; $currentYear = date('Y'); echo $initialYear . (($initialYear != $currentYear) ? '-' . $currentYear : '');?> | Human Trafficking Data</label>
			<br><br>
			<label><span style="font-weight: bold">HumanTraffickingData.org</span> was created by Texas Christian University with support from the National Institute of Justice.</label>

		<div style="padding-top:50px">
			<hr style="color:#999; border-bottom: .02em dashed #ccc;">
			<br>
			<label style="color:#999"><span style="font-weight: bold">Disclaimer:</span> Information contained on this website does not represent the views or policies of Texas Christian University, the National Institute of Justice, or the U.S. Department of Justice.</label>
		</div>
	</footer>
</html>