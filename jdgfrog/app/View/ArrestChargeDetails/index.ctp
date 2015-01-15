<div class="arrestChargeDetails index">
	<h2><?php echo __('Arrest Charge Details'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('ACDId'); ?></th>
			<th><?php echo $this->Paginator->sort('ChargeDate'); ?></th>
			<th><?php echo $this->Paginator->sort('ArrestDate'); ?></th>
			<th><?php echo $this->Paginator->sort('Detained'); ?></th>
			<th><?php echo $this->Paginator->sort('Role'); ?></th>
			<th><?php echo $this->Paginator->sort('LaborTraf'); ?></th>
			<th><?php echo $this->Paginator->sort('AdultSexTraf'); ?></th>
			<th><?php echo $this->Paginator->sort('MinorSexTraf'); ?></th>
			<th><?php echo $this->Paginator->sort('Fel_C'); ?></th>
			<th><?php echo $this->Paginator->sort('Fel_S'); ?></th>
			<th><?php echo $this->Paginator->sort('BailType'); ?></th>
			<th><?php echo $this->Paginator->sort('BailAmount'); ?></th>
			<th><?php echo $this->Paginator->sort('CHD_CaseId'); ?></th>
			<th><?php echo $this->Paginator->sort('CHD_DefendantId'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($arrestChargeDetails as $arrestChargeDetail): ?>
	<tr>
		<td><?php echo h($arrestChargeDetail['ArrestChargeDetail']['ACDId']); ?>&nbsp;</td>
		<td><?php echo h($arrestChargeDetail['ArrestChargeDetail']['ChargeDate']); ?>&nbsp;</td>
		<td><?php echo h($arrestChargeDetail['ArrestChargeDetail']['ArrestDate']); ?>&nbsp;</td>
		<td><?php echo h($arrestChargeDetail['ArrestChargeDetail']['Detained']); ?>&nbsp;</td>
		<td><?php echo h($arrestChargeDetail['ArrestChargeDetail']['Role']); ?>&nbsp;</td>
		<td><?php echo h($arrestChargeDetail['ArrestChargeDetail']['LaborTraf']); ?>&nbsp;</td>
		<td><?php echo h($arrestChargeDetail['ArrestChargeDetail']['AdultSexTraf']); ?>&nbsp;</td>
		<td><?php echo h($arrestChargeDetail['ArrestChargeDetail']['MinorSexTraf']); ?>&nbsp;</td>
		<td><?php echo h($arrestChargeDetail['ArrestChargeDetail']['Fel_C']); ?>&nbsp;</td>
		<td><?php echo h($arrestChargeDetail['ArrestChargeDetail']['Fel_S']); ?>&nbsp;</td>
		<td><?php echo h($arrestChargeDetail['ArrestChargeDetail']['BailType']); ?>&nbsp;</td>
		<td><?php echo h($arrestChargeDetail['ArrestChargeDetail']['BailAmount']); ?>&nbsp;</td>
		<td><?php echo h($arrestChargeDetail['ArrestChargeDetail']['CHD_CaseId']); ?>&nbsp;</td>
		<td><?php echo h($arrestChargeDetail['ArrestChargeDetail']['CHD_DefendantId']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $arrestChargeDetail['ArrestChargeDetail']['ACDId'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $arrestChargeDetail['ArrestChargeDetail']['ACDId'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $arrestChargeDetail['ArrestChargeDetail']['ACDId']), array(), __('Are you sure you want to delete # %s?', $arrestChargeDetail['ArrestChargeDetail']['ACDId'])); ?>
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
		<li><?php echo $this->Html->link(__('New Arrest Charge Detail'), array('action' => 'add')); ?></li>
	</ul>
</div>
