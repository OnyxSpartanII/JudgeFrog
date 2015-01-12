<div class="victims index">
	<h2><?php echo __('Victims'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('VictimsId'); ?></th>
			<th><?php echo $this->Paginator->sort('Total'); ?></th>
			<th><?php echo $this->Paginator->sort('Minor'); ?></th>
			<th><?php echo $this->Paginator->sort('Foreigner'); ?></th>
			<th><?php echo $this->Paginator->sort('Female'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($victims as $victim): ?>
	<tr>
		<td><?php echo h($victim['Victim']['VictimsId']); ?>&nbsp;</td>
		<td><?php echo h($victim['Victim']['Total']); ?>&nbsp;</td>
		<td><?php echo h($victim['Victim']['Minor']); ?>&nbsp;</td>
		<td><?php echo h($victim['Victim']['Foreigner']); ?>&nbsp;</td>
		<td><?php echo h($victim['Victim']['Female']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $victim['Victim']['VictimsId'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $victim['Victim']['VictimsId'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $victim['Victim']['VictimsId']), array(), __('Are you sure you want to delete # %s?', $victim['Victim']['VictimsId'])); ?>
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
		<li><?php echo $this->Html->link(__('New Victim'), array('action' => 'add')); ?></li>
	</ul>
</div>
