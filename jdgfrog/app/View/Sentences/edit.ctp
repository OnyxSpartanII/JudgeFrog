<div class="sentences form">
<?php echo $this->Form->create('Sentence'); ?>
	<fieldset>
		<legend><?php echo __('Edit Sentence'); ?></legend>
	<?php
		echo $this->Form->input('SentenceId');
		echo $this->Form->input('DateTerminated');
		echo $this->Form->input('Date');
		echo $this->Form->input('Total');
		echo $this->Form->input('Restitution');
		echo $this->Form->input('AssetForfeit');
		echo $this->Form->input('Appeal');
		echo $this->Form->input('SupervisedRelease');
		echo $this->Form->input('Probation');
		echo $this->Form->input('defendants_DefendantId');
		echo $this->Form->input('cases_CaseId');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Sentence.SentenceId')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Sentence.SentenceId'))); ?></li>
		<li><?php echo $this->Html->link(__('List Sentences'), array('action' => 'index')); ?></li>
	</ul>
</div>
