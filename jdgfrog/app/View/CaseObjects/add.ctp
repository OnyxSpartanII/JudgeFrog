<div class="caseObjects form">
<?php echo $this->Form->create('CaseObject'); ?>
	<fieldset>
		<legend><?php echo __('Add Case Object'); ?></legend>
	<?php
		echo $this->Form->input('Name');
		echo $this->Form->input('Number');
		echo $this->Form->input('Status');
		echo $this->Form->input('Num_Defendants');
		echo $this->Form->input('State');
		echo $this->Form->input('FederalDistrict');
		echo $this->Form->input('JudgeId');
		echo $this->Form->input('victims_VictimsId');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Case Objects'), array('action' => 'index')); ?></li>
	</ul>
</div>
