<div class="judges index">
	<h2><?php echo __('Judges'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('JudgeId'); ?></th>
			<th><?php echo $this->Paginator->sort('Name'); ?></th>
			<th><?php echo $this->Paginator->sort('Race'); ?></th>
			<th><?php echo $this->Paginator->sort('Gender'); ?></th>
			<th><?php echo $this->Paginator->sort('Tenure'); ?></th>
			<th><?php echo $this->Paginator->sort('AppointedBy'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($judges as $judge): ?>
	<tr>
		<td><?php echo h($judge['Judge']['JudgeId']); ?>&nbsp;</td>
		<td><?php echo h($judge['Judge']['Name']); ?>&nbsp;</td>
		<td><?php echo h($judge['Judge']['Race']); ?>&nbsp;</td>
		<td><?php echo h($judge['Judge']['Gender']); ?>&nbsp;</td>
		<td><?php echo h($judge['Judge']['Tenure']); ?>&nbsp;</td>
		<td><?php echo h($judge['Judge']['AppointedBy']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $judge['Judge']['JudgeId'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $judge['Judge']['JudgeId'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $judge['Judge']['JudgeId']), array(), __('Are you sure you want to delete # %s?', $judge['Judge']['JudgeId'])); ?>
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
		<li><?php echo $this->Html->link(__('New Judge'), array('action' => 'add')); ?></li>
	</ul>
</div>
