<?php $form =  $this->Form->create('Nas', array(
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
        <h4>Create New Nas</h4>
    </div>

    <?= $form;?>
    <div class="panel-body">
    <div class="row">
        <div class="col-lg-6">
                <div class="form-group">
                    <label>Name</label>
                     <?= $this->Form->input('shortname', array('label'=> FALSE, 'class' => 'form-control')); ?>
                </div>
                <div class="form-group">
                    <label>Secret</label>
                     <?= $this->Form->input('secret', array('label'=> FALSE, 'class' => 'form-control')); ?>
                </div>
                <div class="form-group">
                    <label>Radius Communication Port</label>
                     <?= $this->Form->input('ports', array('default' => '3799','label'=> FALSE, 'class' => 'form-control')); ?>
                </div>

                <div class="form-group">
                    <label>IP Address</label>
                     <?= $this->Form->input('nasname', array('label'=> FALSE, 'class' => 'form-control')); ?>
                </div>
                <div class="form-group">
                    <label>Type</label>
                     <?= $this->Form->input('type', array('label'=> FALSE, 'default' => 'other','class' => 'form-control')); ?>
                </div>

                 <div class="form-group">
                    <label>Description</label>
                     <?= $this->Form->input('description', array('type' => 'textarea', 'label'=> FALSE, 'class' => 'form-control')); ?>
                </div>
            </div> <!-- col -->
        </div> <!-- row -->
</div> <!-- panel -->

<div class="panel-footer">
    <a class="btn btn-default" href="/Users/index">Back</a>
    <button type="submit" class="btn btn-primary">Submit</button>
</div>
<?= $this->Form->end(); ?>
</div>

