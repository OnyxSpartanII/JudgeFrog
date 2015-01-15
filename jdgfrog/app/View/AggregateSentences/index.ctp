<div class="aggregateSentences index">
	<h2><?php echo __('Aggregate Sentences'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('SentenceId'); ?></th>
			<th><?php echo $this->Paginator->sort('DateTerminated'); ?></th>
			<th><?php echo $this->Paginator->sort('Date'); ?></th>
			<th><?php echo $this->Paginator->sort('Total'); ?></th>
			<th><?php echo $this->Paginator->sort('Restitution'); ?></th>
			<th><?php echo $this->Paginator->sort('AssetForfeit'); ?></th>
			<th><?php echo $this->Paginator->sort('Appeal'); ?></th>
			<th><?php echo $this->Paginator->sort('SupervisedRelease'); ?></th>
			<th><?php echo $this->Paginator->sort('Probation'); ?></th>
			<th><?php echo $this->Paginator->sort('CHD_CaseId'); ?></th>
			<th><?php echo $this->Paginator->sort('CHD_DefendantId'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($aggregateSentences as $aggregateSentence): ?>
	<tr>
		<td><?php echo h($aggregateSentence['AggregateSentence']['SentenceId']); ?>&nbsp;</td>
		<td><?php echo h($aggregateSentence['AggregateSentence']['DateTerminated']); ?>&nbsp;</td>
		<td><?php echo h($aggregateSentence['AggregateSentence']['Date']); ?>&nbsp;</td>
		<td><?php echo h($aggregateSentence['AggregateSentence']['Total']); ?>&nbsp;</td>
		<td><?php echo h($aggregateSentence['AggregateSentence']['Restitution']); ?>&nbsp;</td>
		<td><?php echo h($aggregateSentence['AggregateSentence']['AssetForfeit']); ?>&nbsp;</td>
		<td><?php echo h($aggregateSentence['AggregateSentence']['Appeal']); ?>&nbsp;</td>
		<td><?php echo h($aggregateSentence['AggregateSentence']['SupervisedRelease']); ?>&nbsp;</td>
		<td><?php echo h($aggregateSentence['AggregateSentence']['Probation']); ?>&nbsp;</td>
		<td><?php echo h($aggregateSentence['AggregateSentence']['CHD_CaseId']); ?>&nbsp;</td>
		<td><?php echo h($aggregateSentence['AggregateSentence']['CHD_DefendantId']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $aggregateSentence['AggregateSentence']['SentenceId'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $aggregateSentence['AggregateSentence']['SentenceId'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $aggregateSentence['AggregateSentence']['SentenceId']), array(), __('Are you sure you want to delete # %s?', $aggregateSentence['AggregateSentence']['SentenceId'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Aggregate Sentence'), array('action' => 'add')); ?></li>
	</ul>
</div>
