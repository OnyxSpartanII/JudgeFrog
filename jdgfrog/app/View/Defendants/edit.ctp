<div class="defendants form">
<?php echo $this->Form->create('Defendant'); ?>
	<fieldset>
		<legend><?php echo __('Edit Defendant'); ?></legend>
	<?php
		echo $this->Form->input('DefendantId');
		echo $this->Form->input('Firstname');
		echo $this->Form->input('Lastname');
		echo $this->Form->input('Gender');
		echo $this->Form->input('BirthDate');
		echo $this->Form->input('Race');
		echo $this->Form->input('SentenceId');
		echo $this->Form->input('ACDId');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Defendant.DefendantId')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Defendant.DefendantId'))); ?></li>
		<li><?php echo $this->Html->link(__('List Defendants'), array('action' => 'index')); ?></li>
	</ul>
</div>
