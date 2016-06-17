<div class="radgroupreplies form">
<?php echo $this->Form->create('Radgroupreply'); ?>
	<fieldset>
		<legend><?php echo __('Add Radgroupreply'); ?></legend>
	<?php
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

		<li><?php echo $this->Html->link(__('List Radgroupreplies'), array('action' => 'index')); ?></li>
	</ul>
</div>
