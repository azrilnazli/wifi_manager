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

#$base = 1073741824;
$base = 1048576; // 1MB
$options_vol = array(
        $base*100    => '100 MB' ,
        $base*500    => '500 MB' ,
        $base*1000    => '1 GB' ,
        $base*5000    => '5 GB' ,
);

$volume = $this->Form->input('volume', array(
                                    'type' => 'select',
                                    'options' => $options_vol,
                                    'label'=> 'Daily Volume Transfer',
                                    'default' => $base,
                                    'class' => 'form-control'));

$options = array(
    '56k'       => '56k' ,
    '128k'      => '128k' ,
    '256k'      => '256k' ,
    '512k'      => '512k' ,
    '1m'        => '1mb' ,
    '5m'        => '5mb' ,
    '10m'       => '10mb' ,

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
        <div class="col-sm-4"><div class="well"<><?=$volume;?></div></div>
        <div class="col-sm-4"><div class="well"<><?=$upload;?></div></div>
        <div class="col-sm-4"><div class="well"<><?=$download;?></div></div>
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

