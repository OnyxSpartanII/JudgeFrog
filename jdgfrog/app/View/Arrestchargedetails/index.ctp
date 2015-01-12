<div class="arrestchargedetails index">
	<h2><?php echo __('Arrestchargedetails'); ?></h2>
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
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($arrestchargedetails as $arrestchargedetail): ?>
	<tr>
		<td><?php echo h($arrestchargedetail['Arrestchargedetail']['ACDId']); ?>&nbsp;</td>
		<td><?php echo h($arrestchargedetail['Arrestchargedetail']['ChargeDate']); ?>&nbsp;</td>
		<td><?php echo h($arrestchargedetail['Arrestchargedetail']['ArrestDate']); ?>&nbsp;</td>
		<td><?php echo h($arrestchargedetail['Arrestchargedetail']['Detained']); ?>&nbsp;</td>
		<td><?php echo h($arrestchargedetail['Arrestchargedetail']['Role']); ?>&nbsp;</td>
		<td><?php echo h($arrestchargedetail['Arrestchargedetail']['LaborTraf']); ?>&nbsp;</td>
		<td><?php echo h($arrestchargedetail['Arrestchargedetail']['AdultSexTraf']); ?>&nbsp;</td>
		<td><?php echo h($arrestchargedetail['Arrestchargedetail']['MinorSexTraf']); ?>&nbsp;</td>
		<td><?php echo h($arrestchargedetail['Arrestchargedetail']['Fel_C']); ?>&nbsp;</td>
		<td><?php echo h($arrestchargedetail['Arrestchargedetail']['Fel_S']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $arrestchargedetail['Arrestchargedetail']['ACDId'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $arrestchargedetail['Arrestchargedetail']['ACDId'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $arrestchargedetail['Arrestchargedetail']['ACDId']), array(), __('Are you sure you want to delete # %s?', $arrestchargedetail['Arrestchargedetail']['ACDId'])); ?>
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
		<li><?php echo $this->Html->link(__('New Arrestchargedetail'), array('action' => 'add')); ?></li>
	</ul>
</div>
