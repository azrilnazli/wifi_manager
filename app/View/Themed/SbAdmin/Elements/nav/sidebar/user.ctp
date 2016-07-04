<?php
$search_user = '
<form action ="/Users/search" method="GET">
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
<a href="#"><i class="fa fa-user"></i> Users<span class="fa arrow"></span></a>
    <ul class="nav nav-second-level">
        <li>
            <a href="/Users/index"><i class="fa fa-users"></i> Manage Users</a>
         </li>
         <li>
            <a href="/Users/add"><i class="fa fa-plus"></i> Create User</a>
         </li>
         <li class="sidebar-search">
            <?= $search_user; ?>
         </li>
     </ul>
    <!-- /.nav-second-level -->

