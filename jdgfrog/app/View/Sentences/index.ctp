<div class="sentences index">
	<h2><?php echo __('Sentences'); ?></h2>
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
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($sentences as $sentence): ?>
	<tr>
		<td><?php echo h($sentence['Sentence']['SentenceId']); ?>&nbsp;</td>
		<td><?php echo h($sentence['Sentence']['DateTerminated']); ?>&nbsp;</td>
		<td><?php echo h($sentence['Sentence']['Date']); ?>&nbsp;</td>
		<td><?php echo h($sentence['Sentence']['Total']); ?>&nbsp;</td>
		<td><?php echo h($sentence['Sentence']['Restitution']); ?>&nbsp;</td>
		<td><?php echo h($sentence['Sentence']['AssetForfeit']); ?>&nbsp;</td>
		<td><?php echo h($sentence['Sentence']['Appeal']); ?>&nbsp;</td>
		<td><?php echo h($sentence['Sentence']['SupervisedRelease']); ?>&nbsp;</td>
		<td><?php echo h($sentence['Sentence']['Probation']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $sentence['Sentence']['SentenceId'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $sentence['Sentence']['SentenceId'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $sentence['Sentence']['SentenceId']), array(), __('Are you sure you want to delete # %s?', $sentence['Sentence']['SentenceId'])); ?>
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
		<li><?php echo $this->Html->link(__('New Sentence'), array('action' => 'add')); ?></li>
	</ul>
</div>
