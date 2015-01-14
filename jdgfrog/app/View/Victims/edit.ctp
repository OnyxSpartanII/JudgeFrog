<div class="victims form">
<?php echo $this->Form->create('Victim'); ?>
	<fieldset>
		<legend><?php echo __('Edit Victim'); ?></legend>
	<?php
		echo $this->Form->input('VictimsId');
		echo $this->Form->input('Total');
		echo $this->Form->input('Minor');
		echo $this->Form->input('Foreigner');
		echo $this->Form->input('Female');
		echo $this->Form->input('cases_CaseId');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Victim.VictimsId')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Victim.VictimsId'))); ?></li>
		<li><?php echo $this->Html->link(__('List Victims'), array('action' => 'index')); ?></li>
	</ul>
</div>
