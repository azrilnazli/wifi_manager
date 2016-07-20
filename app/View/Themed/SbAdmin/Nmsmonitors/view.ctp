<div id="pantblhlp1" class="panel panel-info">
    <div class="panel-heading">
        <h3><span class="glyphicon glyphicon-info-sign"></span> <?=$nmsmonitor['Nmsmonitor']['device'];?></h3>
    </div>
    <div class="panel-body">
<?php #debug($nmsmonitor); ?>
    <dl class="dl-horizontal">
        <dt>Title</dt>
        <dd><?=$nmsmonitor['Nmsmonitor']['device'];?></dd>
        <dt>Description</dt>
        <dd><?=$nmsmonitor['Nmsmonitor']['devicedescr'];?></dd>
        <dt>IP Address</dt>
        <dd><?=$nmsmonitor['Nmsmonitor']['deviceip'];?></dd>
        <dt>Status</dt>
        <dd><?=$nmsmonitor['Nmsmonitor']['devicestatus'];?></dd>
        <dt>Created By</dt>
        <dd><?=$nmsmonitor['User']['username'];?></dd>
        <dt>Created On</dt>
        <dd><?=$nmsmonitor['Nmsmonitor']['created'];?></dd>
    </dl>

<div class="embed-responsive embed-responsive-16by9">
  <iframe class="embed-responsive-item" src="http://nas.azbyte.com:82/mymrtg/"></iframe>
</div>
~     
    </div>
<div class="panel-footer">
    <a class="btn btn-default" href="/Nmsmonitors/index"><span class="glyphicon glyphicon-hand-left"></span> Back</a>
</div> 

</div>
