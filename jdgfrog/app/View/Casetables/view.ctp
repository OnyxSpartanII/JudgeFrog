<div class="casetables view">
<h2><?php echo __('Casetable'); ?></h2>
	<dl>
		<dt><?php echo __('CaseId'); ?></dt>
		<dd>
			<?php echo h($casetable['Casetable']['CaseId']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($casetable['Casetable']['Name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Number'); ?></dt>
		<dd>
			<?php echo h($casetable['Casetable']['Number']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($casetable['Casetable']['Status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Num Defendants'); ?></dt>
		<dd>
			<?php echo h($casetable['Casetable']['Num_Defendants']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('State'); ?></dt>
		<dd>
			<?php echo h($casetable['Casetable']['State']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('FederalDistrict'); ?></dt>
		<dd>
			<?php echo h($casetable['Casetable']['FederalDistrict']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('VictimsId'); ?></dt>
		<dd>
			<?php echo h($casetable['Casetable']['VictimsId']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('JudgeId'); ?></dt>
		<dd>
			<?php echo h($casetable['Casetable']['JudgeId']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Casetable'), array('action' => 'edit', $casetable['Casetable']['CaseId'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Casetable'), array('action' => 'delete', $casetable['Casetable']['CaseId']), array(), __('Are you sure you want to delete # %s?', $casetable['Casetable']['CaseId'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Casetables'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Casetable'), array('action' => 'add')); ?> </li>
	</ul>
</div>
