<?php $form =  $this->Form->create('User', array(
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
        <h4>Create New User</h4>
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

                    <label>Role</label>
                <?php
                    $options = array('admin' => 'Admin' ,'user' => 'User');
echo $this->Form->input('role', array(
                                    'type' => 'select',
                                    'options' => $options, 
                                    'label'=> FALSE, 
                                    'default' => 'user',
                                    'class' => 'form-control')); 
                ?>
                </div>
        </div>
    </div>
</div>


<div class="panel-footer">
    <a class="btn btn-default" href="/Users/index">Back</a>
    <button type="submit" class="btn btn-primary">Submit</button>
</div>
<?= $this->Form->end(); ?>
</div>
<!-- /.panel -->
