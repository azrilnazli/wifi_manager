<div id="pantblhlp1" class="panel panel-info">
    <div class="panel-heading">
        <h3><span class="glyphicon glyphicon-info-sign"></span> <?=$user['User']['username'];?></h3>
    </div>
    <div class="panel-body">
<?php #debug($user); ?>
    <dl class="dl-horizontal">
        <dt>Username</dt>
        <dd><?=$user['User']['username'];?></dd>
        <dt>Role</dt>
        <dd><?=$user['User']['role'];?></dd>
        <dt>Created On</dt>
        <dd><?=$user['User']['created'];?></dd>
    </dl>
    </div>
<div class="panel-footer">
    <a class="btn btn-default" href="/Users/index"><span class="glyphicon glyphicon-hand-left"></span> Back</a>
</div> 
</div>
