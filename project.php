<!DOCTYPE html>
<html lang="en">
<?php $menu = "project"; ?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>INOvation Management</title>


    <!----------------------------- start header ------------------------------->
    <?php include ("../ino/templated/head.php");?>
    <!----------------------------- end header --------------------------------->

    <!----------------------------- start menu ------------------------------->
    <?php include ("../ino/templated/menu.php");?>
    <!----------------------------- end menu --------------------------------->



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



    <?php
    /* การลบข้อมูล */
    if (isset($_GET['id'])) {

        $result = $conn->query("DELETE FROM tb_project WHERE project_id=" . $_GET['id']);

        if ($result) {
            // <!-- sweetalert -->
            echo '<script>
                    setTimeout(function(){
                        swal({
                            title: "Delectd Successfully!",
                            text: "Thank You . ",
                            type:"success"
                        }, function(){
                            window.location = "project.php";
                        })
                    },1000);
                </script>';
            // echo "<script>alert('ยินดีตอนรับ Admin เข้าสู่ระบบ'); window.location='../index.php'</script>";
        } else {
            // <!-- sweetalert -->
            echo '<script>
                    setTimeout(function(){
                        swal({
                            title: "Can Not Delectd Successfully!",
                            text: "Checking Your Data",
                            type:"warning"
                        }, function(){
                            window.location = "project.php";
                        })
                    },1000);
                </script>';
            // echo "<script>alert('ยินดีตอนรับ Admin เข้าสู่ระบบ'); window.location='../index.php'</script>";
        }
    }
    /* การลบข้อมูล */
    ?>



    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Project Management</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active">Project Management</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">



                        <!-- Start ค้นหาและ ดึงข้อมูล -->
                        <?php
    $search = "";
    $tb_position = "";
    $tb_group = "";
    $tb_status = "";
    $tb_staff = "";
    $tb_createdate = "";
    $search_backup = "";
    $tb_position_backup = "";
    $tb_group_backup = "";
    $tb_status_backup = "";
    $tb_staff_backup = "";
    $tb_createdate_backup = "";

    $_sql_position = "SELECT DISTINCT project_line FROM tb_project";
    $_sql_group = "SELECT DISTINCT project_team FROM tb_project";
    $_sql_status = "SELECT DISTINCT project_sub  FROM tb_project";
    $_sql_staff = "SELECT DISTINCT project_status  FROM tb_project";
    $_sql_createdate = "SELECT DISTINCT project_date  FROM tb_project";

    $query_position = mysqli_query($conn, $_sql_position);
    $query_group = mysqli_query($conn, $_sql_group);
    $query_status = mysqli_query($conn, $_sql_status);
    $query_staff = mysqli_query($conn, $_sql_staff);
    $query_createdate = mysqli_query($conn, $_sql_createdate);

    $_sql = "SELECT * FROM tb_project";
    $_where = "";
    if (isset($_POST['search'])) {

        $search = $_POST['searchservice'];
        $tb_position = $_POST['project_line'];
        $tb_group = $_POST['project_cate'];
        $tb_status = $_POST['project_sub'];
        $tb_staff = $_POST['project_staff'];
        $tb_createdate = $_POST['project_date'];
        $search_backup = $_POST['search_backup'];
        $tb_position_backup = $_POST['project_line_backup'];
        $tb_group_backup = $_POST['project_cate_backup'];
        $tb_status_backup = $_POST['project_sub_backup'];
        $tb_staff_backup = $_POST['project_staff_backup'];
        $tb_createdate_backup = $_POST['project_date_backup'];
        //print_r($_sqlCount);

        if ($search != $search_backup || $tb_position != $tb_position_backup || $tb_group != $tb_group_backup || $tb_status  != $tb_status_backup || $tb_staff  != $tb_staff_backup || $tb_createdate  != $tb_createdate_backup )
        
        if (!empty($search)) {
            $_where = $_where . " WHERE project_line LIKE '%$search%'OR project_cate LIKE '%$search%' OR project_sub LIKE '%$search%' OR project_name LIKE '%$search%' OR project_detail LIKE '%$search%' OR project_cost LIKE '%$search%'
            OR project_staff LIKE '%$search%' OR project_link LIKE '%$search%'
            OR contact_name LIKE '%$search%' OR contact_company LIKE '%$search%' OR contact_position LIKE '%$search%' OR contact_email LIKE '%$search%' OR contact_phone LIKE '%$search%'
            OR contact_detail LIKE '%$search%' ";
        }
        if ($tb_position != "") {
            if (empty($_where)) {
                $_where = $_where . " WHERE project_line = '$tb_position' ";
            } else {
                $_where = $_where . " AND project_line = '$tb_position'";
            }
        }
        if ($tb_group != "") {
            if (empty($_where)) {
                $_where = $_where . " WHERE project_team = '$tb_group' ";
            } else {
                $_where = $_where . " AND project_team = '$tb_group'";
            }
        }
        if ($tb_status != "") {
            if (empty($_where)) {
                $_where = $_where . " WHERE project_sub = '$tb_status' ";
            } else {
                $_where = $_where . " AND  project_sub = '$tb_status'"; 
            }
        }
        if ($tb_staff != "") {
            if (empty($_where)) {
                $_where = $_where . " WHERE project_status = '$tb_staff' ";
            } else {
                $_where = $_where . " AND project_status = '$tb_staff'";
            }
        }
        if ($tb_createdate != "") {
            if (empty($_where)) {
                $_where = $_where . " WHERE project_date = '$tb_createdate' ";
            } else {
                $_where = $_where . " AND project_date = '$tb_createdate'";
            }
        }
    }
    

    $_sql = $_sql . $_where . "" . " ORDER BY project_id DESC ";
    $query_search = mysqli_query($conn, $_sql);
// print_r($search);
// print_r($query_search);
    // print_r($_sql);
    ?>
                        <section class="content">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card card-outline card-info">
                                        <div class="card-header ">
                                            <h3 class="card-title font1">
                                                ค้นหา
                                            </h3>
                                        </div>
                                        <div class="card-body">
                                            <form action="project.php" method="POST">
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <div class="form-group ">
                                                            <input type="text" class="form-control " id="searchservice"
                                                                name="searchservice" value="<?php echo $search; ?>"
                                                                placeholder="ค้นหา...">
                                                            <input type="hidden" class="form-control "
                                                                id="search_backup" name="search_backup"
                                                                value="<?php echo $search; ?>">
                                                            <input type="hidden" class="form-control "
                                                                id="project_line_backup" name="project_line_backup"
                                                                value="<?php echo $tb_position; ?>">
                                                            <input type="hidden" class="form-control "
                                                                id="project_cate_backup" name="project_cate_backup"
                                                                value="<?php echo $tb_group; ?>">
                                                            <input type="hidden" class="form-control "
                                                                id="project_sub_backup" name="project_sub_backup"
                                                                value="<?php echo $tb_status; ?>">
                                                            <input type="hidden" class="form-control "
                                                                id="project_staff_backup" name="project_staff_backup"
                                                                value="<?php echo $tb_staff; ?>">
                                                            <input type="hidden" class="form-control "
                                                                id="project_date_backup" name="project_date_backup"
                                                                value="<?php echo $tb_createdate; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-group ">
                                                            <button type="submit" class="btn btn-primary" id="search"
                                                                name="search">ค้นหา</button>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-5">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-2">
                                                        <div class="form-group">
                                                            <label>ผลิตภัณฑ์</label>
                                                            <select class="custom-select select2" name="project_line">
                                                                <option value="">เลือก</option>
                                                                <?php while ($r = mysqli_fetch_array($query_position)) { ?>
                                                                <option value="<?php echo $r["project_line"]; ?>"
                                                                    <?php if ($r['project_line'] == $tb_position) : ?>
                                                                    selected="selected" <?php endif; ?>>
                                                                    <?php echo $r["project_line"]; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="form-group">
                                                            <label>ทีม</label>
                                                            <select class="custom-select select2" name="project_cate">
                                                                <option value="">เลือก</option>
                                                                <?php while ($rg = mysqli_fetch_array($query_group)) { ?>
                                                                <option value="<?php echo $rg["project_team"]; ?>"
                                                                    <?php if ($rg['project_team'] == $tb_group) : ?>
                                                                    selected="selected" <?php endif; ?>>
                                                                    <?php echo $rg["project_team"]; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="form-group">
                                                            <label>จังหวัด</label>
                                                            <select class="custom-select select2" name="project_sub">
                                                                <option value="">เลือก</option>
                                                                <?php while ($re = mysqli_fetch_array($query_status)) { ?>
                                                                <option value="<?php echo $re["project_sub"]; ?>"
                                                                    <?php if ($re['project_sub'] == $tb_status) : ?>
                                                                    selected="selected" <?php endif; ?>>
                                                                    <?php echo $re["project_sub"]; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="form-group">
                                                            <label>สถานะ</label>
                                                            <select class="custom-select select2" name="project_staff">
                                                                <option value="">เลือก</option>
                                                                <?php while ($rt = mysqli_fetch_array($query_staff)) { ?>
                                                                <option value="<?php echo $rt["project_status"]; ?>"
                                                                    <?php if ($rt['project_status'] == $tb_staff) : ?>
                                                                    selected="selected" <?php endif; ?>>
                                                                    <?php echo $rt["project_status"]; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="form-group">
                                                            <label>วันที่สร้าง</label>
                                                            <select class="custom-select select2" name="project_date">
                                                                <option value="">เลือก</option>
                                                                <?php while ($rl = mysqli_fetch_array($query_createdate)) { ?>
                                                                <option value="<?php echo $rl["project_date"]; ?>"
                                                                    <?php if ($rl['project_date'] == $tb_createdate) : ?>
                                                                    selected="selected" <?php endif; ?>>
                                                                    <?php echo $rl["project_date"]; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                            </form>
                                        </div>
                                        <div class="card-footer">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                </div>
                        </section>



                        <div class="col-md-12 pb-3">
                            <a href="project_is.php" class="btn btn-success btn-sm float-right">เพิ่มข้อมูล<i
                                    class=""></i></a>
                        </div><br>


                            <!-- Main content -->
                            <section class="content">

                                <!-- Default box -->
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Projects</h3>

                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                                title="Collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                            <button type="button" class="btn btn-tool" data-card-widget="remove"
                                                title="Remove">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body p-0">
                                        <table class="table table-striped projects">
                                            <thead>
                                                <tr>
                                                    <th style="width: 1%">
                                                        #
                                                    </th>
                                                    <th style="width: 20%">
                                                        Project Name
                                                    </th>
                                                    <th style="width: 30%">
                                                        Team Members
                                                    </th>
                                                    <th>
                                                        Project Progress
                                                    </th>
                                                    <th style="width: 8%" class="text-center">
                                                        Status
                                                    </th>
                                                    <th style="width: 20%">
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        #
                                                    </td>
                                                    <td>
                                                        <a>
                                                            AdminLTE v3
                                                        </a>
                                                        <br />
                                                        <small>
                                                            Created 01.01.2019
                                                        </small>
                                                    </td>
                                                    <td>
                                                        <ul class="list-inline">
                                                            <li class="list-inline-item">
                                                                <img alt="Avatar" class="table-avatar"
                                                                    src="../../dist/img/avatar.png">
                                                            </li>
                                                            <li class="list-inline-item">
                                                                <img alt="Avatar" class="table-avatar"
                                                                    src="../../dist/img/avatar2.png">
                                                            </li>
                                                            <li class="list-inline-item">
                                                                <img alt="Avatar" class="table-avatar"
                                                                    src="../../dist/img/avatar3.png">
                                                            </li>
                                                            <li class="list-inline-item">
                                                                <img alt="Avatar" class="table-avatar"
                                                                    src="../../dist/img/avatar4.png">
                                                            </li>
                                                        </ul>
                                                    </td>
                                                    <td class="project_progress">
                                                        <div class="progress progress-sm">
                                                            <div class="progress-bar bg-green" role="progressbar"
                                                                aria-valuenow="57" aria-valuemin="0" aria-valuemax="100"
                                                                style="width: 57%">
                                                            </div>
                                                        </div>
                                                        <small>
                                                            57% Complete
                                                        </small>
                                                    </td>
                                                    <td class="project-state">
                                                        <span class="badge badge-success">Success</span>
                                                    </td>
                                                    <td class="project-actions text-right">
                                                        <a class="btn btn-primary btn-sm" href="#">
                                                            <i class="fas fa-folder">
                                                            </i>
                                                            View
                                                        </a>
                                                        <a class="btn btn-info btn-sm" href="#">
                                                            <i class="fas fa-pencil-alt">
                                                            </i>
                                                            Edit
                                                        </a>
                                                        <a class="btn btn-danger btn-sm" href="#">
                                                            <i class="fas fa-trash">
                                                            </i>
                                                            Delete
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        #
                                                    </td>
                                                    <td>
                                                        <a>
                                                            AdminLTE v3
                                                        </a>
                                                        <br />
                                                        <small>
                                                            Created 01.01.2019
                                                        </small>
                                                    </td>
                                                    <td>
                                                        <ul class="list-inline">
                                                            <li class="list-inline-item">
                                                                <img alt="Avatar" class="table-avatar"
                                                                    src="../../dist/img/avatar.png">
                                                            </li>
                                                            <li class="list-inline-item">
                                                                <img alt="Avatar" class="table-avatar"
                                                                    src="../../dist/img/avatar2.png">
                                                            </li>
                                                        </ul>
                                                    </td>
                                                    <td class="project_progress">
                                                        <div class="progress progress-sm">
                                                            <div class="progress-bar bg-green" role="progressbar"
                                                                aria-valuenow="47" aria-valuemin="0" aria-valuemax="100"
                                                                style="width: 47%">
                                                            </div>
                                                        </div>
                                                        <small>
                                                            47% Complete
                                                        </small>
                                                    </td>
                                                    <td class="project-state">
                                                        <span class="badge badge-success">Success</span>
                                                    </td>
                                                    <td class="project-actions text-right">
                                                        <a class="btn btn-primary btn-sm" href="#">
                                                            <i class="fas fa-folder">
                                                            </i>
                                                            View
                                                        </a>
                                                        <a class="btn btn-info btn-sm" href="#">
                                                            <i class="fas fa-pencil-alt">
                                                            </i>
                                                            Edit
                                                        </a>
                                                        <a class="btn btn-danger btn-sm" href="#">
                                                            <i class="fas fa-trash">
                                                            </i>
                                                            Delete
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        #
                                                    </td>
                                                    <td>
                                                        <a>
                                                            AdminLTE v3
                                                        </a>
                                                        <br />
                                                        <small>
                                                            Created 01.01.2019
                                                        </small>
                                                    </td>
                                                    <td>
                                                        <ul class="list-inline">
                                                            <li class="list-inline-item">
                                                                <img alt="Avatar" class="table-avatar"
                                                                    src="../../dist/img/avatar.png">
                                                            </li>
                                                            <li class="list-inline-item">
                                                                <img alt="Avatar" class="table-avatar"
                                                                    src="../../dist/img/avatar2.png">
                                                            </li>
                                                            <li class="list-inline-item">
                                                                <img alt="Avatar" class="table-avatar"
                                                                    src="../../dist/img/avatar3.png">
                                                            </li>
                                                        </ul>
                                                    </td>
                                                    <td class="project_progress">
                                                        <div class="progress progress-sm">
                                                            <div class="progress-bar bg-green" role="progressbar"
                                                                aria-valuenow="77" aria-valuemin="0" aria-valuemax="100"
                                                                style="width: 77%">
                                                            </div>
                                                        </div>
                                                        <small>
                                                            77% Complete
                                                        </small>
                                                    </td>
                                                    <td class="project-state">
                                                        <span class="badge badge-success">Success</span>
                                                    </td>
                                                    <td class="project-actions text-right">
                                                        <a class="btn btn-primary btn-sm" href="#">
                                                            <i class="fas fa-folder">
                                                            </i>
                                                            View
                                                        </a>
                                                        <a class="btn btn-info btn-sm" href="#">
                                                            <i class="fas fa-pencil-alt">
                                                            </i>
                                                            Edit
                                                        </a>
                                                        <a class="btn btn-danger btn-sm" href="#">
                                                            <i class="fas fa-trash">
                                                            </i>
                                                            Delete
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        #
                                                    </td>
                                                    <td>
                                                        <a>
                                                            AdminLTE v3
                                                        </a>
                                                        <br />
                                                        <small>
                                                            Created 01.01.2019
                                                        </small>
                                                    </td>
                                                    <td>
                                                        <ul class="list-inline">
                                                            <li class="list-inline-item">
                                                                <img alt="Avatar" class="table-avatar"
                                                                    src="../../dist/img/avatar.png">
                                                            </li>
                                                            <li class="list-inline-item">
                                                                <img alt="Avatar" class="table-avatar"
                                                                    src="../../dist/img/avatar2.png">
                                                            </li>
                                                            <li class="list-inline-item">
                                                                <img alt="Avatar" class="table-avatar"
                                                                    src="../../dist/img/avatar3.png">
                                                            </li>
                                                            <li class="list-inline-item">
                                                                <img alt="Avatar" class="table-avatar"
                                                                    src="../../dist/img/avatar4.png">
                                                            </li>
                                                        </ul>
                                                    </td>
                                                    <td class="project_progress">
                                                        <div class="progress progress-sm">
                                                            <div class="progress-bar bg-green" role="progressbar"
                                                                aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"
                                                                style="width: 60%">
                                                            </div>
                                                        </div>
                                                        <small>
                                                            60% Complete
                                                        </small>
                                                    </td>
                                                    <td class="project-state">
                                                        <span class="badge badge-success">Success</span>
                                                    </td>
                                                    <td class="project-actions text-right">
                                                        <a class="btn btn-primary btn-sm" href="#">
                                                            <i class="fas fa-folder">
                                                            </i>
                                                            View
                                                        </a>
                                                        <a class="btn btn-info btn-sm" href="#">
                                                            <i class="fas fa-pencil-alt">
                                                            </i>
                                                            Edit
                                                        </a>
                                                        <a class="btn btn-danger btn-sm" href="#">
                                                            <i class="fas fa-trash">
                                                            </i>
                                                            Delete
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        #
                                                    </td>
                                                    <td>
                                                        <a>
                                                            AdminLTE v3
                                                        </a>
                                                        <br />
                                                        <small>
                                                            Created 01.01.2019
                                                        </small>
                                                    </td>
                                                    <td>
                                                        <ul class="list-inline">
                                                            <li class="list-inline-item">
                                                                <img alt="Avatar" class="table-avatar"
                                                                    src="../../dist/img/avatar.png">
                                                            </li>
                                                            <li class="list-inline-item">
                                                                <img alt="Avatar" class="table-avatar"
                                                                    src="../../dist/img/avatar4.png">
                                                            </li>
                                                            <li class="list-inline-item">
                                                                <img alt="Avatar" class="table-avatar"
                                                                    src="../../dist/img/avatar5.png">
                                                            </li>
                                                        </ul>
                                                    </td>
                                                    <td class="project_progress">
                                                        <div class="progress progress-sm">
                                                            <div class="progress-bar bg-green" role="progressbar"
                                                                aria-valuenow="12" aria-valuemin="0" aria-valuemax="100"
                                                                style="width: 12%">
                                                            </div>
                                                        </div>
                                                        <small>
                                                            12% Complete
                                                        </small>
                                                    </td>
                                                    <td class="project-state">
                                                        <span class="badge badge-success">Success</span>
                                                    </td>
                                                    <td class="project-actions text-right">
                                                        <a class="btn btn-primary btn-sm" href="#">
                                                            <i class="fas fa-folder">
                                                            </i>
                                                            View
                                                        </a>
                                                        <a class="btn btn-info btn-sm" href="#">
                                                            <i class="fas fa-pencil-alt">
                                                            </i>
                                                            Edit
                                                        </a>
                                                        <a class="btn btn-danger btn-sm" href="#">
                                                            <i class="fas fa-trash">
                                                            </i>
                                                            Delete
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        #
                                                    </td>
                                                    <td>
                                                        <a>
                                                            AdminLTE v3
                                                        </a>
                                                        <br />
                                                        <small>
                                                            Created 01.01.2019
                                                        </small>
                                                    </td>
                                                    <td>
                                                        <ul class="list-inline">
                                                            <li class="list-inline-item">
                                                                <img alt="Avatar" class="table-avatar"
                                                                    src="../../dist/img/avatar.png">
                                                            </li>
                                                            <li class="list-inline-item">
                                                                <img alt="Avatar" class="table-avatar"
                                                                    src="../../dist/img/avatar2.png">
                                                            </li>
                                                            <li class="list-inline-item">
                                                                <img alt="Avatar" class="table-avatar"
                                                                    src="../../dist/img/avatar3.png">
                                                            </li>
                                                            <li class="list-inline-item">
                                                                <img alt="Avatar" class="table-avatar"
                                                                    src="../../dist/img/avatar4.png">
                                                            </li>
                                                        </ul>
                                                    </td>
                                                    <td class="project_progress">
                                                        <div class="progress progress-sm">
                                                            <div class="progress-bar bg-green" role="progressbar"
                                                                aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"
                                                                style="width: 35%">
                                                            </div>
                                                        </div>
                                                        <small>
                                                            35% Complete
                                                        </small>
                                                    </td>
                                                    <td class="project-state">
                                                        <span class="badge badge-success">Success</span>
                                                    </td>
                                                    <td class="project-actions text-right">
                                                        <a class="btn btn-primary btn-sm" href="#">
                                                            <i class="fas fa-folder">
                                                            </i>
                                                            View
                                                        </a>
                                                        <a class="btn btn-info btn-sm" href="#">
                                                            <i class="fas fa-pencil-alt">
                                                            </i>
                                                            Edit
                                                        </a>
                                                        <a class="btn btn-danger btn-sm" href="#">
                                                            <i class="fas fa-trash">
                                                            </i>
                                                            Delete
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        #
                                                    </td>
                                                    <td>
                                                        <a>
                                                            AdminLTE v3
                                                        </a>
                                                        <br />
                                                        <small>
                                                            Created 01.01.2019
                                                        </small>
                                                    </td>
                                                    <td>
                                                        <ul class="list-inline">
                                                            <li class="list-inline-item">
                                                                <img alt="Avatar" class="table-avatar"
                                                                    src="../../dist/img/avatar4.png">
                                                            </li>
                                                            <li class="list-inline-item">
                                                                <img alt="Avatar" class="table-avatar"
                                                                    src="../../dist/img/avatar5.png">
                                                            </li>
                                                        </ul>
                                                    </td>
                                                    <td class="project_progress">
                                                        <div class="progress progress-sm">
                                                            <div class="progress-bar bg-green" role="progressbar"
                                                                aria-valuenow="87" aria-valuemin="0" aria-valuemax="100"
                                                                style="width: 87%">
                                                            </div>
                                                        </div>
                                                        <small>
                                                            87% Complete
                                                        </small>
                                                    </td>
                                                    <td class="project-state">
                                                        <span class="badge badge-success">Success</span>
                                                    </td>
                                                    <td class="project-actions text-right">
                                                        <a class="btn btn-primary btn-sm" href="#">
                                                            <i class="fas fa-folder">
                                                            </i>
                                                            View
                                                        </a>
                                                        <a class="btn btn-info btn-sm" href="#">
                                                            <i class="fas fa-pencil-alt">
                                                            </i>
                                                            Edit
                                                        </a>
                                                        <a class="btn btn-danger btn-sm" href="#">
                                                            <i class="fas fa-trash">
                                                            </i>
                                                            Delete
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        #
                                                    </td>
                                                    <td>
                                                        <a>
                                                            AdminLTE v3
                                                        </a>
                                                        <br />
                                                        <small>
                                                            Created 01.01.2019
                                                        </small>
                                                    </td>
                                                    <td>
                                                        <ul class="list-inline">
                                                            <li class="list-inline-item">
                                                                <img alt="Avatar" class="table-avatar"
                                                                    src="../../dist/img/avatar.png">
                                                            </li>
                                                            <li class="list-inline-item">
                                                                <img alt="Avatar" class="table-avatar"
                                                                    src="../../dist/img/avatar3.png">
                                                            </li>
                                                            <li class="list-inline-item">
                                                                <img alt="Avatar" class="table-avatar"
                                                                    src="../../dist/img/avatar4.png">
                                                            </li>
                                                        </ul>
                                                    </td>
                                                    <td class="project_progress">
                                                        <div class="progress progress-sm">
                                                            <div class="progress-bar bg-green" role="progressbar"
                                                                aria-valuenow="77" aria-valuemin="0" aria-valuemax="100"
                                                                style="width: 77%">
                                                            </div>
                                                        </div>
                                                        <small>
                                                            77% Complete
                                                        </small>
                                                    </td>
                                                    <td class="project-state">
                                                        <span class="badge badge-success">Success</span>
                                                    </td>
                                                    <td class="project-actions text-right">
                                                        <a class="btn btn-primary btn-sm" href="#">
                                                            <i class="fas fa-folder">
                                                            </i>
                                                            View
                                                        </a>
                                                        <a class="btn btn-info btn-sm" href="#">
                                                            <i class="fas fa-pencil-alt">
                                                            </i>
                                                            Edit
                                                        </a>
                                                        <a class="btn btn-danger btn-sm" href="#">
                                                            <i class="fas fa-trash">
                                                            </i>
                                                            Delete
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        #
                                                    </td>
                                                    <td>
                                                        <a>
                                                            AdminLTE v3
                                                        </a>
                                                        <br />
                                                        <small>
                                                            Created 01.01.2019
                                                        </small>
                                                    </td>
                                                    <td>
                                                        <ul class="list-inline">
                                                            <li class="list-inline-item">
                                                                <img alt="Avatar" class="table-avatar"
                                                                    src="../../dist/img/avatar.png">
                                                            </li>
                                                            <li class="list-inline-item">
                                                                <img alt="Avatar" class="table-avatar"
                                                                    src="../../dist/img/avatar3.png">
                                                            </li>
                                                            <li class="list-inline-item">
                                                                <img alt="Avatar" class="table-avatar"
                                                                    src="../../dist/img/avatar4.png">
                                                            </li>
                                                            <li class="list-inline-item">
                                                                <img alt="Avatar" class="table-avatar"
                                                                    src="../../dist/img/avatar5.png">
                                                            </li>
                                                        </ul>
                                                    </td>
                                                    <td class="project_progress">
                                                        <div class="progress progress-sm">
                                                            <div class="progress-bar bg-green" role="progressbar"
                                                                aria-valuenow="77" aria-valuemin="0" aria-valuemax="100"
                                                                style="width: 77%">
                                                            </div>
                                                        </div>
                                                        <small>
                                                            77% Complete
                                                        </small>
                                                    </td>
                                                    <td class="project-state">
                                                        <span class="badge badge-success">Success</span>
                                                    </td>
                                                    <td class="project-actions text-right">
                                                        <a class="btn btn-primary btn-sm" href="#">
                                                            <i class="fas fa-folder">
                                                            </i>
                                                            View
                                                        </a>
                                                        <a class="btn btn-info btn-sm" href="#">
                                                            <i class="fas fa-pencil-alt">
                                                            </i>
                                                            Edit
                                                        </a>
                                                        <a class="btn btn-danger btn-sm" href="#">
                                                            <i class="fas fa-trash">
                                                            </i>
                                                            Delete
                                                        </a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->

                            </section>
                            <!-- /.content -->



                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


    <!----------------------------- start menu ------------------------------->
    <?php include ("../ino/templated/footer.php");?>
    <!----------------------------- end menu --------------------------------->

    <!-- highlight -->
    <script src="code/dist/js/highlight.js"></script>

    <script>
    $("#myTable tr").highlight();
    </script>
    <!-- highlight -->