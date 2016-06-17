<div class="radpostauths form">
<?php echo $this->Form->create('Radpostauth'); ?>
	<fieldset>
		<legend><?php echo __('Edit Radpostauth'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('username');
		echo $this->Form->input('pass');
		echo $this->Form->input('reply');
		echo $this->Form->input('authdate');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Radpostauth.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('Radpostauth.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List Radpostauths'), array('action' => 'index')); ?></li>
	</ul>
</div>
