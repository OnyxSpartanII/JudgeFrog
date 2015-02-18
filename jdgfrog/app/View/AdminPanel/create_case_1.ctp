<?php

	$this->layout = 'admin_panel_create_msf_layout';

?>



<?php 	echo $this->Form->create('CaseSession', array('type' => 'post', 'controller' => 'AdminPanel', 'action' => 'saveStep')); ?>

<?php 	echo $this->Form->input('CaseName', array('placeholder' => 'Case Name', 'type' => 'text')); ?>

<?php 	echo $this->Form->input('CaseNum', array('name'=> 'caseNumber','placeholder' => 'Case Number', 'type' => 'text')); ?>

<?php 	echo $this->Form->input('NumDef', array('name'=> 'caseNumDef','placeholder' => 'Number of Defendants', 'type' => 'text')); ?>

<?php 	echo $this->Form->input('JudgeName', array('name'=> 'judge','placeholder' => 'Judge', 'type' => 'text')); ?>

<?php 	echo $this->Form->input('FedDistrict', array('name'=> 'fedDistrict','placeholder' => 'Federal District', 'type' => 'text')); ?>

<?php 	echo $this->Form->input('State', array('placeholder' => 'e.g, TX')); ?>

<?php 	echo $this->Form->input('CaseSummary'); ?>

<?php 	echo $this->Form->end('Next'); ?>