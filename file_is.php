<!DOCTYPE html>
<html lang="en">
<?php $menu = "project"; ?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>INO | Attachment</title>


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
                        <h1>Open Attachment</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active">Open Attachment</li>
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


                            $file_pk = $_POST['file_pk'];
                            $project_cate = $_POST['project_cate'];
                            $file_date = $_POST['file_date'];
                            $file_type = $_POST['file_type'];
                            $file_name = $_POST['file_name'];
                            $file_status = $_POST['file_status'];
                            $file_staff = $_POST['file_staff'];
                            $file_link = $_POST['file_link'];
                            
    
    
                            $file_upfile = $_FILES['file_upfile']['name'];
                            $file_tmp = $_FILES['file_upfile']['tmp_name'];
                    
                            move_uploaded_file($file_tmp, "../ino/file/$file_upfile");

  
    
                            $sql =  "INSERT INTO `tb_files` (`files_id`, `file_pk`, `project_cate`,`file_date`, `file_type`, `file_name`, `file_status`, `file_staff`, `file_upfile`, `file_link`) 
                            VALUES (NULL, '$file_pk', '$project_cate', '$file_date', '$file_type', '$file_name', '$file_status', '$file_staff', '$file_upfile', '$file_link')";
                            $result = $conn->query($sql);



                            //  print_r($_POST);

                            if ($result) {
                                // <!-- sweetalert -->
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
                                // echo "<script>alert('ยินดีตอนรับ Admin เข้าสู่ระบบ'); window.location='project_view.php?id=$_GET[id]'</script>";
                            } else {
                                // <!-- sweetalert -->
                                echo '<script>
                                        setTimeout(function(){
                                            swal({
                                                title: "Can Not Save Successfully!",
                                                text: "Checking Your Data",
                                                type:"warning"
                                            }, function(){
                                                window.location = "file_is.php?id='.$_GET['id'].'";
                                            })
                                        },1000);
                                    </script>';
                            }
                        }
                        // echo '<pre>';
                        // print_r($_POST);
                        // print_r($_FILES);
                        // echo '</pre>';


                            /* แสดงข้อมูล */
                            $rs = $conn->query("SELECT * FROM tb_project WHERE project_id=" . $_GET['id']);
                            /* ประกาศตัวแปลเก็บค่า เชื่อมต่อฐานข้อมูล อ่าน/เขียนค่าข้อมูล เรียกตารางออกมา โดยมีเงื่อนไข = การรับค่า Get ID มาจาก Form ที่มีการเขึยน form_edit-a.php?id_p=<?=$sr->id_p;?>
                        */
                        $r = $rs->fetch_object()

                        ?>
                        <!-- เพิ่มข้อมูล -->

                        <div class="row">
                            <!-- /.col (left) -->
                            <div class="col-md-12 ">
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">Attachment descriptions</h3>
                                    </div>

                                    <form action="#" method="POST" enctype="multipart/form-data">

                                        <div class="card-body">


                                            <div class="form-group">
                                                <label for="exampleInputEmail1">วันที่บันทึกข้อมูล:</label>
                                                <div class="input-group date">
                                                <input type="text" name="file_date" value="<?php echo $date; ?>" class="form-control"
                                                    id="exampleInputEmail1"
                                                    placeholder="">

                                                    <div class="input-group-append" data-target="#reservationdatetime"
                                                        data-toggle="datetimepicker">
                                                        <div class="input-group-text"><i class="fa fa-calendar"></i>
                                                        </div>
                                                    </div>
                                                    </div>
                                            </div>
                                            <!-- /.form-group -->

                                            <div class="form-group">
                                                <label>ประเภทไฟล์</label>
                                                <select class="form-control select2" name="file_type"
                                                    style="width: 100%;" >
                                                    <option selected="selected"></option>
                                                    <option>Presentation</option>
                                                    <option>Document</option>
                                                    <option>Excel</option>
                                                    <option>PDF</option>
                                                    <option>JPG/PNG</option>
                                                    <option>Video</option>
                                                    <option>Other</option>
                                                </select>
                                            </div>
                                            <!-- /.form-group -->


                                            <div class="form-group">
                                                <label>รูปแบบการใช้งาน<span class="text-danger">*</span></label>
                                                <select class="form-control select2" name="project_cate"
                                                    value="<?= $r->project_cate; ?>" style="width: 100%;" required>
                                                    <option selected="selected"><?= $r->project_cate; ?></option>
                                                </select>
                                            </div>
                                            <!-- /.form-group -->


                                            <div class="form-group">
                                            <label for="exampleInputEmail1">ตั้งชื่อไฟล์</label>
                                                <input type="text" name="file_name" class="form-control"
                                                    id="exampleInputEmail1" placeholder="ตั้งชื่อไฟล์งาน" required>
                                                <input type="hidden" class="form-control " id="file_pk" name="file_pk"
                                                    value="<?= $r->project_id; ?>" required >
                                            </div>
                                            <!-- /.form-group -->

                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Link Form Drive</label>
                                                <input type="text" name="file_link" class="form-control"
                                                    id="exampleInputEmail1"
                                                    placeholder="Link Files Google Drive (ถ้ามี)">
                                            </div>
                                            <!-- /.form-group -->

                                            <div class="form-group">
                                                <label for="exampleInputEmail1">แนบเอกสาร</label>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="file_upfile"
                                                        name="file_upfile" >
                                                    <label class="custom-file-label" for="customFile">Choose
                                                        file</label>
                                                </div>
                                            </div>
                                            <!-- /.form-group -->

                                            <!-- /.form-group -->
                                            <div class="form-group">
                                                <label>ผู้บันทึก<span class="text-danger">*</span></label>
                                                <select class="form-control select2" name="file_staff" required
                                                    style="width: 100%;">
                                                    <option selected="selected">คุณภัทราอร อมรโอภาคุณ</option>
                                                    <option>คุณภัทราอร อมรโอภาคุณ</option>
                                                    <option>คุณอภิรักษ์ บางพุก</option>
                                                </select>
                                            </div>
                                            <!-- /.form-group -->

                                            <div class="form-group">
                                                <label for="exampleInputEmail1">ตั้งชื่อ Folder</label>
                                                <input type="text" name="file_status" class="form-control"
                                                    id="exampleInputEmail1"
                                                    placeholder="">
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
                                    Visit <a href="https://getdatepicker.com/5-4/">tempusdominus </a> for more examples
                                    and information about
                                    the plugin.
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                            <!-- /.card -->
                        </div>
                        <!-- /.col (right) -->
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