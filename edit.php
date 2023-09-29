<!DOCTYPE html>
<html lang="en">
<?php $menu = "index"; ?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Uplevel | Task update</title>


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


    <?php
    if (isset($_POST['submit1'])) { /* ถ้า POST มีการกด Submit ให้ทำส่วนล่าง */
        

        $work_type  = $_POST['work_type']; /* ประกาศตัวแปลเก็บค่า  POST ที่รับมาจาก INPUT  */
        $subject = $_POST['subject'];
        $status = $_POST['status'];
        $detail = $_POST['detail'];
        $result = $_POST['result'];
        $service_id = $_POST['service_id'];
        $requester = $_POST['requester'];
        $staff_edit = $_POST['staff_edit'];
        $file_upfile2 = $_POST['file_upfile2'];
        $file_test2 = $_POST['file_test2'];

        $file_upfile = $_FILES['file_upfile']['name'];
        $file_test = $_FILES['file_test']['name'];

            ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);
            error_reporting(E_ALL);
            date_default_timezone_set("Asia/Bangkok");

            $sToken = "8CyHEXNouMVT3mgLFBb8sw74DbEwkZ5lN6oabOQ0vk9";
            $sMessage = "Uplevel **Update** Job Notification\n\n";
            $sMessage .= "Requeter: ".$requester." \n";
            $sMessage .= "Status : ".$status."\n";
            $sMessage .= "Subject : ".$subject."\n\n";

            $sMessage .= "detail : ".$detail."\n";
            $sMessage .= "result : ".$result."\n\n";

            $sMessage .= "ติดตามงานได้ที่ Link Web: http://58.137.58.163/up/index.php \n";

            
            $chOne = curl_init(); 
            curl_setopt( $chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify"); 
            curl_setopt( $chOne, CURLOPT_SSL_VERIFYHOST, 0); 
            curl_setopt( $chOne, CURLOPT_SSL_VERIFYPEER, 0); 
            curl_setopt( $chOne, CURLOPT_POST, 1); 
            curl_setopt( $chOne, CURLOPT_POSTFIELDS, "message=".$sMessage); 
            $headers = array( 'Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer '.$sToken.'', );
            curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers); 
            curl_setopt( $chOne, CURLOPT_RETURNTRANSFER, 1); 
            $resultt = curl_exec( $chOne ); 





        if($file_upfile !=''){
            $file_tmp = $_FILES['file_upfile']['tmp_name'];
            move_uploaded_file($file_tmp, "../up/example/$file_upfile");

        }else {

            $file_upfile = $file_upfile2;
            
        }if ($file_test !=''){
            $file_tmp = $_FILES['file_test']['tmp_name'];
            move_uploaded_file($file_tmp, "../up/test/$file_test");
        
        }else {

            
            $file_test = $file_test2;
        }



            $sql =  "UPDATE `work` SET `work_type` = '$work_type', `subject` = '$subject', `status` = '$status', `file_test` = '$file_test',  
                            `detail` = '$detail', `result` = '$result', `service_id` = '$service_id', `requester` = '$requester', 
                            `staff_edit` = '$staff_edit', `file_upfile` = '$file_upfile' WHERE work_id=" . $_GET['id'];
                            $result = $conn->query($sql);

                            
                            //print_r($_POST);

                            if ($result) {
                                //     // <!-- sweetalert -->
                                    echo '<script>
                                            setTimeout(function(){
                                                swal({
                                                    title: "Save Successfully!",
                                                    text: "Thank You . ",
                                                    type:"success"
                                                }, function(){
                                                    window.location = "index.php";
                                                })
                                            },1000);
                                        </script>';
                                //     // echo "<script>alert('ยินดีตอนรับ Admin เข้าสู่ระบบ'); window.location='../index.php'</script>";
                                } else {
                                //     // <!-- sweetalert -->
                                    echo '<script>
                                            setTimeout(function(){
                                                swal({
                                                    title: "Can Not Save Successfully!",
                                                    text: "Checking Your Data",
                                                    type:"warning"
                                                }, function(){
                                                    window.location = "index.php";
                                                })
                                            },1000);
                                        </script>';
                                //     // echo "<script>alert('ยินดีตอนรับ Admin เข้าสู่ระบบ'); window.location='../index.php'</script>";
                                }
        }
    
    // echo '<pre>';
    // print_r($_POST);
    // print_r($_FILES);
    // echo '</pre>';
    ?>

    <?php
     /* แสดงข้อมูล */
     $rs = $conn->query("SELECT * FROM work WHERE work_id=" . $_GET['id']);
     $r = $rs->fetch_object()
     ?>


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Update Task</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active">Task update</li>
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

                                    <form action="#" method="POST" enctype="multipart/form-data">

                                        <div class="card-body">

                                            <div class="form-group">
                                                <label>Type<span class="text-danger">*</span></label>
                                                <select class="form-control select2" name="work_type"
                                                    style="width: 100%;">
                                                    <option selected="selected"><?= $r->work_type; ?></option>
                                                    <option>Incident</option>
                                                    <option>Service</option>
                                                </select>
                                            </div>
                                            <!-- /.form-group -->



                                            <!-- ดึงข้อมูล Folder มาจาก folder_doc -->
                                            <?php
                                            $service_id = "";
                                            $_sql_service_cate = "SELECT DISTINCT * FROM category";
                                            $query_service_cate = mysqli_query($conn, $_sql_service_cate);
                                            ?>

                                            <?php
                                            /* แสดงข้อมูล */
                                            $rx = $conn->query("SELECT * FROM category WHERE service_id=" . $_GET['id_c']);
                                            $rx = $rx->fetch_object()
                                            ?>


                                            <div class="row">
                                                <div class="col col-10">
                                                    <div class="form-group">
                                                        <label>Category <span class="text-danger">*</span></label>
                                                        <select class="custom-select select2 " width=""
                                                            name="service_id">
                                                            <option value="<?= $rx->service_id; ?>"  selected="selected"><?= $rx->service_cate; ?>&nbsp;>><?= $rx->service_type; ?>&nbsp;&nbsp;>><?= $rx->service_sup; ?>&nbsp;</option> 
                                                            <?php while ($r = mysqli_fetch_array($query_service_cate)) { ?>
                                                            <option value="<?php echo $r["service_id"]; ?>" 
                                                                <?php if ($r['service_id'] == $service_id) : ?>
                                                                selected="selected" <?php endif; ?>>
                                                                <?php echo $r["service_cate"]; ?>&nbsp;>>&nbsp;<?php echo $r["service_type"]; ?>&nbsp;>>&nbsp;<?php echo $r["service_sup"]; ?>
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




                                            <?php
                                            /* แสดงข้อมูล */
                                            $rl = $conn->query("SELECT * FROM work WHERE work_id=" . $_GET['id']);
                                            $rr = $rl->fetch_object()
                                            ?>

                                            <div class="form-group">
                                                <label>Status<span class="text-danger">*</span></label>
                                                <select class="form-control select2" name="status"
                                                    style="width: 100%;">
                                                    <option selected="selected"><?= $rr->status; ?></option>
                                                        <option>On Process</option>
                                                        <option>Done</option>
                                                </select>
                                            </div>
                                            <!-- /.form-group -->


                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Subject<span
                                                        class="text-danger">*</span></label>
                                                <input type="text" name="subject" class="form-control" value="<?= $rr->subject; ?>"
                                                    id="exampleInputEmail1" placeholder="Document Name" required>
                                            </div>
                                            <!-- /.form-group -->


                                            <div class="form-group">
                                                <label for="file_upfile">Image <span class="text-danger"> (Only picture
                                                        and upload-max-filesize 20M*)</span></label>
                                                <div class="custom-file">
                                                    
                                                    <input type="file" class="custom-file-input" id="file_upfile" name="file_upfile" >
                                                    <label class="custom-file-label" for="file_upfile"><?= $rr->file_upfile; ?></label>

                                                    <input type="hidden" class="custom-file-input" id="file_upfile2"  value="<?= $rr->file_upfile; ?>" name="file_upfile2">
                                                </div>
                                            </div>
                                            <!-- /.form-group -->

                                            <div class="form-group">
                                                <label for="file_test">Image Test <span class="text-danger"> (Only picture
                                                        and upload-max-filesize 20M*)</span></label>
                                                <div class="custom-file">

                                                    <input type="file" class="custom-file-input" id="file_test" name="file_test">
                                                    <label class="custom-file-label" for="file_test"><?= $rr->file_test; ?></label>

                                                    <input type="hidden" class="custom-file-input" id="file_test2"  value="<?= $rr->file_test; ?>" name="file_test2">
                                                </div>
                                            </div>
                                            <!-- /.form-group -->


                                            <!-- textarea -->
                                            <div class="form-group">
                                                <label>Descriptions</label>
                                                <textarea class="form-control" name="detail" id="detail" rows="6"
                                                    placeholder="remark "><?= $rr->detail; ?></textarea>
                                            </div>

                                            <!-- textarea -->
                                            <div class="form-group">
                                                <label>Resolve Detail</label>
                                                <textarea class="form-control" name="result" id="result" rows="6"
                                                    placeholder="result "><?= $rr->result; ?></textarea>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Requester<span
                                                        class="text-danger">*</span></label>
                                                <input type="text" name="requester" class="form-control"  value="<?= $rr->requester; ?>"
                                                    id="exampleInputEmail1" placeholder="" required>
                                            </div>
                                            <!-- /.form-group -->

                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Staff Update<span
                                                        class="text-danger">*</span></label>
                                                <input type="text" name="staff_edit" class="form-control"  
                                                    id="exampleInputEmail1" placeholder="ผู้บันทึก" required>
                                            </div>
                                            <!-- /.form-group -->

                                            <!-- Date range -->
                                            <div class="form-group mt-5">
                                                <button type="submit1" name="submit1" value="submit1" id="submit1"
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

        $service_cate = $_POST['service_cate'];    /* ประกาศตัวแปลเก็บค่า  POST ที่รับมาจาก INPUT  */
        $service_type = $_POST['service_type'];
        $service_sup = $_POST['service_sup'];


                $sql =  "INSERT INTO `category` ( `service_cate`,`service_type`,`service_sup`)  VALUES ('$service_cate', '$service_type', '$service_sup')";
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
                                <input type="text" name="service_cate" class="form-control" id="service_cate"
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