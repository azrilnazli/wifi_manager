<div class="radaccts form">
<?php echo $this->Form->create('Radacct'); ?>
	<fieldset>
		<legend><?php echo __('Add Radacct'); ?></legend>
	<?php
		echo $this->Form->input('acctsessionid');
		echo $this->Form->input('acctuniqueid');
		echo $this->Form->input('username');
		echo $this->Form->input('groupname');
		echo $this->Form->input('realm');
		echo $this->Form->input('nasipaddress');
		echo $this->Form->input('nasportid');
		echo $this->Form->input('nasporttype');
		echo $this->Form->input('acctstarttime');
		echo $this->Form->input('acctstoptime');
		echo $this->Form->input('acctsessiontime');
		echo $this->Form->input('acctauthentic');
		echo $this->Form->input('connectinfo_start');
		echo $this->Form->input('connectinfo_stop');
		echo $this->Form->input('acctinputoctets');
		echo $this->Form->input('acctoutputoctets');
		echo $this->Form->input('calledstationid');
		echo $this->Form->input('callingstationid');
		echo $this->Form->input('acctterminatecause');
		echo $this->Form->input('servicetype');
		echo $this->Form->input('framedprotocol');
		echo $this->Form->input('framedipaddress');
		echo $this->Form->input('acctstartdelay');
		echo $this->Form->input('acctstopdelay');
		echo $this->Form->input('xascendsessionsvrkey');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Radaccts'), array('action' => 'index')); ?></li>
	</ul>
</div>
