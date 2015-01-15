<div class="caseHasOrganizedCrimeGroups form">
<?php echo $this->Form->create('CaseHasOrganizedCrimeGroup'); ?>
	<fieldset>
		<legend><?php echo __('Add Case Has Organized Crime Group'); ?></legend>
	<?php
		echo $this->Form->input('OrganizedCrimeGroup_OCGId');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Case Has Organized Crime Groups'), array('action' => 'index')); ?></li>
	</ul>
</div>
