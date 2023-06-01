<!DOCTYPE html>
<html lang="en">
<?php $menu = "account"; ?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>INO | Modify Account</title>


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
                        <h1>Modify Account</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active"> Modify Account</li>
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

                            $user_date  = $_POST['user_date']; /* ประกาศตัวแปลเก็บค่า  POST ที่รับมาจาก INPUT  */
                            $user_name = $_POST['user_name'];
                            $user_lastname = $_POST['user_lastname'];
                            $user_position = $_POST['user_position'];
                            $user_team = $_POST['user_team'];
                            $user_role = $_POST['user_role'];
                            $user_email = $_POST['user_email'];
                            $user_tel = $_POST['user_tel'];
                            $user_company = $_POST['user_company'];
                            $username = $_POST['username'];


                        
                            // print_r($_POST);

                            
                            $sql =  "UPDATE `tb_user` SET `user_date` = '$user_date', `user_name` = '$user_name', `user_lastname` = '$user_lastname', 
                                    `user_position` = '$user_position', `user_team` = '$user_team', `user_role` = '$user_role', `user_email` = '$user_email', 
                                    `user_tel` = '$user_tel', `user_company` = '$user_company', `username` = '$username' WHERE user_id=" . $_GET['user_id'];

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
                                                window.location = "account.php";
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
                                                window.location = "account_edit.php";
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

                        /* แสดงข้อมูล */
                        $rs = $conn->query("SELECT * FROM tb_user WHERE user_id=" . $_GET['user_id']);
                        /* ประกาศตัวแปลเก็บค่า เชื่อมต่อฐานข้อมูล อ่าน/เขียนค่าข้อมูล เรียกตารางออกมา โดยมีเงื่อนไข = การรับค่า Get ID มาจาก Form ที่มีการเขึยน form_edit-a.php?id_p=<?=$sr->id_p;?>
                        */
                        $r = $rs->fetch_object()

                        ?>


                        <!-- เพิ่มข้อมูล -->
                        <div class="row">
                            <!-- /.col (left) -->
                            <div class="col-md-6">
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">Descriptions Info</h3>
                                    </div>

                                    <form action="#" method="POST" enctype="multipart/form-data">

                                        <div class="card-body">

                                            <div class="form-group">
                                                <label for="user_name">ชื่อ<span class="text-danger">*</span></label>
                                                <input type="text" name="user_name" value="<?= $r->user_name; ?>"
                                                    class="form-control" id="user_name" placeholder="">
                                            </div>
                                            <!-- /.form-group -->

                                            <div class="form-group">
                                                <label for="user_lastname">นามสกุล<span
                                                        class="text-danger">*</span></label>
                                                <input type="text" name="user_lastname" class="form-control"
                                                    value="<?= $r->user_lastname; ?>" id="user_lastname" placeholder="">
                                            </div>
                                            <!-- /.form-group -->

                                            <div class="form-group">
                                                <label for="user_position">ตำแหน่ง<span
                                                        class="text-danger">*</span></label>
                                                <input type="text" name="user_position" class="form-control"
                                                    value="<?= $r->user_position; ?>" id="user_position" placeholder=""
                                                    required>
                                            </div>
                                            <!-- /.form-group -->

                                            <div class="form-group">
                                                <label>ทีม<span class="text-danger">*</span></label>
                                                <select class="form-control select2" name="user_team" required
                                                    style="width: 100%;">
                                                    <option selected="selected"><?= $r->user_team; ?></option>
                                                    <option>Innovation</option>
                                                    <option>Infrastructure</option>
                                                    <option>Accounting</option>
                                                    <option>Stock</option>
                                                    <option>Service Solution</option>
                                                    <option>Service bank</option>
                                                </select>

                                                <input type="hidden" name="user_date" value="<?php echo $date; ?>"
                                                    class="form-control datetimepicker-input"
                                                    data-target="#reservationdate" />
                                            </div>
                                            <!-- /.form-group -->

                                            <div class="form-group">
                                                <label>บทบาท<span class="text-danger">*</span></label>
                                                <select class="form-control select2" name="user_role" required
                                                    style="width: 100%;">
                                                    <option selected="selected"><?= $r->user_role; ?></option>
                                                    <option>Administrator</option>
                                                    <option>Engineer</option>
                                                    <option>Viewer</option>
                                                </select>
                                            </div>
                                            <!-- /.form-group -->



                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Phone Number</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i
                                                                class="fas fa-phone"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="user_tel"
                                                        value="<?= $r->user_tel; ?>"
                                                        data-inputmask='"mask": "(999) 999-9999"' data-mask required>
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
                                                    <input type="email" class="form-control" name="user_email"
                                                        value="<?= $r->user_email; ?>" placeholder="Email" required>
                                                </div>
                                            </div>
                                            <!-- /.form-group -->


                                            <div class="form-group">
                                                <label for="user_company">ชื่อบริษัท<span
                                                        class="text-danger">*</span></label>
                                                <input type="text" name="user_company" class="form-control"
                                                    value="<?= $r->user_company; ?>" id="user_company" placeholder="">
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
                                <!-- /.card -->
                            </div>
                            <!-- /.col (right) -->

                            <!-- /.col (left) -->
                            <div class="col-md-6">
                                <div class="card card-success">
                                    <div class="card-header">
                                        <h3 class="card-title">Account descriptions</h3>
                                    </div>
                                    <div class="card-body">


                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Username</label>
                                            <input type="text" name="username" class="form-control"
                                                value="<?= $r->username; ?>" id="exampleInputEmail1" placeholder="">
                                        </div>
                                        <!-- /.form-group -->

                                        <div class="form-group">
                                            <label for="exampleInputEmail1" > Reset Password</label>

                                        </div>
                                        <!-- /.form-group -->

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