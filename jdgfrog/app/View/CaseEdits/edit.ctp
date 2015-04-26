<?php
		$this->layout = 'admin_panel_layout';
		$this->set('title', 'Edit Case - Admin Panel | Human Trafficking Data');
		$this->set('active', 'edit');
?>
<?php
	echo $this->Html->css(array('dataTables.bootstrap', 'dataTables.responsive'));
	echo $this->Html->script(array('jquery-1.10.2.min', 'jquery.dataTables.min', 'dataTables.responsive.min', 'dataTables.bootstrap'));
?>
<script type="text/javascript" charset="utf-8">
  $(document).ready(function() {
	var caseTable = $('#cases_table').DataTable({
		responsive: true
	});
} );
</script>
<!--search start here-->
<div class="contact">
		<div class="container">
			<div class="contact-main">	
				<div class="case_top_bar">
						<h3 class="page_title">Edit Case</h3>
					</div>
				<div class="col-md-12">
					<div class="col-md-5 case_creation_form" id="form_style" style="float:inherit">
								<h2 id="caseInfoFS_Title">Case &amp; Judge Details</h2>
							<fieldset id="caseInfoFS">
							<?php 
								echo $this->Form->create('DataInProgress');
								echo $this->Form->input('CaseNam', array('label' => 'Case Name', 'default'  => $case['0']['DataInProgress']['CaseNam']));
								echo $this->Form->input('CaseNum', array('type' => 'text', 'label' => 'Case Number', 'default' => $case['0']['DataInProgress']['CaseNum']));
								echo $this->Form->input('NumDef', array('type' => 'text', 'label'=> 'Number of Defendants', 'default' => $case['0']['DataInProgress']['NumDef'], 'readonly' => 'readonly'));
								echo "<hr style='border-top:3px solid #DDD'>";
								echo $this->Form->input('JudgeName', array('label'=> 'Judge Name', 'default' => $case['0']['DataInProgress']['JudgeName']));
								echo $this->Form->input('JudgeRace', array('label' => '', 'default' => $case['0']['DataInProgress']['JudgeRace'], 'empty' => 'Race', 'options' => array('0' => 'White', '1' => 'Black', '2' => 'Hispanic', '3' => 'Asian', '4' => 'Other')));
								echo $this->Form->input('JudgeGen', array('label' => '',  'default' => $case['0']['DataInProgress']['JudgeGen'], 'options' => array('0' => 'Male', '1'=> 'Female'), 'empty' => 'Gender'));
								echo $this->Form->input('JudgeTenure', array('label' => '', 'default' => $case['0']['DataInProgress']['JudgeTenure'], 'options' => array('1960'=>'1960', '1961'=>'1961', '1962'=>'1962', '1963'=>'1963', '1964'=>'1964', '1965'=>'1965', '1966'=>'1966', '1967'=>'1967', '1968'=>'1968', '1969'=>'1969', '1970'=>'1970', '1971'=>'1971', '1972'=>'1972', '1973'=>'1973', '1974'=>'1974', '1975'=>'1975', '1976'=>'1976', '1977'=>'1977', '1978'=>'1978', '1979'=>'1979', '1980'=>'1980', '1981'=>'1981', '1982'=>'1982', '1983'=>'1983', '1984'=>'1984', '1985'=>'1985', '1986'=>'1986', '1987'=>'1987', '1988'=>'1988', '1989'=>'1989', '1990'=>'1990', '1991'=>'1991', '1992'=>'1992', '1993'=>'1993', '1994'=>'1994', '1995'=>'1995', '1996'=>'1996', '1997'=>'1997', '1998'=>'1998', '1999'=>'1999', '2000'=>'2000', '2001'=>'2001', '2002'=>'2002', '2003'=>'2003', '2004'=>'2004', '2005'=>'2005', '2006'=>'2006', '2007'=>'2007', '2008'=>'2008', '2009'=>'2009', '2010'=>'2010', '2011'=>'2011', '2012'=>'2012', '2013'=>'2013', '2014'=>'2014', '2015'=>'2015', '2016'=>'2016', '2017'=>'2017', '2018'=>'2018', '2019'=>'2019', '2020'=>'2020', '2021'=>'2021'), 'empty' => 'Year Appointed | Tenure'));
								echo $this->Form->input('JudgeApptBy', array('label' => '', 'options' => array('0' => 'Republican', '1' => 'Democrat'), 'empty' => 'Appointed By', 'default' => $case['0']['DataInProgress']['JudgeApptBy']));
								
							?>
								<hr style="border-top:1px solid #CCC;">
								<input type="button" name="next" onclick="goToCaseSum()" class="action-button" value="Next - Summary"/>
							</fieldset>	

								<h2 id="caseSumFS_Title">Case Summary &amp; Victims Details</h2>
							<fieldset id="caseSumFS">
							<?php
								echo $this->Form->input('FedDistrictLoc', array('label' => 'Federal District Location', 'default' => $case['0']['DataInProgress']['FedDistrictLoc']));
								echo $this->Form->input('FedDistrictNum', array('label'=> 'Federal District Number','default' => $case['0']['DataInProgress']['FedDistrictNum'],'type' => 'text'));
								echo $this->Form->input('State', array('label'=> '', 'options' => array(
																		'AL' => 'Alabama', 'AK' => 'Alaska', 'AZ' => 'Arizona', 'AR' => 'Arkansas', 'CA' => 'California', 'CO' => 'Colorado', 'CT' => 'Connecticut', 'DE' => 'Delaware', 'FL' => 'Florida', 'GA' => 'Georgia', 'HI' => 'Hawaii', 'ID' => 'Idaho', 'IL' => 'Illinois', 'IN' => 'Indiana', 'IA' => 'Iowa', 'KS' => 'Kansas', 'KY' => 'Kentucky', 'LA' => 'Louisiana', 'ME' => 'Maine', 'MD' => 'Maryland', 'MA' => 'Massachusetts', 'MI' => 'Michigan', 'MN' => 'Minnesota', 'MS' => 'Mississippi', 'MO' => 'Missouri', 'MT' => 'Montana', 'NE' => 'Nebraska', 'NV' => 'Nevada', 'NH' => 'New Hampshire', 'NJ' => 'New Jersey', 'NM' => 'New Mexico', 'NY' => 'New York', 'NC' => 'North Carolina', 'ND' => 'North Dakota', 'OH' => 'Ohio', 'OK' => 'Oklahoma', 'OR' => 'Oregon', 'PA' => 'Pennsylvania', 'RI' => 'Rhode Island','SC' => 'South Carolina','SD' => 'South Dakota','TN' => 'Tennessee','TX' => 'Texas', 'UT' => 'Utah', 'VT' => 'Vermont', 'VA' => 'Virginia', 'WA' => 'Washington', 'WV' => 'West Virginia', 'WI' => 'Wisconsin', 'WY' => 'Wyoming'), 'empty' => 'State', 'default' => $case['0']['DataInProgress']['State']));

								echo $this->Form->input('CaseSummary', 	array('label' => 'Case Summary','default' => $case['0']['DataInProgress']['CaseSummary'], 'type' => 'textarea'));
								echo $this->Form->input('LaborTraf', array('label' => 'Labor Trafficking','default' => $case['0']['DataInProgress']['LaborTraf']));
								echo $this->Form->input('AdultSexTraf', array('label' => 'Adult Sex Trafficking','default' => $case['0']['DataInProgress']['AdultSexTraf']));
								echo $this->Form->input('MinorSexTraf', array('label' => 'Minor Sex Trafficking','default' => $case['0']['DataInProgress']['MinorSexTraf']));
								
								echo $this->Form->input('NumVic', array('type' => 'text', 'label' => 'Total Number of Victims','default' => $case['0']['DataInProgress']['NumVic']));
								
								echo $this->Form->input('NumVicMinor', 	array('type' => 'text', 'label' => 'Number of Minor Victims','default' => $case['0']['DataInProgress']['NumVicMinor']));
								
								echo $this->Form->input('NumVicForeign', array('type' => 'text', 'label' => 'Number of Foreign Victims','default' => $case['0']['DataInProgress']['NumVicForeign']));
								
								echo $this->Form->input('NumVicFemale', array('type' => 'text', 'label' => 'Number of Female Victims', 'default' => $case['0']['DataInProgress']['NumVicFemale'])); 
							?>	
							<hr style="border-top:1px solid #CCC;">
							<input type="button" name="previous" onclick="goToCaseInfo()" class="action-button" value="Back" />
						</fieldset>	
					</div>									
					<div class="col-md-7 case_creation_form" id="form_style" style="float:inherit">
					  <div class="top_bar col-md-7">
						<div class="top_bar_dash">
						  <h4>CASE DEFENDANTS</h4>
						</div>
						<!-- ADD BUTTON-->
						<div title="Add a new case" style="margin-top: -5px;">
							<label for="" class="user_button" title="Add a new defendant">
								<?php
								echo $this->Html->link(
										$this->Html->image("add_def.png", array("alt" => "Create Case", 'style' => 'float:left; padding: 10px 7px 8px 0px;')),
										'/admin/cases/edit/add_defendant/'.urlencode($case['0']['DataInProgress']['CaseNum']), array('escape' => false)); ?> 
							</label>
						</div>
					  </div>
						<?php 
								echo "<table class='table table-striped table-bordered' id='cases_table'>";
								echo"      <thead>";
								echo"        <tr>";
								echo"          <th class='desktop first_th'>Last Name</th>";
								echo"          <th class='desktop'>First Name</th>";
								echo"          <th class='always special_th'>Actions</th>";
								echo"        </tr>";
								echo"      <thead>";
								echo "<tbody>";
								$i = 0;
								foreach ($case as $case) { 
						?>
						<?php 	if ($case['DataInProgress']['DefLast'] != null) {
								echo "  <tr>";
								// echo "		<td> ".++$i ."</td>";
								echo "		<td> ".$case['DataInProgress']['DefLast']."</td>";
								echo "		<td> ".$case['DataInProgress']['DefFirst']."</td>";
								echo "		<td> ".$this->Html->link('Edit',
										'/admin/cases/edit/defendant/'.urlencode($case['DataInProgress']['DefLast'].'|'.$case['DataInProgress']['DefFirst'].'|'.$case['DataInProgress']['CaseNum']), 
										array('controller' => 'CaseEdits', 'action' => 'editDefendant')).
										 '&nbsp/&nbsp;'.$this->Html->link('Delete', '/admin/cases/delete_def/'.urlencode($case['DataInProgress']['DefLast'].'|'.$case['DataInProgress']['DefFirst'].'|'.$case['DataInProgress']['CaseNum']), array('controller' => 'CaseEdits', 'action' => 'editDefendant', 'onclick'=> 'return confirm("Are you sure you want to delete this defendant?")')).
								"</td>";
								}
						?>
						<?php 	//echo $this->Form->input(); ?>
						<?php //echo $this->Form->submit('Submit', array('confirm' => 'Submit this case for review?')); ?>
						<?php 
								echo "  </tr>";
							}   //END OF LOOP
								echo "</tbody>";
								echo "</table>";
						  if (count($case) == 0) {
								echo "This case has 0 defendants.";
						  }
						 ?>	
					</div>
				</div>
				<div class="col-md-12 search_disclaim case_creation_form" style="margin-top:0px; padding-top:10px; border-top:1px solid #DCDCDC">
						<?php echo $this->Form->input('SubmittedForReview', array('label' => 'Submit Case For Review?', 'type' => 'checkbox', 'style' => 'margin-top: -5px;')); ?>
						<div style="max-width:60%;margin: 0 auto"><?php echo $this->Form->end('Submit'); ?></div>
						<br>
					<p><strong>*Note: </strong>All fields are required</p>
				</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	var caseInfoFS = $('#caseInfoFS');
	var caseSum = $('#caseSumFS');
		$('#caseSumFS_Title').hide();

	function goToCaseSum() {    	
		caseInfoFS.hide('slow');
		$('#caseInfoFS_Title').hide('slow');
		caseSum.fadeIn('slow');
		$('#caseSumFS_Title').show('slow');
	}

	function goToCaseInfo() {    	
		caseSum.hide('slow');
		$('#caseSumFS_Title').hide('slow');
		caseInfoFS.fadeIn('slow');
		$('#caseInfoFS_Title').show('slow');
	}
</script>
<!-- TABLE AND TABLE SELECTION SCRIPT -->
<style type="text/css">
.table_container, .dataTables_length, .dataTables_filter{
  margin-top: 10px;
  text-align: left;
}
table{
  width:100%;
  border:1px solid #999;
  border-collapse:collapse;
}
.case{padding: 0px 10px 0px 0px;}
th{background-color:#999;color:#fff;
	padding:15px 0px 15px 0px;
	border-right:1px solid #666;
	text-align: left;}
td{text-align: left;
	min-width: 20px;}
.special_th{background-color: #4D1979}
.first_th{text-align: center;}
#collapsible-panels .table h2, input {
  width: 10%;
}
</style>
<!-- SUCCESS BANNER -->
<script type="text/javascript">
	var $welcom = $("#flashMessage");
	setTimeout(function() {
		$welcom.slideUp(800).delay(900).fadeOut(900);
	}, 4000);
</script>
