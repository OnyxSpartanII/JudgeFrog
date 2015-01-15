<div class="aggregateSentences form">
<?php echo $this->Form->create('AggregateSentence'); ?>
	<fieldset>
		<legend><?php echo __('Add Aggregate Sentence'); ?></legend>
	<?php
		echo $this->Form->input('DateTerminated');
		echo $this->Form->input('Date');
		echo $this->Form->input('Total');
		echo $this->Form->input('Restitution');
		echo $this->Form->input('AssetForfeit');
		echo $this->Form->input('Appeal');
		echo $this->Form->input('SupervisedRelease');
		echo $this->Form->input('Probation');
		echo $this->Form->input('CHD_CaseId');
		echo $this->Form->input('CHD_DefendantId');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Aggregate Sentences'), array('action' => 'index')); ?></li>
	</ul>
</div>
