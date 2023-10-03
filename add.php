<!DOCTYPE html>
<html lang="en">
<?php $menu = "index"; ?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Uplevel | Add Task</title>


    <!----------------------------- start header ------------------------------->
    <?php include("../up/templated/head.php"); ?>
    <!----------------------------- end header --------------------------------->

    <!----------------------------- start menu ------------------------------->
    <?php include("../up/templated/menu.php"); ?>
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
                        <h1>Add Task</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active">Add Task</li>
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
                            <div class="col-md-8 mx-auto">
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">Task descriptions</h3>
                                    </div>

                                    <form action="add1.php" method="POST" enctype="multipart/form-data">

                                        <div class="card-body">

                                            <div class="form-group">
                                                <label>Type<span class="text-danger">*</span></label>
                                                <select class="form-control select2" name="work_type"
                                                    style="width: 100%;">
                                                    <option selected="selected"></option>
                                                    <option>Incident</option>
                                                    <option>Service</option>
                                                </select>
                                            </div>
                                            <!-- /.form-group -->



                                            <!-- ดึงข้อมูล Folder มาจาก folder_doc -->
                                            <?php
                                            $service_name = "";
                                            $_sql_service = "SELECT DISTINCT * FROM service";
                                            $query_service = mysqli_query($conn, $_sql_service);
                                            ?>

                                            <div class="row">
                                                <div class="col col-10">
                                                    <div class="form-group">
                                                        <label>Service <span class="text-danger">*</span></label>
                                                        <select class="custom-select select2 " width=""
                                                            name="service_name">
                                                            <option selected="selected"></option>
                                                            <?php while ($r = mysqli_fetch_array($query_service)) { ?>
                                                            <option value="<?php echo $r["service_name"]; ?>"
                                                                <?php if ($r['service_name'] == $service_name) : ?>
                                                                selected="selected" <?php endif; ?>>
                                                                <?php echo $r["service_name"]; ?>
                                                            </option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                    <!-- Dropdown List Folder -->
                                                </div>
                                                <div class="col col-2">
                                                    <div class="form-group">
                                                        <label>Add <i class="nav-icon fas fa-plus style=" color:
                                                                #1f5d09;></i></label><br>
                                                        <a href="#" class="btn btn-info btn-sm " data-toggle="modal"
                                                            data-target="#editbtn"> <i
                                                                class="fas fa-pencil-alt"></i></a>
                                                    </div>
                                                    <!-- Add Folder -->
                                                </div>
                                            </div>

                                            
                                            <!-- ดึงข้อมูล Folder มาจาก folder_doc -->
                                            <?php
                                            $category_name = "";
                                            $_sql_category = "SELECT DISTINCT * FROM category";
                                            $query_category = mysqli_query($conn, $_sql_category);
                                            ?>

                                            <div class="row">
                                                <div class="col col-10">
                                                    <div class="form-group">
                                                        <label>Category <span class="text-danger">*</span></label>
                                                        <select class="custom-select select2 " width=""
                                                            name="category_name">
                                                            <option selected="selected"></option>
                                                            <?php while ($r = mysqli_fetch_array($query_category)) { ?>
                                                            <option value="<?php echo $r["category_name"]; ?>"
                                                                <?php if ($r['category_name'] == $category_name) : ?>
                                                                selected="selected" <?php endif; ?>>
                                                                <?php echo $r["category_name"]; ?>
                                                            </option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                    <!-- Dropdown List Folder -->
                                                </div>
                                                <div class="col col-2">
                                                    <div class="form-group">
                                                        <label>Add <i class="nav-icon fas fa-plus style=" color:
                                                                #1f5d09;></i></label><br>
                                                        <a href="#" class="btn btn-info btn-sm " data-toggle="modal"
                                                            data-target="#editbtn"> <i
                                                                class="fas fa-pencil-alt"></i></a>
                                                    </div>
                                                    <!-- Add Folder -->
                                                </div>
                                            </div>

                                            
                                            <!-- ดึงข้อมูล Folder มาจาก folder_doc -->
                                            <?php
                                            $items_name = "";
                                            $_sql_items = "SELECT DISTINCT * FROM items";
                                            $query_items = mysqli_query($conn, $_sql_items);
                                            ?>

                                            <div class="row">
                                                <div class="col col-10">
                                                    <div class="form-group">
                                                        <label>Category <span class="text-danger">*</span></label>
                                                        <select class="custom-select select2 " width=""
                                                            name="items_name">
                                                            <option selected="selected"></option>
                                                            <?php while ($r = mysqli_fetch_array($query_items)) { ?>
                                                            <option value="<?php echo $r["items_name"]; ?>"
                                                                <?php if ($r['items_name'] == $items_name) : ?>
                                                                selected="selected" <?php endif; ?>>
                                                                <?php echo $r["items_name"]; ?>
                                                            </option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                    <!-- Dropdown List Folder -->
                                                </div>
                                                <div class="col col-2">
                                                    <div class="form-group">
                                                        <label>Add <i class="nav-icon fas fa-plus style=" color:
                                                                #1f5d09;></i></label><br>
                                                        <a href="#" class="btn btn-info btn-sm " data-toggle="modal"
                                                            data-target="#editbtn"> <i
                                                                class="fas fa-pencil-alt"></i></a>
                                                    </div>
                                                    <!-- Add Folder -->
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label>Status<span class="text-danger">*</span></label>
                                                <select class="form-control select2" name="status"
                                                    style="width: 100%;">
                                                    <option selected="selected"></option>
                                                        <option>On Process</option>
                                                        <option>Done</option>
                                                </select>
                                            </div>
                                            <!-- /.form-group -->


                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Subject<span
                                                        class="text-danger">*</span></label>
                                                <input type="text" name="subject" class="form-control"
                                                    id="exampleInputEmail1" placeholder="Document Name" required>
                                            </div>
                                            <!-- /.form-group -->


                                            <div class="form-group">
                                                <label for="file_upfile">Image Example <span class="text-danger"> (Only picture
                                                        and upload-max-filesize 20M*)</span></label>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="file_upfile"
                                                        name="file_upfile">
                                                    <label class="custom-file-label" for="file_upfile">Choose
                                                        file</label>
                                                </div>
                                            </div>
                                            <!-- /.form-group -->

                                            <div class="form-group">
                                                <label for="file_test">Image Test <span class="text-danger"> (Only picture
                                                        and upload-max-filesize 20M*)</span></label>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="file_test"
                                                        name="file_test">
                                                    <label class="custom-file-label" for="file_test">Choose
                                                        file</label>
                                                </div>
                                            </div>
                                            <!-- /.form-group -->


                                            <!-- textarea -->
                                            <div class="form-group">
                                                <label>Descriptions</label>
                                                <textarea class="form-control" name="detail" id="detail" rows="6"
                                                    placeholder="รายละเอียด"></textarea>
                                            </div>

                                            <!-- textarea -->
                                            <div class="form-group">
                                                <label>Resolve Detail</label>
                                                <textarea class="form-control" name="result" id="result" rows="6"
                                                    placeholder="วิธีดำเนินการ"></textarea>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Requester<span
                                                        class="text-danger">*</span></label>
                                                <input type="text" name="requester" class="form-control"
                                                    id="exampleInputEmail1" placeholder="ผู้ร้องขอ" required>
                                            </div>
                                            <!-- /.form-group -->

                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Operation Staff<span
                                                        class="text-danger">*</span></label>
                                                <input type="text" name="staff_crt" class="form-control"
                                                    id="exampleInputEmail1" placeholder="ผู้บันทึก" required>
                                            </div>
                                            <!-- /.form-group -->

                                            <!-- Date range -->
                                            <div class="form-group mt-5">
                                                <button type="submit" name="submit" value="submit"
                                                    class="btn btn-success"> Save </button>
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
    <?php include("../up/templated/footer.php"); ?>
    <!----------------------------- end menu --------------------------------->

    <!-- highlight -->
    <script src="code/dist/js/highlight.js"></script>

    <script>
    $("#myTable tr").highlight();
    </script>
    <!-- highlight -->

    <!----------------------------- start Modal Add user ------------------------------->

    <?php
     if (isset($_POST['submit'])) { /* ถ้า POST มีการกด Submit ให้ทำส่วนล่าง */


        if ($service = $_POST['service']){
            $sql =  "INSERT INTO `category` ( `service`,`service_type`,`service_sup`)  VALUES ('$service', '$service_type', '$service_sup')";
            $result = $conn->query($sql);
            if ($result) {
                echo '<script>
                    setTimeout(function() {
                    swal({
                            title: " Saved successfully.",
                            text: "",
                            type: "success"
                        }, function() {
                            window.location = "add.php"; //หน้าที่ต้องการให้กระโดดไป
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
                            window.location = "add.php"; //หน้าที่ต้องการให้กระโดดไป
                            });
                            }, 1000);
                        </script>';
            }
        }

        $service_type = $_POST['service_type'];
        $service_sup = $_POST['service_sup'];


              
            }
            

    ?>


    <div class="modal fade" id="editbtn">
        <div class="modal-dialog editbtn">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Service-Cate</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="#" method="POST" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Service Category</label>
                                <input type="text" name="service" class="form-control" id="service"
                                    placeholder="" required>
                            </div>
                            <!-- /.form-group -->
                            <div class="form-group">
                                <label for="exampleInputEmail1">Service Type</label>
                                <input type="text" name="service_type" class="form-control" id="service_type"
                                    placeholder="" required>
                            </div>
                            <!-- /.form-group -->
                            <div class="form-group">
                                <label for="exampleInputEmail1">Subcategoty</label>
                                <input type="text" name="service_sup" class="form-control" id="service_sup"
                                    placeholder="" required>
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