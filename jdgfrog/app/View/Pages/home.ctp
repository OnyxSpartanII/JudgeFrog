
<!-- FUNCTION TO ANIMATE LOGO -->
	<script type="text/javascript">		
		var radius = 5;

		var interval = window.setInterval(function() {
		$(".logo").css("-webkit-mask", "-webkit-gradient(radial, 27 27, " + radius + ", 5 5, " + (radius + 5) + ", from(rgb(0, 0, 0)), color-stop(0.5, rgba(0, 0, 0, 0.2)), to(rgb(0, 0, 0)))");
		radius++;
		if (radius === 100) {
		window.clearInterval(interval);
		}
		}, 15);
	</script>	
<!--job start here-->
<div class="jobs">
	<div class="container">
	  	<div class="jobs-main">
	  	 	<h3>WELCOME</h3>
	  	 	 <div class="job-top">
	  	 	  	    <div class="col-md-15 job-left">
	  	 	  	  	     <h4>One Minute Facts About Human Trafficking</h4>
		        			<iframe class="myIframe" width="100%" src="//www.youtube.com/embed/J4ztDU-yr74?showinfo=0&autohide=1&loop=1&playlist=J4ztDU-yr74" frameborder="0" allowfullscreen></iframe>
            			<p><strong>Credit: </strong>Real Motion</p>
	  	 	  	     </div>

	  	 	  	   <!--   <div class="col-md-4 job-right">
	  	 	  	  		
	  	 	  	     </div> -->
	  	 	  	   <div class="clearfix"> </div>
	  	 	  </div>
	  	 	  <div class="job-bottom">
	  	 	  	    <div class="col-md-3 job-column">
            			<!-- ADD SOME OTHER CONTENT HERE -->
	   	 	  	    </div>
	  	 	  	    <div class="clearfix"> </div>
	  	 	  </div>
	  	</div>
	</div>
</div>

