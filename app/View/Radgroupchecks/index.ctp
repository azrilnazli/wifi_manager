<div class="radgroupchecks index">
	<h2><?php echo __('Radgroupchecks'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('groupname'); ?></th>
			<th><?php echo $this->Paginator->sort('attribute'); ?></th>
			<th><?php echo $this->Paginator->sort('op'); ?></th>
			<th><?php echo $this->Paginator->sort('value'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($radgroupchecks as $radgroupcheck): ?>
	<tr>
		<td><?php echo h($radgroupcheck['Radgroupcheck']['id']); ?>&nbsp;</td>
		<td><?php echo h($radgroupcheck['Radgroupcheck']['groupname']); ?>&nbsp;</td>
		<td><?php echo h($radgroupcheck['Radgroupcheck']['attribute']); ?>&nbsp;</td>
		<td><?php echo h($radgroupcheck['Radgroupcheck']['op']); ?>&nbsp;</td>
		<td><?php echo h($radgroupcheck['Radgroupcheck']['value']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $radgroupcheck['Radgroupcheck']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $radgroupcheck['Radgroupcheck']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $radgroupcheck['Radgroupcheck']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $radgroupcheck['Radgroupcheck']['id']))); ?>
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
		<li><?php echo $this->Html->link(__('New Radgroupcheck'), array('action' => 'add')); ?></li>
	</ul>
</div>
