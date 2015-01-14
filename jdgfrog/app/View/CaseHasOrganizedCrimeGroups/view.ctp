<div class="caseHasOrganizedCrimeGroups view">
<h2><?php echo __('Case Has Organized Crime Group'); ?></h2>
	<dl>
		<dt><?php echo __('Case CaseId'); ?></dt>
		<dd>
			<?php echo h($caseHasOrganizedCrimeGroup['CaseHasOrganizedCrimeGroup']['Case_CaseId']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('OrganizedCrimeGroup OCGId'); ?></dt>
		<dd>
			<?php echo h($caseHasOrganizedCrimeGroup['CaseHasOrganizedCrimeGroup']['OrganizedCrimeGroup_OCGId']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Case Has Organized Crime Group'), array('action' => 'edit', $caseHasOrganizedCrimeGroup['CaseHasOrganizedCrimeGroup']['Case_CaseId'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Case Has Organized Crime Group'), array('action' => 'delete', $caseHasOrganizedCrimeGroup['CaseHasOrganizedCrimeGroup']['Case_CaseId']), array(), __('Are you sure you want to delete # %s?', $caseHasOrganizedCrimeGroup['CaseHasOrganizedCrimeGroup']['Case_CaseId'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Case Has Organized Crime Groups'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Case Has Organized Crime Group'), array('action' => 'add')); ?> </li>
	</ul>
</div>
