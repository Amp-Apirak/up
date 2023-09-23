<!DOCTYPE html>
<html lang="en">
<?php $menu = "service"; ?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>INO | Edit Service Pattern</title>


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
                        <h1>Edit Service Pattern</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active">Edit Service Pattern</li>
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


                        /* แสดงข้อมูล */

                        $rs = $conn->query("SELECT * FROM category WHERE cat_id=" . $_GET['id']);
                        /* ประกาศตัวแปลเก็บค่า เชื่อมต่อฐานข้อมูล อ่าน/เขียนค่าข้อมูล เรียกตารางออกมา โดยมีเงื่อนไข = การรับค่า Get ID มาจาก Form ที่มีการเขึยน form_edit-a.php?id_p=<?=$sr->id_p;?> */
                        $r = $rs->fetch_object();

                        /* แสดงข้อมูล */

                            if (isset($_POST['submit'])) { /* ถ้า POST มีการกด Submit ให้ทำส่วนล่าง */
                            $cat_scat  = $_POST['cat_scat']; /* ประกาศตัวแปลเก็บค่า  POST ที่รับมาจาก INPUT  */
                            $cat_sub = $_POST['cat_sub'];
                            $cat_item = $_POST['cat_item'];
                            $problem = $_POST['problem'];
                            $site = $_POST['site'];
                            $cat_case = $_POST['cat_case'];
                            $cat_resovle = $_POST['cat_resovle'];
                            $cat_staff = $_POST['cat_staff'];
                            $cat_type = $_POST['cat_type'];
                        
                        
 
                            $sql =  "UPDATE `category` SET `cat_scat` = '$cat_scat', `cat_sub` = '$cat_sub', `cat_item` = '$cat_item', `problem` = '$problem', `site` = '$site', `cat_case` = '$cat_case', `cat_resovle` = '$cat_resovle', `cat_staff` = '$cat_staff', `cat_type` = '$cat_type' WHERE cat_id=" . $_GET['id'];
                        
                            $result = $conn->query($sql);
                        
                            //  print_r($sql);
                            if ($result) {
                            // <!-- sweetalert -->
                            echo '<script>
                                    setTimeout(function(){
                                        swal({
                                            title: "Update Successfully!",
                                            text: "Thank You . ",
                                            type:"success"
                                        }, function(){
                                            window.location = "service.php";
                                        })
                                    },1000);
                                </script>';
                            // echo "<script>alert('ยินดีตอนรับ Admin เข้าสู่ระบบ'); window.location='../index.php'</script>";
                            } else {
                            // <!-- sweetalert -->
                            echo '<script>
                                    setTimeout(function(){
                                        swal({
                                            title: "Can Not Update Successfully!",
                                            text: "Checking Your Data",
                                            type:"warning"
                                        }, function(){
                                            window.location = "service.php";
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

                      
                        <div class="row">
                            <!-- /.col (left) -->
                            <div class="col-md-12">
                                <div class="card card-warning">
                                    <div class="card-header">
                                        <h3 class="card-title">Contact Descriptions</h3>
                                    </div>
                                    <div class="card-body">

                                    <form action="service.php" method="POST" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="form-group">

                                <label>Type<span class="text-danger">*</span></label>
                                <select class="form-control select2" name="cat_type" required style="width: 100%;">
                                    <option selected="selected"><?= $r->cat_type; ?></option>
                                    <option>Incident</option>
                                    <option>Service</option>
                                </select>
                            </div>
                            <!-- /.form-group -->
                            <div class="form-group">
                                <label for="cat_scat">Service Category<span class="text-danger">*</span></label>
                                <input type="text" name="cat_scat" class="form-control" id="cat_scat" placeholder="" value="<?= $r->cat_scat; ?>" required>
                            </div>
                            <!-- /.form-group -->

                            <div class="form-group">
                                <label for="cat_sub">Category<span class="text-danger">*</span></label>
                                <input type="text" name="cat_sub" class="form-control" id="cat_sub" placeholder="" value="<?= $r->cat_sub; ?>" required>
                            </div>
                            <!-- /.form-group -->
                            
                            <div class="form-group">
                                <label for="cat_item">Sub Category<span class="text-danger">*</span></label>
                                <input type="text" name="cat_item" class="form-control" id="cat_item" placeholder="" value="<?= $r->cat_item; ?>" required>
                            </div>
                            <!-- /.form-group -->

                             <!-- ดึงข้อมูลโปรเจคมาจาก Pipeline -->
                             <?php
                                $contact_fullname = "";
                                $_sql_contact = "SELECT DISTINCT * FROM contact ORDER BY contact_id desc";
                                $query_contact = mysqli_query($conn, $_sql_contact);
                             ?>
                             <!-- แสดงที่ดึงข้อมูลโปรเจคมาจาก Pipeline -->
                            <div class="form-group">
                                 <label>Site/Customer <span class="text-danger"><small>*Contact Required*</small></span></label>
                                    <select class="custom-select select2" name="site">
                                        <option value="<?= $r->site; ?>"><?= $r->site; ?></option>
                                            <?php while ($r = mysqli_fetch_array($query_contact)) { ?>
                                                <option value="<?php echo $r["contact_fullname"]; ?> (<?php echo $r["contact_company"]; ?>)" <?php if ($r['contact_fullname'] == $contact_fullname) : ?> selected="selected" <?php endif; ?>><?php echo $r["contact_fullname"]; ?> (<?php echo $r["contact_company"]; ?>)</option>
                                            <?php } ?>
                                    </select>
                            </div>
                             <!-- Dropdown List Project -->

                                
                            <?php
                            /* แสดงข้อมูล */

                            $rs = $conn->query("SELECT * FROM category WHERE cat_id=" . $_GET['id']);
                            /* ประกาศตัวแปลเก็บค่า เชื่อมต่อฐานข้อมูล อ่าน/เขียนค่าข้อมูล เรียกตารางออกมา โดยมีเงื่อนไข = การรับค่า Get ID มาจาก Form ที่มีการเขึยน form_edit-a.php?id_p=<?=$sr->id_p;?> */
                            $r = $rs->fetch_object();
                            ?>

                            <div class="form-group">
                                <label for="problem">Service/Problome<span class="text-danger">*</span></label>
                                <input type="text" name="problem" class="form-control" id="problem" value="<?= $r->problem; ?>" placeholder="" required>
                            </div>
                            <!-- /.form-group -->

                            <div class="form-group">
                                <label for="cat_case">Case</label>
                                <input type="text" name="cat_case" class="form-control" id="cat_case" value="<?= $r->cat_case; ?>" placeholder="" required>
                            </div>
                            <!-- /.form-group -->

                            <div class="form-group">
                                <label for="cat_resovle">Resolve</label>
                                <input type="text" name="cat_resovle" class="form-control" id="cat_resovle" placeholder="" value="<?= $r->cat_resovle; ?>" required>
                            </div>
                            <!-- /.form-group -->

                           
                            <input type="hidden" name="cat_staff" class="form-control" value="<?php echo ($_SESSION['fullname']);?>" placeholder="">

                            

                    


                        </div>

                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" name="submit" value="submit" class="btn btn-success">Save</button>
                </div>
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