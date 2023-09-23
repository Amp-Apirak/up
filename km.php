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

    <?php
        $_sql = "SELECT * FROM folder_doc";
        $query = mysqli_query($conn, $_sql);
        if(isset($_POST) && !empty($_POST)){
            //echo $_POST['folder_name'];
            //print_r($_POST);
        $folder_name = $_POST['folder_name'];
        $folder_staff = $_POST['folder_staff'];


        $target = 'file/';
        if(!file_exists($target.$folder_name)){
                if(mkdir($target.$folder_name, 0777, true)){
                    $sql =  "INSERT INTO `folder_doc` ( `folder_name`,`folder_staff`)  VALUES ('$folder_name', '$folder_staff')";
                    $result = $conn->query($sql);
                    if($result){
                        echo '<script>
                            setTimeout(function() {
                            swal({
                                    title: "สมัครสมาชิกสำเร็จ",
                                    text: "",
                                    type: "success"
                                }, function() {
                                    window.location = "account.php"; //หน้าที่ต้องการให้กระโดดไป
                                    });
                                    }, 1000);
                                </script>';
                    }else{
                        echo '<script>
                            setTimeout(function() {
                            swal({
                                    title: "เกิดข้อผิดพลาด",
                                    type: "error"
                            }, function() {
                                    window.location = "account.php"; //หน้าที่ต้องการให้กระโดดไป
                                    });
                                    }, 1000);
                                </script>';
                    }
                }
            }else{
                echo 'xxxxxxxxxxxxxxxxx';
            }
        }
    ?>


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
                                                    <label for="exampleInputEmail1">Folder Name<span class="text-danger">*</span></label>
                                                        <input type="text" name="folder_name" class="form-control" id="exampleInputEmail1" placeholder="ตัวอย่าง : KIN-YOO-DEE" required>
                                                        <input type="hidden" class="form-control " id="folder_staff" name="folder_staff" value="<?php echo ($_SESSION['fullname']);?>">
                                                </div>
                                                <!-- /.form-group -->

                                                <!-- Date range -->
                                                <div class="form-group mt-5">
                                                    <button type="submit" name="submit" value="submit"
                                                        class="btn btn-success">Save</button>
                                                </div>
                                                <!-- /.form group -->
                                            </div>
                                        </form>
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
                        </div>
                        <!-- /.col (right) -->
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