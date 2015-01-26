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

			if (isset($selected))
			{
				$this->assign('selected', $selected);
			}
			echo $this->fetch('selected');
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
			                        	<li><a href="methodology">Methodology</a></li>
			                        	<li><a href="principals">Principal Investigators</a></li>
			                        	<li> <a href="acknowledgements">Acknowledgments</a> </li>
			                        </ul>
		                        </li>

		                        <!-- SEARCH THE DATABASE MENU ITEM -->
			                    <li class="<?php echo ($this->fetch('selected') == 'search') ? 'selected' : ''; ?>"><a href="search">

						            <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
									 <script src="//code.jquery.com/jquery-1.10.2.js"></script>
									 <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
									 <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    							<?php 
    							echo $this->Html->script(array('modernizr.custom', 'classie','moment','ion.rangeSlider.js','ion.rangeSlider.min','sliderMod.js')); 
    							echo $this->Html->css(array('search_page_css', 'nav_bar_style', 'default','ion.rangeSlider.skinFlat','ion.rangeSlider'));
    							?>
			                    Search the Database</a></li>


			                    <!-- ANALYSE THE DATA MENU ITEM -->
			                    <li class="<?php echo ($this->fetch('selected') == 'analyze') ? 'selected' : ''; ?>"><a href="analyze">Analyze the Data</a></li>
		                        
		                        <!-- ADDITIONAL RESOURCES DROPDOWN MENU ITEMS -->
		                        <li class="<?php echo ($this->fetch('selected') == 'resources') ? 'selected' : ''; ?>">
		                        	<a>Additional Resources</a>
		                        	<ul>
		                        		<li><a href="orgAndGovernment">Organization and Government</a></li>
		                        		<li><a href="publicationsAndReports">Publications and Reports</a></li>
		                        		<li><a href="federalStatutes">Federal Statutes</a></li>
			                    	</ul>
			                    </li>

			                    <!-- CONTACT US MENU ITEM -->
			                    <li class="<?php echo ($this->fetch('selected') == 'contact') ? 'selected' : ''; ?>"><a href="contact"><i class="fa fa-phone"></i>Contact Us</a></li>

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