<div id="pantblhlp1" class="panel panel-info">
    <div class="panel-heading">
        <h3><span class="glyphicon glyphicon-info-sign"></span> <?=$package['Package']['title'];?></h3>
    </div>
    <div class="panel-body">
<?php #debug($package); ?>
    <dl class="dl-horizontal">
        <dt>Title</dt>
        <dd><?=$package['Package']['title'];?></dd>
        <dt>Description</dt>
        <dd><?=$package['Package']['description'];?></dd>
        <dt>Upload</dt>
        <dd><?=$package['Package']['upload'];?></dd>
        <dt>Download</dt>
        <dd><?=$package['Package']['download'];?></dd>
        <dt>Daily Volume</dt>
        <dd><?=$this->Number->toReadableSize($package['Package']['volume']);?></dd>
        <dt>Created On</dt>
        <dd><?=$package['Package']['created'];?></dd>
        <dt>Created By</dt>
        <dd><?=$package['User']['username'];?></dd>
    </dl>
    </div>
<div class="panel-footer">
    <a class="btn btn-default" href="/Packages/index"><span class="glyphicon glyphicon-hand-left"></span> Back</a>
    <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-save"></span> Save</button>
</div> 

</div>
