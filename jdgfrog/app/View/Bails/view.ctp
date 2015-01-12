<div class="bails view">
<h2><?php echo __('Bail'); ?></h2>
	<dl>
		<dt><?php echo __('BailId'); ?></dt>
		<dd>
			<?php echo h($bail['Bail']['BailId']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Type'); ?></dt>
		<dd>
			<?php echo h($bail['Bail']['Type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Amount'); ?></dt>
		<dd>
			<?php echo h($bail['Bail']['Amount']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('ArrestChargeDetails ACDId'); ?></dt>
		<dd>
			<?php echo h($bail['Bail']['ArrestChargeDetails_ACDId']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Bail'), array('action' => 'edit', $bail['Bail']['BailId'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Bail'), array('action' => 'delete', $bail['Bail']['BailId']), array(), __('Are you sure you want to delete # %s?', $bail['Bail']['BailId'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Bails'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Bail'), array('action' => 'add')); ?> </li>
	</ul>
</div>
