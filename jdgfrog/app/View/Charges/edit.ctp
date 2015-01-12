<div class="charges form">
<?php echo $this->Form->create('Charge'); ?>
	<fieldset>
		<legend><?php echo __('Edit Charge'); ?></legend>
	<?php
		echo $this->Form->input('ChargeId');
		echo $this->Form->input('ArrestChargeDetails_Id');
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
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Charge.ChargeId')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Charge.ChargeId'))); ?></li>
		<li><?php echo $this->Html->link(__('List Charges'), array('action' => 'index')); ?></li>
	</ul>
</div>
