<div class="caseHasOrganizedcrimegroups view">
<h2><?php echo __('Case Has Organizedcrimegroup'); ?></h2>
	<dl>
		<dt><?php echo __('Case CaseId'); ?></dt>
		<dd>
			<?php echo h($caseHasOrganizedcrimegroup['CaseHasOrganizedcrimegroup']['Case_CaseId']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('OrganizedCrimeGroup OCGId'); ?></dt>
		<dd>
			<?php echo h($caseHasOrganizedcrimegroup['CaseHasOrganizedcrimegroup']['OrganizedCrimeGroup_OCGId']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Case Has Organizedcrimegroup'), array('action' => 'edit', $caseHasOrganizedcrimegroup['CaseHasOrganizedcrimegroup']['Case_CaseId'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Case Has Organizedcrimegroup'), array('action' => 'delete', $caseHasOrganizedcrimegroup['CaseHasOrganizedcrimegroup']['Case_CaseId']), array(), __('Are you sure you want to delete # %s?', $caseHasOrganizedcrimegroup['CaseHasOrganizedcrimegroup']['Case_CaseId'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Case Has Organizedcrimegroups'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Case Has Organizedcrimegroup'), array('action' => 'add')); ?> </li>
	</ul>
</div>
