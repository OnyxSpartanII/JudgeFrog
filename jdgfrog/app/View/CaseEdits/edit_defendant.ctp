<?php
		$this->layout = 'admin_panel_layout';
		$this->set('title', 'Edit Case - Admin Panel | Human Trafficking Data');
		$this->set('active', 'edit');
?>
<?php
    echo $this->Html->script(array('fieldset_switcher'));
?>
<!--search start here-->
<div class="contact">
		<div class="container">
			<div class="contact-main">	
				<div class="case_top_bar">
						<h3 class="page_title">Defendant &amp; Statutes Details</h3>
						<div class="progress">
							<div class="progress-bar" role="progressbar" style="width:10%">PROGRESS:</div>
							<div class="progress-bar  progress-bar-success active_progress" role="progressbar" style="width:30%"><strong>Case &amp; Victim(s) Information</strong></div>
							<div class="progress-bar idle" role="progressbar" style="width:50%">Defendant(s) Information</div>
							<div class="progress-bar idle" role="progressbar" style="width:10%">Submit</div>
						</div>
					</div>

<?php 	echo 'Case Number: '.$case['DataInProgress']['CaseNum'];
		echo ' | ';
		echo 'Case Name: '.$case['DataInProgress']['CaseNam']; 
?>

					<div class="col-md-5 case_creation_form" id="form_style">
								<h2 id="caseInfoFS_Title">Defendant Details</h2>
							<fieldset id="caseInfoFS">
								<?php echo $this->Form->create('DataInProgress'); ?>


								<?php	echo $this->Form->input('DefLast', 		
																array(
																	'default' => $case['DataInProgress']['DefLast'], 
																	'label' => 'Defendant Last Name')); ?>
								<?php	echo $this->Form->input('DefFirst', 		
																	array(
																		'default' => $case['DataInProgress']['DefFirst'],
																		'label' => 'Defendant First Name')); ?>
								<?php	// customize for male/female with if statement
										echo $this->Form->input('DefGender', array('label' => 'Is there a Gender?', 'default' => $case['DataInProgress']['DefGender'])); ?>
								<?php	echo $this->Form->input('DefBirthdate',	array('label' => 'Defendant Birthdate', 'type' => 'text', 'default' => $case['DataInProgress']['DefBirthdate'])); ?>
								<?php 	echo $this->Form->input('DefRace', array('default' => $case['DataInProgress']['DefRace'])); ?>	
								<?php	echo $this->Form->input('DefArrestAge',	array('label' => 'Defendant Age', 'type' => 'text', 'default' => $case['DataInProgress']['DefArrestAge'])); ?>
								<?php	echo $this->Form->input('Alias', array('default' => $case['DataInProgress']['Alias'])); ?>


								<hr style="border-top:1px solid #CCC;">
								<input type="button" name="next" onclick="goToCaseSum()" class="action-button" value="Next - Summary"/>
							</fieldset>	

	                <h2 id="1961_title">Statute Information | 1961-1968</h2>
	                  <fieldset id="to1961">
						<?php echo $this->Form->input('S1961to1968', 			array(
																					'default' => $case['DataInProgress']['S1961to1968'], 
																					'label' => 'Statute 1961-1968', 
																					'type' => 'checkbox')); ?>
						<?php echo $this->Form->input('Counts1961to1968', 		array(
																					'default' => $case['DataInProgress']['Counts1961to1968'], 
																					'label' => 'Counts', 'type' => 'text')); ?>
						<?php echo $this->Form->input('CountsNP1961to1968', 	array(
																					'default' => $case['DataInProgress']['CountsNP1961to1968'], 
																					'label' => 'Counts Nolle Prossed', 'type' => 'text')); ?>
						<?php echo $this->Form->input('PleaDismissed1961to1968',array(
																					'default' => $case['DataInProgress']['PleaDismissed1961to1968'], 
																					'label' => 'Counts Dismissed', 'type' => 'text')); ?>
						<?php echo $this->Form->input('PleaGuilty1961to1968', 	array('default' => $case['DataInProgress']['PleaGuilty1961to1968'], 'label' => 'Counts Pled Guilty', 'type' => 'text')); ?>
						<?php echo $this->Form->input('TrialGuilty1961to1968', 	array('default' => $case['DataInProgress']['TrialGuilty1961to1968'], 'label' => 'Counts Found Guilty At Trial', 'type' => 'text')); ?>
						<?php echo $this->Form->input('TrialNG1961to1968', 		array('default' => $case['DataInProgress']['TrialNG1961to1968'], 'label' => 'Counts Found Not Guilty At Trial', 'type' => 'text')); ?>
						<?php echo $this->Form->input('Fines1961to1968', 		array('default' => $case['DataInProgress']['Fines1961to1968'], 'label' => 'Fines Levied', 'type' => 'text')); ?>
						<?php echo $this->Form->input('Sent1961to1968', 		array('default' => $case['DataInProgress']['Sent1961to1968'], 'label' => 'Number of Months Sentenced Under Statute', 'type' => 'text')); ?>
						<?php echo $this->Form->input('Prob1961to1968', 		array('default' => $case['DataInProgress']['Prob1961to1968'], 'label' => 'Number of Months Under Probation Under Statute', 'type' => 'text')); ?>
                        <hr style="border-top:1px solid #CCC;">
                        <input type="button" name="next" onclick="goto1028()" class="action-button" value="Statute 1028" />
                  </fieldset>


                  <h2 id="1028_title" class="fieldset_title">Statute Information | 1028</h2>
                  <fieldset id="to1028">
						<?php echo $this->Form->input('S1028', 			array('default' => $case['DataInProgress']['S1028'], 'label' => 'Statute 1028', 'type' => 'checkbox', 'type' => 'text')); ?>
						<?php echo $this->Form->input('Counts1028', 		array('default' => $case['DataInProgress']['Counts1028'], 'label' => 'Counts', 'type' => 'text')); ?>
						<?php echo $this->Form->input('CountsNP1028', 		array('default' => $case['DataInProgress']['CountsNP1028'], 'label' => 'Counts Nolle Prossed', 'type' => 'text')); ?>
						<?php echo $this->Form->input('PleaDismissed1028', 	array('default' => $case['DataInProgress']['PleaDismissed1028'], 'label' => 'Counts Dismissed', 'type' => 'text')); ?>
						<?php echo $this->Form->input('PleaGuilty1028', 	array('default' => $case['DataInProgress']['PleaGuilty1028'], 'label' => 'Counts Pled Guilty', 'type' => 'text')); ?>
						<?php echo $this->Form->input('TrialGuilty1028', 	array('default' => $case['DataInProgress']['TrialGuilty1028'], 'label' => 'Counts Found Guilty At Trial', 'type' => 'text')); ?>
						<?php echo $this->Form->input('TrialNG1028', 		array('default' => $case['DataInProgress']['TrialNG1028'], 'label' => 'Counts Found Not Guilty At Trial', 'type' => 'text')); ?>
						<?php echo $this->Form->input('Fines1028', 			array('default' => $case['DataInProgress']['Fines1028'], 'label' => 'Fines Levied', 'type' => 'text')); ?>
						<?php echo $this->Form->input('Sent1028', 			array('default' => $case['DataInProgress']['Sent1028'], 'label' => 'Number of Months Sentenced Under Statute', 'type' => 'text')); ?>
						<?php echo $this->Form->input('Prob1028', 			array('default' => $case['DataInProgress']['Prob1028'], 'label' => 'Number of Months Under Probation Under Statute', 'type' => 'text')); ?>
                        <hr style="border-top:1px solid #CCC;">
                        <input type="button" name="previous" onclick="goto1961()" class="action-button" value="Statute 1961-1968" />
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="button" name="next" onclick="goto1351()" class="action-button" value="Statute 1351" />
                  </fieldset>

<?php echo $this->Form->input('S1351', 				array('default' => $case['DataInProgress']['S1351'], 'label' => 'Statute 1351', 'type' => 'checkbox')); ?>
<?php echo $this->Form->input('Counts1351', 		array('default' => $case['DataInProgress']['Counts1351'], 'label' => 'Counts', 'type' => 'text')); ?>
<?php echo $this->Form->input('CountsNP1351', 		array('default' => $case['DataInProgress']['CountsNP1351'], 'label' => 'Counts Nolle Prossed', 'type' => 'text')); ?>
<?php echo $this->Form->input('PleaDismissed1351', 	array('default' => $case['DataInProgress']['PleaDismissed1351'], 'label' => 'Counts Dismissed', 'type' => 'text')); ?>
<?php echo $this->Form->input('PleaGuilty1351', 	array('default' => $case['DataInProgress']['PleaGuilty1351'], 'label' => 'Counts Pled Guilty', 'type' => 'text')); ?>
<?php echo $this->Form->input('TrialGuilty1351', 	array('default' => $case['DataInProgress']['TrialGuilty1351'], 'label' => 'Counts Found Guilty At Trial', 'type' => 'text')); ?>
<?php echo $this->Form->input('TrialNG1351', 		array('default' => $case['DataInProgress']['TrialNG1351'], 'label' => 'Counts Found Not Guilty At Trial', 'type' => 'text')); ?>
<?php echo $this->Form->input('Fines1351', 			array('default' => $case['DataInProgress']['Fines1351'], 'label' => 'Fines Levied', 'type' => 'text')); ?>
<?php echo $this->Form->input('Sent1351', 			array('default' => $case['DataInProgress']['Sent1351'], 'label' => 'Number of Months Sentenced Under Statute', 'type' => 'text')); ?>
<?php echo $this->Form->input('Prob1351', 			array('default' => $case['DataInProgress']['Prob1351'], 'label' => 'Number of Months Under Probation Under Statute', 'type' => 'text')); ?>

<?php echo $this->Form->input('S1425', 				array('default' => $case['DataInProgress']['S1425'], 'label' => 'Statute 1425', 'type' => 'checkbox', 'type' => 'text')); ?>
<?php echo $this->Form->input('Counts1425', 		array('default' => $case['DataInProgress']['Counts1425'], 'label' => 'Counts', 'type' => 'text')); ?>
<?php echo $this->Form->input('CountsNP1425', 		array('default' => $case['DataInProgress']['CountsNP1425'], 'label' => 'Counts Nolle Prossed', 'type' => 'text')); ?>
<?php echo $this->Form->input('PleaDismissed1425', 	array('default' => $case['DataInProgress']['PleaDismissed1425'], 'label' => 'Counts Dismissed', 'type' => 'text')); ?>
<?php echo $this->Form->input('PleaGuilty1425', 	array('default' => $case['DataInProgress']['PleaGuilty1425'], 'label' => 'Counts Pled Guilty', 'type' => 'text')); ?>
<?php echo $this->Form->input('TrialGuilty1425', 	array('default' => $case['DataInProgress']['TrialGuilty1425'], 'label' => 'Counts Found Guilty At Trial', 'type' => 'text')); ?>
<?php echo $this->Form->input('TrialNG1425', 		array('default' => $case['DataInProgress']['TrialNG1425'], 'label' => 'Counts Found Not Guilty At Trial', 'type' => 'text')); ?>
<?php echo $this->Form->input('Fines1425', 			array('default' => $case['DataInProgress']['Fines1425'], 'label' => 'Fines Levied', 'type' => 'text')); ?>
<?php echo $this->Form->input('Sent1425', 			array('default' => $case['DataInProgress']['Sent1425'], 'label' => 'Number of Months Sentenced Under Statute', 'type' => 'text')); ?>
<?php echo $this->Form->input('Prob1425', 			array('default' => $case['DataInProgress']['Prob1425'], 'label' => 'Number of Months Under Probation Under Statute', 'type' => 'text')); ?>

<?php echo $this->Form->input('S1512', 				array('default' => $case['DataInProgress']['S1512'], 'label' => 'Statute 1512', 'type' => 'checkbox')); ?>
<?php echo $this->Form->input('Counts1512', 		array('default' => $case['DataInProgress']['Counts1512'], 'label' => 'Counts', 'type' => 'text')); ?>
<?php echo $this->Form->input('CountsNP1512', 		array('default' => $case['DataInProgress']['CountsNP1512'], 'label' => 'Counts Nolle Prossed', 'type' => 'text')); ?>
<?php echo $this->Form->input('PleaDismissed1512', 	array('default' => $case['DataInProgress']['PleaDismissed1512'], 'label' => 'Counts Dismissed', 'type' => 'text')); ?>
<?php echo $this->Form->input('PleaGuilty1512', 	array('default' => $case['DataInProgress']['PleaGuilty1512'], 'label' => 'Counts Pled Guilty', 'type' => 'text')); ?>
<?php echo $this->Form->input('TrialGuilty1512', 	array('default' => $case['DataInProgress']['TrialGuilty1512'], 'label' => 'Counts Found Guilty At Trial', 'type' => 'text')); ?>
<?php echo $this->Form->input('TrialNG1512', 		array('default' => $case['DataInProgress']['TrialNG1512'], 'label' => 'Counts Found Not Guilty At Trial', 'type' => 'text')); ?>
<?php echo $this->Form->input('Fines1512', 			array('default' => $case['DataInProgress']['Fines1512'], 'label' => 'Fines Levied', 'type' => 'text')); ?>
<?php echo $this->Form->input('Sent1512', 			array('default' => $case['DataInProgress']['Sent1512'], 'label' => 'Number of Months Sentenced Under Statute', 'type' => 'text')); ?>
<?php echo $this->Form->input('Prob1512', 			array('default' => $case['DataInProgress']['Prob1512'], 'label' => 'Number of Months Under Probation Under Statute', 'type' => 'text')); ?>

<?php echo $this->Form->input('S1546', 				array('default' => $case['DataInProgress']['S1546'], 'label' => 'Statute 1546', 'type' => 'checkbox')); ?>
<?php echo $this->Form->input('Counts1546', 		array('default' => $case['DataInProgress']['Counts1546'], 'label' => 'Counts', 'type' => 'text')); ?>
<?php echo $this->Form->input('CountsNP1546', 		array('default' => $case['DataInProgress']['CountsNP1546'], 'label' => 'Counts Nolle Prossed', 'type' => 'text')); ?>
<?php echo $this->Form->input('PleaDismissed1546', 	array('default' => $case['DataInProgress']['PleaDismissed1546'], 'label' => 'Counts Dismissed', 'type' => 'text')); ?>
<?php echo $this->Form->input('PleaGuilty1546', 	array('default' => $case['DataInProgress']['PleaGuilty1546'], 'label' => 'Counts Pled Guilty', 'type' => 'text')); ?>
<?php echo $this->Form->input('TrialGuilty1546', 	array('default' => $case['DataInProgress']['TrialGuilty1546'], 'label' => 'Counts Found Guilty At Trial', 'type' => 'text')); ?>
<?php echo $this->Form->input('TrialNG1546', 		array('default' => $case['DataInProgress']['TrialNG1546'], 'label' => 'Counts Found Not Guilty At Trial', 'type' => 'text')); ?>
<?php echo $this->Form->input('Fines1546', 			array('default' => $case['DataInProgress']['Fines1546'], 'label' => 'Fines Levied', 'type' => 'text')); ?>
<?php echo $this->Form->input('Sent1546', 			array('default' => $case['DataInProgress']['Sent1546'], 'label' => 'Number of Months Sentenced Under Statute', 'type' => 'text')); ?>
<?php echo $this->Form->input('Prob1546', 			array('default' => $case['DataInProgress']['Prob1546'], 'label' => 'Number of Months Under Probation Under Statute', 'type' => 'text')); ?>

<?php echo $this->Form->input('S1581to1588', 			array('default' => $case['DataInProgress']['S1581to1588'], 'label' => 'Statute 1581to1588', 'type' => 'checkbox')); ?>
<?php echo $this->Form->input('Counts1581to1588', 		array('default' => $case['DataInProgress']['Counts1581to1588'], 'label' => 'Counts', 'type' => 'text')); ?>
<?php echo $this->Form->input('CountsNP1581to1588', 	array('default' => $case['DataInProgress']['CountsNP1581to1588'], 'label' => 'Counts Nolle Prossed', 'type' => 'text')); ?>
<?php echo $this->Form->input('PleaDismissed1581to1588',array('default' => $case['DataInProgress']['PleaDismissed1581to1588'], 'label' => 'Counts Dismissed', 'type' => 'text')); ?>
<?php echo $this->Form->input('PleaGuilty1581to1588', 	array('default' => $case['DataInProgress']['PleaGuilty1581to1588'], 'label' => 'Counts Pled Guilty', 'type' => 'text')); ?>
<?php echo $this->Form->input('TrialGuilty1581to1588', 	array('default' => $case['DataInProgress']['TrialGuilty1581to1588'], 'label' => 'Counts Found Guilty At Trial', 'type' => 'text')); ?>
<?php echo $this->Form->input('TrialNG1581to1588', 		array('default' => $case['DataInProgress']['TrialNG1581to1588'], 'label' => 'Counts Found Not Guilty At Trial', 'type' => 'text')); ?>
<?php echo $this->Form->input('Fines1581to1588', 		array('default' => $case['DataInProgress']['Fines1581to1588'], 'label' => 'Fines Levied', 'type' => 'text')); ?>
<?php echo $this->Form->input('Sent1581to1588', 		array('default' => $case['DataInProgress']['Sent1581to1588'], 'label' => 'Number of Months Sentenced Under Statute', 'type' => 'text')); ?>
<?php echo $this->Form->input('Prob1581to1588', 		array('default' => $case['DataInProgress']['Prob1581to1588'], 'label' => 'Number of Months Under Probation Under Statute', 'type' => 'text')); ?>

<?php echo $this->Form->input('S1589', 				array('default' => $case['DataInProgress']['S1589'], 'label' => 'Statute 1589', 'type' => 'checkbox')); ?>
<?php echo $this->Form->input('Counts1589', 		array('default' => $case['DataInProgress']['Counts1589'], 'label' => 'Counts', 'type' => 'text')); ?>
<?php echo $this->Form->input('CountsNP1589', 		array('default' => $case['DataInProgress']['CountsNP1589'], 'label' => 'Counts Nolle Prossed', 'type' => 'text')); ?>
<?php echo $this->Form->input('PleaDismissed1589', 	array('default' => $case['DataInProgress']['PleaDismissed1589'], 'label' => 'Counts Dismissed', 'type' => 'text')); ?>
<?php echo $this->Form->input('PleaGuilty1589', 	array('default' => $case['DataInProgress']['PleaGuilty1589'], 'label' => 'Counts Pled Guilty', 'type' => 'text')); ?>
<?php echo $this->Form->input('TrialGuilty1589', 	array('default' => $case['DataInProgress']['TrialGuilty1589'], 'label' => 'Counts Found Guilty At Trial', 'type' => 'text')); ?>
<?php echo $this->Form->input('TrialNG1589', 		array('default' => $case['DataInProgress']['TrialNG1589'], 'label' => 'Counts Found Not Guilty At Trial', 'type' => 'text')); ?>
<?php echo $this->Form->input('Fines1589', 			array('default' => $case['DataInProgress']['Fines1589'], 'label' => 'Fines Levied', 'type' => 'text')); ?>
<?php echo $this->Form->input('Sent1589', 			array('default' => $case['DataInProgress']['Sent1589'], 'label' => 'Number of Months Sentenced Under Statute', 'type' => 'text')); ?>
<?php echo $this->Form->input('Prob1589', 			array('default' => $case['DataInProgress']['Prob1589'], 'label' => 'Number of Months Under Probation Under Statute', 'type' => 'text')); ?>

<?php echo $this->Form->input('S1590', 				array('default' => $case['DataInProgress']['S1590'], 'label' => 'Statute 1590', 'type' => 'checkbox')); ?>
<?php echo $this->Form->input('Counts1590', 		array('default' => $case['DataInProgress']['Counts1590'], 'label' => 'Counts', 'type' => 'text')); ?>
<?php echo $this->Form->input('CountsNP1590', 		array('default' => $case['DataInProgress']['CountsNP1590'], 'label' => 'Counts Nolle Prossed', 'type' => 'text')); ?>
<?php echo $this->Form->input('PleaDismissed1590', 	array('default' => $case['DataInProgress']['PleaDismissed1590'], 'label' => 'Counts Dismissed', 'type' => 'text')); ?>
<?php echo $this->Form->input('PleaGuilty1590', 	array('default' => $case['DataInProgress']['PleaGuilty1590'], 'label' => 'Counts Pled Guilty', 'type' => 'text')); ?>
<?php echo $this->Form->input('TrialGuilty1590', 	array('default' => $case['DataInProgress']['TrialGuilty1590'], 'label' => 'Counts Found Guilty At Trial', 'type' => 'text')); ?>
<?php echo $this->Form->input('TrialNG1590', 		array('default' => $case['DataInProgress']['TrialNG1590'], 'label' => 'Counts Found Not Guilty At Trial', 'type' => 'text')); ?>
<?php echo $this->Form->input('Fines1590', 			array('default' => $case['DataInProgress']['Fines1590'], 'label' => 'Fines Levied', 'type' => 'text')); ?>
<?php echo $this->Form->input('Sent1590', 			array('default' => $case['DataInProgress']['Sent1590'], 'label' => 'Number of Months Sentenced Under Statute', 'type' => 'text')); ?>
<?php echo $this->Form->input('Prob1590', 			array('default' => $case['DataInProgress']['Prob1590'], 'label' => 'Number of Months Under Probation Under Statute', 'type' => 'text')); ?>

<?php echo $this->Form->input('S1591', 				array('default' => $case['DataInProgress']['S1591'], 'label' => 'Statute 1591', 'type' => 'checkbox')); ?>
<?php echo $this->Form->input('Counts1591', 		array('default' => $case['DataInProgress']['Counts1591'], 'label' => 'Counts', 'type' => 'text')); ?>
<?php echo $this->Form->input('CountsNP1591', 		array('default' => $case['DataInProgress']['CountsNP1591'], 'label' => 'Counts Nolle Prossed', 'type' => 'text')); ?>
<?php echo $this->Form->input('PleaDismissed1591', 	array('default' => $case['DataInProgress']['PleaDismissed1591'], 'label' => 'Counts Dismissed', 'type' => 'text')); ?>
<?php echo $this->Form->input('PleaGuilty1591', 	array('default' => $case['DataInProgress']['PleaGuilty1591'], 'label' => 'Counts Pled Guilty', 'type' => 'text')); ?>
<?php echo $this->Form->input('TrialGuilty1591', 	array('default' => $case['DataInProgress']['TrialGuilty1591'], 'label' => 'Counts Found Guilty At Trial', 'type' => 'text')); ?>
<?php echo $this->Form->input('TrialNG1591', 		array('default' => $case['DataInProgress']['TrialNG1591'], 'label' => 'Counts Found Not Guilty At Trial', 'type' => 'text')); ?>
<?php echo $this->Form->input('Fines1591', 			array('default' => $case['DataInProgress']['Fines1591'], 'label' => 'Fines Levied', 'type' => 'text')); ?>
<?php echo $this->Form->input('Sent1591', 			array('default' => $case['DataInProgress']['Sent1591'], 'label' => 'Number of Months Sentenced Under Statute', 'type' => 'text')); ?>
<?php echo $this->Form->input('Prob1591', 			array('default' => $case['DataInProgress']['Prob1591'], 'label' => 'Number of Months Under Probation Under Statute', 'type' => 'text')); ?>

<?php echo $this->Form->input('S1592', 				array('default' => $case['DataInProgress']['S1592'], 'label' => 'Statute 1592', 'type' => 'checkbox')); ?>
<?php echo $this->Form->input('Counts1592', 		array('default' => $case['DataInProgress']['Counts1592'], 'label' => 'Counts', 'type' => 'text')); ?>
<?php echo $this->Form->input('CountsNP1592', 		array('default' => $case['DataInProgress']['CountsNP1592'], 'label' => 'Counts Nolle Prossed', 'type' => 'text')); ?>
<?php echo $this->Form->input('PleaDismissed1592', 	array('default' => $case['DataInProgress']['PleaDismissed1592'], 'label' => 'Counts Dismissed', 'type' => 'text')); ?>
<?php echo $this->Form->input('PleaGuilty1592', 	array('default' => $case['DataInProgress']['PleaGuilty1592'], 'label' => 'Counts Pled Guilty', 'type' => 'text')); ?>
<?php echo $this->Form->input('TrialGuilty1592', 	array('default' => $case['DataInProgress']['TrialGuilty1592'], 'label' => 'Counts Found Guilty At Trial', 'type' => 'text')); ?>
<?php echo $this->Form->input('TrialNG1592', 		array('default' => $case['DataInProgress']['TrialNG1592'], 'label' => 'Counts Found Not Guilty At Trial', 'type' => 'text')); ?>
<?php echo $this->Form->input('Fines1592', 			array('default' => $case['DataInProgress']['Fines1592'], 'label' => 'Fines Levied', 'type' => 'text')); ?>
<?php echo $this->Form->input('Sent1592', 			array('default' => $case['DataInProgress']['Sent1592'], 'label' => 'Number of Months Sentenced Under Statute', 'type' => 'text')); ?>
<?php echo $this->Form->input('Prob1592', 			array('default' => $case['DataInProgress']['Prob1592'], 'label' => 'Number of Months Under Probation Under Statute', 'type' => 'text')); ?>

<?php echo $this->Form->input('S2252', 				array('default' => $case['DataInProgress']['S2252'], 'label' => 'Statute 2252', 'type' => 'checkbox')); ?>
<?php echo $this->Form->input('Counts2252', 		array('default' => $case['DataInProgress']['Counts2252'], 'label' => 'Counts', 'type' => 'text')); ?>
<?php echo $this->Form->input('CountsNP2252', 		array('default' => $case['DataInProgress']['CountsNP2252'], 'label' => 'Counts Nolle Prossed', 'type' => 'text')); ?>
<?php echo $this->Form->input('PleaDismissed2252', 	array('default' => $case['DataInProgress']['PleaDismissed2252'], 'label' => 'Counts Dismissed', 'type' => 'text')); ?>
<?php echo $this->Form->input('PleaGuilty2252', 	array('default' => $case['DataInProgress']['PleaGuilty2252'], 'label' => 'Counts Pled Guilty', 'type' => 'text')); ?>
<?php echo $this->Form->input('TrialGuilty2252', 	array('default' => $case['DataInProgress']['TrialGuilty2252'], 'label' => 'Counts Found Guilty At Trial', 'type' => 'text')); ?>
<?php echo $this->Form->input('TrialNG2252', 		array('default' => $case['DataInProgress']['TrialNG2252'], 'label' => 'Counts Found Not Guilty At Trial', 'type' => 'text')); ?>
<?php echo $this->Form->input('Fines2252', 			array('default' => $case['DataInProgress']['Fines2252'], 'label' => 'Fines Levied', 'type' => 'text')); ?>
<?php echo $this->Form->input('Sent2252', 			array('default' => $case['DataInProgress']['Sent2252'], 'label' => 'Number of Months Sentenced Under Statute', 'type' => 'text')); ?>
<?php echo $this->Form->input('Prob2252', 			array('default' => $case['DataInProgress']['Prob2252'], 'label' => 'Number of Months Under Probation Under Statute', 'type' => 'text')); ?>

<?php echo $this->Form->input('S2260', 				array('default' => $case['DataInProgress']['S2260'], 'label' => 'Statute 2260', 'type' => 'checkbox')); ?>
<?php echo $this->Form->input('Counts2260', 		array('default' => $case['DataInProgress']['Counts2260'], 'label' => 'Counts', 'type' => 'text')); ?>
<?php echo $this->Form->input('CountsNP2260', 		array('default' => $case['DataInProgress']['CountsNP2260'], 'label' => 'Counts Nolle Prossed', 'type' => 'text')); ?>
<?php echo $this->Form->input('PleaDismissed2260', 	array('default' => $case['DataInProgress']['PleaDismissed2260'], 'label' => 'Counts Dismissed', 'type' => 'text')); ?>
<?php echo $this->Form->input('PleaGuilty2260', 	array('default' => $case['DataInProgress']['PleaGuilty2260'], 'label' => 'Counts Pled Guilty', 'type' => 'text')); ?>
<?php echo $this->Form->input('TrialGuilty2260', 	array('default' => $case['DataInProgress']['TrialGuilty2260'], 'label' => 'Counts Found Guilty At Trial', 'type' => 'text')); ?>
<?php echo $this->Form->input('TrialNG2260', 		array('default' => $case['DataInProgress']['TrialNG2260'], 'label' => 'Counts Found Not Guilty At Trial', 'type' => 'text')); ?>
<?php echo $this->Form->input('Fines2260', 			array('default' => $case['DataInProgress']['Fines2260'], 'label' => 'Fines Levied', 'type' => 'text')); ?>
<?php echo $this->Form->input('Sent2260', 			array('default' => $case['DataInProgress']['Sent2260'], 'label' => 'Number of Months Sentenced Under Statute', 'type' => 'text')); ?>
<?php echo $this->Form->input('Prob2260', 			array('default' => $case['DataInProgress']['Prob2260'], 'label' => 'Number of Months Under Probation Under Statute', 'type' => 'text')); ?>

<?php echo $this->Form->input('S2421to2424', 			array('default' => $case['DataInProgress']['S2421to2424'], 'label' => 'Statute 2421to2424', 'type' => 'checkbox')); ?>
<?php echo $this->Form->input('Counts2421to2424', 		array('default' => $case['DataInProgress']['Counts2421to2424'], 'label' => 'Counts', 'type' => 'text')); ?>
<?php echo $this->Form->input('CountsNP2421to2424', 	array('default' => $case['DataInProgress']['CountsNP2421to2424'], 'label' => 'Counts Nolle Prossed', 'type' => 'text')); ?>
<?php echo $this->Form->input('PleaDismissed2421to2424',array('default' => $case['DataInProgress']['PleaDismissed2421to2424'], 'label' => 'Counts Dismissed', 'type' => 'text')); ?>
<?php echo $this->Form->input('PleaGuilty2421to2424', 	array('default' => $case['DataInProgress']['PleaGuilty2421to2424'], 'label' => 'Counts Pled Guilty', 'type' => 'text')); ?>
<?php echo $this->Form->input('TrialGuilty2421to2424', 	array('default' => $case['DataInProgress']['TrialGuilty2421to2424'], 'label' => 'Counts Found Guilty At Trial', 'type' => 'text')); ?>
<?php echo $this->Form->input('TrialNG2421to2424', 		array('default' => $case['DataInProgress']['TrialNG2421to2424'], 'label' => 'Counts Found Not Guilty At Trial', 'type' => 'text')); ?>
<?php echo $this->Form->input('Fines2421to2424', 		array('default' => $case['DataInProgress']['Fines2421to2424'], 'label' => 'Fines Levied', 'type' => 'text')); ?>
<?php echo $this->Form->input('Sent2421to2424', 		array('default' => $case['DataInProgress']['Sent2421to2424'], 'label' => 'Number of Months Sentenced Under Statute', 'type' => 'text')); ?>
<?php echo $this->Form->input('Prob2421to2424', 		array('default' => $case['DataInProgress']['Prob2421to2424'], 'label' => 'Number of Months Under Probation Under Statute', 'type' => 'text')); ?>

<?php echo $this->Form->input('S1324', 				array('default' => $case['DataInProgress']['S1324'],'label' => 'Statute 1324', 'type' => 'checkbox')); ?>
<?php echo $this->Form->input('Counts1324', 		array('default' => $case['DataInProgress']['Counts1324'], 'label' => 'Counts', 'type' => 'text')); ?>
<?php echo $this->Form->input('CountsNP1324', 		array('default' => $case['DataInProgress']['CountsNP1324'], 'label' => 'Counts Nolle Prossed', 'type' => 'text')); ?>
<?php echo $this->Form->input('PleaDismissed1324', 	array('default' => $case['DataInProgress']['PleaDismissed1324'], 'label' => 'Counts Dismissed', 'type' => 'text')); ?>
<?php echo $this->Form->input('PleaGuilty1324', 	array('default' => $case['DataInProgress']['PleaGuilty1324'], 'label' => 'Counts Pled Guilty', 'type' => 'text')); ?>
<?php echo $this->Form->input('TrialGuilty1324', 	array('default' => $case['DataInProgress']['TrialGuilty1324'], 'label' => 'Counts Found Guilty At Trial', 'type' => 'text')); ?>
<?php echo $this->Form->input('TrialNG1324', 		array('default' => $case['DataInProgress']['TrialNG1324'], 'label' => 'Counts Found Not Guilty At Trial', 'type' => 'text')); ?>
<?php echo $this->Form->input('Fines1324', 			array('default' => $case['DataInProgress']['Fines1324'], 'label' => 'Fines Levied', 'type' => 'text')); ?>
<?php echo $this->Form->input('Sent1324', 			array('default' => $case['DataInProgress']['Sent1324'], 'label' => 'Number of Months Sentenced Under Statute', 'type' => 'text')); ?>
<?php echo $this->Form->input('Prob1324', 			array('default' => $case['DataInProgress']['Prob1324'], 'label' => 'Number of Months Under Probation Under Statute', 'type' => 'text')); ?>

<?php echo $this->Form->input('S1328', 				array('default' => $case['DataInProgress']['S1328'], 'label' => 'Statute 1328', 'type' => 'checkbox')); ?>
<?php echo $this->Form->input('Counts1328', 		array('default' => $case['DataInProgress']['Counts1328'], 'label' => 'Counts', 'type' => 'text')); ?>
<?php echo $this->Form->input('CountsNP1328', 		array('default' => $case['DataInProgress']['CountsNP1328'], 'label' => 'Counts Nolle Prossed', 'type' => 'text')); ?>
<?php echo $this->Form->input('PleaDismissed1328', 	array('default' => $case['DataInProgress']['PleaDismissed1328'], 'label' => 'Counts Dismissed', 'type' => 'text')); ?>
<?php echo $this->Form->input('PleaGuilty1328', 	array('default' => $case['DataInProgress']['PleaGuilty1328'], 'label' => 'Counts Pled Guilty', 'type' => 'text')); ?>
<?php echo $this->Form->input('TrialGuilty1328', 	array('default' => $case['DataInProgress']['TrialGuilty1328'], 'label' => 'Counts Found Guilty At Trial', 'type' => 'text')); ?>
<?php echo $this->Form->input('TrialNG1328', 		array('default' => $case['DataInProgress']['TrialNG1328'], 'label' => 'Counts Found Not Guilty At Trial', 'type' => 'text')); ?>
<?php echo $this->Form->input('Fines1328', 			array('default' => $case['DataInProgress']['Fines1328'], 'label' => 'Fines Levied', 'type' => 'text')); ?>
<?php echo $this->Form->input('Sent1328', 			array('default' => $case['DataInProgress']['Sent1328'], 'label' => 'Number of Months Sentenced Under Statute', 'type' => 'text')); ?>
<?php echo $this->Form->input('Prob1328', 			array('default' => $case['DataInProgress']['Prob1328'], 'label' => 'Number of Months Under Probation Under Statute', 'type' => 'text')); ?>

<?php echo $this->Form->submit('Submit', array('confirm' => 'Submit this case for review?')); ?>
<?php echo $this->Form->end(); ?>
</div>
				<div class="col-md-12 search_disclaim" style="margin-top:0px; padding-top:10px; border-top:1px solid #DCDCDC">
					<p><strong>*Note: </strong>All fields are required</p>
				</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	var caseInfoFS = $('#caseInfoFS');
	var caseSum = $('#caseSumFS');
		$('#caseSumFS_Title').hide();
        $('#1961_title').hide();

	function goToCaseSum() {    	
		caseInfoFS.hide('slow');
		$('#caseInfoFS_Title').hide('slow');
		
		$('#1961_title').show('slow');
        $('#to1961').show('slow');
	}

	function goToCaseInfo() {    	
		caseSum.hide('slow');
		$('#caseSumFS_Title').hide('slow');
		caseInfoFS.fadeIn('slow');
		$('#caseInfoFS_Title').show('slow');
	}

	//-----STATUTES PAGE SLIDER STARTS HERE-----//

	      //-----SHOW/HIDE FROM 1961-----//
      function goto1028() {      
            // Hide Current Fieldset //
            $('#1961_title').hide('slow');
            $('#to1961').hide('slow');

            // Show New Fieldset //
            $('#1028_title').show('slow');
            $('#to1028').show('slow');
      }
      //-----SHOW/HIDE FROM 1028-----//
      function goto1961() { //Previous Button From Statute 1028    
            // Hide Current Fieldset //
            $('#1028_title').hide('slow');
            $('#to1028').hide('slow');

            // Show New Fieldset //
            $('#1961_title').show('slow');
            $('#to1961').show('slow');
      }
      function goto1351() { //Next Button From Statute 1028
            // Hide Current Fieldset //
            $('#1028_title').hide('slow');
            $('#to1028').hide('slow');

            // Show New Fieldset //
            $('#1351_title').show('slow');
            $('#to1351').show('slow');
      }
      //-----SHOW/HIDE FROM 1351-----//
      function goto1028_() { //Previous Button From Statute 1028   
            // Hide Current Fieldset //
            $('#1351_title').hide('slow');
            $('#to1351').hide('slow');

            // Show New Fieldset //
            $('#1028_title').show('slow');
            $('#to1028').show('slow');
      }
      function goto1425() { //Next Button From Statute 1028
            // Hide Current Fieldset //
            $('#1351_title').hide('slow');
            $('#to1351').hide('slow');

            // Show New Fieldset //
            $('#1425_title').show('slow');
            $('#to1425').show('slow');
      }

	//-----STATUTES PAGE SLIDER ENDS HERE-----//
</script>