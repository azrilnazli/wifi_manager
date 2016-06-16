
<!DOCTYPE html>
<html lang="en">

<head>
    <?= $this->Element('head'); ?>
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                     <?= $this->Session->flash(); ?>
                    <div class="panel-body">
			            <?= $this->Form->create('User'); ?>
                        <form role="form">
                            <fieldset>
                                <div class="form-group">
                                    <?= $this->Form->text('username', array('class' => 'form-control', 'placeholder' => 'Username' , 'type' => 'text') ); ?>
				</div>
                                <div class="form-group">
                                    <?= $this->Form->password('password', array('class' => 'form-control' , 'type' => 'password' , 'placeholder' => 'Password') ); ?>
	                        </div>
                                <!-- Change this to a button or input when using this as a form -->
				                    <?=$this->Form->submit(__('Login'), array('class' => 'btn btn-lg btn-success btn-block', 'div' => false) ); ?>
                            </fieldset>
                        </form>
                        <?=$this->Form->end(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?= $this->Element('js'); ?>
</body>

</html>

