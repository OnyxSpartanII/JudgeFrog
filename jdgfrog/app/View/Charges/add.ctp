<div class="charges form">
<?php echo $this->Form->create('Charge'); ?>
	<fieldset>
		<legend><?php echo __('Add Charge'); ?></legend>
	<?php
		echo $this->Form->input('Counts');
		echo $this->Form->input('CountsNolleProssed');
		echo $this->Form->input('Statute');
		echo $this->Form->input('PleaDismissed');
		echo $this->Form->input('PleaGuilty');
		echo $this->Form->input('TrialGuilty');
		echo $this->Form->input('TrialNotGuilty');
		echo $this->Form->input('Fines');
		echo $this->Form->input('Sentence');
		echo $this->Form->input('Probation');
		echo $this->Form->input('ACDId');
		echo $this->Form->input('ACD_CHD_CaseId');
		echo $this->Form->input('ACD_CHD_DefendantId');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Charges'), array('action' => 'index')); ?></li>
	</ul>
</div>
