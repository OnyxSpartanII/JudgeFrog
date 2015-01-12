<div class="bails index">
	<h2><?php echo __('Bails'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('BailId'); ?></th>
			<th><?php echo $this->Paginator->sort('Type'); ?></th>
			<th><?php echo $this->Paginator->sort('Amount'); ?></th>
			<th><?php echo $this->Paginator->sort('ArrestChargeDetails_ACDId'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($bails as $bail): ?>
	<tr>
		<td><?php echo h($bail['Bail']['BailId']); ?>&nbsp;</td>
		<td><?php echo h($bail['Bail']['Type']); ?>&nbsp;</td>
		<td><?php echo h($bail['Bail']['Amount']); ?>&nbsp;</td>
		<td><?php echo h($bail['Bail']['ArrestChargeDetails_ACDId']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $bail['Bail']['BailId'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $bail['Bail']['BailId'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $bail['Bail']['BailId']), array(), __('Are you sure you want to delete # %s?', $bail['Bail']['BailId'])); ?>
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
		<li><?php echo $this->Html->link(__('New Bail'), array('action' => 'add')); ?></li>
	</ul>
</div>
