<div class="victims view">
<h2><?php echo __('Victim'); ?></h2>
	<dl>
		<dt><?php echo __('VictimsId'); ?></dt>
		<dd>
			<?php echo h($victim['Victim']['VictimsId']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Total'); ?></dt>
		<dd>
			<?php echo h($victim['Victim']['Total']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Minor'); ?></dt>
		<dd>
			<?php echo h($victim['Victim']['Minor']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Foreigner'); ?></dt>
		<dd>
			<?php echo h($victim['Victim']['Foreigner']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Female'); ?></dt>
		<dd>
			<?php echo h($victim['Victim']['Female']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cases CaseId'); ?></dt>
		<dd>
			<?php echo h($victim['Victim']['cases_CaseId']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Victim'), array('action' => 'edit', $victim['Victim']['VictimsId'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Victim'), array('action' => 'delete', $victim['Victim']['VictimsId']), array(), __('Are you sure you want to delete # %s?', $victim['Victim']['VictimsId'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Victims'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Victim'), array('action' => 'add')); ?> </li>
	</ul>
</div>
