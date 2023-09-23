<!DOCTYPE html>
<html lang="en">
<?php $menu = "project"; ?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>INO | Open Project</title>


    <!----------------------------- start header ------------------------------->
    <?php include("../ino/templated/head.php"); ?>
    <!----------------------------- end header --------------------------------->

    <!----------------------------- start menu ------------------------------->
    <?php include("../ino/templated/menu.php"); ?>
    <!----------------------------- end menu --------------------------------->

    <!----------------------------- start Time ------------------------------->
    <?php
    date_default_timezone_set('asia/bangkok');
    $date = date('d/m/Y');
    $time = date("H:i:s", "1359780799");
    ?>
    <!----------------------------- start Time ------------------------------->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Open Project</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active">Open Project</li>
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

                        <!-- เพิ่มข้อมูล -->
                        <?php

                        if (isset($_POST['submit'])) { /* ถ้า POST มีการกด Submit ให้ทำส่วนล่าง */

                            $project_date  = $_POST['project_date']; /* ประกาศตัวแปลเก็บค่า  POST ที่รับมาจาก INPUT  */
                            $project_line = $_POST['project_line'];
                            $project_cate = $_POST['project_cate'];
                            $project_sub = $_POST['project_sub'];
                            $project_name = $_POST['project_name'];
                            $project_detail = $_POST['project_detail'];
                            $project_cost = $_POST['project_cost'];
                            $project_staff = $_POST['project_staff'];
                            $project_link = $_POST['project_link'];

                            $project_start = $_POST['project_start'];
                            $project_end = $_POST['project_end'];
                            $project_pay = $_POST['project_pay'];
                            $project_status = $_POST['project_status'];
                            $project_in = $_POST['project_in'];
                            $project_team = $_POST['project_team'];

                            $contact_name = $_POST['contact_name'];
                            $contact_company = $_POST['contact_company'];
                            $contact_position = $_POST['contact_position'];
                            $contact_email = $_POST['contact_email'];
                            $contact_phone = $_POST['contact_phone'];
                            $contact_detail = $_POST['contact_detail'];

                            $sale_name = $_POST['sale_name'];
                            $sale_company = $_POST['sale_company'];
                            $sale_position = $_POST['sale_position'];
                            $sale_email = $_POST['sale_email'];
                            $sale_phone = $_POST['sale_phone'];
                            $sale_detail = $_POST['sale_detail'];


                            // print_r($_POST);


                            $sql =  "INSERT INTO `tb_project` (`project_id`, `project_date`,`project_line`, `project_cate`, `project_sub`, `project_name`, `project_detail`, `project_cost`, `project_staff`,`project_link`, `contact_name`, `contact_company`, `contact_position`, `contact_email`, `contact_phone`,`contact_detail`, `sale_name`, `sale_company`, `sale_position`, `sale_email`, `sale_phone`, `sale_detail`, `project_start`, `project_end`, `project_pay`, `project_status`, `project_in`, `project_team`) 
                                     VALUES (NULL, '$project_date', '$project_line', '$project_cate', '$project_sub', '$project_name', '$project_detail', '$project_cost', '$project_staff', '$project_link', '$contact_name', '$contact_company', '$contact_position', '$contact_email', '$contact_phone', '$contact_detail', '$sale_name', '$sale_company', '$sale_position', '$sale_email', '$sale_phone', '$sale_detail', '$project_start', '$project_end', '$project_pay', '$project_status', '$project_in', '$project_team')";

                            $result = $conn->query($sql);

                            //  print_r($sql);
                            if ($result) {
                                // <!-- sweetalert -->
                                echo '<script>
                                        setTimeout(function(){
                                            swal({
                                                title: "Save Successfully!",
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
                                                title: "Can Not Save Successfully!",
                                                text: "Checking Your Data",
                                                type:"warning"
                                            }, function(){
                                                window.location = "project_is.php";
                                            })
                                        },1000);
                                    </script>';
                                // echo "<script>alert('ยินดีตอนรับ Admin เข้าสู่ระบบ'); window.location='../index.php'</script>";
                            }
                        }




                        // echo '<pre>';
                        // print_r($_POST);
                        // print_r($_FILES);
                        // echo '</pre>';
                        ?>
                        <!-- เพิ่มข้อมูล -->
                        <div class="row">
                            <!-- /.col (left) -->
                            <div class="col-md-6">
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">Project descriptions</h3>
                                    </div>

                                    <form action="#" method="POST" enctype="multipart/form-data">

                                        <div class="card-body">
                                            <div class="form-group">
                                                <label>Project Name</label>
                                                <input type="text" name="project_name" class="form-control" id="exampleInputEmail1" placeholder="" required>
                                                <input type="hidden" name="project_staff" value="<?php echo ($_SESSION['fullname']); ?>" class="form-control" id="exampleInputEmail1" placeholder="" required>
                                                <input type="hidden" name="contact_staff" value="<?php echo ($_SESSION['fullname']); ?>" class="form-control" id="exampleInputEmail1" placeholder="" required>
                                            </div>


                                            <div class="form-group">
                                                <label>Product/Solution</label>
                                                <input type="text" name="project_product" class="form-control" id="exampleInputEmail1" placeholder="" required>
                                            </div>

                                            <div class="form-group">
                                                <label>Brand</label>
                                                <input type="text" name="project_brand" class="form-control" id="exampleInputEmail1" placeholder="" required>
                                            </div>

                                            <script type="text/javascript">
                                                function sum1() {
                                                    var txtone = document.getElementById('price').value;
                                                    var txttwo = document.getElementById('qty').value;
                                                    var txttree = document.getElementById('salvn').value;
                                                    var txtfour = document.getElementById('vat').value;
                                                    var result =
                                                        parseInt(txtone) *
                                                        parseInt(txttwo);

                                                    if (!isNaN(result)) {
                                                        document.getElementById('svat').value = result;

                                                    }

                                                    var result1 =
                                                        result - (result * txtfour);
                                                    // parseInt(txtfour);

                                                    if (!isNaN(result)) {
                                                        document.getElementById('salvn').value = result1;
                                                    }
                                                }
                                            </script>


                                            <div class="row">
                                                <div class="col col-4">
                                                    <div class="form-group">
                                                        <label>Vat(%)<span class="text-danger">*</span></label>
                                                        <select class="form-control select2" name="project_status" id="vat" onkeyup="sum1();" required style="width: 100%;">
                                                            <option selected="selected">Select</option>
                                                            <option value="0.03">3%</option>
                                                            <option value="0.05">5%</option>
                                                            <option value="0.07">7%</option>
                                                        </select>
                                                    </div>
                                                    <!-- /.form-group -->
                                                </div>
                                                <div class="col col-4">
                                                    <div class="form-group">
                                                        <label>Price</label>
                                                        <input type="text" name="project_price" class="form-control" id="price" onkeyup="sum1();" placeholder="" required>
                                                    </div>
                                                </div>
                                                <div class="col col-4">
                                                    <div class="form-group">
                                                        <label>QTY</label>
                                                        <input type="text" name="project_qty" class="form-control" id="qty" onkeyup="sum1();" placeholder="" required>
                                                    </div>

                                                </div>
                                            </div>



                                            <div class="row">
                                                <div class="col col-4">
                                                    <div class="form-group">
                                                        <label>Sales No Vat</label>
                                                        <input type="text" name="project_sales_novat" class="form-control" id="salvn" onkeyup="sum1();" style="background-color:#F8F8FF" placeholder="" required>
                                                        <input type="hidden" name="project_sales_novat" class="form-control" value="0.07" onkeyup="sum1();" placeholder="" required>
                                                    </div>
                                                </div>

                                                <div class="col col-4">
                                                    <div class="form-group">
                                                        <label>Sales Vat</label>
                                                        <input type="text" name="project_sales" class="form-control" id="svat" onkeyup="sum1();" value="" style="background-color:#F8F8FF" placeholder="" required>
                                                    </div>
                                                </div>
                                                <div class="col col-4">
                                                    <div class="form-group">
                                                        <label>Cost No Vat</label>
                                                        <input type="text" name="project_cost_novat" class="form-control" id="cost" onkeyup="sum1();" placeholder="" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col col-4">
                                                    <div class="form-group">
                                                        <label>Estimated GP (%)</label>
                                                        <input type="text" name="project_es_gp" class="form-control" id="txt3" placeholder="" required>
                                                    </div>

                                                </div>
                                                <div class="col col-4">
                                                    <div class="form-group">
                                                        <label>GP (%)</label>
                                                        <input type="text" name="project_gp" class="form-control" id="gp" onkeyup="sum1();" style="background-color:#F8F8FF" id="exampleInputEmail1" placeholder="" required>
                                                    </div>
                                                </div>
                                                <div class="col col-4">
                                                    <div class="form-group">
                                                        <label>% Potential</label>
                                                        <input type="text" name="project_pot" class="form-control" id="exampleInputEmail1" placeholder="" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label>Estimated Sales</label>
                                                <input type="text" name="project_es_sales" class="form-control" id="exampleInputEmail1" placeholder="" required>
                                            </div>

                                            <!-- textarea -->
                                            <div class="form-group">
                                                <label>Meaning</label>
                                                <input type="text" name="project_mean" class="form-control" id="exampleInputEmail1" placeholder="" required>
                                            </div>

                                            <!-- textarea -->
                                            <div class="form-group">
                                                <label>Remark</label>
                                                <textarea class="form-control" name="project_remark" id="project_remark" rows="4" placeholder=""></textarea>
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
                            <!-- /.col (right) -->

                            <!-- /.col (left) -->
                            <div class="col-md-6">


                                <!-- /.col (left) -->
                                <div class="card card-warning">
                                    <div class="card-header">
                                        <h3 class="card-title">Project Perprotise</h3>
                                    </div>
                                    <div class="card-body">

                                        <div class="form-group">
                                            <label>Status Project<span class="text-danger">*</span></label>
                                            <select class="form-control select2" name="project_up_status" required style="width: 100%;">
                                                <option selected="selected">Select</option>
                                                <option>Win</option>
                                                <option>Lost</option>
                                            </select>
                                        </div>
                                        <!-- /.form-group -->

                                        <div class="form-group">
                                            <label>Status<span class="text-danger">*</span></label>
                                            <select class="form-control select2" name="project_status" required style="width: 100%;">
                                                <option selected="selected">Wait Approve</option>
                                                <option>On Process</option>
                                                <option>Complated</option>
                                            </select>
                                        </div>
                                        <!-- /.form-group -->

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Quarter</label>
                                            <input type="text" name="project_quarter" class="form-control" value="" id="exampleInputEmail1" placeholder="2023/1">
                                        </div>
                                        <!-- /.form-group -->
                                    </div>
                                    <div class="card-footer">
                                        Visit <a href="https://getdatepicker.com/5-4/">tempusdominus </a> for more
                                        examples and information about
                                        the plugin.
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->

                                <div class="card card-success">
                                    <div class="card-header">
                                        <h3 class="card-title">Customer descriptions</h3>
                                    </div>
                                    <div class="card-body">

                                        <div class="row">
                                            <div class="col col-6">
                                                <div class="form-group">
                                                    <?php   
                                                    $contact_fullname = "";
                                                    $_sql_contact_fullname = "SELECT DISTINCT contact_fullname FROM contact";
                                                    $query_contact_fullname = mysqli_query($conn, $_sql_contact_fullname);
                                                    ?>

                                                    <label>Customer Name<span class="text-danger">*</span></label>
                                                    <select class="custom-select select2" name="contact_fullname">
                                                        <option value="">Select</option>
                                                        <?php while ($rg = mysqli_fetch_array($query_contact_fullname)) { ?>
                                                            <option value="<?php echo $rg["contact_fullname"]; ?>" <?php if ($rg['contact_fullname'] == $contact_fullname) : ?> selected="selected" <?php endif; ?>>
                                                                <?php echo $rg["contact_fullname"]; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <!-- /.form-group -->

                                            </div>
                                            <div class="col col-4">
                                                <div class="form-group">
                                                    <label>Add <i class=" style=" color: #1f5d09;></i></label><br>
                                                    <a href="#" class="btn btn-info btn-sm " data-toggle="modal" data-target="#editbtn"> <i class="nav-icon fas fa-plus"></i></a>
                                                </div>
                                                <!-- /.form-group-->
                                            </div>
                                            <div class="col col-4">

                                            </div>
                                        </div>

                                        <!-- Date range -->
                                        <div class="form-group mt-5">
                                            <button type="submit" name="submit" value="submit" class="btn btn-success">Save</button>
                                        </div>
                                        <!-- /.form group -->

                                        </form>

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
                            <!-- /.card -->
                        </div>
                        <!-- /.col (right) -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
        </section>
        <!-- /.content -->


    </div>
    <!-- /.content-wrapper -->


    <!----------------------------- start menu ------------------------------->
    <?php include("../ino/templated/footer.php"); ?>
    <!----------------------------- end menu --------------------------------->

    <!-- highlight -->
    <script src="code/dist/js/highlight.js"></script>

    <script>
        $("#myTable tr").highlight();
    </script>
    <!-- highlight -->



    <!----------------------------- start Modal Add user ------------------------------->
    <?php
    if (isset($_POST['submit1'])) { /* ถ้า POST มีการกด Submit ให้ทำส่วนล่าง */
        /* ประกาศตัวแปลเก็บค่า  POST ที่รับมาจาก INPUT  */
        $contact_fullname  = $_POST['contact_fullname'];
        $contact_position  = $_POST['contact_position'];
        $contact_agency = $_POST['contact_agency'];
        $contact_tel = $_POST['contact_tel'];
        $contact_email = $_POST['contact_email'];
        $contact_detail = $_POST['contact_detail'];
        $contact_company = $_POST['contact_company'];
        $contact_type = $_POST['contact_type'];
        $contact_staff = $_POST['contact_staff'];
        $contact_province = sha1($_POST['contact_province']);

        //print_r($_POST);
        //check duplicat
        $sql = "SELECT * From contact WHERE contact_fullname = '$contact_fullname' OR contact_email = '$contact_email' OR contact_tel = '$contact_tel'";
        $result = $conn->query($sql);
        $num = mysqli_num_rows($result);

        // print_r($result); 
        // print_r($num);
        //ถ้า username ซ้ำ ให้เด้งกลับไปหน้าสมัครสมาชิก ปล.ข้อความใน sweetalert ปรับแต่งได้ตามความเหมาะสม
        if ($num > 0) {
            echo '<script>
                        setTimeout(function() {
                            swal({
                                    title: "The data already exists in the system.!! ",  
                                    text: "Please check the information again.",
                                    type: "warning"
                                }, function() {
                                    window.location = "#"; //หน้าที่ต้องการให้กระโดดไป
                                    });
                                    }, 1000);
                                </script>';
        } else {
            //ถ้า username ไม่ซ้ำ เก็บข้อมูลลงตาราง

            //sql insert
            $sql = "INSERT INTO `contact` ( `contact_fullname`,`contact_position`,`contact_agency`,
                                        `contact_tel`, `contact_email`, `contact_detail`, `contact_company`, `contact_type`, `contact_staff`,
                                        `contact_province`)
                                    VALUES ('$contact_fullname','$contact_position','$contact_agency','$contact_tel', '$contact_email',
                                        '$contact_detail', '$contact_company', '$contact_type', '$contact_staff', '$contact_province')";

            $result = $conn->query($sql);
            if ($result) {
                echo '<script>
                                                setTimeout(function() {
                                                swal({
                                                        title: "Save data successfully",
                                                        text: "",
                                                        type: "success"
                                                    }, function() {
                                                        window.location = "project_add.php"; //หน้าที่ต้องการให้กระโดดไป
                                                        });
                                                        }, 1000);
                                                    </script>';
            } else {
                echo '<script>
                                                setTimeout(function() {
                                                swal({
                                                        title: "Please check the information again.",
                                                        type: "error"
                                                }, function() {
                                                        window.location = "project_add.php"; //หน้าที่ต้องการให้กระโดดไป
                                                        });
                                                        }, 1000);
                                                    </script>';
            }
            $conn = null; //close connect db
        } //else chk dup

    } //isset 
    //devbanban.com
    ?>

    <div class="modal fade" id="editbtn">
        <div class="modal-dialog editbtn">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Customer</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="project_add.php" method="POST" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Type<span class="text-danger">*</span></label>
                                <select class="form-control select2" name="contact_type" required style="width: 100%;">
                                    <option selected="selected">Select</option>
                                    <option>Staff</option>
                                    <option>Customer</option>
                                    <option>Partner</option>
                                    <option>Sale</option>
                                </select>
                            </div>
                            <!-- /.form-group -->

                            <div class="form-group">
                                <label for="contact_fullname">Full Name<span class="text-danger">*</span></label>
                                <input type="text" name="contact_fullname" class="form-control" id="contact_fullname" placeholder="" required>
                            </div>
                            <!-- /.form-group -->

                            <div class="form-group">
                                <label for="contact_position">Position<span class="text-danger">*</span></label>
                                <input type="text" name="contact_position" class="form-control" id="contact_position" placeholder="" required>
                            </div>
                            <!-- /.form-group -->

                            <div class="form-group">
                                <label for="contact_company">Company<span class="text-danger">*</span></label>
                                <input type="text" name="contact_company" class="form-control" id="contact_company" placeholder="" required>
                            </div>
                            <!-- /.form-group -->

                            <div class="form-group">
                                <label>Agency<span class="text-danger">*</span></label>
                                <input type="text" name="contact_agency" class="form-control" id="contact_agency" placeholder="">


                                <input type="hidden" name="contact_staff" class="form-control" value="<?php echo ($_SESSION['fullname']); ?>" placeholder="">

                            </div>
                            <!-- /.form-group -->

                            <!-- textarea -->
                            <div class="form-group">
                                <label>Address</label>
                                <textarea class="form-control" name="contact_detail" id="contact_detail" rows="4" placeholder=""></textarea>
                            </div>


                            <div class="form-group">
                                <label>Province<span class="text-danger">*</span></label>
                                <select class="form-control select2" name="contact_province" required style="width: 100%;">
                                    <option selected="selected">Select</option>
                                    <option>Staff</option>
                                    <option>Customer</option>
                                    <option>Partner</option>
                                    <option>Sale</option>
                                </select>
                            </div>
                            <!-- /.form-group -->

                            <div class="form-group">
                                <label for="exampleInputEmail1">Phone Number</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                    </div>
                                    <input type="text" class="form-control" name="contact_tel" id="tel" data-inputmask='"mask": "(999) 999-9999"' data-mask required>
                                </div>
                                <!-- /.input group -->
                            </div>

                            <p>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                    </div>
                                    <input type="email" class="form-control" name="contact_email" id="email" placeholder="Email" required>
                                </div>
                            </div>
                            <!-- /.form-group -->

                        </div>

                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit1" name="submit1" value="submit1" class="btn btn-success">Save</button>
                </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    <!----------------------------- end Modal Add user --------------------------------->