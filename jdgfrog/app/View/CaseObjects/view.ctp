<div class="caseObjects view">
<h2><?php echo __('Case Object'); ?></h2>
	<dl>
		<dt><?php echo __('CaseId'); ?></dt>
		<dd>
			<?php echo h($caseObject['CaseObject']['CaseId']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($caseObject['CaseObject']['Name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Number'); ?></dt>
		<dd>
			<?php echo h($caseObject['CaseObject']['Number']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($caseObject['CaseObject']['Status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Num Defendants'); ?></dt>
		<dd>
			<?php echo h($caseObject['CaseObject']['Num_Defendants']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('State'); ?></dt>
		<dd>
			<?php echo h($caseObject['CaseObject']['State']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('FederalDistrict'); ?></dt>
		<dd>
			<?php echo h($caseObject['CaseObject']['FederalDistrict']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('JudgeId'); ?></dt>
		<dd>
			<?php echo h($caseObject['CaseObject']['JudgeId']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Victims VictimsId'); ?></dt>
		<dd>
			<?php echo h($caseObject['CaseObject']['victims_VictimsId']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Case Object'), array('action' => 'edit', $caseObject['CaseObject']['CaseId'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Case Object'), array('action' => 'delete', $caseObject['CaseObject']['CaseId']), array(), __('Are you sure you want to delete # %s?', $caseObject['CaseObject']['CaseId'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Case Objects'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Case Object'), array('action' => 'add')); ?> </li>
	</ul>
</div>
