<aside class="main-sidebar elevation-4 sidebar-light-primary">

    <!-- Brand Logo -->
    <a href="index.php" class="brand-link bg-dark bg-primary bg-danger">
        <img src="../ino/img/inoo.png" alt="INO Managemant" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">INO Management</span>
    </a>


    <?php if (isset($_SESSION['id'])) { ?>

    <!-- Sidebar -->
    <div
        class="sidebar os-host os-host-resize-disabled os-host-transition os-host-scrollbar-horizontal-hidden os-theme-dark os-host-foreign os-theme-light os-host-scrollbar-vertical-hidden">
        
        <div class="os-resize-observer-host observed">
            <div class="os-resize-observer" style="left: 0px; right: auto;"></div>
            <div class="os-resize-observer"></div>
        </div>

        <div class="os-size-auto-observer observed" style="height: calc(100% + 1px); float: left;">
            <div class="os-resize-observer"></div>
        </div>

        <div class="os-padding">
            <div class="os-viewport os-viewport-native-scrollbars-invisible">
                <div class="os-content">

                    <!-- Sidebar user panel (optional) -->
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                        <div class="image">
                            <img src="../ino/img/002.png" class="img-circle elevation-2" alt="User Image">
                        </div>
                        <div class="info">
                            <a href="profile.php" class=""><?php echo ($_SESSION['username']);?></a><br>
                            <a href="profile.php" class=""><?php echo ($_SESSION['email']);?></a><br>
                            <a href="logout.php" class=""><i class="nav-icon fa fa-sign-in"> Logout</i></a>
                        </div>
                    </div>
                    <?php } ?>


                    <!-- Sidebar Menu -->
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview"
                            role="menu" data-accordion="false">
                            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->


                            <li class="nav-item">
                                <a href="index.php" class="nav-link <?php if($menu=="index"){echo "active";} ?>">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>
                                        Dashboard
                                    </p>
                                </a>
                            </li>


                            <?php if ($_SESSION["role"] == "Administrator") { ?>
                            <li class="nav-item">
                                <a href="account.php" class="nav-link <?php if($menu=="account"){echo "active";} ?>">
                                    <i class="nav-icon fas fa-user"></i>
                                    <p>
                                        Account
                                    </p>
                                </a>
                            </li>
                            <?php } ?>

<!-- 
                            <li class="nav-item">
                                <a href="remind.php" class="nav-link <?php if($menu=="Remind"){echo "active";} ?>">
                                    <i class="nav-icon fa fa-bell"></i>
                                    <p>
                                        Remind
                                        <span class="right badge badge-danger">New</span>
                                    </p>
                                </a>
                            </li> -->

                            <li class="nav-item">
                                <a href="pipeline.php" class="nav-link <?php if($menu=="pipeline"){echo "active";} ?>">
                                    <i class="nav-icon fa fa-handshake"></i>
                                    <p>
                                        Sales Pipeline
                                        <span class="right badge badge-danger">New</span>
                                    </p>
                                </a>
                            </li>



                            <!-- <li class="nav-item">
                                <a href="project.php" class="nav-link <?php if($menu=="project"){echo "active";} ?>">
                                    <i class="nav-icon fa fa-star"></i>
                                    <p>
                                        Project Plan
                                        
                                    </p>
                                </a>
                            </li> -->

                            <li class="nav-item">
                                <a href="service.php" class="nav-link <?php if($menu=="service"){echo "active";} ?>">
                                    <i class="nav-icon fa fa-desktop"></i>
                                    <p>
                                        Service Job
                                    </p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="document.php" class="nav-link <?php if($menu=="document"){echo "active";} ?>">
                                    <i class="nav-icon fa fa-folder-open"></i>
                                    <p>
                                        Document
                                    </p>
                                </a>
                            </li>




                            <li class="nav-item">
                                <a href="contact.php" class="nav-link <?php if($menu=="contact"){echo "active";} ?>">
                                    <i class="nav-icon fa fa-book"></i>
                                    <p>
                                        Contact
                                    </p>
                                </a>
                            </li>



                        </ul>
                    </nav>
                    <!-- /.sidebar-menu -->
                </div>
            </div>
        </div>

        <div class="os-scrollbar os-scrollbar-horizontal os-scrollbar-unusable os-scrollbar-auto-hidden">
            <div class="os-scrollbar-track">
                <div class="os-scrollbar-handle" style="width: 100%; transform: translate(0px, 0px);"></div>
            </div>
        </div>

        <div class="os-scrollbar os-scrollbar-vertical os-scrollbar-unusable os-scrollbar-auto-hidden">
            <div class="os-scrollbar-track">
                <div class="os-scrollbar-handle" style="height: 100%; transform: translate(0px, 0px);"></div>
            </div>
        </div>

        <div class="os-scrollbar-corner"></div>
        
    </div>
    <!-- /.sidebar -->
</aside>