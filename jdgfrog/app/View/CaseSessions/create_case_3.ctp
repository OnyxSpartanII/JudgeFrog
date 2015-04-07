<?php
		$this->layout = 'admin_panel_layout';
		$this->set('title', 'Create Case - Admin Panel | Human Trafficking Data');
		$this->set('active', 'create_case');
?>
<?php
		echo $this->Html->css(array('datepicker'));
		echo $this->Html->script(array('bootstrap-datepicker'));
?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script>
$(function() {
	$( "#defBirth" ).datepicker();
});
</script>
<!--search start here-->
<div class="contact">
		<div class="container">
				<div class="contact-main">
									<div class="case_top_bar">
										<h3 class="page_title">Single Case Creation</h3>
											<div class="progress">
												<div class="progress-bar" role="progressbar" style="width:10%">PROGRESS:</div>
												<div class="progress-bar progress-bar-success " role="progressbar" style="width:25%">Case Information</div>
												<div class="progress-bar progress-bar-success " role="progressbar" style="width:18%">Victim Information</div>
												<div class="progress-bar progress-bar-success active_progress" role="progressbar" style="width:35%"><strong>Defendant(s) Information</strong></div>
												<div class="progress-bar progress-bar-success idle" role="progressbar" style="width:12%">Submit</div>
											</div>
									</div>
							<div class="col-md-5 case_creation_form" id="form_style">
								<h2 id="caseInfoFS_Title">Defendant Information</h2>
											<fieldset>
													<?php echo $this->Form->create('CaseSession'); ?>
													<?php 
													echo $this->Form->input('DefFirst', array('type' => 'text', 'placeholder' => 'Robert', 'label' => 'Defendant\'s First Name'));
													echo $this->Form->input('DefLast', array('type' => 'text', 'placeholder' => 'Smith', 'label' => 'Defendant\'s Last Name'));
													echo $this->Form->input('DefRace', array('label' => '', 'empty' => 'Race', 'options' => array('0' => 'White', '1' => 'Black', '2' => 'Hispanic', '3' => 'Asian', '4' => 'Other')));
													echo $this->Form->input('DefGender', array('label' => '', 'options' => array('0' => 'Male', '1' => 'Female'), 'empty' => 'Gender'));
													echo $this->Form->input('DefBirthdate', array('type' => 'text', 'placeholder' => '1986', 'label' => 'Defendant\'s Birth Year'));
													echo $this->Form->input('DefArrestAge', array('type' => 'text', 'placeholder' => '1986', 'label' => 'Defendant\'s Age At Arrest', 'data-date' => '2012', 'data-date-format' => 'yyyy', 'id' => 'defArrAge'));
													echo $this->Form->input('Alias', array('label' => '', 'placeholder' => 'Enter defendant aliases separated by commas.'));
													?>
											</fieldset>
											<?php echo $this->Form->end('Next'); ?>
							</div>
				</div>
				<div class="search_disclaim" style="margin-top:0px; padding-top:10px; border-top:1px solid #DCDCDC">
					<p><strong>*Note: </strong>All fields are required</p>
				</div>
		</div>
</div>