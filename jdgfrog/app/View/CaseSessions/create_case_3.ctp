<?php

	/*
	*	Page: Defendant Information
	*/
	$this->layout = 'admin_panel_layout';

?>

<?php echo $this->Form->create('CaseSession'); ?>
<?php echo $this->Form->input('DefLast', array('label' => 'Defendant Lastname')); ?>
<?php echo $this->Form->input('DefFirst', array('label' => 'Defendant Firstname')); ?>
<?php echo $this->Form->input('DefGender', array('label' => 'Defendant Gender')); ?>
<?php echo $this->Form->input('DefRace', array('label' => 'Defendant Race')); ?>
<?php echo $this->Form->input('DefBirthdate', array('label' => 'Defendant Birthdate')); ?>
<?php echo $this->Form->input('Alias', array('label' => 'Aliases', 'placeholder' => 'Enter defendant aliases separated by commas.')); ?>
<?php echo $this->Form->end('Next'); ?>

<?php echo print_r($this->params); ?>