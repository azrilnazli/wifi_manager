<div class="radpostauths view">
<h2><?php echo __('Radpostauth'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($radpostauth['Radpostauth']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Username'); ?></dt>
		<dd>
			<?php echo h($radpostauth['Radpostauth']['username']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Pass'); ?></dt>
		<dd>
			<?php echo h($radpostauth['Radpostauth']['pass']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Reply'); ?></dt>
		<dd>
			<?php echo h($radpostauth['Radpostauth']['reply']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Authdate'); ?></dt>
		<dd>
			<?php echo h($radpostauth['Radpostauth']['authdate']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Radpostauth'), array('action' => 'edit', $radpostauth['Radpostauth']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Radpostauth'), array('action' => 'delete', $radpostauth['Radpostauth']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $radpostauth['Radpostauth']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Radpostauths'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Radpostauth'), array('action' => 'add')); ?> </li>
	</ul>
</div>
