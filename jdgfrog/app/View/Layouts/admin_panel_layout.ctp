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
		echo $this->Html->css(array('htd-main-panel', 'bootstrap', 'animation', 'search_page_css', 'custom_admin_style'));
		echo $this->Html->script(array('jquery-1.10.2', 'hover-effect', 'easing.js'));
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
<!-- Scripts for collaspable panels. -->
  
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
	 	        	<div class="logo">
	 	        			<?php 
	 	        				echo $this->Html->link('HTD | Admin Panel', '/AdminPanel',
	 	        				array('class' => 'full', 'onmouseover' => 'bringTheFunc(this)'));
	 	        			?>
	 	        	</div> 
	 	        	<span class="menu"> <?php echo $this->Html->image('icon.png', array('alt' => 'Menu List')); ?></span>
					<div class="header-navg">
						<ul class="res">
							<li><a class="<?php echo ($this->fetch('active') == 'index') ? 'active' : ''; ?>" <?php echo $this->Html->link('Home', '/AdminPanel/index'); ?></li>
							<li><a class="<?php echo ($this->fetch('active') == 'create_case') ? 'active' : ''; ?>" <?php echo $this->Html->link('Create', '/AdminPanel/create_case'); ?></li>
							<li><a class="<?php echo ($this->fetch('active') == 'edit') ? 'active' : ''; ?>" <?php echo $this->Html->link('Edit', '/AdminPanel/edit'); ?></li>
							<li><a class="<?php echo ($this->fetch('active') == 'review') ? 'active' : ''; ?>" <?php echo $this->Html->link('Review', '/AdminPanel/review'); ?></li>
							<li><a class="<?php echo ($this->fetch('active') == 'manageusers') ? 'active' : ''; ?>" <?php echo $this->Html->link('Manage Users', '/AdminPanel/manageusers'); ?></li>
							<div class="menu_separator"><li style="font-size:18px; font-weight:400; opacity:0.8; color:#444;">|</li></div>
							<li>
								<a href="#"> 
									<?php if (AuthComponent::user('id')): ?>
								 		Logged in as <?= AuthComponent::user('username') ?>
								 	<?php endif; ?> 
							 	</a>
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
	</body>
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
	
    //Change Text on Hover
    $('.full').hover(function(){
    	// $(this).animate(1000);

    	$(this).text("Human Trafficking Data | Admin Panel");
	}, function() {
    	$(this).text("HTD | Admin Panel");
});


</script>

</body>
</html>


<!-- Original Author: W3layouts - http://w3layouts.com
License: Modified Under The Creative Commons Attribution 3.0 license. 
Modifications Done by: The Judge Frog Team - http://brazos.cs.tcu.edu/1415cj -->
