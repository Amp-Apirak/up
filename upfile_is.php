<!DOCTYPE html>
<html lang="en">
<?php $menu = "project"; ?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>INO | Opent Image</title>


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

/* Start insert Data */

if(isset($_POST['submit'])){

    $project_id = $_POST['project_id'];
    $upfile_sub = $_POST['upfile_sub'];
    $upfile_name = $_POST['upfile_name'];
    $upfile_date = $_POST['upfile_date'];
    
    $num =  count($_FILES['upfile']['name']);

    for ($i=0;$i<$num;$i++){
        $fp = fopen($_FILES["upfile"]["tmp_name"][$i],"r");
        $ReadBinary = fread($fp,filesize($_FILES["upfile"]["tmp_name"][$i]));
        fclose($fp);
        $filedata = addslashes($ReadBinary);

        $filename = $_FILES['upfile']['name'][$i];
        $filesize = $_FILES['upfile']['size'][$i];
        $filetype = $_FILES['upfile']['type'][$i];

        $dir = "../ino/image/";
        $fileimage = $dir . basename($_FILES["upfile"]["name"][$i]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($fileimage,PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
                             
                         
                            
            // Check if file already exists
            if (file_exists($fileimage)) {
              echo "<script>alert('Sorry, file already exists.'); window.location='upfile_is.php?id=$_GET[id]'</script>";
              $uploadOk = 0;
            }
            

            
            // Allow certain file formats
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" 
            && $imageFileType != "gif" ) {
              echo "<script>alert('Sorry, only  JPG, JPEG, PNG & GIF files are allowed.); window.location='upfile_is.php?id=$_GET[id]'</script>";
              $uploadOk = 0;
            }
        }

        move_uploaded_file($_FILES["upfile"]["tmp_name"][$i],$fileimage);
    
        $sql =  "INSERT INTO `tb_upfile` (`upfile_id`, `project_id`, `upfile_sub`, `upfile_name`, `upfile_date`, `upfile`) VALUES (NULL, '$project_id','$upfile_sub','$upfile_name', '$upfile_date','$filename')";
        $result = $conn->query($sql);

         //  print_r($_POST);
         //echo  $fileimage;

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
                            window.location = "upfile_is.php?id='.$_GET['id'].'";
                        })
                    },1000);
                </script>';
        }
    
    // echo '<pre>';
    // print_r($_POST);
    // print_r($_FILES);
    // echo '</pre>';

    }
}
    // echo '<pre>';
    // print_r($_POST);
    // print_r($_FILES);
    // echo '</pre>';
/* End insert Data */

      /* แสดงข้อมูล */
      $rs = $conn->query("SELECT * FROM tb_project WHERE project_id=" . $_GET['id']);
      /* ประกาศตัวแปลเก็บค่า เชื่อมต่อฐานข้อมูล อ่าน/เขียนค่าข้อมูล เรียกตารางออกมา โดยมีเงื่อนไข = การรับค่า Get ID มาจาก Form ที่มีการเขึยน form_edit-a.php?id_p=<?=$sr->id_p;?>
  */
     $r = $rs->fetch_object()
    

  ?>
  <!-- เพิ่มข้อมูล -->

                        <!-- เพิ่มข้อมูล -->

                        <div class="row">
                            <!-- /.col (left) -->
                            <div class="col-md-12 ">
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">Attachment descriptions</h3>
                                    </div>

                                    <form name="frmUpload" id="frmUpload" method="Post" action="#" enctype="multipart/form-data">

                                        <div class="card-body">

                                            <!-- Date and time -->
                                            <div class="form-group">
                                                <label>วันที่บันทึกข้อมูล:</label>
                                                <div class="input-group date">
                                                    <input type="text" value="<?php echo $date; ?>" name="upfile_date"
                                                        class="form-control datetimepicker-input"
                                                        data-target="#reservationdatetime" />
                                                    <div class="input-group-append" data-target="#reservationdatetime"
                                                        data-toggle="datetimepicker">
                                                        <div class="input-group-text"><i class="fa fa-calendar"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /Date and time -->

                                            <div class="form-group">
                                                <label for="exampleInputEmail1">ตั้งชื่อ Folder รูปภาพ</label>
                                                <input type="text" name="upfile_sub" class="form-control"
                                                    id="exampleInputEmail1"
                                                    placeholder="">

                                                    <input type="hidden" class="form-control " id="project_id" name="project_id"
                                                    value="<?= $r->project_id; ?>" required>
                                            </div>
                                            <!-- /.form-group -->

                                            <div class="form-group">
                                                <label for="exampleInputEmail1">แนบเอกสาร<span
                                                        class="text-danger">*</span></label>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="upfile[]" name="upfile[]" multiple="true" required>
                                                    <label class="custom-file-label" for="customFile">Choose
                                                        file</label>
                                                </div>
                                            </div>
                                            <!-- /.form-group -->

                                            <!-- /.form-group -->
                                            <div class="form-group">
                                                <label>ผู้บันทึก<span class="text-danger">*</span></label>
                                                <select class="form-control select2" name="upfile_name" required
                                                    style="width: 100%;">
                                                    <option selected="selected">คุณภัทราอร อมรโอภาคุณ</option>
                                                    <option>คุณภัทราอร อมรโอภาคุณ</option>
                                                    <option>คุณอภิรักษ์ บางพุก</option>
                                                </select>
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