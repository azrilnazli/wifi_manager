<!DOCTYPE html>
<html lang="en">
<head>
    <?= $this->Element('head');?>
</head>

<body>
    <div id="wrapper">

        <?= $this->Element('/nav/topbar'); ?>
        <?= $this->Element('/nav/sidebar'); ?>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <br />
                        <?= $this->Flash->render(); ?>
                        <?= $this->fetch('content'); ?>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <?= $this->Element('js');?>
</body>
</html>
<?php echo $this->element('sql_dump');?>

