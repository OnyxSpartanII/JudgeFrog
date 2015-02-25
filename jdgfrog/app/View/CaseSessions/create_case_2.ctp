<?php

	$this->layout = 'admin_panel_create_msf_layout';

?>

<?php echo $this->Form->create('CaseSession'); ?>

<?php 	echo $this->Form->end('Next'); ?>

<?php 	echo print_r($this->params); ?>