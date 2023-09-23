<!DOCTYPE html>
<html lang="en">
<?php $menu = "document"; ?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>INO | Edit Document</title>


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



    <!-- เพิ่มข้อมูล -->
    <?php
    
    if (isset($_POST['submit'])) { /* ถ้า POST มีการกด Submit ให้ทำส่วนล่าง */

        $folder_name  = $_POST['folder_name']; /* ประกาศตัวแปลเก็บค่า  POST ที่รับมาจาก INPUT  */
        $doc_staff = $_POST['doc_staff'];
        $task_name = $_POST['task_name'];
        $doc_type = $_POST['doc_type'];
        $doc_name = $_POST['doc_name'];
        $doc_link = $_POST['doc_link'];
        $doc_remark = $_POST['doc_remark'];
        $doc_status = $_POST['doc_status'];
        $project_name = $_POST['project_name'];


        $folder_name = $_POST['folder_name'];

        $target_dir = "../ino/file/$folder_name/";
        $target_file = $target_dir . basename($_FILES["file_upfile"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // printf($imageFileType);
        $file_upfile = $_FILES['file_upfile']['name'];
        $file_tmp = $_FILES['file_upfile']['tmp_name'];
        move_uploaded_file($file_tmp, "../ino/file/$folder_name/$file_upfile");




        $sql =  "UPDATE `doc` SET `folder_name` = '$folder_name', `doc_staff` = '$doc_staff', `task_name` = '$task_name', 
                            `doc_type` = '$doc_type', `doc_name` = '$doc_name', `doc_link` = '$doc_link', `doc_remark` = '$doc_remark', 
                            `file_upfile` = '$file_upfile', `doc_status` = '$doc_status' , `project_name` = '$project_name' WHERE doc_id=" . $_GET['id'];
        $result = $conn->query($sql);


        //print_r($sql);

        if ($result) {
            // <!-- sweetalert -->
            echo '<script>
                        setTimeout(function(){
                            swal({
                                title: "Save data successfully",
                                text: "Thank You . ",
                                type:"success"
                            }, function(){
                                window.location = "document.php";
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
                                window.location = "doc_add.php";
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
    $rs = $conn->query("SELECT * FROM doc WHERE doc_id=" . $_GET['id']);
    /* ประกาศตัวแปลเก็บค่า เชื่อมต่อฐานข้อมูล อ่าน/เขียนค่าข้อมูล เรียกตารางออกมา โดยมีเงื่อนไข = การรับค่า Get ID มาจาก Form ที่มีการเขึยน form_edit-a.php?id_p=<?=$sr->id_p;?>
   */
    $rr = $rs->fetch_object()

       
    ?>




    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit Document</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active">Edit Document</li>
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
                        <div class="row">
                            <!-- /.col (left) -->
                            <div class="col-md-12 mx-auto">
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">Document descriptions</h3>
                                    </div>

                                    <form action="#" method="POST" enctype="multipart/form-data">

                                        <div class="card-body">
                                            <?php
                                            $project_name = "";
                                            $_sql_project_name = "SELECT DISTINCT project_name FROM pipeline";
                                            $query_project_name = mysqli_query($conn, $_sql_project_name);
                                            ?>

                                            <div class="form-group">
                                                <label>Project name</label>
                                                <select class="custom-select select2" name="project_name">
                                                    <option selected="selected"><?= $rr->project_name; ?></option>
                                                    <?php while ($r = mysqli_fetch_array($query_project_name)) { ?>
                                                        <option value="<?php echo $r["project_name"]; ?>" <?php if ($r['project_name'] == $project_name) : ?> selected="selected" <?php endif; ?>><?php echo $r["project_name"]; ?></option>
                                                    <?php } ?>
                                                </select>
                                                <input type="hidden" name="doc_staff" value="<?php echo ($_SESSION['fullname']); ?>" class="form-control datetimepicker-input" data-target="#reservationdate" />
                                            </div>
                                            <!-- /.form-group -->

                                            <?php
                                            $task_name = "";
                                            $_sql_task_name = "SELECT DISTINCT task_name FROM task_project";
                                            $query_task_name = mysqli_query($conn, $_sql_task_name);
                                            ?>

                                            <div class="form-group">
                                                <label>Task Project</label>
                                                <select class="custom-select select2" name="task_name">
                                                    <option selected="selected"><?= $rr->task_name; ?></option>
                                                    <?php while ($r = mysqli_fetch_array($query_task_name)) { ?>
                                                        <option value="<?php echo $r["task_name"]; ?>" <?php if ($r['task_name'] == $task_name) : ?> selected="selected" <?php endif; ?>><?php echo $r["task_name"]; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <!-- /.form-group -->

                                            <?php
                                            $folder_name = "";
                                            $_sql_folder_name = "SELECT DISTINCT folder_name FROM folder_doc";
                                            $query_folder_name = mysqli_query($conn, $_sql_folder_name);
                                            ?>

                                            <div class="row">
                                                <div class="col col-12">
                                                    <div class="form-group">
                                                        <label>Folder <span class="text-danger">*</span></label>
                                                        <select class="custom-select select2 " width="" name="folder_name">
                                                            <option selected="selected"><?= $rr->folder_name; ?></option>
                                                            <?php while ($r = mysqli_fetch_array($query_folder_name)) { ?>
                                                                <option value="<?php echo $r["folder_name"]; ?>" <?php if ($r['folder_name'] == $folder_name) : ?> selected="selected" <?php endif; ?>><?php echo $r["folder_name"]; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                    <!-- /.form-group-->
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label>Type <span class="text-danger">*</span></label>
                                                <select class="form-control select2" name="doc_type" style="width: 100%;">
                                                    <option selected="selected"><?= $rr->doc_type; ?></option>
                                                    <option>Word</option>
                                                    <option>Excel</option>
                                                    <option>Presentation</option>
                                                    <option>PDF</option>
                                                    <option>Images</option>
                                                    <option>other</option>
                                                </select>
                                            </div>
                                            <!-- /.form-group -->

                                            <div class="form-group">
                                                <label>Status<span class="text-danger">*</span></label>
                                                <select class="form-control select2" name="doc_status" style="width: 100%;">
                                                    <option selected="selected"><?= $rr->doc_status; ?></option>
                                                    <option>Complated</option>
                                                    <option>Wait Approve</option>
                                                    <option>Process</option>
                                                </select>
                                            </div>
                                            <!-- /.form-group -->

                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Document Name<span class="text-danger">*</span></label>
                                                <input type="text" name="doc_name" value="<?= $rr->doc_name; ?>" class="form-control" id="exampleInputEmail1" placeholder="Document Name" required>
                                            </div>
                                            <!-- /.form-group -->


                                            <div class="form-group">
                                                <label for="file_upfile">File input <span class="text-danger"> (upload-max-filesize 20M*)</span></label>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="file_upfile" name="file_upfile" >
                                                    <label class="custom-file-label" for="file_upfile"><?= $rr->file_upfile; ?></label>

                                                    <input type="hidden" class="form-control " id="file_upfile" name="file_upfile" value="<?= $rr->file_upfile; ?>">
                                                </div>
                                            </div>
                                            <!-- /.form-group -->



                                            <!-- textarea -->
                                            <div class="form-group">
                                                <label>Document descriptions</label>
                                                <textarea class="form-control" name="doc_remark" id="doc_remark" rows="6" placeholder="remark "><?= $rr->doc_remark; ?></textarea>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Link Form Drive</label>
                                                <input type="text" name="doc_link" class="form-control" id="exampleInputEmail1" placeholder="Link Google Drive" value="<?= $rr->doc_link; ?>">
                                            </div>
                                            <!-- /.form-group -->

                                            <!-- Date range -->
                                            <div class="form-group mt-5">
                                                <button type="submit" name="submit" value="submit" class="btn btn-success"> Save </button>
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

