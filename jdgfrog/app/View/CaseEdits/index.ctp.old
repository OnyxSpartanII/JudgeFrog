<?php

	/*
	*	Page: 
	*/
	$this->layout = 'admin_panel_layout';

?>

<!--search start here-->
<div class="contact">
		<div class="container">
				<div class="contact-main">
					<h3 class="page_title">Edit Case</h3>
							<div class="col-md-3 contact-right" style="padding-bottom:50px">
								<!-- TOP CREATE A NEW USER BAR -->
									<div class="top_bar col-md-3">
										<div class="top_bar_left">
											<h4>SEARCH</h4>
										</div>
											<!-- PENDING BUTTON-->
											<div title="Click here to search for the case." style="margin-top: 19px;">
												<label for="" class="user_button">
													<?php echo $this->Html->image('search.png', array('alt' => 'Create', 'style' => 'float:left; padding: 10px 7px 8px 0px;' )); ?>
												</label>
											</div>
											<div style="margin-bottom:20px; margin-top:100px; text-align:center;">   
														<?php
															echo $this->Form->input('Search', array('label' => 'Enter Case Name','placeholder' => 'USA v. John Doe', 'type' => 'text', 'id' => 'case_name', 'style' => 'background-color: #fff;'));
															
														?>
												</div>
									</div>
								<!-- Create Interface -->
								<div class="user_creation" style="padding-bottom:50px; margin-top:50px;">
									<div class="login_details" style="background-color:#DCDCDC">
									</div>
								</div>
						</div> 
								<div class="col-md-9 contact-right">
									<!-- TOP DELETE SELECTED USER BAR -->
										<div class="top_bar col-md-9">
											<div class="top_bar_dash">
												<h4>CASE UPDATE DASHBOARD</h4>
											</div>
									<!-- PENDING BUTTON-->
										<div title="Click here to edit the selected case." style="margin-top: 19px;">
											<label for="" class="user_button">
											<?php
											echo $this->Html->link(
												$this->Html->image("review.png", array("alt" => "Edit Case", 'style' => 'float:left; padding: 10px 6px 8px 0px;')),
										
												"/AdminPanel/edit", array('escape' => false, 'id' => 'edit_case')); ?> 
											</label>
										</div>  
										</div>
									<!-- Search Results -->
									<script type="text/javascript">
									
									</script>


								</div> 
					</div>
				</div>
						<div class="search_disclaim" style="margin-top:200px">
							<p><strong>Note: </strong>Not every combination of analyzable objects will return meaningful results.</p>
						</div>
</div>

<!-- Auto Complete Script -->
<script>
		function split( val ) {
			return val.split( /,\s*/ );
		}
		function extractLast( term ) {
			return split( term ).pop();
		}
		$( "#case_name" ) //Case Name Field
			.autocomplete({
				source: "autoComplete" ,
				minLength: 1
			});
	</script>

<!-- CASE SELECTION SCRIPT -->
  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>

<script type="text/javascript">

  var displaying = false;
  var index = -1;

  <?php
	if (isset($p_cases)) {
	  $jsarr = json_encode($p_cases);
	  echo 'var p_cases = ' . $jsarr . ';';
	} else {
	  echo 'var p_cases = [];';
	}
  ?>
	// TOGGLE SELECTED CASE
	$('.toggle_case').click(function(){

	  if (!displaying) {
		displaying = true;
		index = $(this).attr('id');
		console.log('Displaying ' + index);
		  $.ajax({                   
			  url: '/jdgfrog/CaseReviews/generateTable/' + index,
			  cache: false,
			  type: 'GET',
			  dataType: 'HTML',
			  success: function (html) {
				  $('.selected_case').html(html);
				  $('.this_def_info').hide();
				  $(this).toggleClass('clicked', 'slow');
				  $('.toggle_def').click(function(){
					$(this).nextUntil('.toggle_def').toggle('slow');
					$(this).toggleClass('clicked', 'slow');
				  });
				  $('.selected_case').show(50);
				  $('#edit_case').attr('href', '/admin/cases/edit/' + p_cases[index][0]);
			  }
		  });
	  } else {
		console.log('Hiding');
		$('.selected_case').hide();
		displaying = false;
		index = -1;
	  }
	});
	   // TOGGLE SELECTED DEFENDENT

	  $('#publish_button').click(function(){
		$.ajax({
		  url: '/jdgfrog/CaseReviews/publishCase/' + index,
		  cache: false,
		  type: 'GET',
		  dataType: 'HTML',
		  success: function () {
			$(this).remove();
		  }
		});
	  });
</script>