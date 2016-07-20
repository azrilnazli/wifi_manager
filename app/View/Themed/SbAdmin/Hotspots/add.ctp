<?php $form =  $this->Form->create('Hotspot', array(
                        //'class' => 'form-horizontal', 
                        //'role' => 'form',
                        'inputDefaults' => array(
                                        'format'    => array('before', 'label', 'between', 'input', 'error', 'after'),
                                            'div'   => array('class' => 'form-group'),
                                            'class' => array('form-control'),
                                            //'label' => array('class' => 'col-lg-2 control-label'),
                                            //'between' => '<div class="col-lg-6">',
                                            //'after' => '</div>',
                                            'error' => array('attributes' => array('wrap' => 'div', 'class' => 'alert alert-warning')),
))); ?>

<div id="pantblhlp1" class="panel panel-info">
    <div class="panel-heading">
        <h4><span class="glyphicon glyphicon-floppy-disk"></span> Create New Ticket</h4>
    </div>


<?= $form;?>
<div class="panel-body">
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                    <label>Package</label>
                     <?= $this->Form->input('package_id', array('label'=> FALSE, 'class' => 'form-control')); ?>
                </div>
                <div class="form-group">
                    <label>Username</label>
                     <?= $this->Form->input('username', array('label'=> FALSE, 'class' => 'form-control')); ?>
                </div>

                 <div class="form-group">
                    <label>Password</label>
                     <?= $this->Form->input('password', array('type' => 'text', 'label'=> FALSE, 'class' => 'form-control')); ?>
                </div>
                <div class="form-group">
                            <label>Concurrent</label>
                            <?= $this->Form->input('concurrent', array('label'=> FALSE, 'class' => 'form-control')); ?>
                 </div>

                <div class="form-group">

                <label>Expired On</label>
                <?php
$options = array(
    '1' => '1 day' ,
    '2' => '2 days' ,
    '3' => '3 days' ,
    '4' => '4 days' ,
    '5' => '5 days' ,
    '6' => '6 days' ,
    '7' => '7 days' ,

);
$this->Form->input('expired', array(
                                    'type' => 'select',
                                    'options' => $options, 
                                    'label'=> FALSE, 
                                    'default' => 'how many days ?',
                                    'class' => 'form-control')); 

#$this->Form->input('expired');
$expired = $this->Form->input(
                                'expired', 
                                array (
                                        'maxYear' => date('Y'),    
                                        'minYear' => date('Y'),    
                                        'dateFormat' => 'DMY',
                                        'interval' => 60,
                                        'separator' => '&nbsp;',
                                        'after' => '',
                                        'timeFormat' => 24,
                                        'label' => FALSE,
                                        'error' => FALSE,
                                        'class' => 'text-input small-input'
                                       )  
                            );
?>
   <div class="well">
        <?= $expired;?>
   </div>

                </div>
        </div>
    </div>
</div>


<div class="panel-footer">
    <a class="btn btn-default" href="/Hotspots/index"><span class="glyphicon glyphicon-hand-left"></span> Back</a>
    <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-save"></span> Save</button>
</div>
<?= $this->Form->end(); ?>
</div>
<!-- /.panel -->
