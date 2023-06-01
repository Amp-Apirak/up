<!DOCTYPE html>
<html lang="en">
<?php $menu = "project"; ?>

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









<link rel="stylesheet" href="../ino/code/dist/css/lightbox.min.css">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>INOvation | Projects Detail</title>


    <!----------------------------- start header ------------------------------->
    <?php include("../ino/templated/head.php"); ?>
    <!----------------------------- end header --------------------------------->

    <!----------------------------- start menu ------------------------------->
    <?php include("../ino/templated/menu.php"); ?>
    <!----------------------------- end menu --------------------------------->


    <?php
/* การลบข้อมูล */
if (isset($_GET['files_id'])) {

    $result = $conn->query("DELETE FROM tb_files WHERE files_id=" . $_GET['files_id']);

    if ($result) {
        //     // <!-- sweetalert -->
            echo '<script>
                    setTimeout(function(){
                        swal({
                            title: "Save Successfully!",
                            text: "Thank You . ",
                            type:"success"
                        }, function(){
                            window.location = "project_view.php?id='.$_GET['id'].'";
                        })
                    },1000);
                </script>';
        //     // echo "<script>alert('ยินดีตอนรับ Admin เข้าสู่ระบบ'); window.location='../index.php'</script>";
        } else {
        //     // <!-- sweetalert -->
            echo '<script>
                    setTimeout(function(){
                        swal({
                            title: "Can Not Save Successfully!",
                            text: "Checking Your Data",
                            type:"warning"
                        }, function(){
                            window.location = "project_view.php?id='.$_GET['id'].'";
                        })
                    },1000);
                </script>';
        //     // echo "<script>alert('ยินดีตอนรับ Admin เข้าสู่ระบบ'); window.location='../index.php'</script>";
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
                        <h1>Projects Detail</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Projects Detail</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <?php

if (isset($_GET['id'])) {
$_sql = "SELECT * FROM tb_project WHERE project_id=" . $_GET['id'];
$query_search = mysqli_query($conn, $_sql);
 while ($res_search = mysqli_fetch_array($query_search)) { 
?>


        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <!-- Main content -->
                        <div class="invoice p-3 mb-3">
                            <!-- title row -->
                            <div class="row">
                                <div class="col-12">
                                    <h4>
                                        <i class="image">
                                            <img src="../ino/img/pit.png" width=“60px” height='50' alt="User Image">
                                            <!-- class="img-circle elevation-2" -->
                                        </i> Point IT
                                        <small class="float-right">Date:
                                            <?php echo $res_search["project_date"]; ?></small>
                                    </h4>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- info row -->
                            <div class="row invoice-info">
                                <div class="col-sm-5 invoice-col">
                                    From
                                    <address>
                                        <strong><?php echo $res_search["project_staff"]; ?></strong><br>
                                        19 ซอย สุภาพงษ์ 1 แยก 6 แขวง หนองบอน เขต ประเวศ <br>
                                        กรุงเทพมหานคร 10250 <br>

                                        Phone: (804) 123-5432<br>
                                        Email: info@pointit.co.th
                                    </address>
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-5 invoice-col">
                                    To
                                    <address>
                                        <strong><?php echo $res_search["contact_name"]; ?></strong><br>
                                        <?php echo $res_search["contact_detail"]; ?><br>
                                        <?php echo $res_search["contact_company"]; ?><br>
                                        Phone: <?php echo $res_search["contact_phone"]; ?><br>
                                        Email: <?php echo $res_search["contact_email"]; ?>
                                    </address>
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-2 invoice-col">
                                    <b>เลขที่สัญญา : <?php echo $res_search["project_in"]; ?></b><br>
                                    <br>
                                    <b>สถานะโครงการ : </b><?php echo $res_search["project_status"]; ?><br>
                                    <b>ระยะเวลาของโครงการ:</b> <?php echo $res_search["project_start"]; ?> TO
                                    <?php echo $res_search["project_end"]; ?><br>

                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->


                            <div class="col-md-12 pb-3">
                                <a href="file_is.php?id=<?php echo $res_search["project_id"]; ?>"
                                    class="btn btn-success btn-sm float-right">เพิ่มข้อมูล<i class=""></i></a>
                            </div><br>


                            <!-- Table row -->
                            <div class="card">

                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>วันที่บันทึกข้อมูล</th>
                                                <th>ประเภทไฟล์</th>
                                                <th>รายละเอียดโครงการ</th>
                                                <th>ผู้บันทึกโครงการ</th>
                                                <th>ชื่อ Folder</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <!-- ดึงข้อมูลมาแสดง -->
                                        <?php 
                                    if (isset($_GET['id'])) {
                                        $sql = "SELECT * FROM tb_files  WHERE file_pk=" . $_GET['id'] ;
                                        $_sql = $sql . " ORDER BY  files_id DESC";
                                        $query_search = mysqli_query($conn, $_sql);
                                        
                                ?>

                                        <tbody>
                                            <?php while ($res = mysqli_fetch_array($query_search)) {  ?>
                                            <tr id="myTable">

                                                <td><?php echo $res["file_date"]; ?></td>
                                                <td><?php echo $res["file_type"]; ?></td>
                                                <td><a target="_blank"
                                                        href="<?php echo $res["file_link"]; ?>"><?php echo $res["file_name"]; ?></a>
                                                </td>
                                                <td><?php echo $res["file_staff"]; ?></td>
                                                <td><?php echo $res["file_status"]; ?></td>


                                                <td>
                                                    <a href="file_edit.php?files_id=<?php echo $res["files_id"]; ?>&id=<?php echo $res_search["project_id"]; ?>"
                                                        class="btn btn-info btn-sm"><i
                                                            class="fas fa-pencil-alt"></i></a>
                                                    <a href="project_view.php?files_id=<?php echo $res["files_id"]; ?>&id=<?php echo $res_search["project_id"]; ?>"
                                                        class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                                                    <a target="_blank" href="../ino/file/<?php echo $res["file_upfile"]; ?>"
                                                        class="btn btn-warning btn-sm"><i class="fa fa-file"
                                                            aria-hidden="true"></i>
                                                </td>

                                            </tr>

                                            <?php } ?>
                                            <?php } ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>วันที่บันทึกข้อมูล</th>
                                                <th>ประเภทไฟล์</th>
                                                <th>รายละเอียดโครงการ</th>
                                                <th>ผู้บันทึกโครงการ</th>
                                                <th>ชื่อ Folder</th>
                                                <th>Action</th>
                                            </tr>


                                        </tfoot>
                                    </table>

                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                            <!-- /.row -->



                            <div class="row">
                                <!-- accepted payments column -->
                                <div class="col-6">
                                    <p class="lead"><b>Project :</b></p>
                                    <h6><?php echo $res_search["project_name"]; ?></h6>

                                    <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                                        <?php echo $res_search["project_name"]; ?>
                                        <?php $lam = explode(PHP_EOL, $res_search["project_detail"]);
                                                                        for ($i = 0; $i < count($lam); $i++) { ?>
                                        <?php echo $lam[$i]; ?></br>
                                        <?php } ?>
                                    </p>
                                </div>
                                <!-- /.col -->
                                <div class="col-6">
                                    <p class="lead"><b>Cost :</b></p>

                                    <div class="table-responsive">
                                        <table class="table">
                                            <tr>
                                                <th style="width:50%">Subtotal:</th>
                                                <td><?php echo number_format(  $res_search["project_cost"], 0 ) ; ?> .-</td>
                                            </tr>
                                            <tr>
                                                <th>Total:</th>
                                                <td> <?php echo number_format(  $res_search["project_cost"], 0 ) ; ?>  .-</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                            <div class="row">
                                <!-- accepted payments column -->
                                <div class="col-6">
                                    <p class="lead"><b>Saler :</b></p>
                                    <div class="col-sm-5 invoice-col">
                                        <address>
                                            <strong>คุณ <?php echo $res_search["sale_name"]; ?> </strong><br>
                                            <?php echo $res_search["sale_detail"]; ?><br>
                                            Phone:<?php echo $res_search["sale_phone"]; ?><br>
                                            Email: <?php echo $res_search["sale_email"]; ?>
                                        </address>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.col -->

                            </div>
                            <!-- /.row -->

                            <!-- this row will not appear when printing -->
                            <div class="row no-print">
                                <div class="col-12">
                                    <a href="invoice-print.html" rel="noopener" target="_blank"
                                        class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                                    <button type="button" class="btn btn-success float-right"><i
                                            class="far fa-credit-card"></i> Submit
                                        Payment
                                    </button>
                                    <button type="button" class="btn btn-primary float-right"
                                        style="margin-right: 5px;">
                                        <i class="fas fa-download"></i> Generate PDF
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- /.invoice -->
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="col-md-12 pb-3">
                            <a href="upfile_is.php?id=<?php echo $res_search["project_id"]; ?>"
                                class="btn btn-success btn-sm float-right">เพิ่มรูปภาพโครงการ<i class=""></i></a>
                        </div><br>
                    </div>


                    <div class="col-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h4 class="card-title">แสดงรูปภาพประกอบโครงการ</h4>
                            </div>
                            <div class="card-body">
                                <div>
                                    <div class="filter-container p-0 row">



                                        <?php
                                        if (isset($_GET['id'])) {
                                            $result = $conn->query("SELECT * FROM tb_upfile WHERE Project_id=" . $_GET['id']); /*INNER JOIN resolve_cat ON(service_cat.id_sub = resolve_cat.id_sub) */            
                                            while ($sr = $result->fetch_object()) {  
                                    ?>
                                        <div class="mx-auto mb-2">
                                        <td>

                                            <a href="../ino/image/<?= $sr->upfile; ?>" data-lightbox="image-1"
                                                data-title="<?= $sr->upfile_sub; ?>  (<?= $sr->upfile_date; ?>)"
                                                class="img-fluid">
                                                <img width="200" height="150" src="../ino/image/<?= $sr->upfile; ?>">
                                            </a>
                                            </a>
                                        </td>
                                    </div>
                                        <?php } ?>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.container-fluid  /*width=200 height="400" -->
        </section>
        <!-- /.content -->


    </div>
    <!-- /.content-wrapper -->
    <!-- /.content -->

    <?php } ?>
    <?php } ?>

    <!----------------------------- start menu ------------------------------->
    <?php include("../ino/templated/footer.php"); ?>
    <!----------------------------- end menu --------------------------------->

    <!-- Ekko Lightbox -->
    <script src="../ino/code/plugins/ekko-lightbox/ekko-lightbox.min.js"></script>
    <script src="../ino/code/plugins/filterizr/jquery.filterizr.min.js"></script>

    <script>
    $(function() {
        $(document).on('click', '[data-toggle="lightbox"]', function(event) {
            event.preventDefault();
            $(this).ekkoLightbox({
                alwaysShowClose: true
            });
        });

        $('.filter-container').filterizr({
            gutterPixels: 3
        });
        $('.btn[data-filter]').on('click', function() {
            $('.btn[data-filter]').removeClass('active');
            $(this).addClass('active');
        });
    })
    </script>

    <script src="../ino/code/dist/js/lightbox.min.js"></script>


    <!-- highlight -->
    <script src="code/dist/js/highlight.js"></script>

    <script>
    $("#myTable tr").highlight();
    </script>
    <!-- highlight -->