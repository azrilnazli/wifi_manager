<div class="radgroupreplies view">
<h2><?php echo __('Radgroupreply'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($radgroupreply['Radgroupreply']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Groupname'); ?></dt>
		<dd>
			<?php echo h($radgroupreply['Radgroupreply']['groupname']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Attribute'); ?></dt>
		<dd>
			<?php echo h($radgroupreply['Radgroupreply']['attribute']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Op'); ?></dt>
		<dd>
			<?php echo h($radgroupreply['Radgroupreply']['op']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Value'); ?></dt>
		<dd>
			<?php echo h($radgroupreply['Radgroupreply']['value']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Radgroupreply'), array('action' => 'edit', $radgroupreply['Radgroupreply']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Radgroupreply'), array('action' => 'delete', $radgroupreply['Radgroupreply']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $radgroupreply['Radgroupreply']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Radgroupreplies'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Radgroupreply'), array('action' => 'add')); ?> </li>
	</ul>
</div>
