<div class="radreplies view">
<h2><?php echo __('Radreply'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($radreply['Radreply']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Username'); ?></dt>
		<dd>
			<?php echo h($radreply['Radreply']['username']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Attribute'); ?></dt>
		<dd>
			<?php echo h($radreply['Radreply']['attribute']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Op'); ?></dt>
		<dd>
			<?php echo h($radreply['Radreply']['op']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Value'); ?></dt>
		<dd>
			<?php echo h($radreply['Radreply']['value']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Radreply'), array('action' => 'edit', $radreply['Radreply']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Radreply'), array('action' => 'delete', $radreply['Radreply']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $radreply['Radreply']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Radreplies'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Radreply'), array('action' => 'add')); ?> </li>
	</ul>
</div>
