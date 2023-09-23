<!DOCTYPE html>
<html lang="en">
<?php $menu = "contact"; ?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>INO | Custormer Project</title>


    <!----------------------------- start header ------------------------------->
    <?php include("../ino/templated/head.php"); ?>
    <!----------------------------- end header --------------------------------->

    <!----------------------------- start menu ------------------------------->
    <?php include("../ino/templated/menu.php"); ?>
    <!----------------------------- end menu --------------------------------->

    <!----------------------------- start Time ------------------------------->
    <?php
    date_default_timezone_set('asia/bangkok');
    $date = date('m/d/Y');
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
                        <h1>Custormer Project</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active">Custormer Project</li>
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
                            $contact_group  = $_POST['contact_group']; /* ประกาศตัวแปลเก็บค่า  POST ที่รับมาจาก INPUT  */
                            $contact_name = $_POST['contact_name'];
                            $contact_position = $_POST['contact_position'];
                            $contact_phone = $_POST['contact_phone'];
                            $contact_email = $_POST['contact_email'];
                            $contact_company = $_POST['contact_company'];
                            $contact_address = $_POST['contact_address'];
                            $contact_date = $_POST['contact_date'];
                            $contact_team = $_POST['contact_team'];

                             // print_r($_POST);
                            //check duplicat
                            $sql = "SELECT * From contact WHERE contact_tel = '$contact_tel' OR contact_email = '$contact_email'";
                            //$stmt->bindParam(':username', $username , PDO::PARAM_STR);
                            $result = $conn->query($sql);
                            $num = mysqli_num_rows($result);
                            //ถ้า username ซ้ำ ให้เด้งกลับไปหน้าสมัครสมาชิก ปล.ข้อความใน sweetalert ปรับแต่งได้ตามความเหมาะสม
                            if($num > 0){
                                echo '<script>
                                            setTimeout(function() {
                                            swal({
                                                title: "Username or email ซ้ำ มีผู้ใช้งานอยู่ในระบบแล้ว !! ",  
                                                text: "กรุณาสมัครใหม่อีกครั้ง",
                                                type: "warning"
                                            }, function() {
                                                window.location = "contact_copy.php?id='.$_GET['id'].'"; //หน้าที่ต้องการให้กระโดดไป
                                            });
                                            }, 1000);
                                    </script>';
                            }else{ 


                            // print_r($_POST);
                            $sql =  "INSERT INTO `tb_contact` (`contact_id`, `contact_group`,`contact_name`, `contact_position`, `contact_phone`, `contact_email`, `contact_address`, `contact_company`, `contact_date`, `contact_team`) 
                            VALUES (NULL, '$contact_group', '$contact_name', '$contact_position', '$contact_phone', '$contact_email', '$contact_address', '$contact_company', '$contact_date', '$contact_team')";
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
                                                window.location = "contact.php";
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
                                                window.location = "contact_is.php";
                                            })
                                        },1000);
                                    </script>';
                                // echo "<script>alert('ยินดีตอนรับ Admin เข้าสู่ระบบ'); window.location='../index.php'</script>";
                            }
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
                            <div class="col-md-12">
                                <div class="card card-warning">
                                    <div class="card-header">
                                        
                                        <h3 class="card-title">Custormer Descriptions</h3>
                                    </div>
                                    <div class="card-body">

                                    <form action="#" method="POST" enctype="multipart/form-data">

                                        <div class="form-group">
                                            <label>ประเภท<span class="text-danger">*</span></label>
                                            <select class="form-control select2" name="contact_group" required
                                                style="width: 100%;">
                                                <option selected="selected">Customer</option>
                                                <option>Customer</option>
                                                <option>Sale</option>
                                                <option>Staff</option>
                                            </select>
                                        </div>
                                        <!-- /.form-group -->


                                        <div class="form-group">
                                            <label for="exampleInputEmail1">ชื่อ-สกุล<span
                                                    class="text-danger">*</span></label>
                                            <input type="text" name="contact_name" class="form-control"
                                                id="exampleInputEmail1" placeholder="ชื่อลูกค้า">
                                        </div>
                                        <!-- /.form-group -->

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">บริษัท</label>
                                            <input type="text" name="contact_company" class="form-control"
                                                id="exampleInputEmail1" placeholder="บริษัท">
                                        </div>
                                        <!-- /.form-group -->

                                        <!-- textarea -->
                                        <div class="form-group">
                                            <label>ที่อยู่</label>
                                            <textarea class="form-control" name="contact_address" id="contact_address" rows="5"
                                                placeholder="รายละเอีดยที่อยู่บริษัท(ถ้ามี)....."></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">ตำแหน่ง</label>
                                            <input type="text" name="contact_position" class="form-control"
                                                id="exampleInputEmail1" placeholder="ตำแหน่ง">
                                        </div>
                                        <!-- /.form-group -->

                                        <div class="form-group">
                                                <label>ทีม</label>
                                                <select class="form-control select2" name="contact_team" 
                                                    style="width: 100%;" >
                                                    <option selected="selected">เลือก</option>
                                                    <option>Services</option>
                                                    <option>Innovation</option>
                                                    <option>Sale Maketing</option>
                                                    <option>Infrastructure</option>
                                                    <option>Customer</option>
                                                </select>
                                            </div>
                                            <!-- /.form-group -->


                                        <div class="form-group">
                                            <label for="exampleInputEmail1">เบอร์โทรศัทพ์</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                                </div>
                                                <input type="text" class="form-control" name="contact_phone"
                                                    data-inputmask='"mask": "(999) 999-9999"' data-mask>
                                            </div>
                                            <!-- /.input group -->
                                        </div>
                                        <p>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Email</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                            class="fas fa-envelope"></i></span>
                                                </div>
                                                <input type="email" class="form-control" name="contact_email"
                                                    id="sale_email" placeholder="Email">
                                            </div>
                                        </div>
                                        <!-- /.form-group -->


                                        <!-- วันเริ่มต้นโครงการ -->
                                        <div class="form-group">
                                            <label>วันที่บันทึกข้อมูล</label>
                                            <div class="input-group date" id="reservationdate"
                                                data-target-input="nearest">
                                                <input type="text" name="contact_date" value="<?php echo $date; ?>"
                                                    class="form-control datetimepicker-input"
                                                    data-target="#reservationdate" />
                                                <div class="input-group-append" data-target="#reservationdate"
                                                    data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Date range -->
                                        <div class="form-group mt-5">
                                            <button type="submit" name="submit" value="submit"
                                                class="btn btn-success">Save</button>
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