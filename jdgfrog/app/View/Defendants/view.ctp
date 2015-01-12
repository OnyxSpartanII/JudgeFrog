<div class="defendants view">
<h2><?php echo __('Defendant'); ?></h2>
	<dl>
		<dt><?php echo __('DefendantId'); ?></dt>
		<dd>
			<?php echo h($defendant['Defendant']['DefendantId']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Firstname'); ?></dt>
		<dd>
			<?php echo h($defendant['Defendant']['Firstname']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Lastname'); ?></dt>
		<dd>
			<?php echo h($defendant['Defendant']['Lastname']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Gender'); ?></dt>
		<dd>
			<?php echo h($defendant['Defendant']['Gender']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('BirthDate'); ?></dt>
		<dd>
			<?php echo h($defendant['Defendant']['BirthDate']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Race'); ?></dt>
		<dd>
			<?php echo h($defendant['Defendant']['Race']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('SentenceId'); ?></dt>
		<dd>
			<?php echo h($defendant['Defendant']['SentenceId']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('ACDId'); ?></dt>
		<dd>
			<?php echo h($defendant['Defendant']['ACDId']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Defendant'), array('action' => 'edit', $defendant['Defendant']['DefendantId'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Defendant'), array('action' => 'delete', $defendant['Defendant']['DefendantId']), array(), __('Are you sure you want to delete # %s?', $defendant['Defendant']['DefendantId'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Defendants'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Defendant'), array('action' => 'add')); ?> </li>
	</ul>
</div>
