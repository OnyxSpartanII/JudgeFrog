<?php

	/*
	*	Page: Charge Information
	*/
	$this->layout = 'admin_panel_create_msf_layout';

?>

<?php echo $this->Form->create('CaseSession'); ?>

<?php //add defendant name, number, case name ?>
<?php echo $this->Form->input('S1961to1968', array('label' => 'Statute 1961-1968', 'type' => 'checkbox')); ?>
<?php echo $this->Form->input('Counts1961to1968', array('label' => 'Counts')); ?>
<?php echo $this->Form->input('CountsNP1961to1968', array('label' => 'Counts Nolle Prossed')); ?>
<?php echo $this->Form->input('PleaDismissed1961to1968', array('label' => 'Counts Dismissed')); ?>
<?php echo $this->Form->input('PleaGuilty1961to1968', array('label' => 'Counts Pled Guilty')); ?>
<?php echo $this->Form->input('TrialGuilty1961to1968', array('label' => 'Counts Found Guilty At Trial')); ?>
<?php echo $this->Form->input('TrialNG1961to1968', array('label' => 'Counts Found Not Guilty At Trial')); ?>
<?php echo $this->Form->input('Fines1961to1968', array('label' => 'Fines Levied')); ?>
<?php echo $this->Form->input('Sent1961to1968', array('label' => 'Number of Months Sentenced Under Statute')); ?>
<?php echo $this->Form->input('Prob1961to1968', array('label' => 'Number of Months Under Probation Under Statute')); ?>

<?php echo $this->Form->input('S1028', array('label' => 'Statute 1028', 'type' => 'checkbox')); ?>
<?php echo $this->Form->input('Counts1028', array('label' => 'Counts')); ?>
<?php echo $this->Form->input('CountsNP1028', array('label' => 'Counts Nolle Prossed')); ?>
<?php echo $this->Form->input('PleaDismissed1028', array('label' => 'Counts Dismissed')); ?>
<?php echo $this->Form->input('PleaGuilty1028', array('label' => 'Counts Pled Guilty')); ?>
<?php echo $this->Form->input('TrialGuilty1028', array('label' => 'Counts Found Guilty At Trial')); ?>
<?php echo $this->Form->input('TrialNG1028', array('label' => 'Counts Found Not Guilty At Trial')); ?>
<?php echo $this->Form->input('Fines1028', array('label' => 'Fines Levied')); ?>
<?php echo $this->Form->input('Sent1028', array('label' => 'Number of Months Sentenced Under Statute')); ?>
<?php echo $this->Form->input('Prob1028', array('label' => 'Number of Months Under Probation Under Statute')); ?>

<?php echo $this->Form->input('S1351', array('label' => 'Statute 1351', 'type' => 'checkbox')); ?>
<?php echo $this->Form->input('Counts1351', array('label' => 'Counts')); ?>
<?php echo $this->Form->input('CountsNP1351', array('label' => 'Counts Nolle Prossed')); ?>
<?php echo $this->Form->input('PleaDismissed1351', array('label' => 'Counts Dismissed')); ?>
<?php echo $this->Form->input('PleaGuilty1351', array('label' => 'Counts Pled Guilty')); ?>
<?php echo $this->Form->input('TrialGuilty1351', array('label' => 'Counts Found Guilty At Trial')); ?>
<?php echo $this->Form->input('TrialNG1351', array('label' => 'Counts Found Not Guilty At Trial')); ?>
<?php echo $this->Form->input('Fines1351', array('label' => 'Fines Levied')); ?>
<?php echo $this->Form->input('Sent1351', array('label' => 'Number of Months Sentenced Under Statute')); ?>
<?php echo $this->Form->input('Prob1351', array('label' => 'Number of Months Under Probation Under Statute')); ?>

<?php echo $this->Form->input('S1425', array('label' => 'Statute 1425', 'type' => 'checkbox')); ?>
<?php echo $this->Form->input('Counts1425', array('label' => 'Counts')); ?>
<?php echo $this->Form->input('CountsNP1425', array('label' => 'Counts Nolle Prossed')); ?>
<?php echo $this->Form->input('PleaDismissed1425', array('label' => 'Counts Dismissed')); ?>
<?php echo $this->Form->input('PleaGuilty1425', array('label' => 'Counts Pled Guilty')); ?>
<?php echo $this->Form->input('TrialGuilty1425', array('label' => 'Counts Found Guilty At Trial')); ?>
<?php echo $this->Form->input('TrialNG1425', array('label' => 'Counts Found Not Guilty At Trial')); ?>
<?php echo $this->Form->input('Fines1425', array('label' => 'Fines Levied')); ?>
<?php echo $this->Form->input('Sent1425', array('label' => 'Number of Months Sentenced Under Statute')); ?>
<?php echo $this->Form->input('Prob1425', array('label' => 'Number of Months Under Probation Under Statute')); ?>

<?php echo $this->Form->input('S1426', array('label' => 'Statute 1426', 'type' => 'checkbox')); ?>
<?php echo $this->Form->input('Counts1426', array('label' => 'Counts')); ?>
<?php echo $this->Form->input('CountsNP1426', array('label' => 'Counts Nolle Prossed')); ?>
<?php echo $this->Form->input('PleaDismissed1426', array('label' => 'Counts Dismissed')); ?>
<?php echo $this->Form->input('PleaGuilty1426', array('label' => 'Counts Pled Guilty')); ?>
<?php echo $this->Form->input('TrialGuilty1426', array('label' => 'Counts Found Guilty At Trial')); ?>
<?php echo $this->Form->input('TrialNG1426', array('label' => 'Counts Found Not Guilty At Trial')); ?>
<?php echo $this->Form->input('Fines1426', array('label' => 'Fines Levied')); ?>
<?php echo $this->Form->input('Sent1426', array('label' => 'Number of Months Sentenced Under Statute')); ?>
<?php echo $this->Form->input('Prob1426', array('label' => 'Number of Months Under Probation Under Statute')); ?>

<?php echo $this->Form->input('S1461to1465', array('label' => 'Statute 1461to1465', 'type' => 'checkbox')); ?>
<?php echo $this->Form->input('Counts1461to1465', array('label' => 'Counts')); ?>
<?php echo $this->Form->input('CountsNP1461to1465', array('label' => 'Counts Nolle Prossed')); ?>
<?php echo $this->Form->input('PleaDismissed1461to1465' , array('label' => 'Counts Dismissed')); ?>
<?php echo $this->Form->input('PleaGuilty1461to1465', array('label' => 'Counts Pled Guilty')); ?>
<?php echo $this->Form->input('TrialGuilty1461to1465', array('label' => 'Counts Found Guilty At Trial')); ?>
<?php echo $this->Form->input('TrialNG1461to1465', array('label' => 'Counts Found Not Guilty At Trial')); ?>
<?php echo $this->Form->input('Fines1461to1465', array('label' => 'Fines Levied')); ?>
<?php echo $this->Form->input('Sent1461to1465', array('label' => 'Number of Months Sentenced Under Statute')); ?>
<?php echo $this->Form->input('Prob1461to1465', array('label' => 'Number of Months Under Probation Under Statute')); ?>

<?php echo $this->Form->input('S1512', array('label' => 'Statute 1512', 'type' => 'checkbox')); ?>
<?php echo $this->Form->input('Counts1512', array('label' => 'Counts')); ?>
<?php echo $this->Form->input('CountsNP1512', array('label' => 'Counts Nolle Prossed')); ?>
<?php echo $this->Form->input('PleaDismissed1512', array('label' => 'Counts Dismissed')); ?>
<?php echo $this->Form->input('PleaGuilty1512', array('label' => 'Counts Pled Guilty')); ?>
<?php echo $this->Form->input('TrialGuilty1512', array('label' => 'Counts Found Guilty At Trial')); ?>
<?php echo $this->Form->input('TrialNG1512', array('label' => 'Counts Found Not Guilty At Trial')); ?>
<?php echo $this->Form->input('Fines1512', array('label' => 'Fines Levied')); ?>
<?php echo $this->Form->input('Sent1512', array('label' => 'Number of Months Sentenced Under Statute')); ?>
<?php echo $this->Form->input('Prob1512', array('label' => 'Number of Months Under Probation Under Statute')); ?>

<?php echo $this->Form->input('S1542to1543', array('label' => 'Statute 1542to1543', 'type' => 'checkbox')); ?>
<?php echo $this->Form->input('Counts1542to1543', array('label' => 'Counts')); ?>
<?php echo $this->Form->input('CountsNP1542to1543', array('label' => 'Counts Nolle Prossed')); ?>
<?php echo $this->Form->input('PleaDismissed1542to1543', array('label' => 'Counts Dismissed')); ?>
<?php echo $this->Form->input('PleaGuilty1542to1543', array('label' => 'Counts Pled Guilty')); ?>
<?php echo $this->Form->input('TrialGuilty1542to1543', array('label' => 'Counts Found Guilty At Trial')); ?>
<?php echo $this->Form->input('TrialNG1542to1543', array('label' => 'Counts Found Not Guilty At Trial')); ?>
<?php echo $this->Form->input('Fines1542to1543', array('label' => 'Fines Levied')); ?>
<?php echo $this->Form->input('Sent1542to1543', array('label' => 'Number of Months Sentenced Under Statute')); ?>
<?php echo $this->Form->input('Prob1542to1543', array('label' => 'Number of Months Under Probation Under Statute')); ?>

<?php echo $this->Form->input('S1546', array('label' => 'Statute 1546', 'type' => 'checkbox')); ?>
<?php echo $this->Form->input('Counts1546', array('label' => 'Counts')); ?>
<?php echo $this->Form->input('CountsNP1546', array('label' => 'Counts Nolle Prossed')); ?>
<?php echo $this->Form->input('PleaDismissed1546', array('label' => 'Counts Dismissed')); ?>
<?php echo $this->Form->input('PleaGuilty1546', array('label' => 'Counts Pled Guilty')); ?>
<?php echo $this->Form->input('TrialGuilty1546', array('label' => 'Counts Found Guilty At Trial')); ?>
<?php echo $this->Form->input('TrialNG1546', array('label' => 'Counts Found Not Guilty At Trial')); ?>
<?php echo $this->Form->input('Fines1546', array('label' => 'Fines Levied')); ?>
<?php echo $this->Form->input('Sent1546', array('label' => 'Number of Months Sentenced Under Statute')); ?>
<?php echo $this->Form->input('Prob1546', array('label' => 'Number of Months Under Probation Under Statute')); ?>

<?php echo $this->Form->input('S1581to1588', array('label' => 'Statute 1581to1588', 'type' => 'checkbox')); ?>
<?php echo $this->Form->input('Counts1581to1588', array('label' => 'Counts')); ?>
<?php echo $this->Form->input('CountsNP1581to1588', array('label' => 'Counts Nolle Prossed')); ?>
<?php echo $this->Form->input('PleaDismissed1581to1588', array('label' => 'Counts Dismissed')); ?>
<?php echo $this->Form->input('PleaGuilty1581to1588', array('label' => 'Counts Pled Guilty')); ?>
<?php echo $this->Form->input('TrialGuilty1581to1588', array('label' => 'Counts Found Guilty At Trial')); ?>
<?php echo $this->Form->input('TrialNG1581to1588', array('label' => 'Counts Found Not Guilty At Trial')); ?>
<?php echo $this->Form->input('Fines1581to1588', array('label' => 'Fines Levied')); ?>
<?php echo $this->Form->input('Sent1581to1588', array('label' => 'Number of Months Sentenced Under Statute')); ?>
<?php echo $this->Form->input('Prob1581to1588', array('label' => 'Number of Months Under Probation Under Statute')); ?>

<?php echo $this->Form->input('S1589', array('label' => 'Statute 1589', 'type' => 'checkbox')); ?>
<?php echo $this->Form->input('Counts1589', array('label' => 'Counts')); ?>
<?php echo $this->Form->input('CountsNP1589', array('label' => 'Counts Nolle Prossed')); ?>
<?php echo $this->Form->input('PleaDismissed1589', array('label' => 'Counts Dismissed')); ?>
<?php echo $this->Form->input('PleaGuilty1589', array('label' => 'Counts Pled Guilty')); ?>
<?php echo $this->Form->input('TrialGuilty1589', array('label' => 'Counts Found Guilty At Trial')); ?>
<?php echo $this->Form->input('TrialNG1589', array('label' => 'Counts Found Not Guilty At Trial')); ?>
<?php echo $this->Form->input('Fines1589', array('label' => 'Fines Levied')); ?>
<?php echo $this->Form->input('Sent1589', array('label' => 'Number of Months Sentenced Under Statute')); ?>
<?php echo $this->Form->input('Prob1589', array('label' => 'Number of Months Under Probation Under Statute')); ?>

<?php echo $this->Form->input('S1590', array('label' => 'Statute 1590', 'type' => 'checkbox')); ?>
<?php echo $this->Form->input('Counts1590', array('label' => 'Counts')); ?>
<?php echo $this->Form->input('CountsNP1590', array('label' => 'Counts Nolle Prossed')); ?>
<?php echo $this->Form->input('PleaDismissed1590', array('label' => 'Counts Dismissed')); ?>
<?php echo $this->Form->input('PleaGuilty1590', array('label' => 'Counts Pled Guilty')); ?>
<?php echo $this->Form->input('TrialGuilty1590', array('label' => 'Counts Found Guilty At Trial')); ?>
<?php echo $this->Form->input('TrialNG1590', array('label' => 'Counts Found Not Guilty At Trial')); ?>
<?php echo $this->Form->input('Fines1590', array('label' => 'Fines Levied')); ?>
<?php echo $this->Form->input('Sent1590', array('label' => 'Number of Months Sentenced Under Statute')); ?>
<?php echo $this->Form->input('Prob1590', array('label' => 'Number of Months Under Probation Under Statute')); ?>

<?php echo $this->Form->input('S1589', array('label' => 'Statute 1589', 'type' => 'checkbox')); ?>
<?php echo $this->Form->input('Counts1589', array('label' => 'Counts')); ?>
<?php echo $this->Form->input('CountsNP1589', array('label' => 'Counts Nolle Prossed')); ?>
<?php echo $this->Form->input('PleaDismissed1589', array('label' => 'Counts Dismissed')); ?>
<?php echo $this->Form->input('PleaGuilty1589', array('label' => 'Counts Pled Guilty')); ?>
<?php echo $this->Form->input('TrialGuilty1589', array('label' => 'Counts Found Guilty At Trial')); ?>
<?php echo $this->Form->input('TrialNG1589', array('label' => 'Counts Found Not Guilty At Trial')); ?>
<?php echo $this->Form->input('Fines1589', array('label' => 'Fines Levied')); ?>
<?php echo $this->Form->input('Sent1589', array('label' => 'Number of Months Sentenced Under Statute')); ?>
<?php echo $this->Form->input('Prob1589', array('label' => 'Number of Months Under Probation Under Statute')); ?>

<?php echo $this->Form->input('S1590', array('label' => 'Statute 1590', 'type' => 'checkbox')); ?>
<?php echo $this->Form->input('Counts1590', array('label' => 'Counts')); ?>
<?php echo $this->Form->input('CountsNP1590', array('label' => 'Counts Nolle Prossed')); ?>
<?php echo $this->Form->input('PleaDismissed1590', array('label' => 'Counts Dismissed')); ?>
<?php echo $this->Form->input('PleaGuilty1590', array('label' => 'Counts Pled Guilty')); ?>
<?php echo $this->Form->input('TrialGuilty1590', array('label' => 'Counts Found Guilty At Trial')); ?>
<?php echo $this->Form->input('TrialNG1590', array('label' => 'Counts Found Not Guilty At Trial')); ?>
<?php echo $this->Form->input('Fines1590', array('label' => 'Fines Levied')); ?>
<?php echo $this->Form->input('Sent1590', array('label' => 'Number of Months Sentenced Under Statute')); ?>
<?php echo $this->Form->input('Prob1590', array('label' => 'Number of Months Under Probation Under Statute')); ?>

<?php echo $this->Form->input('S1591', array('label' => 'Statute 1591', 'type' => 'checkbox')); ?>
<?php echo $this->Form->input('Counts1591', array('label' => 'Counts')); ?>
<?php echo $this->Form->input('CountsNP1591', array('label' => 'Counts Nolle Prossed')); ?>
<?php echo $this->Form->input('PleaDismissed1591', array('label' => 'Counts Dismissed')); ?>
<?php echo $this->Form->input('PleaGuilty1591', array('label' => 'Counts Pled Guilty')); ?>
<?php echo $this->Form->input('TrialGuilty1591', array('label' => 'Counts Found Guilty At Trial')); ?>
<?php echo $this->Form->input('TrialNG1591', array('label' => 'Counts Found Not Guilty At Trial')); ?>
<?php echo $this->Form->input('Fines1591', array('label' => 'Fines Levied')); ?>
<?php echo $this->Form->input('Sent1591', array('label' => 'Number of Months Sentenced Under Statute')); ?>
<?php echo $this->Form->input('Prob1591', array('label' => 'Number of Months Under Probation Under Statute')); ?>

<?php echo $this->Form->input('S1592', array('label' => 'Statute 1592', 'type' => 'checkbox')); ?>
<?php echo $this->Form->input('Counts1592', array('label' => 'Counts')); ?>
<?php echo $this->Form->input('CountsNP1592', array('label' => 'Counts Nolle Prossed')); ?>
<?php echo $this->Form->input('PleaDismissed1592', array('label' => 'Counts Dismissed')); ?>
<?php echo $this->Form->input('PleaGuilty1592', array('label' => 'Counts Pled Guilty')); ?>
<?php echo $this->Form->input('TrialGuilty1592', array('label' => 'Counts Found Guilty At Trial')); ?>
<?php echo $this->Form->input('TrialNG1592', array('label' => 'Counts Found Not Guilty At Trial')); ?>
<?php echo $this->Form->input('Fines1592', array('label' => 'Fines Levied')); ?>
<?php echo $this->Form->input('Sent1592', array('label' => 'Number of Months Sentenced Under Statute')); ?>
<?php echo $this->Form->input('Prob1592', array('label' => 'Number of Months Under Probation Under Statute')); ?>

<?php echo $this->Form->input('S2251', array('label' => 'Statute 2251', 'type' => 'checkbox')); ?>
<?php echo $this->Form->input('Counts2251', array('label' => 'Counts')); ?>
<?php echo $this->Form->input('CountsNP2251', array('label' => 'Counts Nolle Prossed')); ?>
<?php echo $this->Form->input('PleaDismissed2251', array('label' => 'Counts Dismissed')); ?>
<?php echo $this->Form->input('PleaGuilty2251', array('label' => 'Counts Pled Guilty')); ?>
<?php echo $this->Form->input('TrialGuilty2251', array('label' => 'Counts Found Guilty At Trial')); ?>
<?php echo $this->Form->input('TrialNG2251', array('label' => 'Counts Found Not Guilty At Trial')); ?>
<?php echo $this->Form->input('Fines2251', array('label' => 'Fines Levied')); ?>
<?php echo $this->Form->input('Sent2251', array('label' => 'Number of Months Sentenced Under Statute')); ?>
<?php echo $this->Form->input('Prob2251', array('label' => 'Number of Months Under Probation Under Statute')); ?>

<?php echo $this->Form->input('S2252', array('label' => 'Statute 2252', 'type' => 'checkbox')); ?>
<?php echo $this->Form->input('Counts2252', array('label' => 'Counts')); ?>
<?php echo $this->Form->input('CountsNP2252', array('label' => 'Counts Nolle Prossed')); ?>
<?php echo $this->Form->input('PleaDismissed2252', array('label' => 'Counts Dismissed')); ?>
<?php echo $this->Form->input('PleaGuilty2252', array('label' => 'Counts Pled Guilty')); ?>
<?php echo $this->Form->input('TrialGuilty2252', array('label' => 'Counts Found Guilty At Trial')); ?>
<?php echo $this->Form->input('TrialNG2252', array('label' => 'Counts Found Not Guilty At Trial')); ?>
<?php echo $this->Form->input('Fines2252', array('label' => 'Fines Levied')); ?>
<?php echo $this->Form->input('Sent2252', array('label' => 'Number of Months Sentenced Under Statute')); ?>
<?php echo $this->Form->input('Prob2252', array('label' => 'Number of Months Under Probation Under Statute')); ?>

<?php echo $this->Form->input('S2260', array('label' => 'Statute 2260', 'type' => 'checkbox')); ?>
<?php echo $this->Form->input('Counts2260', array('label' => 'Counts')); ?>
<?php echo $this->Form->input('CountsNP2260', array('label' => 'Counts Nolle Prossed')); ?>
<?php echo $this->Form->input('PleaDismissed2260', array('label' => 'Counts Dismissed')); ?>
<?php echo $this->Form->input('PleaGuilty2260', array('label' => 'Counts Pled Guilty')); ?>
<?php echo $this->Form->input('TrialGuilty2260', array('label' => 'Counts Found Guilty At Trial')); ?>
<?php echo $this->Form->input('TrialNG2260', array('label' => 'Counts Found Not Guilty At Trial')); ?>
<?php echo $this->Form->input('Fines2260', array('label' => 'Fines Levied')); ?>
<?php echo $this->Form->input('Sent2260', array('label' => 'Number of Months Sentenced Under Statute')); ?>
<?php echo $this->Form->input('Prob2260', array('label' => 'Number of Months Under Probation Under Statute')); ?>

<?php echo $this->Form->input('S2421to2424', array('label' => 'Statute 2421to2424', 'type' => 'checkbox')); ?>
<?php echo $this->Form->input('Counts2421to2424', array('label' => 'Counts')); ?>
<?php echo $this->Form->input('CountsNP2421to2424', array('label' => 'Counts Nolle Prossed')); ?>
<?php echo $this->Form->input('PleaDismissed2421to2424', array('label' => 'Counts Dismissed')); ?>
<?php echo $this->Form->input('PleaGuilty2421to2424', array('label' => 'Counts Pled Guilty')); ?>
<?php echo $this->Form->input('TrialGuilty2421to2424', array('label' => 'Counts Found Guilty At Trial')); ?>
<?php echo $this->Form->input('TrialNG2421to2424', array('label' => 'Counts Found Not Guilty At Trial')); ?>
<?php echo $this->Form->input('Fines2421to2424', array('label' => 'Fines Levied')); ?>
<?php echo $this->Form->input('Sent2421to2424', array('label' => 'Number of Months Sentenced Under Statute')); ?>
<?php echo $this->Form->input('Prob2421to2424', array('label' => 'Number of Months Under Probation Under Statute')); ?>

<?php echo $this->Form->input('S1324', array('label' => 'Statute 1324', 'type' => 'checkbox')); ?>
<?php echo $this->Form->input('Counts1324', array('label' => 'Counts')); ?>
<?php echo $this->Form->input('CountsNP1324', array('label' => 'Counts Nolle Prossed')); ?>
<?php echo $this->Form->input('PleaDismissed1324', array('label' => 'Counts Dismissed')); ?>
<?php echo $this->Form->input('PleaGuilty1324', array('label' => 'Counts Pled Guilty')); ?>
<?php echo $this->Form->input('TrialGuilty1324', array('label' => 'Counts Found Guilty At Trial')); ?>
<?php echo $this->Form->input('TrialNG1324', array('label' => 'Counts Found Not Guilty At Trial')); ?>
<?php echo $this->Form->input('Fines1324', array('label' => 'Fines Levied')); ?>
<?php echo $this->Form->input('Sent1324', array('label' => 'Number of Months Sentenced Under Statute')); ?>
<?php echo $this->Form->input('Prob1324', array('label' => 'Number of Months Under Probation Under Statute')); ?>

<?php echo $this->Form->input('S1328', array('label' => 'Statute 1328', 'type' => 'checkbox')); ?>
<?php echo $this->Form->input('Counts1328', array('label' => 'Counts')); ?>
<?php echo $this->Form->input('CountsNP1328', array('label' => 'Counts Nolle Prossed')); ?>
<?php echo $this->Form->input('PleaDismissed1328', array('label' => 'Counts Dismissed')); ?>
<?php echo $this->Form->input('PleaGuilty1328', array('label' => 'Counts Pled Guilty')); ?>
<?php echo $this->Form->input('TrialGuilty1328', array('label' => 'Counts Found Guilty At Trial')); ?>
<?php echo $this->Form->input('TrialNG1328', array('label' => 'Counts Found Not Guilty At Trial')); ?>
<?php echo $this->Form->input('Fines1328', array('label' => 'Fines Levied')); ?>
<?php echo $this->Form->input('Sent1328', array('label' => 'Number of Months Sentenced Under Statute')); ?>
<?php echo $this->Form->input('Prob1328', array('label' => 'Number of Months Under Probation Under Statute')); ?>

<?php echo $this->Form->end('Next'); ?>