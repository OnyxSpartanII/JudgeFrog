<div class="caseHasOrganizedcrimegroups form">
<?php echo $this->Form->create('CaseHasOrganizedcrimegroup'); ?>
	<fieldset>
		<legend><?php echo __('Edit Case Has Organizedcrimegroup'); ?></legend>
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

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('CaseHasOrganizedcrimegroup.Case_CaseId')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('CaseHasOrganizedcrimegroup.Case_CaseId'))); ?></li>
		<li><?php echo $this->Html->link(__('List Case Has Organizedcrimegroups'), array('action' => 'index')); ?></li>
	</ul>
</div>
