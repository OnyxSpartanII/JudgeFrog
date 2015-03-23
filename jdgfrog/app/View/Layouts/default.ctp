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
		echo $this->Html->css(array('htd-main', 'bootstrap', 'jquery-ui', 'search_page_css', 'default','ion.rangeSlider.skinFlat','ion.rangeSlider', 'modal_window_style', 'animation'));
		echo $this->Html->script(array('jquery-1.10.2', 'slider', 'superfish', 'jquery-ui', 'modernizr.custom', 'classie','moment','ion.rangeSlider','ion.rangeSlider.min','sliderMod', 'jquery.simplemodal', 'hover-effect', 'move-top.js', 'easing.js', 'easyResponsiveTabs','chartMod', 'uisearch'));
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
	        				echo $this->Html->link('HTD', '/home',
	        				array('class' => 'full', 'onmouseover' => 'bringTheFunc(this)'));
	        			?>
	 	        	</div> 
	 	        	<span class="menu"> <?php echo $this->Html->image('icon.png', array('alt' => 'Menu List')); ?></span>
	 	        	<div class="header-navg">
	 	        		<ul class="res">
	 	        			<li><a class="<?php echo ($this->fetch('active') == 'home') ? 'active' : ''; ?>" <?php echo $this->Html->link('Home', '/home'); ?></a></li>
	 	        			<li><a class="<?php echo ($this->fetch('active') == 'about') ? 'active' : ''; ?>" <?php echo $this->Html->link('About', '/about'); ?></a></li>
	 	        			<li><a class="<?php echo ($this->fetch('active') == 'search') ? 'active' : ''; ?>" <?php echo $this->Html->link('Search The Database', '/search'); ?></a></li>
	 	        			<li><a class="<?php echo ($this->fetch('active') == 'additionalResources') ? 'active' : ''; ?>" <?php echo $this->Html->link('Additional Resources', '/additionalResources'); ?></a></li>
	 	        			<li><a class="<?php echo ($this->fetch('active') == 'contact') ? 'active' : ''; ?>" <?php echo $this->Html->link('Contact Us', '/contact'); ?></a></li>
	 	        		</ul>
	 	        		 <script>
	                          $( "span.menu").click(function() {
		                        $(  "ul.res" ).slideToggle("slow", function() {
		                         // Animation complete.
		                         });
		                         });
	                     </script>
	 	        	</div>
	 	        	<div class="clearfix"> </div>
	 	       </div>
	 	 </div>
	</div>
<!-- </div> -->
	<div id="content">

		<?php echo $this->Session->flash(); ?>

		<?php echo $this->fetch('content'); ?>
		
		<?php echo $this->element('sql_dump'); ?>
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
            			<h4>Authorized Users:</h4>
            		Authorized users can access the academic/advanced user panel by clicking <?php echo $this->Html->link('here', '/login'); ?>
            		</label>
	  	    	</div>
	  	    <div class="clearfix"> </div>
	  	    </div>
	  </div>
            	<div class="footer-center">
            		<label>Copyright &copy; 
            			<?php $initialYear = 2014; $currentYear = date('Y'); echo $initialYear . (($initialYear != $currentYear) ? '-' . $currentYear : '');?> | Human Trafficking Data
            		</label>
            	</div>
</div>
<script type="text/javascript">
	
    //Change Text on Hover
    $('.full').hover(function(){
    	// $(this).animate(1000);

    	$(this).text("Human Trafficking Data");
	}, function() {
    	$(this).text("HTD");
});


</script>

</body>
</html>


<!-- Original Author: W3layouts - http://w3layouts.com
License: Modified Under The Creative Commons Attribution 3.0 license. 
Modifications Done by: The Judge Frog Team - http://brazos.cs.tcu.edu/1415cj -->
