





<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Bold Eccomarce<sup>Admin</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

        

            <!-- Heading -->
            <div class="sidebar-heading">
                Addons
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Pages</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Tables Screen:</h6>
                            
                        <a class="collapse-item" href="?products">Products</a>
                        <?php
                            $permissions=[2,5,6];
                        if (in_array($_SESSION["permission"],$permissions)) {
                            ?>
                        

                        <a class="collapse-item" href="?brand">Brand</a>
                        <a class="collapse-item" href="?cat">Category</a>
                        <a class="collapse-item" href="?orders">Orders</a>
                        <a class="collapse-item" href="?contact">Contact</a>
                        <a class="collapse-item" href="?reviews">Reviews</a>
                        
                        <h6 class="collapse-header">Login Screens:</h6>
                        <a class="collapse-item" href="?users">Users</a>
                        <!-- <a class="collapse-item" href="?pr">permission</a> -->
                        <!-- <a class="collapse-item" href="login.html">Login</a> -->
                        <!-- <a class="collapse-item" href="register.html">Register</a> -->
                        <!-- <a class="collapse-item" href="forgot-password.html">Forgot Password</a> -->
                        <!-- <div class="collapse-divider"></div> -->
                        <!-- <h6 class="collapse-header">Other Pages:</h6> -->
                        <!-- <a class="collapse-item" href="404.html">404 Page</a> -->
                         <?php
                         }
                        ?>
                        <a class="collapse-item" href="functions/logout.php">Logout</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Charts -->
            <!-- <li class="nav-item">
                <a class="nav-link" href="charts.html">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Charts</span></a>
            </li> -->

            <!-- Nav Item - Tables -->
            <!-- <li class="nav-item">
                <a class="nav-link" href="tables.html">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Tables</span></a>
            </li> -->

            <!-- Divider -->
            <!-- <hr class="sidebar-divider d-none d-md-block"> -->

            <!-- Sidebar Toggler (Sidebar) -->
            <!-- <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div> -->

            <!-- Sidebar Message -->
           

        </ul>