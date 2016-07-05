<?php $form =  $this->Form->create('Package', array(
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
        <h4>Create New Package</h4>
    </div>

    <?= $form;?>
    <div class="panel-body">
    <div class="row">
        <div class="col-lg-6">
                <div class="form-group">
                    <label>Title</label>
                     <?= $this->Form->input('title', array('label'=> FALSE, 'class' => 'form-control')); ?>
                </div>

                 <div class="form-group">
                    <label>Description</label>
                     <?= $this->Form->input('description', array('type' => 'textarea', 'label'=> FALSE, 'class' => 'form-control')); ?>
                </div>

<?php

$base = 1;
$options_vol = array(
        $base*1     => '4 GB' ,
        $base*2     => '8 GB' ,
        $base*3    => '12 GB',
        $base*4    => '20 GB',
);

$volume = $this->Form->input('volume', array(
                                    'type' => 'select',
                                    'options' => $options_vol,
                                    'label'=> 'Volume Transfer',
                                    'default' => $base,
                                    'class' => 'form-control'));

$options = array(
    '57344'     => '56k' ,
    '131072'    => '128k' ,
    '262144'    => '256k' ,
    '524288'    => '512k' ,
    '1048576'   => '1mb' ,
    '5242880'   => '5mb' ,
    '10485760'  => '10mb' ,

);
$upload = $this->Form->input('upload', array(
                                    'type' => 'select',
                                    'options' => $options, 
                                    'label'=> 'Upload', 
                                    'default' => 'upload speed',
                                    'class' => 'form-control')); 

$download = $this->Form->input('download', array(
                                    'type' => 'select',
                                    'options' => $options,
                                    'label'=> 'Download',
                                    'default' => 'download speed',
                                    'class' => 'form-control'));
?>

    <div class="row form-group">
        <div class="col-sm-6"><div class="well"<><?=$upload;?></div></div>
        <div class="col-sm-6"><div class="well"<><?=$download;?></div></div>
    </div>

        </div> <!-- row -->
    </div> <!-- heading -->
</div> <!-- panel -->

<div class="panel-footer">
    <a class="btn btn-default" href="/Users/index">Back</a>
    <button type="submit" class="btn btn-primary">Submit</button>
</div>
<?= $this->Form->end(); ?>
</div>

