<div class="caseHasDefendants form">
<?php echo $this->Form->create('CaseHasDefendant'); ?>
	<fieldset>
		<legend><?php echo __('Add Case Has Defendant'); ?></legend>
	<?php
		echo $this->Form->input('DefendantId');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Case Has Defendants'), array('action' => 'index')); ?></li>
	</ul>
</div>