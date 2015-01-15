<div class="organizedCrimeGroups view">
<h2><?php echo __('Organized Crime Group'); ?></h2>
	<dl>
		<dt><?php echo __('OCGId'); ?></dt>
		<dd>
			<?php echo h($organizedCrimeGroup['OrganizedCrimeGroup']['OCGId']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($organizedCrimeGroup['OrganizedCrimeGroup']['Name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Size'); ?></dt>
		<dd>
			<?php echo h($organizedCrimeGroup['OrganizedCrimeGroup']['Size']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Scope'); ?></dt>
		<dd>
			<?php echo h($organizedCrimeGroup['OrganizedCrimeGroup']['Scope']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Race'); ?></dt>
		<dd>
			<?php echo h($organizedCrimeGroup['OrganizedCrimeGroup']['Race']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Organized Crime Group'), array('action' => 'edit', $organizedCrimeGroup['OrganizedCrimeGroup']['OCGId'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Organized Crime Group'), array('action' => 'delete', $organizedCrimeGroup['OrganizedCrimeGroup']['OCGId']), array(), __('Are you sure you want to delete # %s?', $organizedCrimeGroup['OrganizedCrimeGroup']['OCGId'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Organized Crime Groups'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Organized Crime Group'), array('action' => 'add')); ?> </li>
	</ul>
</div>
