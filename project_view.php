<!DOCTYPE html>
<html lang="en">
<?php $menu = "project"; ?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>INOvation | Project description</title>


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

            echo '<script>
                            setTimeout(function(){
                                swal({
                                    title: "Save Successfully!",
                                    text: "Thank You . ",
                                    type:"success"
                                }, function(){
                                    window.location = "project_view.php?id=' . $_GET['id'] . '";
                                })
                            },1000);
                        </script>';
        } else {

            echo '<script>
                            setTimeout(function(){
                                swal({
                                    title: "Can Not Save Successfully!",
                                    text: "Checking Your Data",
                                    type:"warning"
                                }, function(){
                                    window.location = "project_view.php?id=' . $_GET['id'] . '";
                                })
                            },1000);
                        </script>';
        }
    }
    /* การลบข้อมูล */
    ?>
    <!----------------------------- start Project description ------------------------------->
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Project description</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Project description</li>
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
                            $_sql = "SELECT * FROM project INNER JOIN contact On (project.project_id = contact.project_id) WHERE project.project_id=" . $_GET['id'];
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
                                                <small class="float-right">Date:
                                                    <?php echo $res_search["project_crt"]; ?></small>
                                            </h4>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <!-- info row -->
                                    <div class="row invoice-info">
                                        <div class="col-sm-4 invoice-col">
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
                                            <b>Invoice #007612</b><br>
                                            <br>
                                            <b>Order ID:</b> 4F3S8J<br>
                                            <b>Payment Due:</b> 2/22/2014<br>
                                            <b>Account:</b> 968-34567
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <!-- /.row -->

                                    <!-- Table row -->
                                    <div class="row">
                                        <div class="col-8 table-responsive">
                                            Pipeline
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th scope="col" class="text-nowrap  " height="" width="">Price/Unit</th>
                                                        <th scope="col" class="text-nowrap  " height="" width="">Sales No Vat</th>
                                                        <th scope="col" class="text-nowrap  " height="" width="">Sales Vat</th>
                                                        <th scope="col" class="text-nowrap  " height="" width="">Estimated GP</th>
                                                        <th scope="col" class="text-nowrap  " height="" width="">% GP</th>
                                                        <th scope="col" class="text-nowrap  " height="" width="">% Potential</th>
                                                        <th scope="col" class="text-nowrap  " height="" width="">Estimated Sales</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td><?php echo number_format($res_search["project_price"], 0); ?></td>
                                                        <td><?php echo number_format($res_search["project_sales_novat"], 0); ?></td>
                                                        <td><?php echo number_format($res_search["project_sales"], 0); ?></td>
                                                        <td><?php echo number_format($res_search["project_cost_novat"], 0); ?></td>
                                                        <td><?php echo number_format($res_search["project_es_gp"], 0); ?></td>
                                                        <td><?php echo number_format($res_search["project_gp"], 0); ?></td>
                                                        <td><?php echo number_format($res_search["project_es_sales"], 0); ?></td>

                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-4 table-responsive">
                                            <div class="col col-12 mb-2">
                                                <a href="account_add.php?id=<?php echo $res_search["project_id"]; ?>" class="btn btn-success btn-sm float-right" data-toggle="modal" data-target="#editbtn"> Add <i class=""></i></a>
                                            </div>


                                            Estimated Timeline
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Qty</th>
                                                        <th>Month</th>
                                                        <th>Cost#</th>
                                                        <th>Year</th>
                                                    </tr>
                                                </thead>
                                                <!-- /.Get ID From -->
                                                <?php
                                                if (isset($_GET['id'])) {
                                                    $_sql = "SELECT * FROM estime  WHERE project_id=" . $_GET['id'];
                                                    $query_search = mysqli_query($conn, $_sql);
                                                    // print_r($_sql);
                                                    // print_r($query_search);
                                                    while ($res_search = mysqli_fetch_array($query_search)) {
                                                ?>

                                                        <tbody>
                                                            <tr>
                                                                <td><?php echo $res_search["id_es"]; ?></td>
                                                                <td><?php echo $res_search["es_month"]; ?></td>
                                                                <td><?php echo number_format($res_search["es_cost"], 0); ?></td>
                                                                <td><?php echo $res_search["es_year"]; ?></td>

                                                            </tr>
                                                        </tbody>

                                                    <?php } ?>
                                                <?php } ?>
                                            </table>

                                            <!-- Qeury Count All Service -->
                                            <?php
                                            $query2 = "SELECT SUM(`es_cost`) as AMP FROM estime ";
                                            $query1 = $query2 . "" . " ORDER BY id_es DESC ";
                                            $result = mysqli_query($conn, $query1);
                                            $rs = mysqli_fetch_array($result);
                                            $a = $rs['AMP'];
                                            ?>
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>total</th>
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

                                    <div class="row">
                                        <!-- accepted payments column -->
                                        <div class="col-6">
                                            <p class="lead">Payment Methods:</p>
                                            <img src="../../dist/img/credit/visa.png" alt="Visa">
                                            <img src="../../dist/img/credit/mastercard.png" alt="Mastercard">
                                            <img src="../../dist/img/credit/american-express.png" alt="American Express">
                                            <img src="../../dist/img/credit/paypal2.png" alt="Paypal">

                                            <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                                                Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning
                                                heekya handango imeem
                                                plugg
                                                dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
                                            </p>
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-6">
                                            <p class="lead">Amount Due 2/22/2014</p>

                                            <div class="table-responsive">
                                                <table class="table">
                                                    <tr>
                                                        <th style="width:50%">Subtotal:</th>
                                                        <td>$250.30</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Tax (9.3%)</th>
                                                        <td>$10.34</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Shipping:</th>
                                                        <td>$5.80</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Total:</th>
                                                        <td>$265.24</td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <!-- /.row -->

                                    <!-- this row will not appear when printing -->
                                    <div class="row no-print">
                                        <div class="col-12">
                                            <a href="invoice-print.html" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                                            <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
                                                Payment
                                            </button>
                                            <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                                                <i class="fas fa-download"></i> Generate PDF
                                            </button>
                                        </div>
                                    </div>
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

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Task Status</h1>
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
                        $project_name = "";
                        $project_product = "";
                        $project_status = "";
                        $project_staff = "";
                        $project_quarter = "";
                        $project_up_status = "";

                        $search_backup = "";
                        $project_name_backup = "";
                        $project_product_backup = "";
                        $project_status_backup = "";
                        $project_staff_backup = "";
                        $project_quarter_backup = "";
                        $project_up_status_backup = "";

                        $_sql_project_name = "SELECT DISTINCT project_name FROM project ";
                        $_sql_project_product = "SELECT DISTINCT project_product FROM project ";
                        $_sql_project_status = "SELECT DISTINCT project_status  FROM project ";
                        $_sql_project_staff = "SELECT DISTINCT project_staff  FROM project ";
                        $_sql_project_quarter = "SELECT DISTINCT project_quarter  FROM project ";
                        $_sql_project_up_status = "SELECT DISTINCT project_up_status  FROM project ";

                        $query_project_name = mysqli_query($conn, $_sql_project_name);
                        $query_project_product = mysqli_query($conn, $_sql_project_product);
                        $query_project_status = mysqli_query($conn, $_sql_project_status);
                        $query_project_staff = mysqli_query($conn, $_sql_project_staff);
                        $query_project_quarter = mysqli_query($conn, $_sql_project_quarter);
                        $query_project_up_status = mysqli_query($conn, $_sql_project_up_status);

                        $_sql = "SELECT * FROM project";
                        $_where = "";

                        if (isset($_POST['search'])) {

                            $search = $_POST['searchservice'];
                            $project_name = $_POST['project_name'];
                            $project_product = $_POST['project_product'];
                            $project_status = $_POST['project_status'];
                            $project_staff = $_POST['project_staff'];
                            $project_quarter = $_POST['project_quarter'];
                            $project_up_status = $_POST['project_up_status'];

                            $search_backup = $_POST['search_backup'];
                            $project_name_backup = $_POST['project_name_backup'];
                            $project_product_backup = $_POST['project_product_backup'];
                            $project_status_backup = $_POST['project_status_backup'];
                            $project_staff_backup = $_POST['project_staff_backup'];
                            $project_quarter_backup = $_POST['project_quarter_backup'];
                            $project_up_status_backup = $_POST['project_up_status_backup'];

                            // print_r($_sqlCount);

                            if (
                                $search != $search_backup || $project_name != $project_name_backup || $project_product != $project_product_backup || $project_status  != $project_status_backup
                                || $project_staff  != $project_staff_backup || $project_quarter  != $project_quarter_backup || $project_up_status  != $project_up_status_backup
                            )

                                if (!empty($search)) {
                                    $_where = $_where . " WHERE project_name  LIKE '%$search%' OR project_product LIKE '%$search%' OR project_brand LIKE '%$search%' 
                                            OR project_mean LIKE '%$search%' OR project_remark LIKE '%$search%' OR project_up_status LIKE '%$search%' OR project_status LIKE '%$search%' OR project_staff LIKE '%$search%'";
                                }
                            if ($project_name != "") {
                                if (empty($_where)) {
                                    $_where = $_where . " WHERE project_name = '$project_name' ";
                                } else {
                                    $_where = $_where . " AND project_name = '$project_name'";
                                }
                            }
                            if ($project_product != "") {
                                if (empty($_where)) {
                                    $_where = $_where . " WHERE project_product = '$project_product' ";
                                } else {
                                    $_where = $_where . " AND project_product = '$project_product'";
                                }
                            }
                            if ($project_status != "") {
                                if (empty($_where)) {
                                    $_where = $_where . " WHERE project_status = '$project_status' ";
                                } else {
                                    $_where = $_where . " AND  project_status = '$project_status'";
                                }
                            }
                            if ($project_staff != "") {
                                if (empty($_where)) {
                                    $_where = $_where . " WHERE project_staff = '$project_staff' ";
                                } else {
                                    $_where = $_where . " AND  project_staff = '$project_staff'";
                                }
                            }
                            if ($project_quarter != "") {
                                if (empty($_where)) {
                                    $_where = $_where . " WHERE project_quarter = '$project_quarter' ";
                                } else {
                                    $_where = $_where . " AND  project_quarter = '$project_quarter'";
                                }
                            }
                            if ($project_up_status != "") {
                                if (empty($_where)) {
                                    $_where = $_where . " WHERE project_up_status = '$project_up_status' ";
                                } else {
                                    $_where = $_where . " AND  project_up_status = '$project_up_status'";
                                }
                            }
                        }


                        $query_search = mysqli_query($conn, $_sql . $_where);
                        // print_r($query_search);
                        ?>

                        <?php if ($_SESSION["role"] == "Administrator") { ?>
                            <!-- Main content -->
                            <section class="content">
                                <div class="container-fluid">
                                    <!-- Small boxes (Stat box) -->
                                    <div class="row">

                                        <div class="col-lg-3 col-6">
                                            <!-- small box -->
                                            <div class="small-box bg-info">

                                                <!-- Qeury Count All Service -->
                                                <?php
                                                $query2 = "SELECT COUNT(`project_name`) as AMP FROM project ";
                                                $query1 = $query2 . $_where . "" . " ORDER BY project_id DESC ";
                                                $result = mysqli_query($conn, $query1);
                                                $rs = mysqli_fetch_array($result);
                                                $a = $rs['AMP'];
                                                ?>

                                                <div class="inner">
                                                    <h3><?php echo number_format($a, 0); ?></h3>

                                                    <p>Task Totals</p>
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
                                            <div class="small-box bg-warning">

                                                <!-- Qeury Count All Service -->
                                                <?php
                                                $query2 = "SELECT COUNT(`project_product`) as AMP FROM project ";
                                                $query1 = $query2 . $_where . "" . " ORDER BY project_id DESC ";
                                                $result = mysqli_query($conn, $query1);
                                                $rs = mysqli_fetch_array($result);
                                                $a = $rs['AMP'];
                                                ?>

                                                <div class="inner">
                                                    <h3><?php echo number_format($a, 0); ?></h3>

                                                    <p>Process</p>
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
                                            <div class="small-box bg-success">

                                                <!-- Qeury Count All Service -->
                                                <?php
                                                $query2 = "SELECT SUM(`project_es_sales`) as AMP FROM project ";
                                                $query1 = $query2 . $_where . "" . " ORDER BY project_id DESC ";
                                                $result = mysqli_query($conn, $query1);
                                                $rs = mysqli_fetch_array($result);
                                                $a = $rs['AMP'];
                                                ?>

                                                <div class="inner">
                                                    <h3><?php echo number_format($a, 0); ?></h3>

                                                    <p>Complated</p>
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

                                                $query = "SELECT SUM(`project_es_gp`) as AMP FROM project ";
                                                $query1 = $query . $_where . "" . " ORDER BY project_id DESC ";
                                                $result = mysqli_query($conn, $query1);
                                                $ls = mysqli_fetch_array($result);
                                                $a = $ls['AMP'];
                                                ?>

                                                <div class="inner">
                                                    <h3><?php echo number_format($a, 0); ?></h3>

                                                    <p>Wait Operation</p>
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
                        <?php } ?>

                        <section class="content">
                            <div class="row">

                                <div class="col-md-12">
                                    <div class="card card-outline card-info">
                                        <div class="card-header ">
                                            <h3 class="card-title font1">
                                                Search
                                            </h3>
                                        </div>
                                        <div class="card-body">
                                            <form action="project.php" method="POST">
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <div class="form-group ">
                                                            <input type="text" class="form-control " id="searchservice" name="searchservice" value="<?php echo $search; ?>" placeholder="ค้นหา...">
                                                            <input type="hidden" class="form-control " id="search_backup" name="search_backup" value="<?php echo $search; ?>">
                                                            <input type="hidden" class="form-control " id="project_name_backup" name="project_name_backup" value="<?php echo $project_name; ?>">
                                                            <input type="hidden" class="form-control " id="project_product_backup" name="project_product_backup" value="<?php echo $project_product; ?>">
                                                            <input type="hidden" class="form-control " id="project_status_backup" name="project_status_backup" value="<?php echo $project_status; ?>">
                                                            <input type="hidden" class="form-control " id="project_staff_backup" name="project_staff_backup" value="<?php echo $project_staff; ?>">
                                                            <input type="hidden" class="form-control " id="project_quarter_backup" name="project_quarter_backup" value="<?php echo $project_quarter; ?>">
                                                            <input type="hidden" class="form-control " id="project_up_status_backup" name="project_up_status_backup" value="<?php echo $project_up_status; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-group ">
                                                            <button type="submit" class="btn btn-primary" id="search" name="search">Search</button>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-5">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-2">
                                                        <div class="form-group">
                                                            <label>Project</label>
                                                            <select class="custom-select select2" name="project_name">
                                                                <option value="">Select</option>
                                                                <?php while ($r = mysqli_fetch_array($query_project_name)) { ?>
                                                                    <option value="<?php echo $r["project_name"]; ?>" <?php if ($r['project_name'] == $project_name) : ?> selected="selected" <?php endif; ?>>
                                                                        <?php echo $r["project_name"]; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="form-group">
                                                            <label>Product</label>
                                                            <select class="custom-select select2" name="project_product">
                                                                <option value="">Select</option>
                                                                <?php while ($rg = mysqli_fetch_array($query_project_product)) { ?>
                                                                    <option value="<?php echo $rg["project_product"]; ?>" <?php if ($rg['project_product'] == $project_product) : ?> selected="selected" <?php endif; ?>>
                                                                        <?php echo $rg["project_product"]; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="form-group">
                                                            <label>Status</label>
                                                            <select class="custom-select select2" name="project_status">
                                                                <option value="">Select</option>
                                                                <?php while ($re = mysqli_fetch_array($query_project_status)) { ?>
                                                                    <option value="<?php echo $re["project_status"]; ?>" <?php if ($re['project_status'] == $project_status) : ?> selected="selected" <?php endif; ?>>
                                                                        <?php echo $re["project_status"]; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="form-group">
                                                            <label>Creater</label>
                                                            <select class="custom-select select2" name="project_staff">
                                                                <option value="">Select</option>
                                                                <?php while ($rd = mysqli_fetch_array($query_project_staff)) { ?>
                                                                    <option value="<?php echo $rd["project_staff"]; ?>" <?php if ($rd['project_staff'] == $project_staff) : ?> selected="selected" <?php endif; ?>>
                                                                        <?php echo $rd["project_staff"]; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="form-group">
                                                            <label>Quarter</label>
                                                            <select class="custom-select select2" name="project_quarter">
                                                                <option value="">Select</option>
                                                                <?php while ($rf = mysqli_fetch_array($query_project_quarter)) { ?>
                                                                    <option value="<?php echo $rf["project_quarter"]; ?>" <?php if ($rf['project_quarter'] == $project_quarter) : ?> selected="selected" <?php endif; ?>>
                                                                        <?php echo $rf["project_quarter"]; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="form-group">
                                                            <label>Update Status</label>
                                                            <select class="custom-select select2" name="project_up_status">
                                                                <option value="">Select</option>
                                                                <?php while ($rh = mysqli_fetch_array($query_project_up_status)) { ?>
                                                                    <option value="<?php echo $rh["project_up_status"]; ?>" <?php if ($rh['project_up_status'] == $project_up_status) : ?> selected="selected" <?php endif; ?>>
                                                                        <?php echo $rh["project_up_status"]; ?></option>
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

                        <?php if ($_SESSION["role"] == "Administrator") { ?>
                            <div class="col-md-12 pb-3">
                                <a href="project_add.php" class="btn btn-success btn-sm float-right"> Add <i class=""></i></a>
                            </div><br>
                        <?php } ?>


                        <?php if ($_SESSION["role"] == "Administrator") { ?>
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
                                                <th scope="col" class="text-nowrap text-center " height="" width="">Project Name</th>
                                                <th scope="col" class="text-nowrap text-center " height="" width="">Product/Solution</th>
                                                <th scope="col" class="text-nowrap text-center " height="" width="">Brand</th>
                                                <th scope="col" class="text-nowrap text-center " height="" width="">Price/Unit</th>
                                                <th scope="col" class="text-nowrap text-center " height="" width="">QTY</th>
                                                <th scope="col" class="text-nowrap text-center " height="" width="">Sales No Vat</th>
                                                <th scope="col" class="text-nowrap text-center " height="" width="">Sales Vat</th>
                                                <th scope="col" class="text-nowrap text-center " height="" width="">Cost No Vat</th>
                                                <th scope="col" class="text-nowrap text-center " height="" width="">Es.GP</th>
                                                <th scope="col" class="text-nowrap text-center " height="" width="">% GP</th>
                                                <th scope="col" class="text-nowrap text-center " height="" width="">% Potential</th>
                                                <th scope="col" class="text-nowrap text-center " height="" width="">Meaning</th>
                                                <th scope="col" class="text-nowrap text-center " height="" width="">Estimated Sales</th>
                                                <th scope="col" class="text-nowrap text-center " height="" width="">Remark</th>
                                                <th scope="col" class="text-nowrap text-center " height="" width="">BG</th>
                                                <th scope="col" class="text-nowrap text-center " height="" width="">Update Status</th>
                                                <th scope="col" class="text-nowrap text-center " height="" width="">Quarter</th>
                                                <th scope="col" class="text-nowrap text-center " height="" width="">status</th>
                                                <th scope="col" class="text-nowrap text-center " height="" width="">Create date</th>
                                                <th scope="col" class="text-nowrap text-center " height="" width="">Creater</th>
                                                <th scope="col" class="text-nowrap text-center " height="" width="">Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php while ($res_search = mysqli_fetch_array($query_search)) { ?>
                                                <tr id="myTable">
                                                    <td scope="col" class="text-nowrap  " height="" width=""><?php echo $res_search["project_name"]; ?></td>
                                                    <td scope="col" class="text-nowrap  " height="" width=""><a href="project_view.php?id=<?php echo $res_search["project_id"]; ?>"><?php echo $res_search["project_product"]; ?></a></td>
                                                    <td scope="col" class="text-nowrap  " height="" width=""><?php echo $res_search["project_brand"]; ?></td>
                                                    <td scope="col" class="text-nowrap  " height="" width=""><?php echo $res_search["project_price"]; ?></td>
                                                    <td scope="col" class="text-nowrap  " height="" width=""><?php echo $res_search["project_qty"]; ?></td>
                                                    <td scope="col" class="text-nowrap  " height="" width=""><?php echo $res_search["project_sales_novat"]; ?></td>
                                                    <td scope="col" class="text-nowrap  " height="" width=""><?php echo $res_search["project_sales"]; ?></td>
                                                    <td scope="col" class="text-nowrap  " height="" width=""><?php echo $res_search["project_cost_novat"]; ?></td>
                                                    <td scope="col" class="text-nowrap  " height="" width=""><?php echo $res_search["project_es_gp"]; ?></td>
                                                    <td scope="col" class="text-nowrap  " height="" width=""><?php echo $res_search["project_gp"]; ?></td>
                                                    <td scope="col" class="text-nowrap  " height="" width=""><?php echo $res_search["project_pot"]; ?></td>
                                                    <td scope="col" class="text-nowrap  " height="" width=""><?php echo $res_search["project_mean"]; ?></td>
                                                    <td scope="col" class="text-nowrap  " height="" width=""><?php echo $res_search["project_es_sales"]; ?></td>
                                                    <td scope="col" class="text-nowrap  " height="" width=""><?php echo $res_search["project_remark"]; ?></td>
                                                    <td scope="col" class="text-nowrap  " height="" width=""><?php echo $res_search["project_bg"]; ?></td>
                                                    <td scope="col" class="text-nowrap  " height="" width=""><?php echo $res_search["project_up_status"]; ?></td>
                                                    <td scope="col" class="text-nowrap text-center " height="" width=""><?php echo $res_search["project_quarter"]; ?></td>
                                                    <td scope="col" class="text-nowrap  " height="" width=""><?php echo $res_search["project_status"]; ?></td>
                                                    <td scope="col" class="text-nowrap  " height="" width=""><?php echo $res_search["project_crt"]; ?></td>
                                                    <td scope="col" class="text-nowrap  " height="" width=""><?php echo $res_search["project_staff"]; ?></td>

                                                    <td>
                                                        <a href="project_edit.php" class="btn btn-info btn-sm " data-toggle="modal" data-target="#modal-lg"><i class="fas fa-pencil-alt"></i></a>
                                                        <a href="project.php?id=" class="btn btn-danger btn-sm swalDefaultSuccess"><i class="fas fa-trash"></i></a>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>

                                        <tfoot>
                                            <tr>
                                                <th scope="col" class="text-nowrap text-center " height="" width="">Project Name</th>
                                                <th scope="col" class="text-nowrap text-center " height="" width="">Product/Solution</th>
                                                <th scope="col" class="text-nowrap text-center " height="" width="">Brand</th>
                                                <th scope="col" class="text-nowrap text-center " height="" width="">Price/Unit</th>
                                                <th scope="col" class="text-nowrap text-center " height="" width="">QTY</th>
                                                <th scope="col" class="text-nowrap text-center " height="" width="">Sales No Vat</th>
                                                <th scope="col" class="text-nowrap text-center " height="" width="">Sales Vat</th>
                                                <th scope="col" class="text-nowrap text-center " height="" width="">Cost No Vat</th>
                                                <th scope="col" class="text-nowrap text-center " height="" width="">Es.GP</th>
                                                <th scope="col" class="text-nowrap text-center " height="" width="">% GP</th>
                                                <th scope="col" class="text-nowrap text-center " height="" width="">% Potential</th>
                                                <th scope="col" class="text-nowrap text-center " height="" width="">Meaning</th>
                                                <th scope="col" class="text-nowrap text-center " height="" width="">Estimated Sales</th>
                                                <th scope="col" class="text-nowrap text-center " height="" width="">Remark</th>
                                                <th scope="col" class="text-nowrap text-center " height="" width="">BG</th>
                                                <th scope="col" class="text-nowrap text-center " height="" width="">Update Status</th>
                                                <th scope="col" class="text-nowrap text-center " height="" width="">Quarter</th>
                                                <th scope="col" class="text-nowrap text-center " height="" width="">status</th>
                                                <th scope="col" class="text-nowrap text-center " height="" width="">Create date</th>
                                                <th scope="col" class="text-nowrap text-center " height="" width="">Creater</th>
                                                <th scope="col" class="text-nowrap text-center " height="" width="">Action</th>
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
                    <h4 class="modal-title">Add User</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="add_view.php?id=<?php echo $res_search["project_id"]; ?>" method="POST" enctype="multipart/form-data">
                        
                    <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">Pay Estimated</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col col-4">
                                                <div class="form-group">
                                                    <label>Month</label>
                                                    <select class="form-control select2" name="es_month" style="width: 100%;">
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

                                            <div class="col col-4">
                                                <div class="form-group">
                                                    <label>Yaer</label>
                                                    <input type="text" name="es_year" class="form-control" id="price" placeholder="">
                                                </div>
                                            </div>
                                            <div class="col col-4">
                                                <div class="form-group">
                                                    <label>Price</label>
                                                    <input type="text" name="es_cost" class="form-control" id="price" placeholder="">
                                                    <input type="hidden" name="project_id" value="<?php echo $res_search["project_id"]; ?>" class="form-control" id="price" placeholder="">
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


                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" name="submit" value="submit" class="btn btn-success">Save</button>
                </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    <!----------------------------- end Modal Add user --------------------------------->