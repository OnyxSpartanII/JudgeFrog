<div class="caseObjects index">
	<h2><?php echo __('Case Objects'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('CaseId'); ?></th>
			<th><?php echo $this->Paginator->sort('Name'); ?></th>
			<th><?php echo $this->Paginator->sort('Number'); ?></th>
			<th><?php echo $this->Paginator->sort('Status'); ?></th>
			<th><?php echo $this->Paginator->sort('Num_Defendants'); ?></th>
			<th><?php echo $this->Paginator->sort('State'); ?></th>
			<th><?php echo $this->Paginator->sort('FederalDistrict'); ?></th>
			<th><?php echo $this->Paginator->sort('JudgeId'); ?></th>
			<th><?php echo $this->Paginator->sort('victims_VictimsId'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($caseObjects as $caseObject): ?>
	<tr>
		<td><?php echo h($caseObject['CaseObject']['CaseId']); ?>&nbsp;</td>
		<td><?php echo h($caseObject['CaseObject']['Name']); ?>&nbsp;</td>
		<td><?php echo h($caseObject['CaseObject']['Number']); ?>&nbsp;</td>
		<td><?php echo h($caseObject['CaseObject']['Status']); ?>&nbsp;</td>
		<td><?php echo h($caseObject['CaseObject']['Num_Defendants']); ?>&nbsp;</td>
		<td><?php echo h($caseObject['CaseObject']['State']); ?>&nbsp;</td>
		<td><?php echo h($caseObject['CaseObject']['FederalDistrict']); ?>&nbsp;</td>
		<td><?php echo h($caseObject['CaseObject']['JudgeId']); ?>&nbsp;</td>
		<td><?php echo h($caseObject['CaseObject']['victims_VictimsId']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $caseObject['CaseObject']['CaseId'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $caseObject['CaseObject']['CaseId'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $caseObject['CaseObject']['CaseId']), array(), __('Are you sure you want to delete # %s?', $caseObject['CaseObject']['CaseId'])); ?>
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
		<li><?php echo $this->Html->link(__('New Case Object'), array('action' => 'add')); ?></li>
	</ul>
</div>
