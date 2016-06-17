<div class="radaccts view">
<h2><?php echo __('Radacct'); ?></h2>
	<dl>
		<dt><?php echo __('Radacctid'); ?></dt>
		<dd>
			<?php echo h($radacct['Radacct']['radacctid']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Acctsessionid'); ?></dt>
		<dd>
			<?php echo h($radacct['Radacct']['acctsessionid']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Acctuniqueid'); ?></dt>
		<dd>
			<?php echo h($radacct['Radacct']['acctuniqueid']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Username'); ?></dt>
		<dd>
			<?php echo h($radacct['Radacct']['username']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Groupname'); ?></dt>
		<dd>
			<?php echo h($radacct['Radacct']['groupname']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Realm'); ?></dt>
		<dd>
			<?php echo h($radacct['Radacct']['realm']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nasipaddress'); ?></dt>
		<dd>
			<?php echo h($radacct['Radacct']['nasipaddress']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nasportid'); ?></dt>
		<dd>
			<?php echo h($radacct['Radacct']['nasportid']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nasporttype'); ?></dt>
		<dd>
			<?php echo h($radacct['Radacct']['nasporttype']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Acctstarttime'); ?></dt>
		<dd>
			<?php echo h($radacct['Radacct']['acctstarttime']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Acctstoptime'); ?></dt>
		<dd>
			<?php echo h($radacct['Radacct']['acctstoptime']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Acctsessiontime'); ?></dt>
		<dd>
			<?php echo h($radacct['Radacct']['acctsessiontime']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Acctauthentic'); ?></dt>
		<dd>
			<?php echo h($radacct['Radacct']['acctauthentic']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Connectinfo Start'); ?></dt>
		<dd>
			<?php echo h($radacct['Radacct']['connectinfo_start']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Connectinfo Stop'); ?></dt>
		<dd>
			<?php echo h($radacct['Radacct']['connectinfo_stop']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Acctinputoctets'); ?></dt>
		<dd>
			<?php echo h($radacct['Radacct']['acctinputoctets']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Acctoutputoctets'); ?></dt>
		<dd>
			<?php echo h($radacct['Radacct']['acctoutputoctets']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Calledstationid'); ?></dt>
		<dd>
			<?php echo h($radacct['Radacct']['calledstationid']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Callingstationid'); ?></dt>
		<dd>
			<?php echo h($radacct['Radacct']['callingstationid']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Acctterminatecause'); ?></dt>
		<dd>
			<?php echo h($radacct['Radacct']['acctterminatecause']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Servicetype'); ?></dt>
		<dd>
			<?php echo h($radacct['Radacct']['servicetype']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Framedprotocol'); ?></dt>
		<dd>
			<?php echo h($radacct['Radacct']['framedprotocol']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Framedipaddress'); ?></dt>
		<dd>
			<?php echo h($radacct['Radacct']['framedipaddress']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Acctstartdelay'); ?></dt>
		<dd>
			<?php echo h($radacct['Radacct']['acctstartdelay']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Acctstopdelay'); ?></dt>
		<dd>
			<?php echo h($radacct['Radacct']['acctstopdelay']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Xascendsessionsvrkey'); ?></dt>
		<dd>
			<?php echo h($radacct['Radacct']['xascendsessionsvrkey']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Radacct'), array('action' => 'edit', $radacct['Radacct']['radacctid'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Radacct'), array('action' => 'delete', $radacct['Radacct']['radacctid']), array('confirm' => __('Are you sure you want to delete # %s?', $radacct['Radacct']['radacctid']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Radaccts'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Radacct'), array('action' => 'add')); ?> </li>
	</ul>
</div>
