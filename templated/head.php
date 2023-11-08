<!-- Start Configrate  -->
    <?php
        include("connection/connection.php"); 
    ?>
<!-- End Configrate  -->

<!-- highlight -->
    <style>
        .highlight {
            background-color: #FFFF88;
        }
    </style>
<!-- highlight -->

<!----------------------------- start Time ------------------------------->
    <?php
        date_default_timezone_set('asia/bangkok');
        $date = date('Y/m/d');
        $time = date("H:i:s", "1359780799");
    ?>
<!----------------------------- start Time ------------------------------->


    <style type="text/css">
    a:link {
        color: black;
        text-decoration: none;
    }

    a:hover {
        color: palevioletred;
        text-decoration: none;
    }

    a:visited {
        color: black;
        text-decoration: none;
    }
    </style>




<!-- lightbox -->
<link rel="stylesheet" href="../up/code/dist/css/lightbox.min.css">
<!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
    <link rel="stylesheet" href="../up/code/plugins/fontawesome-free/css/all.min.css">
<!-- Select2 -->
    <link rel="stylesheet" href="../up/code/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="../up/code/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<!-- DataTables -->
    <link rel="stylesheet" href="../up/code/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../up/code/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../up/code/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
<!-- Theme style -->
    <link rel="stylesheet" href="../up/code/dist/css/adminlte.min.css">
<!-- Toastr -->
  <link rel="stylesheet" href="../up/code/plugins/toastr/toastr.min.css">
<!-- sweetalert -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
<!-- daterange picker -->
  <link rel="stylesheet" href="../up/code/plugins/daterangepicker/daterangepicker.css">
<!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="../up/code/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
<!-- BS Stepper -->
    <link rel="stylesheet" href="../up/code/plugins/bs-stepper/css/bs-stepper.min.css">
<!-- dropzonejs -->
  <link rel="stylesheet" href="../up/code/plugins/dropzone/min/dropzone.min.css">
<!-- Bootstrap Color Picker -->
   <link rel="stylesheet" href="../up/code/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
<!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="../up/code/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
<!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="../up/code/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
<!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<!-- summernote -->
  <link rel="stylesheet" href="../up/code/plugins/summernote/summernote-bs4.min.css">
<!-- CodeMirror -->
  <link rel="stylesheet" href="../up/code/plugins/codemirror/codemirror.css">
  <link rel="stylesheet" href="../up/code/plugins/codemirror/theme/monokai.css">
<!-- SimpleMDE -->
  <link rel="stylesheet" href="../up/code/plugins/simplemde/simplemde.min.css">
  
  <style type="text/css">
.mylayout_1{
    display:block;
    width:100px;
    word-wrap:break-word;
}
td#mylayout_2{
    display:block;
    width:600px;
    word-wrap:break-word;
}
</style>


</head>
        <link rel="icon" type="image/x-icon" href="../up/img/favicon.ico">

    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="index.php" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Contacts</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <li class="nav-item">
                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                        <i class="fas fa-search"></i>
                    </a>
                    <div class="navbar-search-block">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Search"
                                    aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>


                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge">15</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header">15 Notifications</span>

                        <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">
                                <i class="fas fa-envelope mr-2"></i> 4 new messages
                                <span class="float-right text-muted text-sm">3 mins</span>
                            </a>
                            
                        <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">
                                <i class="fas fa-users mr-2"></i> 8 friend requests
                                <span class="float-right text-muted text-sm">12 hours</span>
                            </a>

                        <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">
                                <i class="fas fa-file mr-2"></i> 3 new reports
                                <span class="float-right text-muted text-sm">2 days</span>
                            </a>

                        <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                    </div>

                </li>

                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
            </ul>
            
        </nav>
        <!-- /.navbar -->


 

        