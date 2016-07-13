<?php
$search_package = '
<form action ="/Packages/search" method="GET">
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
<a href="#"><i class="fa fa-gears"></i> Package<span class="fa arrow"></span></a>
    <ul class="nav nav-second-level">
        <li>
            <a href="/Packages/index"><i class="fa fa-list-alt"></i> Manage Packages</a>
         </li>
         <li>
            <a href="/Packages/add"><i class="fa fa-plus"></i> Create Package</a>
         </li>
         <li class="sidebar-search">
            <?= $search_package; ?>
         </li>
     </ul>
    <!-- /.nav-second-level -->

