<!-- FUNCTION TO ANIMATE LOGO -->
	<script type="text/javascript">		
		var radius = 5;

		var interval = window.setInterval(function() {
		$(".logo").css("-webkit-mask", "-webkit-gradient(radial, 30 30, " + radius + ", 5 59, " + (radius + 5) + ", from(rgb(0, 0, 0)), color-stop(0.5, rgba(0, 0, 0, 0.2)), to(rgb(0, 0, 0)))");
		radius++;
		if (radius === 400) {
		window.clearInterval(interval);
		}
		}, 15);
	</script>	


  		<?php echo $this->Html->css(array('home_slider_main', 'home_slider_misc', 'hover'));?>
  		<?php echo $this->Html->script(array('jquery-1.9.0.min', 'jquery.fractionslider', 'home_slider_config', 'jquery-ui'));?>
	
	<!-- Accordian Slider -->
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
	<script>
		$(function() {
			$( "#accordion" ).accordion();
			$( "#accordion2" ).accordion();
		});
	</script>

		<!--Home starts here-->
			<div class="jobs-main top-slider">
	  	 	<h3>Welcome</h3>
		  	 	<div class="slider-wrapper">
		  	 	
				<div class="responisve-container">
					<div class="slider">
						<div class="fs_loader"></div>

						<!-- Slider Number 1 -->
						<div class="slide"> 
							<p 		class="claim"			
									 data-in="top" data-position="20,450" data-step="1" data-out="fade" style="font-size:2em;">to</p>
							<p 		class="claim"			
									data-in="fade" 
	                        		data-position="70,0" data-step="2" data-out="fade" style="font-size:5em;">HUMAN TRAFFICKING DATA</p>
							<p 		class="claim"			
									 data-in="fade" data-out="fade" data-position="150,160" data-step="3" data-out="left" style="font-size:1.2em; color:4D1979">an open source platform for human trafficking cases in the U.S.</p>
						</div>

						<!-- Slider Number 2 -->
						<div class="slide"> 
							<p 		class="claim"			
									 data-in="fade" data-position="20,350" data-step="1" data-out="fade" style="font-size:2em; color:#fe2232">600,000 to 800,000</p>
							<p 		class="claim"			
									 data-in="fade" data-position="130,170" data-step="2" data-out="fade" style="font-size:1em;">is the approximate amount of trafficked people around the world<span><p style="font-size:1.5em; color:red; font-weight:bold;" data-step="3" data-position="120,700" data-in="fade" data-out="fade" data-delay="1500">Every year</p></span></p>
						</div>

						<!-- Slider Number 3 -->
						<div class="slide"> 
							<p 		class="claim"			
									 data-in="fade" data-position="140, 100" data-step="2" data-out="fade" style="font-size:1.2em;">HumanTraffickingData.org is a user-friendly experience designed for researchers in </p>
							<p 		class="claim"			
									 data-in="fade" data-position="160, 130" data-step="2" data-out="fade" data-delay="3000" style="font-size:1.2em;">understanding the complexity of human trafficking cases in the United States.
							</p>
						</div>


						<!-- Slide Number 4 -->
						<div class="slide"> 
							<p 		class="claim"			
									 data-in="top" data-position="90,30" data-step="1" data-out="fade">SEARCH OVER 1000 CASES</p>	

	                        <?php echo $this->Html->image('search_by.png', 
	                        	array('alt' => '', 
	                        		'data-step' => '1',
	                        		'data-position' => '20,630',
	                        		'data-in' => 'bottomLeft',
	                        		'data-delay' => '100',
	                        		'data-out' => 'fade',
	                        		'style' => 'width:auto; height:auto')); ?>
	                    </div>

						<div class="slide"> 
															
							<p 		class="claim" 	
									data-position="0,300" data-in="left" data-step="1" data-delay="200">Manipulate the Data Using...</p>

	                        <?php echo $this->Html->image('analysis.png', 
	                        	array('alt' => '', 
	                        		'data-step' => '1',
	                        		'data-position' => '60,30',
	                        		'data-in' => 'bottomRight',
	                        		'data-delay' => '200',
	                        		'data-out' => 'left',
	                        		'style' => 'width:auto; height:auto;')); ?>
															
							<p 		class="claim" 	
									data-position="240,510" data-in="left" data-step="2" data-delay="200">Plots</p>
	                        <?php echo $this->Html->image('search_by.png', 
	                        	array('alt' => '', 
	                        		'data-step' => '2',
	                        		'data-position' => '40,0',
	                        		'data-in' => 'bottomRight',
	                        		'data-delay' => '200',
	                        		'data-out' => 'left',
	                        		'style' => 'width:auto; height:auto')); ?>
															
							<p 		class="claim" 	
									data-position="280,510" data-in="left" data-step="3" data-delay="200">Histograms</p>
	                        <?php echo $this->Html->image('search_by.png', 
	                        	array('alt' => '', 
	                        		'data-step' => '3',
	                        		'data-position' => '40,0',
	                        		'data-in' => 'bottomRight',
	                        		'data-delay' => '200',
	                        		'data-out' => 'left',
	                        		'style' => 'width:auto; height:auto')); ?>
															
							<p 		class="claim" 	
									data-position="320,510" data-in="left" data-step="4" data-delay="200">Map</p>
	                        <?php echo $this->Html->image('search_by.png', 
	                        	array('alt' => '', 
	                        		'data-step' => '4',
	                        		'data-position' => '40,0',
	                        		'data-in' => 'bottomRight',
	                        		'data-delay' => '200',
	                        		'data-out' => 'left',
	                        		'style' => 'width:auto; height:auto')); ?>
	                    </div>
	
						<div class="slide"> 
							<p 		class="claim"		
									data-position="90,30" data-in="left" data-step="3" data-special="cycle" data-delay="100" data-out="top">DOWNLOAD SPECIFIC CASES</p>


	                        <?php echo $this->Html->image('case_down.png', 
	                        	array('alt' => '', 
	                        		'data-step' => '3',
	                        		'data-position' => '20,630',
	                        		'data-in' => 'left',
	                        		'data-delay' => '650',
	                        		'data-out' => 'bottom',
	                        		'style' => 'width:auto; height:auto')); ?>
	                        </div>
			 

						</div>
				</div>
			</div>
	  	 </div>

<div class="jobs">
	<!-- <div class="container"> -->
	  	<div class="jobs-main">
	  	 	 <div class="job-top">
	  	 	  	    <div class="col-md-15 job-left">
	  	 				<h3>User Guide</h3>
	  	 			</div>
	  	 	  	     <div class="col-md-15 helpful_section">
					  <div class="container">
		  	 	  	    <div class="col-md-6 job-left">
		  	 	  	  	    <h3>Performing a search</h3>
	  	 	  	  	    		<div id="accordion">
								  <h3>Section 1</h3>
								  <div>
								    <p>
								    Mauris mauris ante, blandit et, ultrices a, suscipit eget, quam. Integer
								    ut neque. Vivamus nisi metus, molestie vel, gravida in, condimentum sit
								    amet, nunc. Nam a nibh. Donec suscipit eros. Nam mi. Proin viverra leo ut
								    odio. Curabitur malesuada. Vestibulum a velit eu ante scelerisque vulputate.
								    </p>
								  </div>
								  <h3>Section 2</h3>
								  <div>
								    <p>
								    Sed non urna. Donec et ante. Phasellus eu ligula. Vestibulum sit amet
								    purus. Vivamus hendrerit, dolor at aliquet laoreet, mauris turpis porttitor
								    velit, faucibus interdum tellus libero ac justo. Vivamus non quam. In
								    suscipit faucibus urna.
								    </p>
								  </div>
								  <h3>Section 3</h3>
								  <div>
								    <p>
								    Nam enim risus, molestie et, porta ac, aliquam ac, risus. Quisque lobortis.
								    Phasellus pellentesque purus in massa. Aenean in pede. Phasellus ac libero
								    ac tellus pellentesque semper. Sed ac felis. Sed commodo, magna quis
								    lacinia ornare, quam ante aliquam nisi, eu iaculis leo purus venenatis dui.
								    </p>
								    <ul>
								      <li>List item one</li>
								      <li>List item two</li>
								      <li>List item three</li>
								    </ul>
								  </div>
								  <h3>Watch The Tutorial Video</h3>
								  <div>
								    <p>
								    Cras dictum. Pellentesque habitant morbi tristique senectus et netus
								    et malesuada fames ac turpis egestas. Vestibulum ante ipsum primis in
								    faucibus orci luctus et ultrices posuere cubilia Curae; Aenean lacinia
								    mauris vel est.
								    </p>
								    <p>
								    Suspendisse eu nisl. Nullam ut libero. Integer dignissim consequat lectus.
								    Class aptent taciti sociosqu ad litora torquent per conubia nostra, per
								    inceptos himenaeos.
								    </p>
								  </div>
		  	 	  	  	    	</div>
		  	 	  	     </div>
		  	 	  	    <div class="col-md-6 job-left">
		  	 	  	  	    <h3>Performing an analysis</h3>
	  	 	  	  	    		<div id="accordion2">
								  <h3>Section 1</h3>
								  <div>
								    <p>
								    Mauris mauris ante, blandit et, ultrices a, suscipit eget, quam. Integer
								    ut neque. Vivamus nisi metus, molestie vel, gravida in, condimentum sit
								    amet, nunc. Nam a nibh. Donec suscipit eros. Nam mi. Proin viverra leo ut
								    odio. Curabitur malesuada. Vestibulum a velit eu ante scelerisque vulputate.
								    </p>
								  </div>
								  <h3>Section 2</h3>
								  <div>
								    <p>
								    Sed non urna. Donec et ante. Phasellus eu ligula. Vestibulum sit amet
								    purus. Vivamus hendrerit, dolor at aliquet laoreet, mauris turpis porttitor
								    velit, faucibus interdum tellus libero ac justo. Vivamus non quam. In
								    suscipit faucibus urna.
								    </p>
								  </div>
								  <h3>Section 3</h3>
								  <div>
								    <p>
								    Nam enim risus, molestie et, porta ac, aliquam ac, risus. Quisque lobortis.
								    Phasellus pellentesque purus in massa. Aenean in pede. Phasellus ac libero
								    ac tellus pellentesque semper. Sed ac felis. Sed commodo, magna quis
								    lacinia ornare, quam ante aliquam nisi, eu iaculis leo purus venenatis dui.
								    </p>
								    <ul>
								      <li>List item one</li>
								      <li>List item two</li>
								      <li>List item three</li>
								    </ul>
								  </div>
								  <h3>Watch The Tutorial Video</h3>
								  <div>
								    <p>
								    Cras dictum. Pellentesque habitant morbi tristique senectus et netus
								    et malesuada fames ac turpis egestas. Vestibulum ante ipsum primis in
								    faucibus orci luctus et ultrices posuere cubilia Curae; Aenean lacinia
								    mauris vel est.
								    </p>
								    <p>
								    Suspendisse eu nisl. Nullam ut libero. Integer dignissim consequat lectus.
								    Class aptent taciti sociosqu ad litora torquent per conubia nostra, per
								    inceptos himenaeos.
								    </p>
								  </div>
		  	 	  	  	    	</div>
		  	 	  	  	    	
		  	 	  	     </div>
		  	 	  	   </div>
		  	 	  	  </div>

	  	 	  	<div class="col-md-12 job-left">
	  	 				<h3>Helpful Information</h3>
	  	 	  	    <div class="more_info" >
	  	 	  	  			<div class="col-md-5 job-left help hvr-float-shadow" style="font-weight:normal; background-color:#4D1979; color:#fff; margin-right:10px; margin-bottom:10px;">
	  	 	  	  				<h4 >Need Help? | Want to Report a Case?</h4>
	  	 	  	  					<strong>The National Institute:</strong>
	  	 	  	  			</div>
	  	 	  	  			<div class="col-md-5 job-left more hvr-float-shadow" style="font-weight:normal; background-color:#999; color:#fff;">
			  	 	  	  			<h4>More Facts About Human Trafficking</h4>
			        			<!-- <iframe class="myIframe" width="100%" src="//www.youtube.com/embed/J4ztDU-yr74?showinfo=0&autohide=1&loop=1&playlist=J4ztDU-yr74" frameborder="0" allowfullscreen></iframe> -->
	  	 	  	  			</div>
	  	 	  	     </div>
	  	 	  	 </div>
	  	 	  </div>
	  	 	  <div class="job-bottom">
	  	 	  	    <div class="col-md-3 job-column">
            			<!-- ADD SOME OTHER CONTENT HERE -->
	   	 	  	    </div>
	  	 	  	    <div class="clearfix"> </div>
	  	 	  </div>
	  	</div>
	<!-- </div> -->
</div>

