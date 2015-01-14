<div class="bails form">
<?php echo $this->Form->create('Bail'); ?>
	<fieldset>
		<legend><?php echo __('Add Bail'); ?></legend>
	<?php
		echo $this->Form->input('Type');
		echo $this->Form->input('Amount');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Bails'), array('action' => 'index')); ?></li>
	</ul>
</div>
