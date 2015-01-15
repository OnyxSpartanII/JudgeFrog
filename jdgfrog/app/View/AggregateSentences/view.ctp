<div class="aggregateSentences view">
<h2><?php echo __('Aggregate Sentence'); ?></h2>
	<dl>
		<dt><?php echo __('SentenceId'); ?></dt>
		<dd>
			<?php echo h($aggregateSentence['AggregateSentence']['SentenceId']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('DateTerminated'); ?></dt>
		<dd>
			<?php echo h($aggregateSentence['AggregateSentence']['DateTerminated']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date'); ?></dt>
		<dd>
			<?php echo h($aggregateSentence['AggregateSentence']['Date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Total'); ?></dt>
		<dd>
			<?php echo h($aggregateSentence['AggregateSentence']['Total']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Restitution'); ?></dt>
		<dd>
			<?php echo h($aggregateSentence['AggregateSentence']['Restitution']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('AssetForfeit'); ?></dt>
		<dd>
			<?php echo h($aggregateSentence['AggregateSentence']['AssetForfeit']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Appeal'); ?></dt>
		<dd>
			<?php echo h($aggregateSentence['AggregateSentence']['Appeal']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('SupervisedRelease'); ?></dt>
		<dd>
			<?php echo h($aggregateSentence['AggregateSentence']['SupervisedRelease']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Probation'); ?></dt>
		<dd>
			<?php echo h($aggregateSentence['AggregateSentence']['Probation']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('CHD CaseId'); ?></dt>
		<dd>
			<?php echo h($aggregateSentence['AggregateSentence']['CHD_CaseId']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('CHD DefendantId'); ?></dt>
		<dd>
			<?php echo h($aggregateSentence['AggregateSentence']['CHD_DefendantId']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Aggregate Sentence'), array('action' => 'edit', $aggregateSentence['AggregateSentence']['SentenceId'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Aggregate Sentence'), array('action' => 'delete', $aggregateSentence['AggregateSentence']['SentenceId']), array(), __('Are you sure you want to delete # %s?', $aggregateSentence['AggregateSentence']['SentenceId'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Aggregate Sentences'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Aggregate Sentence'), array('action' => 'add')); ?> </li>
	</ul>
</div>
