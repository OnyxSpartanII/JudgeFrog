<div class="caseHasOrganizedcrimegroups index">
	<h2><?php echo __('Case Has Organizedcrimegroups'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('Case_CaseId'); ?></th>
			<th><?php echo $this->Paginator->sort('OrganizedCrimeGroup_OCGId'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($caseHasOrganizedcrimegroups as $caseHasOrganizedcrimegroup): ?>
	<tr>
		<td><?php echo h($caseHasOrganizedcrimegroup['CaseHasOrganizedcrimegroup']['Case_CaseId']); ?>&nbsp;</td>
		<td><?php echo h($caseHasOrganizedcrimegroup['CaseHasOrganizedcrimegroup']['OrganizedCrimeGroup_OCGId']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $caseHasOrganizedcrimegroup['CaseHasOrganizedcrimegroup']['Case_CaseId'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $caseHasOrganizedcrimegroup['CaseHasOrganizedcrimegroup']['Case_CaseId'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $caseHasOrganizedcrimegroup['CaseHasOrganizedcrimegroup']['Case_CaseId']), array(), __('Are you sure you want to delete # %s?', $caseHasOrganizedcrimegroup['CaseHasOrganizedcrimegroup']['Case_CaseId'])); ?>
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
		<li><?php echo $this->Html->link(__('New Case Has Organizedcrimegroup'), array('action' => 'add')); ?></li>
	</ul>
</div>
