<div class="organizedcrimegroups index">
	<h2><?php echo __('Organizedcrimegroups'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('OCGId'); ?></th>
			<th><?php echo $this->Paginator->sort('Name'); ?></th>
			<th><?php echo $this->Paginator->sort('Size'); ?></th>
			<th><?php echo $this->Paginator->sort('Scope'); ?></th>
			<th><?php echo $this->Paginator->sort('Race'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($organizedcrimegroups as $organizedcrimegroup): ?>
	<tr>
		<td><?php echo h($organizedcrimegroup['Organizedcrimegroup']['OCGId']); ?>&nbsp;</td>
		<td><?php echo h($organizedcrimegroup['Organizedcrimegroup']['Name']); ?>&nbsp;</td>
		<td><?php echo h($organizedcrimegroup['Organizedcrimegroup']['Size']); ?>&nbsp;</td>
		<td><?php echo h($organizedcrimegroup['Organizedcrimegroup']['Scope']); ?>&nbsp;</td>
		<td><?php echo h($organizedcrimegroup['Organizedcrimegroup']['Race']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $organizedcrimegroup['Organizedcrimegroup']['OCGId'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $organizedcrimegroup['Organizedcrimegroup']['OCGId'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $organizedcrimegroup['Organizedcrimegroup']['OCGId']), array(), __('Are you sure you want to delete # %s?', $organizedcrimegroup['Organizedcrimegroup']['OCGId'])); ?>
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
		<li><?php echo $this->Html->link(__('New Organizedcrimegroup'), array('action' => 'add')); ?></li>
	</ul>
</div>
