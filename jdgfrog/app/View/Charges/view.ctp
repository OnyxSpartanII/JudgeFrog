<div class="charges view">
<h2><?php echo __('Charge'); ?></h2>
	<dl>
		<dt><?php echo __('ChargeId'); ?></dt>
		<dd>
			<?php echo h($charge['Charge']['ChargeId']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Counts'); ?></dt>
		<dd>
			<?php echo h($charge['Charge']['Counts']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('CountsNolleProssed'); ?></dt>
		<dd>
			<?php echo h($charge['Charge']['CountsNolleProssed']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Statute'); ?></dt>
		<dd>
			<?php echo h($charge['Charge']['Statute']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('PleaDismissed'); ?></dt>
		<dd>
			<?php echo h($charge['Charge']['PleaDismissed']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('PleaGuilty'); ?></dt>
		<dd>
			<?php echo h($charge['Charge']['PleaGuilty']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('TrialGuilty'); ?></dt>
		<dd>
			<?php echo h($charge['Charge']['TrialGuilty']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('TrialNotGuilty'); ?></dt>
		<dd>
			<?php echo h($charge['Charge']['TrialNotGuilty']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fines'); ?></dt>
		<dd>
			<?php echo h($charge['Charge']['Fines']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sentence'); ?></dt>
		<dd>
			<?php echo h($charge['Charge']['Sentence']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Probation'); ?></dt>
		<dd>
			<?php echo h($charge['Charge']['Probation']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Arrest Charge Details ACDId'); ?></dt>
		<dd>
			<?php echo h($charge['Charge']['arrest_charge_details_ACDId']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Charge'), array('action' => 'edit', $charge['Charge']['ChargeId'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Charge'), array('action' => 'delete', $charge['Charge']['ChargeId']), array(), __('Are you sure you want to delete # %s?', $charge['Charge']['ChargeId'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Charges'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Charge'), array('action' => 'add')); ?> </li>
	</ul>
</div>
