<div class="bails form">
<?php echo $this->Form->create('Bail'); ?>
	<fieldset>
		<legend><?php echo __('Edit Bail'); ?></legend>
	<?php
		echo $this->Form->input('BailId');
		echo $this->Form->input('Type');
		echo $this->Form->input('Amount');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Bail.BailId')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Bail.BailId'))); ?></li>
		<li><?php echo $this->Html->link(__('List Bails'), array('action' => 'index')); ?></li>
	</ul>
</div>
