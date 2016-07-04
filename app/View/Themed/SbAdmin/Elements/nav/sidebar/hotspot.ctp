<?php
$search_hotspot = '
<form action ="/Hotspots/search" method="GET">
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
<a href="#"><i class="fa fa-user"></i> Hotspot<span class="fa arrow"></span></a>
    <ul class="nav nav-second-level">
        <li>
            <a href="/Hotspots/index"><i class="fa fa-users"></i> Manage Hotspot</a>
         </li>
         <li>
            <a href="/Hotspots/add"><i class="fa fa-plus"></i> Create Ticket</a>
         </li>
         <li class="sidebar-search">
            <?= $search_hotspot; ?>
         </li>
     </ul>
    <!-- /.nav-second-level -->

