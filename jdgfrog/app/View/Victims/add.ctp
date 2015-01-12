<div class="victims form">
<?php echo $this->Form->create('Victim'); ?>
	<fieldset>
		<legend><?php echo __('Add Victim'); ?></legend>
	<?php
		echo $this->Form->input('Total');
		echo $this->Form->input('Minor');
		echo $this->Form->input('Foreigner');
		echo $this->Form->input('Female');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Victims'), array('action' => 'index')); ?></li>
	</ul>
</div>
