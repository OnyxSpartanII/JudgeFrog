<div class="sentences view">
<h2><?php echo __('Sentence'); ?></h2>
	<dl>
		<dt><?php echo __('SentenceId'); ?></dt>
		<dd>
			<?php echo h($sentence['Sentence']['SentenceId']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('DateTerminated'); ?></dt>
		<dd>
			<?php echo h($sentence['Sentence']['DateTerminated']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date'); ?></dt>
		<dd>
			<?php echo h($sentence['Sentence']['Date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Total'); ?></dt>
		<dd>
			<?php echo h($sentence['Sentence']['Total']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Restitution'); ?></dt>
		<dd>
			<?php echo h($sentence['Sentence']['Restitution']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('AssetForfeit'); ?></dt>
		<dd>
			<?php echo h($sentence['Sentence']['AssetForfeit']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Appeal'); ?></dt>
		<dd>
			<?php echo h($sentence['Sentence']['Appeal']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('SupervisedRelease'); ?></dt>
		<dd>
			<?php echo h($sentence['Sentence']['SupervisedRelease']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Probation'); ?></dt>
		<dd>
			<?php echo h($sentence['Sentence']['Probation']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Defendants DefendantId'); ?></dt>
		<dd>
			<?php echo h($sentence['Sentence']['defendants_DefendantId']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cases CaseId'); ?></dt>
		<dd>
			<?php echo h($sentence['Sentence']['cases_CaseId']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Sentence'), array('action' => 'edit', $sentence['Sentence']['SentenceId'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Sentence'), array('action' => 'delete', $sentence['Sentence']['SentenceId']), array(), __('Are you sure you want to delete # %s?', $sentence['Sentence']['SentenceId'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Sentences'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Sentence'), array('action' => 'add')); ?> </li>
	</ul>
</div>
