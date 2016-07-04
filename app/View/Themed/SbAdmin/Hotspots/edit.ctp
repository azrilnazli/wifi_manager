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
    <h4>Edit current ticket</h4>
    </div>
<!-- app/View/Users/add.ctp -->


<?= $form;?>
<div class="panel-body">
    <div class="row">
        <div class="col-lg-6">
                <div class="form-group">
                    <label>Username</label>
                     <?= $this->Form->input('username', array('label'=> FALSE, 'class' => 'form-control')); ?>
                </div>

                 <div class="form-group">
                    <label>Password</label>
                     <?= $this->Form->input('pwd', array('type' => 'password', 'label'=> FALSE, 'class' => 'form-control')); ?>
                </div>

                <div class="form-group">

                <label>Expired in</label>
                <?php
                    $options = array(
                                    '1' => '1 day' ,
                                    '2' => '2 days' ,
                                    '3' => '3 days' ,
                                    '4' => '4 days' ,
                                    '2' => '5 days' ,
                                    '2' => '6 days' ,
                                    '2' => '7 days' ,
                                );
                    echo $this->Form->input('expired', array(
                                    'type' => 'select',
                                    'options' => $options,
                                    'label'=> FALSE,
                                    'default' => 'how many days ?',
                                    'class' => 'form-control'));
                ?>

                </div>
        </div>
    </div>
</div>


<div class="panel-footer">
    <a class="btn btn-default" href="/Hotspots/index">Back</a>
    <button type="submit" class="btn btn-primary">Submit</button>
</div>
<?= $this->Form->end(); ?>
</div>
<!-- /.panel -->
