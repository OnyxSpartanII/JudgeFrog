<div class="caseHasOrganizedCrimeGroups index">
	<h2><?php echo __('Case Has Organized Crime Groups'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('Case_CaseId'); ?></th>
			<th><?php echo $this->Paginator->sort('OrganizedCrimeGroup_OCGId'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($caseHasOrganizedCrimeGroups as $caseHasOrganizedCrimeGroup): ?>
	<tr>
		<td><?php echo h($caseHasOrganizedCrimeGroup['CaseHasOrganizedCrimeGroup']['Case_CaseId']); ?>&nbsp;</td>
		<td><?php echo h($caseHasOrganizedCrimeGroup['CaseHasOrganizedCrimeGroup']['OrganizedCrimeGroup_OCGId']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $caseHasOrganizedCrimeGroup['CaseHasOrganizedCrimeGroup']['Case_CaseId'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $caseHasOrganizedCrimeGroup['CaseHasOrganizedCrimeGroup']['Case_CaseId'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $caseHasOrganizedCrimeGroup['CaseHasOrganizedCrimeGroup']['Case_CaseId']), array(), __('Are you sure you want to delete # %s?', $caseHasOrganizedCrimeGroup['CaseHasOrganizedCrimeGroup']['Case_CaseId'])); ?>
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
		<li><?php echo $this->Html->link(__('New Case Has Organized Crime Group'), array('action' => 'add')); ?></li>
	</ul>
</div>
