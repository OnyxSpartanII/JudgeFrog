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
<!--web-fonts-->
<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
	<?php
		echo $this->Html->meta('icon');
		echo $this->Html->css(array('htd-main-panel', 'bootstrap', 'animation', 'search_page_css', 'custom_admin_style', 'jquery-ui'));
		echo $this->Html->script(array('jquery-1.10.2', 'hover-effect', 'easing.js', 'jquery-ui'));
	?>
<!-- Google charts Script -->
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#horizontalTab').easyResponsiveTabs({
            type: 'default', //Types: default, vertical, accordion           
            width: 'auto', //auto or any width like 600px
            fit: true   // 100% fit in a container
        });
    });
</script>
	<title> 
		<?php 
			if (isset($title)) 
			{
				$this->assign('title', $title);
			}
			echo $this->fetch('title'); 

			if (isset($active))
			{
				$this->assign('active', $active);
			}
		?> 
	</title>
</head>
<body>
<!--header start here-->
 <div class="header-b">
	 	  <div class="container">
	 	       <div class="header-main">
	 	        	<div class="logo" id="full-logo">
	 	        			<?php 
	 	        				echo $this->Html->link('HTD | Admin Panel', '/AdminPanel',
	 	        				array('class' => 'full', 'onmouseover' => 'bringTheFunc(this)'));
	 	        			?>
	 	        	</div> 
	 	        	<div class="logo" id="compact-logo">
	 	        			<?php 
	 	        				echo $this->Html->link('HTD', '/AdminPanel',
	 	        				array('class' => 'full', 'onmouseover' => 'bringTheFunc(this)'));
	 	        			?>
	 	        	</div> 
	 	        	<span class="menu"> <?php echo $this->Html->image('icon.png', array('alt' => 'Menu List')); ?></span>
					<div class="header-navg">
						<ul class="res">
							<li><a class="<?php echo ($this->fetch('active') == 'index') ? 'active' : ''; ?>" <?php echo $this->Html->link('Home', '/admin/index'); ?></li>
							<li><a class="<?php echo ($this->fetch('active') == '') ? 'active' : ''; ?>" <?php echo $this->Html->link('Upload', '/admin/uploads'); ?></li>
							<li><a class="<?php echo ($this->fetch('active') == 'edit') ? 'active' : ''; ?>" <?php echo $this->Html->link('Create & Edit', '/admin/cases/edit/index'); ?></li>
							<li><a class="<?php echo ($this->fetch('active') == 'review') ? 'active' : ''; ?>" <?php echo $this->Html->link('Review', '/admin/cases/review'); ?></li>
							<li><a class="<?php echo ($this->fetch('active') == 'create') ? 'active' : ''; ?>" <?php echo $this->Html->link('Manage Users', '/admin/manageusers'); ?></li>
							<div class="menu_separator"><li style="font-size:18px; font-weight:400; opacity:0.8; color:#444;">|</li></div>
							<li>
								<?php if (AuthComponent::user('id')): ?>
								<?php
									$out = "Logout ";
									echo $this->Html->link($out.AuthComponent::user('first_name'), '/logout'
								); ?>
								<?php endif; ?> 
						 	</li>
						</ul>
						<script>
	                          $( "span.menu").click(function() {
		                        $(  "ul.res" ).slideToggle("slow", function() {
		                         // Animation complete.
		                         });
		                         });
	                     </script>
					</div>

				</div>
			</div>
		</div>
		<div id="content">
			<?php echo $this->Session->flash(); ?>
			<?php echo $this->fetch('content'); ?>
		</div>
		<div class="mobile-message" style="margin:20px; display:none">
			<br>
			<h4 style="border-bottom:2px solid #DCDCDC; color:#4D1979">Unsupported Device</h4>
			<br>
			<h6>OOPS WE DO NOT SUPPORT DEVICES WITH A SCREEN THIS SMALL!</h6>
			<p style="font-size:8px">PLEASE USE A DEVICE WITH A SCREEN WIDTH OF AT LEAST 425PX...</p>
		</div>
<!-- FOOTER SECTION -->
<div class="footer-h">
	  <div class="container">
	  	    <div class="footer-main">
	  	    	<div class="col-md-5 footer-left">
            		<label>
            			<h4>Disclaimer:</h4>
            		Information contained on this website does not represent the views or policies of Texas Christian University, the National Institute of Justice, or the U.S. Department of Justice.
            		</label>
	  	    	</div>
	  	    	<div class="col-md-4 footer-right">
            		<label>
            			<h4>Sponsors:</h4>
            			HumanTraffickingData.org was created by Texas Christian University with support from the National Institute of Justice.
            		</label>
	  	    	</div>
	  	    	<div class="col-md-3 footer-right">
            		<label>
            			<h4>Main Site:</h4>
            		To access the main HumanTraffickingData.org website, click <?php echo $this->Html->link('here', '/home'); ?>
            		</label>
	  	    	</div>
	  	    <div class="clearfix"> </div>
	  	    </div>
	  </div>
            	<div class="footer-center">
            		<label>Copyright &copy; 
            			<?php $initialYear = 2014; $currentYear = date('Y'); echo $initialYear . (($initialYear != $currentYear) ? '-' . $currentYear : '');?> | Human Trafficking Data ~ Admin Panel
            		</label>
            	</div>
</div>
<script type="text/javascript">
    //Set Screen Size Error Message if < 424px
$( document ).ready(function() {      
    var isMobile = window.matchMedia("only screen and (max-width: 424px)");
    if (isMobile.matches) {
    	$('#content').hide();
    	$('.mobile-message').show();
    }
});
    //This is function main purpose is to shrink the logo on width < 1000px
$('#compact-logo').hide();
$( document ).ready(function() {      
    var isSmall = window.matchMedia("only screen and (max-width: 1000px)");
	     //Change Text on Hover
    if (isSmall.matches) {
			$('#full-logo').hide();
			$('#compact-logo').show();
		}
	});
</script>
</body>
</html>

<!-- Modifications Done by: The Judge Frog Team - http://brazos.cs.tcu.edu/1415JudgeFrog
License: W3layouts - http://w3layouts.com Modified Under The Creative Commons Attribution 3.0 license.  -->