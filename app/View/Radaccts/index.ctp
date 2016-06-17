<div class="radaccts index">
	<h2><?php echo __('Radaccts'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('radacctid'); ?></th>
			<th><?php echo $this->Paginator->sort('acctsessionid'); ?></th>
			<th><?php echo $this->Paginator->sort('acctuniqueid'); ?></th>
			<th><?php echo $this->Paginator->sort('username'); ?></th>
			<th><?php echo $this->Paginator->sort('groupname'); ?></th>
			<th><?php echo $this->Paginator->sort('realm'); ?></th>
			<th><?php echo $this->Paginator->sort('nasipaddress'); ?></th>
			<th><?php echo $this->Paginator->sort('nasportid'); ?></th>
			<th><?php echo $this->Paginator->sort('nasporttype'); ?></th>
			<th><?php echo $this->Paginator->sort('acctstarttime'); ?></th>
			<th><?php echo $this->Paginator->sort('acctstoptime'); ?></th>
			<th><?php echo $this->Paginator->sort('acctsessiontime'); ?></th>
			<th><?php echo $this->Paginator->sort('acctauthentic'); ?></th>
			<th><?php echo $this->Paginator->sort('connectinfo_start'); ?></th>
			<th><?php echo $this->Paginator->sort('connectinfo_stop'); ?></th>
			<th><?php echo $this->Paginator->sort('acctinputoctets'); ?></th>
			<th><?php echo $this->Paginator->sort('acctoutputoctets'); ?></th>
			<th><?php echo $this->Paginator->sort('calledstationid'); ?></th>
			<th><?php echo $this->Paginator->sort('callingstationid'); ?></th>
			<th><?php echo $this->Paginator->sort('acctterminatecause'); ?></th>
			<th><?php echo $this->Paginator->sort('servicetype'); ?></th>
			<th><?php echo $this->Paginator->sort('framedprotocol'); ?></th>
			<th><?php echo $this->Paginator->sort('framedipaddress'); ?></th>
			<th><?php echo $this->Paginator->sort('acctstartdelay'); ?></th>
			<th><?php echo $this->Paginator->sort('acctstopdelay'); ?></th>
			<th><?php echo $this->Paginator->sort('xascendsessionsvrkey'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($radaccts as $radacct): ?>
	<tr>
		<td><?php echo h($radacct['Radacct']['radacctid']); ?>&nbsp;</td>
		<td><?php echo h($radacct['Radacct']['acctsessionid']); ?>&nbsp;</td>
		<td><?php echo h($radacct['Radacct']['acctuniqueid']); ?>&nbsp;</td>
		<td><?php echo h($radacct['Radacct']['username']); ?>&nbsp;</td>
		<td><?php echo h($radacct['Radacct']['groupname']); ?>&nbsp;</td>
		<td><?php echo h($radacct['Radacct']['realm']); ?>&nbsp;</td>
		<td><?php echo h($radacct['Radacct']['nasipaddress']); ?>&nbsp;</td>
		<td><?php echo h($radacct['Radacct']['nasportid']); ?>&nbsp;</td>
		<td><?php echo h($radacct['Radacct']['nasporttype']); ?>&nbsp;</td>
		<td><?php echo h($radacct['Radacct']['acctstarttime']); ?>&nbsp;</td>
		<td><?php echo h($radacct['Radacct']['acctstoptime']); ?>&nbsp;</td>
		<td><?php echo h($radacct['Radacct']['acctsessiontime']); ?>&nbsp;</td>
		<td><?php echo h($radacct['Radacct']['acctauthentic']); ?>&nbsp;</td>
		<td><?php echo h($radacct['Radacct']['connectinfo_start']); ?>&nbsp;</td>
		<td><?php echo h($radacct['Radacct']['connectinfo_stop']); ?>&nbsp;</td>
		<td><?php echo h($radacct['Radacct']['acctinputoctets']); ?>&nbsp;</td>
		<td><?php echo h($radacct['Radacct']['acctoutputoctets']); ?>&nbsp;</td>
		<td><?php echo h($radacct['Radacct']['calledstationid']); ?>&nbsp;</td>
		<td><?php echo h($radacct['Radacct']['callingstationid']); ?>&nbsp;</td>
		<td><?php echo h($radacct['Radacct']['acctterminatecause']); ?>&nbsp;</td>
		<td><?php echo h($radacct['Radacct']['servicetype']); ?>&nbsp;</td>
		<td><?php echo h($radacct['Radacct']['framedprotocol']); ?>&nbsp;</td>
		<td><?php echo h($radacct['Radacct']['framedipaddress']); ?>&nbsp;</td>
		<td><?php echo h($radacct['Radacct']['acctstartdelay']); ?>&nbsp;</td>
		<td><?php echo h($radacct['Radacct']['acctstopdelay']); ?>&nbsp;</td>
		<td><?php echo h($radacct['Radacct']['xascendsessionsvrkey']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $radacct['Radacct']['radacctid'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $radacct['Radacct']['radacctid'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $radacct['Radacct']['radacctid']), array('confirm' => __('Are you sure you want to delete # %s?', $radacct['Radacct']['radacctid']))); ?>
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
		<li><?php echo $this->Html->link(__('New Radacct'), array('action' => 'add')); ?></li>
	</ul>
</div>
