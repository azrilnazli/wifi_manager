<div class="radreplies index">
	<h2><?php echo __('Radreplies'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('username'); ?></th>
			<th><?php echo $this->Paginator->sort('attribute'); ?></th>
			<th><?php echo $this->Paginator->sort('op'); ?></th>
			<th><?php echo $this->Paginator->sort('value'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($radreplies as $radreply): ?>
	<tr>
		<td><?php echo h($radreply['Radreply']['id']); ?>&nbsp;</td>
		<td><?php echo h($radreply['Radreply']['username']); ?>&nbsp;</td>
		<td><?php echo h($radreply['Radreply']['attribute']); ?>&nbsp;</td>
		<td><?php echo h($radreply['Radreply']['op']); ?>&nbsp;</td>
		<td><?php echo h($radreply['Radreply']['value']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $radreply['Radreply']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $radreply['Radreply']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $radreply['Radreply']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $radreply['Radreply']['id']))); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
		'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Radreply'), array('action' => 'add')); ?></li>
	</ul>
</div>
