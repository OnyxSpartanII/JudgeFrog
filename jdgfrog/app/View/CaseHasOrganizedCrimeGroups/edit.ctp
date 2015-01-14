<div class="caseHasOrganizedCrimeGroups form">
<?php echo $this->Form->create('CaseHasOrganizedCrimeGroup'); ?>
	<fieldset>
		<legend><?php echo __('Edit Case Has Organized Crime Group'); ?></legend>
	<?php
		echo $this->Form->input('Case_CaseId');
		echo $this->Form->input('OrganizedCrimeGroup_OCGId');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('CaseHasOrganizedCrimeGroup.Case_CaseId')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('CaseHasOrganizedCrimeGroup.Case_CaseId'))); ?></li>
		<li><?php echo $this->Html->link(__('List Case Has Organized Crime Groups'), array('action' => 'index')); ?></li>
	</ul>
</div>
