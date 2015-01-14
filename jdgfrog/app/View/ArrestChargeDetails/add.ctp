<div class="arrestChargeDetails form">
<?php echo $this->Form->create('ArrestChargeDetail'); ?>
	<fieldset>
		<legend><?php echo __('Add Arrest Charge Detail'); ?></legend>
	<?php
		echo $this->Form->input('ChargeDate');
		echo $this->Form->input('ArrestDate');
		echo $this->Form->input('Detained');
		echo $this->Form->input('Role');
		echo $this->Form->input('LaborTraf');
		echo $this->Form->input('AdultSexTraf');
		echo $this->Form->input('MinorSexTraf');
		echo $this->Form->input('Fel_C');
		echo $this->Form->input('Fel_S');
		echo $this->Form->input('bails_BailId');
		echo $this->Form->input('defendants_DefendantId');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Arrest Charge Details'), array('action' => 'index')); ?></li>
	</ul>
</div>
