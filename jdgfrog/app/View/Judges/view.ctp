<div class="judges view">
<h2><?php echo __('Judge'); ?></h2>
	<dl>
		<dt><?php echo __('JudgeId'); ?></dt>
		<dd>
			<?php echo h($judge['Judge']['JudgeId']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($judge['Judge']['Name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Race'); ?></dt>
		<dd>
			<?php echo h($judge['Judge']['Race']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Gender'); ?></dt>
		<dd>
			<?php echo h($judge['Judge']['Gender']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tenure'); ?></dt>
		<dd>
			<?php echo h($judge['Judge']['Tenure']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('AppointedBy'); ?></dt>
		<dd>
			<?php echo h($judge['Judge']['AppointedBy']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Judge'), array('action' => 'edit', $judge['Judge']['JudgeId'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Judge'), array('action' => 'delete', $judge['Judge']['JudgeId']), array(), __('Are you sure you want to delete # %s?', $judge['Judge']['JudgeId'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Judges'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Judge'), array('action' => 'add')); ?> </li>
	</ul>
</div>
