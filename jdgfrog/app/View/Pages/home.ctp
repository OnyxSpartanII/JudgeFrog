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
  		<?php echo $this->Html->css(array('home_slider_main', 'home_slider_misc', 'hover', 'jquery-ui'));?>
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
									 data-in="fade" data-position="20,350" data-step="1" data-out="fade" style="font-size:2em; color:#fe2232">500,000 to 800,000</p>
							<p 		class="claim"			
									 data-in="fade" data-position="130,190" data-step="2" data-out="fade" style="font-size:1em;">is the approximate amount of trafficked people around the world<span><p style="font-size:1.5em; color:red; font-weight:bold;" data-step="3" data-position="150,400" data-in="fade" data-out="fade" data-delay="1500">Every year</p></span></p>
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
									 data-in="top" data-position="90,30" data-step="1" data-out="fade">SEARCH OVER 1000 DEFENDANTS</p>	

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
									data-position="0,300" data-in="left" data-step="1" data-delay="200">Analyze the Data Using...</p>
	                        <?php echo $this->Html->image('analysis.png', 
	                        	array('alt' => '', 
	                        		'data-step' => '1',
	                        		'data-position' => '60,-40',
	                        		'data-in' => 'bottomRight',
	                        		'data-delay' => '200',
	                        		'data-out' => 'left',
	                        		'style' => 'width:auto; height:auto;')); ?>
							<p 		class="claim" 	
									data-position="160,500" data-in="left" data-step="2" data-delay="200">Histogram</p>
							<p 		class="claim" 	
									data-position="200,500" data-in="left" data-step="3" data-delay="200">Line Chart</p>
							<p 		class="claim" 	
									data-position="240,500" data-in="left" data-step="4" data-delay="200">Geo Chart</p>						
							<p 		class="claim" 	
									data-position="280,500" data-in="left" data-step="5" data-delay="200">Pie Chart</p>
							<p 		class="claim" 	
									data-position="320,500" data-in="left" data-step="6" data-delay="200">Bar Chart</p>							
	                    </div>
						<!-- Slider Number 5a -->
						<div class="slide"> 
							<p 		class="claim" 	
									data-position="200,700" data-in="left" data-out="right" data-step="1" data-delay="50">Histogram</p>
	                        <?php echo $this->Html->image('histogram.png', 
	                        	array('alt' => '', 
	                        		'data-step' => '1',
	                        		'data-position' => '10,40',
	                        		'data-in' => 'bottomRight',
	                        		'data-delay' => '50',
	                        		'data-out' => 'left',
	                        		'style' => 'width:auto; height:auto')); ?>
						</div>
						<!-- Slider Number 5b -->
						<div class="slide"> 
							<p 		class="claim" 	
									data-position="200,700" data-in="topRight" data-out="top" data-step="1" data-delay="200">Line Chart</p>
	                        <?php echo $this->Html->image('line.png', 
	                        	array('alt' => '', 
	                        		'data-step' => '1',
	                        		'data-position' => '-40,40',
	                        		'data-in' => 'top',
	                        		'data-delay' => '200',
	                        		'data-out' => 'bottom',
	                        		'style' => 'width:auto; height:auto')); ?>
						</div>
						<!-- Slider Number 5c -->
						<div class="slide"> 
							<p 		class="claim" 	
									data-position="200,700" data-in="bottom" data-out="left" data-step="1" data-delay="200">Geo Charts</p>
	                        <?php echo $this->Html->image('geo.png', 
	                        	array('alt' => '', 
	                        		'data-step' => '1',
	                        		'data-position' => '10,40',
	                        		'data-in' => 'right',
	                        		'data-delay' => '200',
	                        		'data-out' => 'bottom',
	                        		'style' => 'width:auto; height:auto')); ?>	
						</div>
						<!-- Slider Number 5c -->
						<div class="slide"> 
							<p 		class="claim" 	
									data-position="200,700" data-in="bottomRight" data-out="fade" data-step="1" data-delay="200">Pie Charts</p>
	                        <?php echo $this->Html->image('pie.png', 
	                        	array('alt' => '', 
	                        		'data-step' => '1',
	                        		'data-position' => '-40,80',
	                        		'data-in' => 'toLeft',
	                        		'data-delay' => '200',
	                        		'data-out' => 'fade',
	                        		'style' => 'width:auto; height:auto')); ?>
						</div>
						<!-- Slider Number 5d -->
						<div class="slide"> 
							<p 		class="claim" 	
									data-position="200,700" data-in="fade" data-out="top" data-step="1" data-delay="200">Bar Charts</p>
	                        <?php echo $this->Html->image('bar.png', 
	                        	array('alt' => '', 
	                        		'data-step' => '1',
	                        		'data-position' => '10,40',
	                        		'data-in' => 'fade',
	                        		'data-delay' => '200',
	                        		'data-out' => 'left',
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
										<h3>1- Select a search parameter</h3>
											<div>
												<p>
													<?php echo $this->Html->image('search1.png', array('style' => 'float:left'))?>	
													To perform a global search, click on the magnifier glass.
													<br><br>
													<?php echo $this->Html->image('search1b.png', array('style' => 'float:left'))?>	
													However, you may also search by a case parameter - i.e <strong>Case, Defendant, Type of Trafficking, Victims, Judge...</strong>. To do so, click on any of the parameters to view the criteria.
												</p>
											</div>
										<h3>2- Select/Enter a specific criteria</h3>
											<div>
												<p>
													<?php echo $this->Html->image('search2.png', array('style' => 'float:left'))?>	
													After you have expanded a parameter, you select the criteria by which you would like to search by.
												</p>
											</div>
										<h3>3- Search Result(s)</h3>
											<div>
												<p>
													After selecting your search criteria and clicking the search button, results will be printed out in a table.
													<br><br>
													<?php echo $this->Html->image('search3.png', array('style' => 'float:left'))?>	
												</p>
											</div>
							    	</div>
							</div>
							<div class="col-md-6 job-left">
								    <h3>Performing an analysis</h3>
						    		<div id="accordion2">
										<h3>1- Choose a graph</h3>
											<div>
												<p>
													<!-- <?php echo $this->Html->image('graph1a.png', array('style' => 'float:left'))?>	 -->
													To perform any type of data analysis, you <strong>MUST</strong> perform a search.
													<br><br>
													<?php echo $this->Html->image('graph1.png', array('style' => 'float:left'))?>	
													To do data analysis, you need to choose the type of graph you want displayed as well the variable(s) for the graph. <strong>It must be done in a sequence</strong>
												</p>
											</div>
										<h3>2- Select graph variable(s)</h3>
											<div>
												<p>
													<?php echo $this->Html->image('graph2.png', array('style' => 'float:left'))?>	
													After choosing a graph, you have to select the variable(s) you would like graphed.
												</p>
											</div>
										<h3>3- Analyze Result(s)</h3>
											<div>
												<p>
													After selecting both a graph and the variable(s), you may graph and perform the analysis by clicking the analyze button.
													<br><br>
													<?php echo $this->Html->image('graph3.png', array('style' => 'float:left'))?>	
												</p>
											</div>
							    	</div>
							 </div>
						</div>
					</div>
	  	 	  </div>
	  	</div>
</div>
<style type="text/css">
	#accordion h3, #accordion2 h3{text-align: left;}
</style>