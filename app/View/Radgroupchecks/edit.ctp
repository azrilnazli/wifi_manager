<div class="radgroupchecks form">
<?php echo $this->Form->create('Radgroupcheck'); ?>
	<fieldset>
		<legend><?php echo __('Edit Radgroupcheck'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('groupname');
		echo $this->Form->input('attribute');
		echo $this->Form->input('op');
		echo $this->Form->input('value');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Radgroupcheck.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('Radgroupcheck.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List Radgroupchecks'), array('action' => 'index')); ?></li>
	</ul>
</div>
