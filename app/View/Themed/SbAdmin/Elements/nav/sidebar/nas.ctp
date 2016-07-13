<?php
$search_nas = '
<form action ="/Nas/search" method="GET">
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
<a href="#"><i class="fa fa-gears"></i> Nas<span class="fa arrow"></span></a>
    <ul class="nav nav-second-level">
        <li>
            <a href="/Nas/index"><i class="fa fa-list-alt"></i> Manage Nas</a>
         </li>
         <li>
            <a href="/Nas/add"><i class="fa fa-plus"></i> Create Nas</a>
         </li>
         <li class="sidebar-search">
            <?= $search_nas; ?>
         </li>
     </ul>
    <!-- /.nav-second-level -->
