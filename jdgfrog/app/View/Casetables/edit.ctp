<div class="casetables form">
<?php echo $this->Form->create('Casetable'); ?>
	<fieldset>
		<legend><?php echo __('Edit Casetable'); ?></legend>
	<?php
		echo $this->Form->input('CaseId');
		echo $this->Form->input('Name');
		echo $this->Form->input('Number');
		echo $this->Form->input('Status');
		echo $this->Form->input('Num_Defendants');
		echo $this->Form->input('State');
		echo $this->Form->input('FederalDistrict');
		echo $this->Form->input('VictimsId');
		echo $this->Form->input('JudgeId');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Casetable.CaseId')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Casetable.CaseId'))); ?></li>
		<li><?php echo $this->Html->link(__('List Casetables'), array('action' => 'index')); ?></li>
	</ul>
</div>
