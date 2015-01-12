<div class="arrestchargedetails form">
<?php echo $this->Form->create('Arrestchargedetail'); ?>
	<fieldset>
		<legend><?php echo __('Edit Arrestchargedetail'); ?></legend>
	<?php
		echo $this->Form->input('ACDId');
		echo $this->Form->input('ChargeDate');
		echo $this->Form->input('ArrestDate');
		echo $this->Form->input('Detained');
		echo $this->Form->input('Role');
		echo $this->Form->input('LaborTraf');
		echo $this->Form->input('AdultSexTraf');
		echo $this->Form->input('MinorSexTraf');
		echo $this->Form->input('Fel_C');
		echo $this->Form->input('Fel_S');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Arrestchargedetail.ACDId')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Arrestchargedetail.ACDId'))); ?></li>
		<li><?php echo $this->Html->link(__('List Arrestchargedetails'), array('action' => 'index')); ?></li>
	</ul>
</div>
