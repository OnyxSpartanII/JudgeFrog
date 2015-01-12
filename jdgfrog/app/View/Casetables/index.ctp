<div class="casetables index">
	<h2><?php echo __('Casetables'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('CaseId'); ?></th>
			<th><?php echo $this->Paginator->sort('Name'); ?></th>
			<th><?php echo $this->Paginator->sort('Number'); ?></th>
			<th><?php echo $this->Paginator->sort('Status'); ?></th>
			<th><?php echo $this->Paginator->sort('Num_Defendants'); ?></th>
			<th><?php echo $this->Paginator->sort('State'); ?></th>
			<th><?php echo $this->Paginator->sort('FederalDistrict'); ?></th>
			<th><?php echo $this->Paginator->sort('VictimsId'); ?></th>
			<th><?php echo $this->Paginator->sort('JudgeId'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($casetables as $casetable): ?>
	<tr>
		<td><?php echo h($casetable['Casetable']['CaseId']); ?>&nbsp;</td>
		<td><?php echo h($casetable['Casetable']['Name']); ?>&nbsp;</td>
		<td><?php echo h($casetable['Casetable']['Number']); ?>&nbsp;</td>
		<td><?php echo h($casetable['Casetable']['Status']); ?>&nbsp;</td>
		<td><?php echo h($casetable['Casetable']['Num_Defendants']); ?>&nbsp;</td>
		<td><?php echo h($casetable['Casetable']['State']); ?>&nbsp;</td>
		<td><?php echo h($casetable['Casetable']['FederalDistrict']); ?>&nbsp;</td>
		<td><?php echo h($casetable['Casetable']['VictimsId']); ?>&nbsp;</td>
		<td><?php echo h($casetable['Casetable']['JudgeId']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $casetable['Casetable']['CaseId'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $casetable['Casetable']['CaseId'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $casetable['Casetable']['CaseId']), array(), __('Are you sure you want to delete # %s?', $casetable['Casetable']['CaseId'])); ?>
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
		<li><?php echo $this->Html->link(__('New Casetable'), array('action' => 'add')); ?></li>
	</ul>
</div>
