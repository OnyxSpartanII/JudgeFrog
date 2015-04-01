<?php
		$this->layout = 'admin_panel_layout';
		$this->set('title', 'Create Case- Admin Panel | Human Trafficking Data');
		$this->set('active', 'create_case');
?>
    <?php
        echo $this->Html->css(array());
        // echo $this->Html->script(array('fieldset_switcher'));
    ?>
    <?php
        echo $this->Html->script(array('fieldset_switcher'));
    ?>

<!--search start here-->
<div class="contact">
		<div class="container">
				<div class="contact-main">
					<div class="case_top_bar">
						<h3 class="page_title">Case &amp; Judge Details</h3>
						<div class="progress">
							<div class="progress-bar progress-bar-warning" role="progressbar" style="width:10%">PROGRESS:</div>
							<div class="progress-bar progress-bar active_progress" role="progressbar" style="width:25%"><strong>Case Information</strong></div>
							<div class="progress-bar idle" role="progressbar" style="width:18%">Victim Information</div>
							<div class="progress-bar idle" role="progressbar" style="width:35%">Defendant(s) Information</div>
							<div class="progress-bar idle" role="progressbar" style="width:12%">Submit</div>
						</div>
					</div>
					<div class="col-md-12 contact-right">
						<!-- TOP DELETE SELECTED USER BAR -->
							<!-- <div class="top_bar col-md-12">
								<div class="top_bar_dash">
									<h4>CASE INFORMATION</h4>
								</div>

									<div title="Click here to save and quit." style="margin-top: 19px;">
										<label for="" class="user_button" >
											<?php echo $this->Html->image('save.png', array('alt' => 'Create', 'style' => 'float:left; padding: 10px 10px 10px 2px;' )); ?>
										</label>
									</div>
							</div> -->
							<div class="col-md-5 case_creation_form" id="msform">
							
								<h2 id="caseInfoFS_Title">Case Details</h2>
							<fieldset id="caseInfoFS">
								<?php 
								echo $this->Form->create('CaseSession');
								echo $this->Form->input('CaseNam', array('label' => 'Case Name', 'placeholder' => 'USA v. Bachman'));
								echo $this->Form->input('CaseNum', array( 'label' => 'Case Number', 'placeholder' => '23-o3-2015'));
								echo $this->Form->input('NumDef', array('label'=> 'Number of Defendants', 'type' => 'text', 'placeholder' => '5'));
								echo "<hr style='border-top:1px solid #CCC;'>";
								echo $this->Form->input('JudgeName', array('label' => 'Judge Name', 'name'=> 'judgeName','placeholder' => 'Jonas Blane', 'type' => 'text')); 
								echo "<a href='#modal' class='add_judge'>Add New Judge</a>";
								?>
								<hr style="border-top:1px solid #CCC;">
								<!-- <input type="button" name="previous" class="backCaseInfo action-button" value="Back" /> -->
								<input type="button" name="next" onclick="goToCaseSum()" class="action-button" value="Case Summary" />
							</fieldset>
								
								<h2 id="caseSumFS_Title">District &amp; Summary Details</h2>
							<fieldset id="caseSumFS">
								<?php echo $this->Form->input('FedDistrictNum', array('label'=> '', 'placeholder' => 'Federal District #', 'type' => 'text')); ?>
								<?php echo $this->Form->input('FedDistrictLoc', array('label' => '', 'placeholder' => 'Federal District Location')); ?>

								<?php //echo $this->Form->input('FedDistrictNum', array('label'=> '', 'placeholder' => 'Federal District #', 'type' => 'text')); ?>

								<?php echo $this->Form->input('State', array('label'=> '','options' => array('Alabama','Alaska','Arizona','Arkansas','California','Colorado','Connecticut','Delaware','Florida','Georgia','Hawaii','Idaho','Illinois','Indiana','Iowa','Kansas','Kentucky','Louisiana','Maine','Maryland','Massachusetts','Michigan','Minnesota','Mississippi','Missouri','Montana','Nebraska','Nevada','New Hampshire','New Jersey','New Mexico','New York','North Carolina','North Dakota','Ohio','Oklahoma','Oregon','Pennsylvania','Rhode Island','South Carolina','South Dakota','Tennessee','Texas','Utah','Vermont','Virginia','Washington','West Virginia','Wisconsin','Wyoming'), 'empty' => 'State'));
								?>
								<?php echo $this->Form->input('CaseSummary', array('placeholder' => 'Case Summary', 'label' => '')); ?>
								
								<hr style="border-top:1px solid #CCC;">
								<input type="button" name="previous" onclick="goToCaseInfo()" class="action-button" value="Back" />
								<!-- <input type="button" name="next" class="toNewJudge action-button" value="Insert Victim(s)" /> -->
							</fieldset>

							<fieldset><legend>Judge Information</legend>
								<?php
								echo $this->Form->input('JudgeName', array('label' => '', 'name'=> 'judgeName','placeholder' => 'Judge Name', 'type' => 'text'));
								echo $this->Form->input('JudgeRace', array('label' => '', 'empty' => 'Race', 'options' => array('White', 'Black', 'Hispanic', 'Asian', 'Other'))); 
								echo $this->Form->input('JudgeGen', array('label' => '', 'options' => array('Male', 'Female'), 'empty' => 'Gender'));
								echo $this->Form->input('JudgeTenure', array('label' => '', 'name'=> 'tenure', 'options' => array('1960', '1961', '1962', '1963', '1964', '1965', '1966', '1967', '1968', '1969', '1970', '1971', '1972', '1973', '1974', '1975', '1976', '1977', '1978', '1979', '1980', '1981', '1982', '1983', '1984', '1985', '1986', '1987', '1988', '1989', '1990', '1991', '1992', '1993', '1994', '1995', '1996', '1997', '1998', '1999', '2000', '2001', '2002', '2003', '2004', '2005', '2006', '2007', '2008', '2009', '2010', '2011', '2012', '2013', '2014', '2015', '2016', '2017', '2018', '2019', '2020', '2021'), 'empty' => 'Year Appointed | Tenure'));
								echo $this->Form->input('JudgeApptBy', array('label' => '', 'options' => array('Republican', 'Democrat'), 'empty' => 'Appointed By'));
								?>
							</fieldset>

								<div class="case_creation_bottom">
									<?php echo $this->Form->end('Next step'); echo "<br><br><br>"; ?>
									<?php echo $this->Form->end('Save & Quit');?>
									<!-- <?php //echo print_r($this->params); echo $this->Html->url(null, true);?> -->
								</div>
							</div>
					</div> 
				</div>
				<div class="col-md-12 search_disclaim" style="margin-top:0px; padding-top:10px; border-top:1px solid #DCDCDC">
					<p><strong>*Note: </strong>All fields are required</p>
				</div>
		</div>
</div>


    <script type="text/javascript">
    var $progr = $(".progress");
    	// $progr.show('slow');


		var caseInfoFS = $('#caseInfoFS');
		var caseSum = $('#caseSumFS');
			$('#caseSumFS_Title').hide();

		function goToCaseSum() {    	
			caseInfoFS.hide('slow');
			$('#caseInfoFS_Title').hide();
			caseSum.fadeIn('slow');
			$('#caseSumFS_Title').show();
		}

		function goToCaseInfo() {    	
			caseSum.hide('slow');
			$('#caseSumFS_Title').hide();
			caseInfoFS.fadeIn('slow');
			$('#caseInfoFS_Title').show('slow');
		}
	</script>