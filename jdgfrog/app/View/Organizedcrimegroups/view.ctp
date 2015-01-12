<div class="organizedcrimegroups view">
<h2><?php echo __('Organizedcrimegroup'); ?></h2>
	<dl>
		<dt><?php echo __('OCGId'); ?></dt>
		<dd>
			<?php echo h($organizedcrimegroup['Organizedcrimegroup']['OCGId']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($organizedcrimegroup['Organizedcrimegroup']['Name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Size'); ?></dt>
		<dd>
			<?php echo h($organizedcrimegroup['Organizedcrimegroup']['Size']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Scope'); ?></dt>
		<dd>
			<?php echo h($organizedcrimegroup['Organizedcrimegroup']['Scope']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Race'); ?></dt>
		<dd>
			<?php echo h($organizedcrimegroup['Organizedcrimegroup']['Race']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Organizedcrimegroup'), array('action' => 'edit', $organizedcrimegroup['Organizedcrimegroup']['OCGId'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Organizedcrimegroup'), array('action' => 'delete', $organizedcrimegroup['Organizedcrimegroup']['OCGId']), array(), __('Are you sure you want to delete # %s?', $organizedcrimegroup['Organizedcrimegroup']['OCGId'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Organizedcrimegroups'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Organizedcrimegroup'), array('action' => 'add')); ?> </li>
	</ul>
</div>
