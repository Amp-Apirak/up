<!DOCTYPE html>
<html lang="en">
<?php $menu = "document"; ?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>INO | Add Document</title>


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
                        <h1>Add Document</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active">Add Document</li>
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

                                    <form action="doc_add1.php" method="POST" enctype="multipart/form-data">

                                        <div class="card-body">
                                            <!-- ดึงข้อมูลโปรเจคมาจาก Pipeline -->
                                            <?php
                                                $project_name = "";
                                                $_sql_project_name = "SELECT DISTINCT project_name FROM pipeline";
                                                $query_project_name = mysqli_query($conn, $_sql_project_name);
                                            ?>
                                            <!-- แสดงที่ดึงข้อมูลโปรเจคมาจาก Pipeline -->
                                            <div class="form-group">
                                                <label>Project name</label>
                                                <select class="custom-select select2" name="project_name">
                                                    <option selected="selected"></option>
                                                    <?php while ($r = mysqli_fetch_array($query_project_name)) { ?>
                                                        <option value="<?php echo $r["project_name"]; ?>" <?php if ($r['project_name'] == $project_name) : ?> selected="selected" <?php endif; ?>><?php echo $r["project_name"]; ?></option>
                                                    <?php } ?>
                                                </select>
                                                <input type="hidden" name="doc_staff" value="<?php echo ($_SESSION['fullname']); ?>" class="form-control datetimepicker-input" data-target="#reservationdate" />
                                            </div>
                                            <!-- Dropdown List Project -->

                                            <!-- ดึงข้อมูล task_project มาจาก task_project -->
                                            <?php
                                            $task_name = "";
                                            $_sql_task_name = "SELECT DISTINCT task_name FROM task_project";
                                            $query_task_name = mysqli_query($conn, $_sql_task_name);
                                            ?>

                                            <div class="form-group">
                                                <label>Task Project</label>
                                                <select class="custom-select select2" name="task_name">
                                                    <option selected="selected"></option>
                                                    <?php while ($r = mysqli_fetch_array($query_task_name)) { ?>
                                                        <option value="<?php echo $r["task_name"]; ?>" <?php if ($r['task_name'] == $task_name) : ?> selected="selected" <?php endif; ?>><?php echo $r["task_name"]; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <!-- Dropdown List Task Project -->


                                            <!-- ดึงข้อมูล Folder มาจาก folder_doc -->
                                            <?php
                                            $folder_name = "";
                                            $_sql_folder_name = "SELECT DISTINCT folder_name FROM folder_doc";
                                            $query_folder_name = mysqli_query($conn, $_sql_folder_name);
                                            ?>

                                            <div class="row">
                                                <div class="col col-10">
                                                    <div class="form-group">
                                                        <label>Folder <span class="text-danger">*</span></label>
                                                        <select class="custom-select select2 " width="" name="folder_name">
                                                            <option selected="selected"></option>
                                                            <?php while ($r = mysqli_fetch_array($query_folder_name)) { ?>
                                                                <option value="<?php echo $r["folder_name"]; ?>" <?php if ($r['folder_name'] == $folder_name) : ?> selected="selected" <?php endif; ?>><?php echo $r["folder_name"]; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                     <!-- Dropdown List Folder -->
                                                </div>
                                                <div class="col col-2">
                                                    <div class="form-group">
                                                        <label>Add <i class="nav-icon fas fa-plus style=" color: #1f5d09;></i></label><br>
                                                        <a href="#" class="btn btn-info btn-sm " data-toggle="modal" data-target="#editbtn"> <i class="fas fa-pencil-alt"></i></a>
                                                    </div>
                                                    <!-- Add Folder -->
                                                </div>
                                            </div>  


                                            <div class="form-group">
                                                <label>Type <span class="text-danger">*</span></label>
                                                <select class="form-control select2" name="doc_type" style="width: 100%;">
                                                    <option selected="selected"></option>
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
                                                    <option selected="selected"></option>
                                                    <option>Complated</option>
                                                    <option>Wait Approve</option>
                                                    <option>Process</option>
                                                </select>
                                            </div>
                                            <!-- /.form-group -->

                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Document Name<span class="text-danger">*</span></label>
                                                <input type="text" name="doc_name" class="form-control" id="exampleInputEmail1" placeholder="Document Name" required>
                                            </div>
                                            <!-- /.form-group -->


                                            <div class="form-group">
                                                <label for="file_upfile">File input <span class="text-danger"> (upload-max-filesize 20M*)</span></label>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="file_upfile" name="file_upfile">
                                                    <label class="custom-file-label" for="file_upfile">Choose file</label>
                                                </div>
                                            </div>
                                            <!-- /.form-group -->



                                            <!-- textarea -->
                                            <div class="form-group">
                                                <label>Document descriptions</label>
                                                <textarea class="form-control" name="doc_remark" id="doc_remark" rows="6" placeholder="remark "></textarea>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Link Form Drive</label>
                                                <input type="text" name="doc_link" class="form-control" id="exampleInputEmail1" placeholder="Link Google Drive">
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

    <!----------------------------- start Modal Add user ------------------------------->

    <?php
    $_sql = "SELECT * FROM folder_doc";
    $query = mysqli_query($conn, $_sql);
    if (isset($_POST) && !empty($_POST)) {
        //echo $_POST['folder_name'];
        //print_r($_POST);
        $folder_name = $_POST['folder_name'];
        $folder_staff = $_POST['folder_staff'];
        $target = 'file/';
        $target_file = $target . basename($_FILES["folder_name"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        print_r($target_file);
        if (file_exists($target_file)) {
            echo '<script>
            setTimeout(function() {
            swal({
                    title: "Your folder name is duplicate.",
                    text: "",
                    type: "error"
                }, function() {
                    window.location = "doc_add.php"; //หน้าที่ต้องการให้กระโดดไป
                    });
                    }, 1000);
                </script>';
        }

        if (!file_exists($target . $folder_name)) {
            if (mkdir($target . $folder_name, 0777, true)) {
                $sql =  "INSERT INTO `folder_doc` ( `folder_name`,`folder_staff`)  VALUES ('$folder_name', '$folder_staff')";
                $result = $conn->query($sql);
                if ($result) {
                    echo '<script>
                        setTimeout(function() {
                        swal({
                                title: "Folder saved successfully.",
                                text: "",
                                type: "success"
                            }, function() {
                                window.location = "doc_add.php"; //หน้าที่ต้องการให้กระโดดไป
                                });
                                }, 1000);
                            </script>';
                } else {
                    echo '<script>
                        setTimeout(function() {
                        swal({
                                title: "Please check the input.",
                                type: "error"
                        }, function() {
                                window.location = "doc_add.php"; //หน้าที่ต้องการให้กระโดดไป
                                });
                                }, 1000);
                            </script>';
                }
            }
        } else {
            echo 'xxxxxxxxxxxxxxxxx';
        }
    }
    ?>


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
                    <form action="#" method="POST" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Folder Name</label>
                                <input type="text" name="folder_name" class="form-control" id="Folder Name" placeholder="Folder Name" required>
                                <input type="hidden" class="form-control " id="folder_staff" name="folder_staff" value="<?php echo ($_SESSION['fullname']); ?>">
                            </div>
                            <!-- /.form-group -->
                        </div>
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