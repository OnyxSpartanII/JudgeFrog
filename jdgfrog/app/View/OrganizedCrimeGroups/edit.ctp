<div class="organizedCrimeGroups form">
<?php echo $this->Form->create('OrganizedCrimeGroup'); ?>
	<fieldset>
		<legend><?php echo __('Edit Organized Crime Group'); ?></legend>
	<?php
		echo $this->Form->input('OCGId');
		echo $this->Form->input('Name');
		echo $this->Form->input('Size');
		echo $this->Form->input('Scope');
		echo $this->Form->input('Race');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('OrganizedCrimeGroup.OCGId')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('OrganizedCrimeGroup.OCGId'))); ?></li>
		<li><?php echo $this->Html->link(__('List Organized Crime Groups'), array('action' => 'index')); ?></li>
	</ul>
</div>
