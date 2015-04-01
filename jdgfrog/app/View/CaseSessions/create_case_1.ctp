<?php
		$this->layout = 'admin_panel_layout';
		$this->set('title', 'Create Case- Admin Panel | Human Trafficking Data');
		$this->set('active', 'create_case');
?>
    <?php
        echo $this->Html->css(array('adminPanelWindow'));
        // echo $this->Html->script(array('bootstrap-datepicker'));
    ?>
    <script type="text/javascript">
    var $progr = $(".progress");
    
	</script>

<!--search start here-->
<div class="contact">
		<div class="container">
				<div class="contact-main">
					<h3 class="page_title">Single Case Creation</h3>
		<div class="progress">
		  <div class="progress-bar progress-bar" role="progressbar" style="width:15%"><strong>Case Information</strong></div>
		  <div class="progress-bar progress-bar-warning idle" role="progressbar" style="width:10%">Victim Information</div>
		  <div class="progress-bar progress-bar-danger idle" role="progressbar" style="width:70%">Defendant(s) Information</div>
		  <div class="progress-bar progress-bar-success idle" role="progressbar" style="width:5%">Submit</div>
		</div>
							<div class="col-md-4 contact-right">
								<!-- TOP CREATE A NEW USER BAR -->
									<div class="top_bar col-md-4">
										<div class="top_bar_dash">
											<h4>PROGRESS</h4>
											<h5>Case &amp; Judge Information</h5>
										</div>
									</div>
										<div class="progress_bar">
											<label style="margin-top:80px">Case & Judge Information</label>
											<label>Victim Information</label>
											<label>Defendant Information</label>
											<div class = "defendant_sub">
												<label>Charge Information</label>
												<label>Statute(s) Information</label>
												<label>Sentencing Information</label>
												<label>Organized Crime Group Information</label>
											</div>
											<label>Submit For Review</label>
										</div>
								<!-- Create Interface -->
								<div class="user_creation" style="padding-bottom:50px; margin-top:50px;">
									<div style="padding-top:0px;background-color:#FFF; border-bottom:1px solid rgba(75,75,75,.3);"></div>
									<div class="personal_details" style="background-color:#DCDCDC">
									</div>
								</div>
							</div> 
								<div class="col-md-8 contact-right">
									<!-- TOP DELETE SELECTED USER BAR -->
										<div class="top_bar col-md-8">
											<div class="top_bar_left">
												<h4>CASE INFORMATION</h4>
											</div>
												<!-- DELETE BUTTON-->
												<div title="Click here to save and quit." style="margin-top: 19px;">
													<label for="" class="user_button" >
														<?php echo $this->Html->image('save.png', array('alt' => 'Create', 'style' => 'float:left; padding: 10px 10px 10px 2px;' )); ?>
													</label>
												</div>
										</div>
										<div class="col-md-11 case_creation_form" style="margin:100px auto; float:none;">
										
										<fieldset><legend>Case Information</legend>
											<?php echo $this->Form->create('CaseSession'); ?>

											<?php echo $this->Form->input('CaseNam', array('label' => '', 'placeholder' => 'Case Name')); ?>

											<?php echo $this->Form->input('CaseNum', array( 'label' => '', 'placeholder' => 'Case Number')); ?>

											<?php echo $this->Form->input('NumDef', array('label'=> '', 'type' => 'text', 'placeholder' => 'Number of Defendants')); ?>
										</fieldset>

										<fieldset><legend>Judge Information</legend>
											<?php
											echo $this->Form->input('JudgeName', array('label' => '', 'name'=> 'judgeName','placeholder' => 'Judge Name', 'type' => 'text'));
											echo $this->Form->input('JudgeRace', array('label' => '', 'empty' => 'Race', 'options' => array('White', 'Black', 'Hispanic', 'Asian', 'Other'))); 
											echo $this->Form->input('JudgeGen', array('label' => '', 'options' => array('Male', 'Female'), 'empty' => 'Gender'));
											echo $this->Form->input('JudgeTenure', array('label' => '', 'name'=> 'tenure','placeholder' => 'Tenure', 'type' => 'text'));
											echo $this->Form->input('JudgeApptBy', array('label' => '', 'options' => array('Republican', 'Democrat'), 'empty' => 'Appointed By'));
											?>
										</fieldset>

										<fieldset><legend>District &amp; Summary Information</legend>
											<?php echo $this->Form->input('FedDistrictNum', array('label'=> '', 'placeholder' => 'Federal District #', 'type' => 'text')); ?>
											<?php echo $this->Form->input('FedDistrictLoc', array('label' => '', 'placeholder' => 'Federal District Location')); ?>

											<?php //echo $this->Form->input('FedDistrictNum', array('label'=> '', 'placeholder' => 'Federal District #', 'type' => 'text')); ?>

											<?php echo $this->Form->input('State', array('label'=> '','options' => array('Alabama','Alaska','Arizona','Arkansas','California','Colorado','Connecticut','Delaware','Florida','Georgia','Hawaii','Idaho','Illinois','Indiana','Iowa','Kansas','Kentucky','Louisiana','Maine','Maryland','Massachusetts','Michigan','Minnesota','Mississippi','Missouri','Montana','Nebraska','Nevada','New Hampshire','New Jersey','New Mexico','New York','North Carolina','North Dakota','Ohio','Oklahoma','Oregon','Pennsylvania','Rhode Island','South Carolina','South Dakota','Tennessee','Texas','Utah','Vermont','Virginia','Washington','West Virginia','Wisconsin','Wyoming'), 'empty' => 'State'));
											?>
											<?php echo $this->Form->input('CaseSummary', array('placeholder' => 'Case Summary', 'label' => '')); ?>
										</fieldset>

											<?php echo $this->Form->end('Next step'); ?>
											<!-- <?php //echo print_r($this->params); echo $this->Html->url(null, true);?> -->
										</div>
								</div> 
				</div>
		</div>
				<div class="search_disclaim" style="margin-top:0px; padding-top:10px; border-top:1px solid #DCDCDC">
					<p><strong>*Note: </strong>All fields are required</p>
				</div>
</div>
