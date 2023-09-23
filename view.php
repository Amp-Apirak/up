<!DOCTYPE html>
<html lang="en">
<?php $menu = "pipeline"; ?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>INOvation | Pipeline description</title>


    <!----------------------------- start header ------------------------------->
    <?php include("../ino/templated/head.php"); ?>
    <!----------------------------- end header --------------------------------->

    <!----------------------------- start menu ------------------------------->
    <?php include("../ino/templated/menu.php"); ?>
    <!----------------------------- end menu --------------------------------->


    <?php
    if (isset($_POST['submit1'])) { /* ถ้า POST มีการกด Submit1 ให้ทำส่วนล่าง */
        /* ประกาศตัวแปลเก็บค่า  POST ที่รับมาจาก INPUT  */
        $pip_id  = $_POST['pip_id'];
        $pip_ps  = $_POST['pip_ps'];
        $pip_month = $_POST['pip_month'];
        $pip_pst = $_POST['pip_pst'];
        $pip_psw = $_POST['pip_psw'];
        

        //print_r($_POST);
        //check duplicat
        $sql =  "INSERT INTO `pip_period` (`p_id`, `pip_id`,`pip_ps`, `pip_month`, `pip_pst`, `pip_psw`) 
                                    VALUES (NULL, '$pip_id', '$pip_ps', '$pip_month', '$pip_pst', '$pip_psw')";

        // print_r($result); 
        // print_r($num);
        //ถ้า username ซ้ำ ให้เด้งกลับไปหน้าสมัครสมาชิก ปล.ข้อความใน sweetalert ปรับแต่งได้ตามความเหมาะสม
        $result = $conn->query($sql);

    } //isset 
    //devbanban.com
    ?>

    <!----------------------------- start Project description ------------------------------->
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Pipeline description</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Pipeline description</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="callout callout-info">
                            <h5><i class="fas fa-info"></i> Note:</h5>
                            This page is a project details page and a project sales budget page for evaluating the
                            status of a job.
                        </div>

                        <!-- /.Get ID From -->
                        <?php
                        if (isset($_GET['id'])) {
                            $_sql = "SELECT * FROM pipeline LEFT JOIN contact On (pipeline.contact_id = contact.contact_id) WHERE pip_id=" . $_GET['id'];
                            $query_search = mysqli_query($conn, $_sql);
                            // print_r($_sql);
                            // print_r($query_search);
                            while ($res_search = mysqli_fetch_array($query_search)) {

                        ?>



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
                                                <small><span class='badge badge-secondary float-right'>Create Date :
                                                        <?php echo $res_search["pip_date"]; ?></span></small>
                                            </h4>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <!-- info row -->
                                    <b>Project :</b> <?php echo $res_search["project_name"]; ?>
                                    <div class="row invoice-info">
                                        <div class="col-sm-4 invoice-col">
                                            From
                                            <address>
                                                <strong><?php echo $res_search["pip_staff"]; ?></strong><br>
                                                19 ซอย สุภาพงษ์ 1 แยก 6 แขวง หนองบอน เขต ประเวศ <br>
                                                กรุงเทพมหานคร 10250 <br>

                                                Phone: (804) 123-5432<br>
                                                Email: info@pointit.co.th
                                            </address>
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-sm-4 invoice-col">
                                            To
                                            <address>
                                                <strong><?php echo $res_search["contact_fullname"]; ?></strong><br>
                                                <?php echo $res_search["contact_company"]; ?>
                                                <?php echo $res_search["contact_detail"]; ?><br>
                                                <?php echo $res_search["contact_position"]; ?>
                                                <?php echo $res_search["contact_agency"]; ?><br>
                                                Phone: <?php echo $res_search["contact_tel"]; ?><br>
                                                Email: <?php echo $res_search["contact_email"]; ?>
                                            </address>
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-sm-4 invoice-col">
                                            <b>Contact Number : <?php echo $res_search["con_number"]; ?></b><br>
                                            <br>
                                            <b>Status:</b>
                                            <?php
                                            if ($res_search["status"] == 'Wiating for approve') {
                                                echo "<span class='badge badge-secondary'>{$res_search["status"]}</span>";
                                            } elseif ($res_search["status"] == 'On Process') {
                                                echo "<span class='badge badge-info'>{$res_search["status"]}</span>";
                                            } elseif ($res_search["status"] == 'On-Hold') {
                                                echo "<span class='badge badge-warning'>{$res_search["status"]}</span>";
                                            } elseif ($res_search["status"] == 'Done') {
                                                echo "<span class='badge badge-success'>{$res_search["status"]}</span>";
                                            }
                                            ?>
                                            <br>
                                            <b>Date Start:</b> <?php echo $res_search["date_start"]; ?><br>
                                            <b>Date End:</b> <?php echo $res_search["date_end"]; ?>


                                            <div class="col col-12 mb-5">
                                                <a href="pipeline_view.php?id=<?php echo $res_search["pip_id"]; ?>" class="btn btn-success btn-sm float-right" data-toggle="modal" data-target="#editbtn"> Add <i class=""></i></a>
                                            </div>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <!-- /.row -->

                                    <!-- Table row -->
                                    <div class="row">
                                        <div class="col-8 table-responsive">

                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th scope="col" class="text-nowrap " height="" width="">Pipeline Descriptions</th>
                                                        <th scope="col" class="text-nowrap text-center  " height="" width="">ราคา(ไม่รวมภาษี)/บาท</th>
                                                        <th scope="col" class="text-nowrap text-center  " height="" width="">ภาษี</th>
                                                        <th scope="col" class="text-nowrap text-center  " height="" width="">ราคา(รวมภาษี)/บาท</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th scope="row">
                                                            <h6> ราคาเสนอขาย (Sale Price) </h6>
                                                        </th>
                                                        <td scope="col" class="text-nowrap text-center  " height="" width=""> <?php echo number_format($res_search["pip_salen"], 0); ?></td>
                                                        <td scope="col" class="text-nowrap text-center  " height="" width=""> <?php echo number_format($res_search["pip_vat"], 0); ?> %</td>
                                                        <td scope="col" class="text-nowrap text-center  " height="" width=""> <?php echo number_format($res_search["pip_sale"], 0); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">
                                                            <h6>ราคาต้นทุนโครงการ (Cost Price)</h6>
                                                        </th>
                                                        <td scope="col" class="text-nowrap text-center  " height="" width=""> <?php echo number_format($res_search["pip_costn"], 0); ?></td>
                                                        <td scope="col" class="text-nowrap text-center  " height="" width=""> <?php echo number_format($res_search["pip_vat"], 0); ?> %</td>
                                                        <td scope="col" class="text-nowrap text-center  " height="" width=""> <?php echo number_format($res_search["pip_cost"], 0); ?></td>
                                                    </tr>

                                                    <tr>
                                                        <th scope="row">
                                                            <h6>Gross Profit (GP)</h6>
                                                        </th>
                                                        <td scope="col" class="text-nowrap text-center badge-info" height="" width=""><b><?php echo number_format($res_search["pip_gp"], 0); ?></b></td>
                                                        <td scope="col" class="text-nowrap text-center  " height="" width=""> - </td>
                                                        <td scope="col" class="text-nowrap text-center  " height="" width=""> - </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">
                                                            <h6>(% GP)</h6>
                                                        </th>
                                                        <td scope="col" class="text-nowrap text-center  " height="" width=""><b> <?php echo number_format($res_search["pip_gp2"], 0); ?> %</b></td>
                                                        <td scope="col" class="text-nowrap text-center  " height="" width=""> - </td>
                                                        <td scope="col" class="text-nowrap text-center  " height="" width=""> - </td>
                                                    </tr>

                                                </tbody>
                                            </table>

                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th scope="col" class="text-nowrap " height="" width="">Estimate Potential</th>
                                                        <th scope="col" class="text-nowrap text-center  " height="" width="20%">% Potential</th>
                                                        <th scope="col" class="text-nowrap text-center  " height="" width="20%">ราคา/บาท</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th scope="row">
                                                            <h6> Estimate Sale </h6>
                                                        </th>
                                                        <td scope="col" class="text-nowrap text-center  " height="" width=""> <?php echo number_format($res_search["pip_p"], 0); ?> %</td>
                                                        <td scope="col" class="text-nowrap text-center  " height="" width=""> <?php echo number_format($res_search["pip_ess"], 0); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">
                                                            <h6>Estimate Cost </h6>
                                                        </th>
                                                        <td scope="col" class="text-nowrap text-center  " height="" width=""> <?php echo number_format($res_search["pip_p"], 0); ?> %</td>
                                                        <td scope="col" class="text-nowrap text-center  " height="" width=""> <?php echo number_format($res_search["pip_esc"], 0); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">
                                                            <h6>Estimate GP</h6>
                                                        </th>
                                                        <td scope="col" class="text-nowrap text-center  " height="" width=""> <?php echo number_format($res_search["pip_p"], 0); ?> %</td>
                                                        <td scope="col" class="text-nowrap text-center  " height="" width=""> <?php echo number_format($res_search["pip_esp"], 0); ?></td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- /.col -->

                                        <div class="col-4 table-responsive">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Period of sale</th>
                                                        <th>Month</th>
                                                        <th>Pay (%)</th>
                                                        <th>Amount/Bath</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>

                                                <?php
                                                    /* การลบข้อมูล */
                                                    if (isset($_GET['id_p'])) {

                                                        $result = $conn->query("DELETE FROM pip_period WHERE p_id=" . $_GET['id_p']);

                                                        if ($result) {
                                                            // <!-- sweetalert -->
                                                            echo '<script>
                                                                    setTimeout(function(){
                                                                        swal({
                                                                            title: "Successfully!",
                                                                            text: "Delect Infomation Complatrd.",
                                                                            type:"success"
                                                                        }, function(){
                                                                            window.location = "pipeline_view.php?id=<?php echo $res_search["pip_id"]; ?>";
                                                                        })
                                                                    },1000);
                                                                </script>';
                                                            // echo "<script>alert('ยินดีตอนรับ Admin เข้าสู่ระบบ'); window.location='../index.php'</script>";
                                                        } else {
                                                            // <!-- sweetalert -->
                                                            echo '<script>
                                                                    setTimeout(function(){
                                                                        swal({
                                                                            title: "Can Not Successfully!",
                                                                            text: "Type again",
                                                                            type:"warning"
                                                                        }, function(){
                                                                            window.location = "pipeline_view.php?id=<?php echo $res_search["pip_id"]; ?>";
                                                                        })
                                                                    },1000);
                                                                </script>';
                                                        //     echo "<script>alert('ยินดีตอนรับ Admin เข้าสู่ระบบ'); window.location='../index.php'</script>";
                                                        }
                                                    }
                                                    /* การลบข้อมูล */
                                                ?>

                                                <!-- /.Get ID From -->
                                                <?php
                                                if (isset($_GET['id'])) {
                                                    $_sql = "SELECT * FROM pip_period WHERE pip_id=" . $_GET['id'];
                                                    $query_search = mysqli_query($conn, $_sql);
                                                    // print_r($_sql);
                                                    // print_r($query_search);
                                                    while ($res_search = mysqli_fetch_array($query_search)) {
                                                ?>

                                                        <tbody>
                                                            <tr>
                                                                <td><?php echo $res_search["pip_ps"]; ?></td>
                                                                <td><?php echo $res_search["pip_month"]; ?></td>
                                                                <td><?php echo number_format($res_search["pip_pst"], 0); ?> %</td>
                                                                <td><?php echo number_format($res_search["pip_psw"], 0); ?></td>

                                                                <td>
                                                                    <a href="pipeline_view.php?id=<?php echo $res_search["pip_id"]; ?>&id_p=<?php echo $res_search["p_id"]; ?>" class="btn btn-danger btn-sm swalDefaultSuccess"><i class="fas fa-trash"></i></a>
                                                                </td>

                                                            </tr>
                                                        </tbody>

                                                    <?php } ?>
                                                <?php } ?>
                                            </table>

                                            <!-- Qeury Count All Service -->
                                            <?php
                                            $query2 = "SELECT SUM(`pip_psw`) as AMP FROM pip_period WHERE pip_id=" . $_GET['id'];
                                            $query1 = $query2 . "" . " ORDER BY p_id DESC ";
                                            $result = mysqli_query($conn, $query1);
                                            $rs = mysqli_fetch_array($result);
                                            $a = $rs['AMP'];
                                            ?>
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td><?php echo number_format($a, 0); ?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <!-- /.row -->

                                </div>
                                <!-- /.invoice -->
                            <?php } ?>
                        <?php } ?>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!----------------------------- End Project description ------------------------------->


    <!----------------------------- Document ------------------------------->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row ">
                    <div class="col-sm-6">
                        <h1>Document</h1>
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

                        
                        
                        <!-- ดึงไอดี Pip_id docker_add.php เพื่อส่งค่าไปยังหน้า -->
                        <?php
                            if (isset($_GET['id'])) {
                                $_sql = "SELECT * FROM pipeline WHERE pip_id=" . $_GET['id'];
                                $query_search = mysqli_query($conn, $_sql);
                                // print_r($_sql);
                                // print_r($query_search);
                                 while ($res_search = mysqli_fetch_array($query_search)) {
                         ?>


                        <?php if ($_SESSION["role"] == "Administrator") { ?>
                            <div class="col-md-12 pb-3">
                                <a href="docker_add.php?id=<?php echo $res_search["pip_id"]; ?>" class="btn btn-success btn-sm float-right"> Add <i class=""></i></a>
                            </div><br>

                        <?php } ?>
                        <?php } ?>
                        <?php } ?>



                        <?php if ($_SESSION["role"] == "Administrator") { ?>
                            <div class="card">
                                <div class="card-header">
                                    <div class="container-fluid">
                                        <h3 class="card-title">Sale Document</h3>
                                    </div>
                                </div>

                               

                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">

                                        <thead>
                                            <tr>
                                                <th scope="col" class="text-nowrap text-center " height="" width="">Folder</th>
                                                <th scope="col" class="text-nowrap text-center " height="" width="">Document type</th>
                                                <th scope="col" class="text-nowrap text-center " height="" width="">Document Name</th>
                                                <th scope="col" class="text-nowrap text-center " height="" width="">Document status</th>
                                                <th scope="col" class="text-nowrap text-center " height="" width="">Document Link</th>
                                                <th scope="col" class="text-nowrap text-center " height="" width="">Create Date</th>
                                                <th scope="col" class="text-nowrap text-center " height="" width="">Creater</th>
                                                <th scope="col" class="text-nowrap text-center " height="" width="">Document Detail</th>
                                                <th scope="col" class="text-nowrap text-center " height="" width="">Action
                                                </th>
                                            </tr>
                                        </thead>

                                        <tbody id="myTable">
                                            <?php
                                            $_sql = "SELECT * FROM pip_file WHERE pip_id=" . $_GET['id'];
                                            $query_search1 = mysqli_query($conn, $_sql);
                                            //print_r($query_search);
                                            while ($res_search1 = mysqli_fetch_array($query_search1)) {
                                            ?>
                                                <tr>
                                                    <td scope="col" class="text-nowrap text-center " height="" width=""><?php echo $res_search1["t_name"]; ?></td>
                                                    <td scope="col" class="text-nowrap text-center " height="" width="">
                                                        <?php
                                                        if ($res_search1["file_type"] == 'Wiating for approve') {
                                                            echo "<span class='badge badge-secondary'>{$res_search1["file_type"]}</span>";
                                                        } elseif ($res_search1["file_type"] == 'Word') {
                                                            echo "<span class='badge badge-info'>{$res_search1["file_type"]}</span>";
                                                        } elseif ($res_search1["file_type"] == 'Excel') {
                                                            echo "<span class='badge badge-warning'>{$res_search1["file_type"]}</span>";
                                                        } elseif ($res_search1["file_type"] == 'Presentation') {
                                                            echo "<span class='badge badge-success'>{$res_search1["file_type"]}</span>";
                                                        } elseif ($res_search1["file_type"] == 'PDF') {
                                                            echo "<span class='badge badge-danger'>{$res_search1["file_type"]}</span>";
                                                        } elseif ($res_search1["file_type"] == 'Images') {
                                                            echo "<span class='badge badge-primary'>{$res_search1["file_type"]}</span>";
                                                        }
                                                        ?>
                                                    </td>

                                                    <td scope="col" class="text-nowrap " height="" width="">
                                                        <?php
                                                        if ($res_search1["file_upfile"] == "") {
                                                            echo "<i class='badge badge-danger nav-icon fa fa-folder-open'>&nbsp;ไม่มีเอกสารแนบ</i></a></i>";
                                                        } elseif ($res_search1["file_upfile"]) {
                                                            echo "<a target ='_blank' href='docker/{$res_search1["t_name"]}/{$res_search1["file_upfile"]}'>{$res_search1["file_name"]} &nbsp; <i class='badge badge-success nav-icon fa fa-folder-open'>&nbsp;Doc</i></a></i>";
                                                        }
                                                        ?>
                                                    </td>

                                                    

                                                    <td scope="col" class="text-nowrap text-center " height="" width="">
                                                        <?php
                                                        if ($res_search1["file_status"] == 'Process') {
                                                            echo "<span class='badge badge-warning'>{$res_search1["file_status"]}</span>";
                                                        } elseif ($res_search1["file_status"] == 'Complated') {
                                                            echo "<span class='badge badge-success'>{$res_search1["file_status"]}</span>";
                                                        } elseif ($res_search1["file_status"] == 'Wait Approve') {
                                                            echo "<span class='badge badge-primary'>{$res_search1["file_status"]}</span>";
                                                        }
                                                        ?>

                                                    </td>
                                                    <td scope="col" class="" height="" width="">
                                                    <?php
                                                        if ($res_search1["file_link"] == "") {
                                                            echo "<i class='badge badge-danger nav-icon fa fa-folder-open'>&nbsp;ไม่มี Link แนบ</i></a></i>";
                                                        } elseif ($res_search1["file_link"]) {
                                                            echo "<a target ='_blank' href='{$res_search1["file_link"]}'>{$res_search1["file_link"]}</a></i>";
                                                        }
                                                        ?>
                                                    </td>

                                                    <td scope="col" class="text-nowrap  " height="" width=""><?php echo $res_search1["file_date"]; ?></td>
                                                    <td scope="col" class="text-nowrap  " height="" width=""><?php echo $res_search1["file_staff"]; ?></td>
                                                    <td scope="col" class="text-nowrap " height="" width=""><?php echo $res_search1["file_r"]; ?></td>
                                                    <td>
                                                        <!-- <a href="doc_edit.php?id=<?php echo $res_search1["doc_id"]; ?>" class="btn btn-info btn-sm "> <i class="fas fa-pencil-alt"></i></a> -->
                                                        <a href="document.php?id=<?php echo $res_search1["file_id"]; ?>" class="btn btn-danger btn-sm swalDefaultSuccess"><i class="fas fa-trash"></i></a>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>

                                        <tfoot>
                                            <tr>
                                             <th scope="col" class="text-nowrap text-center " height="" width="">Folder</th>
                                                <th scope="col" class="text-nowrap text-center " height="" width="">Document type</th>
                                                <th scope="col" class="text-nowrap text-center " height="" width="">Document Name</th>
                                                <th scope="col" class="text-nowrap text-center " height="" width="">Document status</th>
                                                <th scope="col" class="text-nowrap text-center " height="" width="">Document Link</th>
                                                <th scope="col" class="text-nowrap text-center " height="" width="">Create Date</th>
                                                <th scope="col" class="text-nowrap text-center " height="" width="">Creater</th>
                                                <th scope="col" class="text-nowrap text-center " height="" width="">Document Detail</th>
                                                <th scope="col" class="text-nowrap text-center " height="" width="">Action
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->


                            <!-------------------------------- User Role ---------------------------------------------->
                        <?php } else { ?>

                            <div class="card">
                                <div class="card-header">
                                    <div class="container-fluid">
                                        <h3 class="card-title">Project Management</h3>
                                    </div>
                                </div>

                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col" class="text-nowrap text-center " height="" width="">ProjectName</th>
                                                <th scope="col" class="text-nowrap text-center " height="" width="">Product/Solution</th>
                                                <th scope="col" class="text-nowrap text-center " height="" width="">Brand</th>
                                                <th scope="col" class="text-nowrap text-center " height="" width="">Remark</th>
                                                <th scope="col" class="text-nowrap text-center " height="" width="">UpdateStatus</th>
                                                <th scope="col" class="text-nowrap text-center " height="" width="">Quarter</th>
                                                <th scope="col" class="text-nowrap text-center " height="" width="">status</th>
                                                <th scope="col" class="text-nowrap text-center " height="" width="">Createdate</th>
                                                <th scope="col" class="text-nowrap text-center " height="" width="">Creater</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php while ($res_search = mysqli_fetch_array($query_search)) { ?>
                                                <tr id="myTable">
                                                    <td scope="col" class="text-nowrap  " height="" width=""><?php echo $res_search["project_name"]; ?></td>
                                                    <td scope="col" class="text-nowrap  " height="" width=""><?php echo $res_search["project_product"]; ?></td>
                                                    <td scope="col" class="text-nowrap  " height="" width=""><?php echo $res_search["project_brand"]; ?></td>
                                                    <td scope="col" class="text-nowrap  " height="" width=""><?php echo $res_search["project_remark"]; ?></td>
                                                    <td scope="col" class="text-nowrap  " height="" width=""><?php echo $res_search["project_up_status"]; ?></td>
                                                    <td scope="col" class="text-nowrap text-center " height="" width=""><?php echo $res_search["project_quarter"]; ?></td>
                                                    <td scope="col" class="text-nowrap  " height="" width=""><?php echo $res_search["project_status"]; ?></td>
                                                    <td scope="col" class="text-nowrap  " height="" width=""><?php echo $res_search["project_crt"]; ?></td>
                                                    <td scope="col" class="text-nowrap  " height="" width=""><?php echo $res_search["project_staff"]; ?></td>
                                                </tr>
                                            <?php } ?>

                                        </tbody>

                                        <tfoot>
                                            <tr>
                                                <th scope="col" class="text-nowrap text-center " height="" width="">ProjectName</th>
                                                <th scope="col" class="text-nowrap text-center " height="" width="">Product/Solution</th>
                                                <th scope="col" class="text-nowrap text-center " height="" width="">Brand</th>
                                                <th scope="col" class="text-nowrap text-center " height="" width="">Remark</th>
                                                <th scope="col" class="text-nowrap text-center " height="" width="">UpdateStatus</th>
                                                <th scope="col" class="text-nowrap text-center " height="" width="">Quarter</th>
                                                <th scope="col" class="text-nowrap text-center " height="" width="">status</th>
                                                <th scope="col" class="text-nowrap text-center " height="" width="">Createdate</th>
                                                <th scope="col" class="text-nowrap text-center " height="" width="">Creater</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                        <?php } ?>

                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!----------------------------- End Document ------------------------------->









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

    <!----------------------------- start Modal Add user ------------------------------->
    

    <div class="modal fade" id="editbtn">
        <div class="modal-dialog editbtn">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Period of sale</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="#" method="POST" enctype="multipart/form-data">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Period of sale Descliption</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col col-12">
                                        <div class="form-group">
                                            <label>Period of sale</label>
                                            <select class="form-control select2" name="pip_ps" style="width: 100%;">
                                                <option selected="selected">Select</option>
                                                <option>ชำระงวดที่ 1</option>
                                                <option>ชำระงวดที่ 2</option>
                                                <option>ชำระงวดที่ 3</option>
                                                <option>ชำระงวดที่ 4</option>
                                                <option>ชำระงวดที่ 5</option>
                                                <option>ชำระงวดที่ 6</option>
                                            </select>

                                            <?php
                                                if (isset($_GET['id'])) {
                                                    $_sql = "SELECT * FROM pipeline WHERE pip_id=" . $_GET['id'];
                                                    $query_search = mysqli_query($conn, $_sql);
                                                    // print_r($_sql);
                                                    // print_r($query_search);
                                                    while ($res_search = mysqli_fetch_array($query_search)) {
                                                ?>
                                            <input type="hidden" name="pip_id" value="<?php echo $res_search["pip_id"]; ?>" class="form-control" id="price" placeholder="">
                                            <?php } ?>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col col-4">
                                        <div class="form-group">
                                            <label>Month</label>
                                            <select class="form-control select2" name="pip_month" style="width: 100%;">
                                                <option selected="selected">Select</option>
                                                <option>January</option>
                                                <option>February</option>
                                                <option>March</option>
                                                <option>April</option>
                                                <option>May</option>
                                                <option>June</option>
                                                <option>July</option>
                                                <option>August</option>
                                                <option>September</option>
                                                <option>October </option>
                                                <option>November</option>
                                                <option>December</option>
                                            </select>
                                        </div>
                                        <!-- /.form-group -->
                                    </div>

                                    <!-- Calculate ----------------------------------------------------------------------->
                                    <script type="text/javascript">
                                        function sum() {
                                            var txtFirstNumberValue = document.getElementById('pip_salen').value;
                                            var txtSecondNumberValue = document.getElementById('pip_pst').value;
                                            var txttheNumberValue = document.getElementById('pip_psw').value;

                                            if (txtSecondNumberValue == ""  ) { txttheNumberValue=0; }

                                        
                                            var result =
                                                (parseInt(txtFirstNumberValue) * (parseInt(txtSecondNumberValue)/100)) ;
                                            if (!isNaN(result)) {
                                                document.getElementById('pip_psw').value = result;
                                            }

                                        }
                                    </script>


                                    <div class="col col-4">
                                        <div class="form-group">
                                            <label>Pay (%)</label>
                                            <input type="text" name="pip_pst" class="form-control" id="pip_pst" onkeyup="sum();" placeholder="">
                                            <!-- / สร้างฟิลหลอก เพื่อดึง Sale Novat มาคำนวณ ----------------------------------------------------------------------->
                                            <?php
                                                if (isset($_GET['id'])) {
                                                    $_sql = "SELECT * FROM pipeline WHERE pip_id=" . $_GET['id'];
                                                    $query_search = mysqli_query($conn, $_sql);
                                                    // print_r($_sql);
                                                    // print_r($query_search);
                                                    while ($res_search = mysqli_fetch_array($query_search)) {

                                                        //print_r($res_search["pip_salen"]);
                                            ?>

                                            <input type="hidden" name="pip_salen" value="<?php echo $res_search["pip_salen"]; ?>" class="form-control" id="pip_salen" onkeyup="sum();" placeholder="">
                                            <?php } ?>
                                            <?php } ?>
                                        </div>
                                    </div>

                                    <div class="col col-4">
                                        <div class="form-group">
                                            <label>Amount/Bath</label>
                                            <input type="text" name="pip_psw" id="pip_psw" onkeyup="sum();" class="form-control" id="price" style="background-color:#F8F8FF" placeholder="">
                                        </div>
                                    </div>
                                </div>

                                <!-- textarea -->
                                <div class="form-group">

                                </div>
                            </div>
                            <div class="card-footer">
                                Visit <a href="https://getdatepicker.com/5-4/">tempusdominus </a> for more
                                examples and information about
                                the plugin.
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit1" name="submit1" value="submit1" class="btn btn-success">Save</button>
                        </div>

                        
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    <!----------------------------- end Modal Add user --------------------------------->