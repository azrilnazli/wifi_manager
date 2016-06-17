<div class="radgroupchecks view">
<h2><?php echo __('Radgroupcheck'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($radgroupcheck['Radgroupcheck']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Groupname'); ?></dt>
		<dd>
			<?php echo h($radgroupcheck['Radgroupcheck']['groupname']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Attribute'); ?></dt>
		<dd>
			<?php echo h($radgroupcheck['Radgroupcheck']['attribute']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Op'); ?></dt>
		<dd>
			<?php echo h($radgroupcheck['Radgroupcheck']['op']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Value'); ?></dt>
		<dd>
			<?php echo h($radgroupcheck['Radgroupcheck']['value']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Radgroupcheck'), array('action' => 'edit', $radgroupcheck['Radgroupcheck']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Radgroupcheck'), array('action' => 'delete', $radgroupcheck['Radgroupcheck']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $radgroupcheck['Radgroupcheck']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Radgroupchecks'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Radgroupcheck'), array('action' => 'add')); ?> </li>
	</ul>
</div>
