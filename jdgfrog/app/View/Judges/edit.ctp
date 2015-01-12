<div class="judges form">
<?php echo $this->Form->create('Judge'); ?>
	<fieldset>
		<legend><?php echo __('Edit Judge'); ?></legend>
	<?php
		echo $this->Form->input('JudgeId');
		echo $this->Form->input('Name');
		echo $this->Form->input('Race');
		echo $this->Form->input('Gender');
		echo $this->Form->input('Tenure');
		echo $this->Form->input('AppointedBy');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Judge.JudgeId')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Judge.JudgeId'))); ?></li>
		<li><?php echo $this->Html->link(__('List Judges'), array('action' => 'index')); ?></li>
	</ul>
</div>
