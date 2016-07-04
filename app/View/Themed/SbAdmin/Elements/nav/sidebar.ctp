    <nav>
        <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="/Users/home"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <?= $this->Element('/nav/sidebar/user');?>
                        </li>
                        <li>
                            <?= $this->Element('/nav/sidebar/package');?>
                        </li>
                        <li>
                            <?= $this->Element('/nav/sidebar/hotspot');?>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
    </nav>
