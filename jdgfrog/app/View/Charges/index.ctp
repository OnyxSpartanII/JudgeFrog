<div class="charges index">
	<h2><?php echo __('Charges'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('ChargeId'); ?></th>
			<th><?php echo $this->Paginator->sort('Counts'); ?></th>
			<th><?php echo $this->Paginator->sort('CountsNolleProssed'); ?></th>
			<th><?php echo $this->Paginator->sort('Statute'); ?></th>
			<th><?php echo $this->Paginator->sort('PleaDismissed'); ?></th>
			<th><?php echo $this->Paginator->sort('PleaGuilty'); ?></th>
			<th><?php echo $this->Paginator->sort('TrialGuilty'); ?></th>
			<th><?php echo $this->Paginator->sort('TrialNotGuilty'); ?></th>
			<th><?php echo $this->Paginator->sort('Fines'); ?></th>
			<th><?php echo $this->Paginator->sort('Sentence'); ?></th>
			<th><?php echo $this->Paginator->sort('Probation'); ?></th>
			<th><?php echo $this->Paginator->sort('ACDId'); ?></th>
			<th><?php echo $this->Paginator->sort('ACD_CHD_CaseId'); ?></th>
			<th><?php echo $this->Paginator->sort('ACD_CHD_DefendantId'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($charges as $charge): ?>
	<tr>
		<td><?php echo h($charge['Charge']['ChargeId']); ?>&nbsp;</td>
		<td><?php echo h($charge['Charge']['Counts']); ?>&nbsp;</td>
		<td><?php echo h($charge['Charge']['CountsNolleProssed']); ?>&nbsp;</td>
		<td><?php echo h($charge['Charge']['Statute']); ?>&nbsp;</td>
		<td><?php echo h($charge['Charge']['PleaDismissed']); ?>&nbsp;</td>
		<td><?php echo h($charge['Charge']['PleaGuilty']); ?>&nbsp;</td>
		<td><?php echo h($charge['Charge']['TrialGuilty']); ?>&nbsp;</td>
		<td><?php echo h($charge['Charge']['TrialNotGuilty']); ?>&nbsp;</td>
		<td><?php echo h($charge['Charge']['Fines']); ?>&nbsp;</td>
		<td><?php echo h($charge['Charge']['Sentence']); ?>&nbsp;</td>
		<td><?php echo h($charge['Charge']['Probation']); ?>&nbsp;</td>
		<td><?php echo h($charge['Charge']['ACDId']); ?>&nbsp;</td>
		<td><?php echo h($charge['Charge']['ACD_CHD_CaseId']); ?>&nbsp;</td>
		<td><?php echo h($charge['Charge']['ACD_CHD_DefendantId']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $charge['Charge']['ChargeId'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $charge['Charge']['ChargeId'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $charge['Charge']['ChargeId']), array(), __('Are you sure you want to delete # %s?', $charge['Charge']['ChargeId'])); ?>
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
		<li><?php echo $this->Html->link(__('New Charge'), array('action' => 'add')); ?></li>
	</ul>
</div>
