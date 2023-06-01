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
                        <h1>INOvation Management</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active">Innovation</li>
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

                                                            
                                    <!-- Main content -->
                                    <section class="content">
                                        <div class="container-fluid">
                                            <!-- Small boxes (Stat box) -->
                                            <div class="row">
                                                
                                                <div class="col-lg-3 col-6">
                                                    <!-- small box -->
                                                    <div class="small-box bg-warning">

                                                        <!-- Qeury Count All Service -->
                                                        <?php 
                                                                $query2 = "SELECT COUNT(`project_name`) as AMP FROM tb_project ";
                                                                $query1 = $query2 . $_where . "" . " ORDER BY project_id DESC ";
                                                                $result = mysqli_query($conn, $query1);
                                                                $rs = mysqli_fetch_array($result);
                                                                $a = $rs['AMP'];
                                                        ?>

                                                        <div class="inner">
                                                            <h3><?php echo number_format( $a, 0 ) ; ?></h3>

                                                            <p>จำนวนโครงการ </p>
                                                        </div>
                                                        <div class="icon">
                                                            <i class="ion ion-person-add"></i>
                                                        </div>
                                                        <a href="#" class="small-box-footer"></i></a>
                                                    </div>
                                                </div>
                                                <!-- ./col -->

                                                <!-- ------------------------------------------------------------------------------------------------------------------ -->

                                                <div class="col-lg-3 col-6">
                                                    <!-- small box -->
                                                    <div class="small-box bg-danger">

                                                       <!-- Qeury Count All Service -->
                                                        <?php 
                                                            
                                                            $query = "SELECT SUM(`project_cost`) as AMP FROM tb_project ";
                                                            $query1 = $query . $_where . "" . " ORDER BY project_id DESC ";
                                                            $result = mysqli_query($conn, $query1);
                                                            $ls = mysqli_fetch_array($result);   
                                                            $a = $ls['AMP'];                               
                                                        ?>

                                                        <div class="inner">
                                                            <h3><?php echo number_format( $a, 0 ) ; ?></h3>

                                                            <p>สรุปยอดขายทั้งหมด  </p>
                                                        </div>
                                                        <div class="icon">
                                                            <i class="ion ion-pie-graph"></i>
                                                        </div>
                                                        <a href="#" class="small-box-footer"></i></a>
                                                    </div>
                                                </div>
                                                <!-- ./col -->
                                            </div>

                                            <!-- ------------------------------------------------------------------------------------------------------------------ -->
                                        </div><!-- /.container-fluid -->
                                    </section>
                                    <!-- /.content -->

                        <div class="col-md-12 pb-3">
                            <a href="project_is.php" class="btn btn-success btn-sm float-right">เพิ่มข้อมูล<i
                                    class=""></i></a>
                        </div><br>

                        <div class="card">
                            <div class="card-header">
                                <div class="container-fluid">
                                    <h3 class="card-title">INO | Project</h3> <br><br>

                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                            <th>ผลิตภัณฑ์</th>
                                            <th>หมวด</th>
                                            <th>จังหวัด</th>
                                            <th>เลขที่สัญญา</th>
                                            <th>โครงการ</th>
                                            <th>มูลค่า</th>
                                            <th>สถานะ</th>
                                            <th>ผู้ดูแลโครงการ</th>
                                            <th>วันที่สร้าง</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php while ($res_search = mysqli_fetch_array($query_search)) { ?>
                                        
                                        <tr id="myTable">
                                        <td><a href="project_view.php?id=<?php echo $res_search["project_id"]; ?>&id_f=<?php echo $res_search["project_line"]; ?>&id_c=<?php echo $res_search["project_cate"]; ?>"><?php echo $res_search["project_line"]; ?></a></td>
                                            <td><a href="project_view.php?id=<?php echo $res_search["project_id"]; ?>&id_f=<?php echo $res_search["project_line"]; ?>&id_c=<?php echo $res_search["project_cate"]; ?>"><?php echo $res_search["project_cate"]; ?></a></td>
                                            <td><a href="project_view.php?id=<?php echo $res_search["project_id"]; ?>&id_f=<?php echo $res_search["project_line"]; ?>&id_c=<?php echo $res_search["project_cate"]; ?>"><?php echo $res_search["project_sub"]; ?></a></td>
                                            <td><a href="project_view.php?id=<?php echo $res_search["project_id"]; ?>&id_f=<?php echo $res_search["project_line"]; ?>&id_c=<?php echo $res_search["project_cate"]; ?>"><?php echo $res_search["project_in"]; ?></a></td>
                                            <td><a href="project_view.php?id=<?php echo $res_search["project_id"]; ?>&id_f=<?php echo $res_search["project_line"]; ?>&id_c=<?php echo $res_search["project_cate"]; ?>"><?php echo $res_search["project_name"];?></a></td>
                                            <td><a href="project_view.php?id=<?php echo $res_search["project_id"]; ?>&id_f=<?php echo $res_search["project_line"]; ?>&id_c=<?php echo $res_search["project_cate"]; ?>"><?php echo number_format( $res_search["project_cost"], 0 ) ; ?></a></td>
                                            <td><a href="project_view.php?id=<?php echo $res_search["project_id"]; ?>&id_f=<?php echo $res_search["project_line"]; ?>&id_c=<?php echo $res_search["project_cate"]; ?>"><?php echo $res_search["project_status"]; ?></a></td>
                                            <td><a href="project_view.php?id=<?php echo $res_search["project_id"]; ?>&id_f=<?php echo $res_search["project_line"]; ?>&id_c=<?php echo $res_search["project_cate"]; ?>"><?php echo $res_search["project_staff"]; ?></a></td>
                                            <td><a href="project_view.php?id=<?php echo $res_search["project_id"]; ?>&id_f=<?php echo $res_search["project_line"]; ?>&id_c=<?php echo $res_search["project_cate"]; ?>"><?php echo $res_search["project_date"]; ?></a></td>
                                            <td>
                                            <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-default<?php echo $res_search["project_id"]; ?>"><i class="fas fa-eye"></i></a>
                                                <div class="modal fade"
                                                    id="modal-default<?php echo $res_search["project_id"]; ?>">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">
                                                                    <?php echo $res_search["project_name"]; ?></h4>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                    <b><span class="text-primary">ข้อมูลโครงการ</b></span> <p>
                                                                        <p><b>สถานะโครงการ :</b> <?php echo $res_search["project_status"]; ?></p>
                                                                        <p><b>ชื่องาน :</b> <?php echo $res_search["project_line"]; ?></p>
                                                                        <p><b>ชื่องานขาย :</b>  <?php echo $res_search["project_cate"]; ?></p>
                                                                        <p><b>ชื่องานขาย :</b>  <?php echo $res_search["project_in"]; ?></p>
                                                                        <p><b>ชื่อโครงการ :</b> <?php echo $res_search["project_name"]; ?></p>
                                                                        <p><b>ระยะเวลาโครงการ :</b> <?php echo $res_search["project_start"]; ?> To </b> <?php echo $res_search["project_end"]; ?> </p>
                                                                        <p><b>งบประมาณโครงการ :</b> <?php echo $res_search["project_cost"]; ?></p>
                                                                        <p><b>เงื่อนไขการชำระเงิน :</b> <?php echo $res_search["project_pay"]; ?></p>
                                                                        <p><b>รายละเอีดยโครงการ :</b> <?php echo $res_search["project_detail"]; ?></p>
                                                                        <p><b>ผู้รับผิดชอบโครกงาร :</b> <?php echo $res_search["project_staff"]; ?></p>
                                                                        <p><b>วันบันทึก :</b> <?php echo $res_search["project_date"]; ?></p>
                                                                        <p><span class="text-Suscess">------------------------------------------------------------------------------------</span></p>
                                                                        <b><span class="text-primary">ข้อมูลลูกค้า</b></span> <p>
                                                                        <p><b>ชื่อลูกค้า :</b> <?php echo $res_search["contact_name"]; ?></p>
                                                                        <p><b>บริษัท:</b>  <?php echo $res_search["contact_company"]; ?></p>
                                                                        <p><b>ตำแหน่ง :</b> <?php echo $res_search["contact_position"]; ?></p>
                                                                        <p><b>เบอร์โทรศัทพ์ :</b> <?php echo $res_search["contact_phone"]; ?></p>
                                                                        <p><b>Email :</b> <?php echo $res_search["contact_email"]; ?></p>
                                                                        <p><b>ที่อยู่ :</b> <?php echo $res_search["contact_detail"]; ?></p>
                                                                    </div>
                                                                <div class="modal-footer justify-content-between"> <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> </div>                           
                                                        </div>
                                                        <!-- /.modal-content -->
                                                    </div>
                                                    <!-- /.modal-dialog -->
                                                </div>
                                                <!-- /.modal -->
                                            <a href="project_edit.php?id=<?php echo $res_search["project_id"]; ?>" class="btn btn-info btn-sm"><i class="fas fa-pencil-alt"></i></a>
                                            <a href="project.php?id=<?php echo $res_search["project_id"]; ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                                            </td>
                                            

                                        </tr>
                                        <?php } ?>

                                    </tbody>
                                    <tfoot>
                                    <tr>
                                            <th>ผลิตภัณฑ์</th>
                                            <th>หมวด</th>
                                            <th>จังหวัด</th>
                                            <th>เลขที่สัญญา</th>
                                            <th>โครงการ</th>
                                            <th>มูลค่า</th>
                                            <th>สถานะ</th>
                                            <th>ผู้ดูแลโครงการ</th>
                                            <th>วันที่สร้าง</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
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