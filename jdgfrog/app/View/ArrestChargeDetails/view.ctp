<div class="arrestChargeDetails view">
<h2><?php echo __('Arrest Charge Detail'); ?></h2>
	<dl>
		<dt><?php echo __('ACDId'); ?></dt>
		<dd>
			<?php echo h($arrestChargeDetail['ArrestChargeDetail']['ACDId']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('ChargeDate'); ?></dt>
		<dd>
			<?php echo h($arrestChargeDetail['ArrestChargeDetail']['ChargeDate']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('ArrestDate'); ?></dt>
		<dd>
			<?php echo h($arrestChargeDetail['ArrestChargeDetail']['ArrestDate']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Detained'); ?></dt>
		<dd>
			<?php echo h($arrestChargeDetail['ArrestChargeDetail']['Detained']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Role'); ?></dt>
		<dd>
			<?php echo h($arrestChargeDetail['ArrestChargeDetail']['Role']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('LaborTraf'); ?></dt>
		<dd>
			<?php echo h($arrestChargeDetail['ArrestChargeDetail']['LaborTraf']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('AdultSexTraf'); ?></dt>
		<dd>
			<?php echo h($arrestChargeDetail['ArrestChargeDetail']['AdultSexTraf']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('MinorSexTraf'); ?></dt>
		<dd>
			<?php echo h($arrestChargeDetail['ArrestChargeDetail']['MinorSexTraf']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fel C'); ?></dt>
		<dd>
			<?php echo h($arrestChargeDetail['ArrestChargeDetail']['Fel_C']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fel S'); ?></dt>
		<dd>
			<?php echo h($arrestChargeDetail['ArrestChargeDetail']['Fel_S']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('BailType'); ?></dt>
		<dd>
			<?php echo h($arrestChargeDetail['ArrestChargeDetail']['BailType']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('BailAmount'); ?></dt>
		<dd>
			<?php echo h($arrestChargeDetail['ArrestChargeDetail']['BailAmount']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('CHD CaseId'); ?></dt>
		<dd>
			<?php echo h($arrestChargeDetail['ArrestChargeDetail']['CHD_CaseId']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('CHD DefendantId'); ?></dt>
		<dd>
			<?php echo h($arrestChargeDetail['ArrestChargeDetail']['CHD_DefendantId']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Arrest Charge Detail'), array('action' => 'edit', $arrestChargeDetail['ArrestChargeDetail']['ACDId'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Arrest Charge Detail'), array('action' => 'delete', $arrestChargeDetail['ArrestChargeDetail']['ACDId']), array(), __('Are you sure you want to delete # %s?', $arrestChargeDetail['ArrestChargeDetail']['ACDId'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Arrest Charge Details'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Arrest Charge Detail'), array('action' => 'add')); ?> </li>
	</ul>
</div>
