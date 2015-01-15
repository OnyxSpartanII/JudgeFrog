<div class="caseHasDefendants form">
<?php echo $this->Form->create('CaseHasDefendant'); ?>
	<fieldset>
		<legend><?php echo __('Edit Case Has Defendant'); ?></legend>
	<?php
		echo $this->Form->input('CaseId');
		echo $this->Form->input('DefendantId');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('CaseHasDefendant.CaseId')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('CaseHasDefendant.CaseId'))); ?></li>
		<li><?php echo $this->Html->link(__('List Case Has Defendants'), array('action' => 'index')); ?></li>
	</ul>
</div>
