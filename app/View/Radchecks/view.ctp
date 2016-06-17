<div class="radchecks view">
<h2><?php echo __('Radcheck'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($radcheck['Radcheck']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Username'); ?></dt>
		<dd>
			<?php echo h($radcheck['Radcheck']['username']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Attribute'); ?></dt>
		<dd>
			<?php echo h($radcheck['Radcheck']['attribute']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Op'); ?></dt>
		<dd>
			<?php echo h($radcheck['Radcheck']['op']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Value'); ?></dt>
		<dd>
			<?php echo h($radcheck['Radcheck']['value']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Radcheck'), array('action' => 'edit', $radcheck['Radcheck']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Radcheck'), array('action' => 'delete', $radcheck['Radcheck']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $radcheck['Radcheck']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Radchecks'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Radcheck'), array('action' => 'add')); ?> </li>
	</ul>
</div>
