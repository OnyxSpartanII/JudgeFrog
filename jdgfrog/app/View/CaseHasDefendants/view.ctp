<div class="caseHasDefendants view">
<h2><?php echo __('Case Has Defendant'); ?></h2>
	<dl>
		<dt><?php echo __('CaseId'); ?></dt>
		<dd>
			<?php echo h($caseHasDefendant['CaseHasDefendant']['CaseId']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('DefendantId'); ?></dt>
		<dd>
			<?php echo h($caseHasDefendant['CaseHasDefendant']['DefendantId']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Case Has Defendant'), array('action' => 'edit', $caseHasDefendant['CaseHasDefendant']['CaseId'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Case Has Defendant'), array('action' => 'delete', $caseHasDefendant['CaseHasDefendant']['CaseId']), array(), __('Are you sure you want to delete # %s?', $caseHasDefendant['CaseHasDefendant']['CaseId'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Case Has Defendants'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Case Has Defendant'), array('action' => 'add')); ?> </li>
	</ul>
</div>
