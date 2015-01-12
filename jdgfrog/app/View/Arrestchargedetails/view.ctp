<div class="arrestchargedetails view">
<h2><?php echo __('Arrestchargedetail'); ?></h2>
	<dl>
		<dt><?php echo __('ACDId'); ?></dt>
		<dd>
			<?php echo h($arrestchargedetail['Arrestchargedetail']['ACDId']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('ChargeDate'); ?></dt>
		<dd>
			<?php echo h($arrestchargedetail['Arrestchargedetail']['ChargeDate']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('ArrestDate'); ?></dt>
		<dd>
			<?php echo h($arrestchargedetail['Arrestchargedetail']['ArrestDate']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Detained'); ?></dt>
		<dd>
			<?php echo h($arrestchargedetail['Arrestchargedetail']['Detained']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Role'); ?></dt>
		<dd>
			<?php echo h($arrestchargedetail['Arrestchargedetail']['Role']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('LaborTraf'); ?></dt>
		<dd>
			<?php echo h($arrestchargedetail['Arrestchargedetail']['LaborTraf']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('AdultSexTraf'); ?></dt>
		<dd>
			<?php echo h($arrestchargedetail['Arrestchargedetail']['AdultSexTraf']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('MinorSexTraf'); ?></dt>
		<dd>
			<?php echo h($arrestchargedetail['Arrestchargedetail']['MinorSexTraf']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fel C'); ?></dt>
		<dd>
			<?php echo h($arrestchargedetail['Arrestchargedetail']['Fel_C']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fel S'); ?></dt>
		<dd>
			<?php echo h($arrestchargedetail['Arrestchargedetail']['Fel_S']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Arrestchargedetail'), array('action' => 'edit', $arrestchargedetail['Arrestchargedetail']['ACDId'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Arrestchargedetail'), array('action' => 'delete', $arrestchargedetail['Arrestchargedetail']['ACDId']), array(), __('Are you sure you want to delete # %s?', $arrestchargedetail['Arrestchargedetail']['ACDId'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Arrestchargedetails'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Arrestchargedetail'), array('action' => 'add')); ?> </li>
	</ul>
</div>
