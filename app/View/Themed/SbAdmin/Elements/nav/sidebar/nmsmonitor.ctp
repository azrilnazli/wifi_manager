<?php
$search_nmsmonitor = '
<form action ="/Nmsmonitors/search" method="GET">
<div class="input-group custom-search-form">
    <input type="text" name="keyword" class="form-control" placeholder="Search...">
    <span class="input-group-btn">
        <button class="btn btn-default" type="button">
            <i class="fa fa-search"></i>
        </button>
    </span>
    </div>
</form>
    ';
?>
<a href="#"><i class="fa fa-gears"></i> NMS Monitor<span class="fa arrow"></span></a>
    <ul class="nav nav-second-level">
        <li>
            <a href="/Nmsmonitors/index"><i class="fa fa-list-alt"></i> Manage Devices</a>
         </li>
         <li>
            <a href="/Snmpmrtgs/index"><i class="fa fa-list-alt"></i> Manage MRTG</a>
         </li>

         <li>
            <a href="/Nmsmonitors/add"><i class="fa fa-plus"></i> Create Device</a>
         </li>
         <li class="sidebar-search">
            <?= $search_nmsmonitor; ?>
         </li>
     </ul>
<!-- /.nav-second-level -->
