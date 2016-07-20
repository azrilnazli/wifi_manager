<div id="pantblhlp1" class="panel panel-info">
    <div class="panel-heading">
        <h3><span class="fa fa-tag"></span> <?=$nas['Nas']['shortname'];?></h3>
    </div>
    <div class="panel-body">
<?php //debug($nas); ?>
    <dl class="dl-horizontal">
        <dt>Name</dt>
        <dd><?=$nas['Nas']['shortname'];?></dd>
        <dt>Secret</dt>
        <dd><?=$nas['Nas']['secret'];?></dd>
        <dt>Type</dt>
        <dd><?=$nas['Nas']['type'];?></dd>
        <dt>Description</dt>
        <dd><?=$nas['Nas']['description'];?></dd>
    </dl>
    </div>
<div class="panel-footer">
    <a class="btn btn-default" href="/Nas/index"><span class="glyphicon glyphicon-hand-left"></span> Back</a>
</div>
</div>
