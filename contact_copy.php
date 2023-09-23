<!DOCTYPE html>
<html lang="en">
<?php $menu = "contact"; ?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>INO | Update Contact</title>


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
                        <h1>Update Contact</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active">Update Contact</li>
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

                        $rs = $conn->query("SELECT * FROM contact WHERE contact_id=" . $_GET['id']);
                        /* ประกาศตัวแปลเก็บค่า เชื่อมต่อฐานข้อมูล อ่าน/เขียนค่าข้อมูล เรียกตารางออกมา โดยมีเงื่อนไข = การรับค่า Get ID มาจาก Form ที่มีการเขึยน form_edit-a.php?id_p=<?=$sr->id_p;?> */
                        $r = $rs->fetch_object();

                        /* แสดงข้อมูล */

                        if (isset($_POST['submit'])) { /* ถ้า POST มีการกด Submit ให้ทำส่วนล่าง */

                            $contact_fullname  = $_POST['contact_fullname'];
                            $contact_position  = $_POST['contact_position'];
                            $contact_agency = $_POST['contact_agency'];
                            $contact_tel = $_POST['contact_tel'];
                            $contact_email = $_POST['contact_email'];
                            $contact_detail = $_POST['contact_detail'];
                            $contact_company = $_POST['contact_company'];
                            $contact_type = $_POST['contact_type'];
                            $contact_staff = $_POST['contact_staff'];
                            $contact_province = $_POST['contact_province'];

                            // print_r($_POST);

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

                            
                            $sql =  "UPDATE `contact` SET `contact_fullname` = '$contact_fullname', `contact_position` = '$contact_position', `contact_agency` = '$contact_agency', 
                            `contact_tel` = '$contact_tel', `contact_email` = '$contact_email', `contact_detail` = '$contact_detail', `contact_company` = '$contact_company', 
                            `contact_type` = '$contact_type', `contact_staff` = '$contact_staff', `contact_province` = '$contact_province' WHERE contact_id=" . $_GET['id'];
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
                                                window.location = "contact_copy.php?id='.$_GET['id'].'";
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
                                        <h3 class="card-title">Contact Descriptions</h3>
                                    </div>
                                    <div class="card-body">

                                    <form action="#" method="POST" enctype="multipart/form-data">
                                    <div class="form-group">
                                <label>Type<span class="text-danger">*</span></label>
                                <select class="form-control select2" name="contact_type" required style="width: 100%;">
                                    <option value="<?= $r->contact_type; ?>"><?= $r->contact_type; ?></option>
                                    <option>Staff</option>
                                    <option>Customer</option>
                                    <option>Partner</option>
                                    <option>Sale</option>
                                </select>
                            </div>
                            <!-- /.form-group -->

                            <div class="form-group">
                                <label for="contact_fullname">Full Name<span class="text-danger">*</span></label>
                                <input type="text" name="contact_fullname" class="form-control" id="contact_fullname" placeholder="" value="<?= $r->contact_fullname; ?>" required>
                            </div>
                            <!-- /.form-group -->

                            <div class="form-group">
                                <label for="contact_position">Position<span class="text-danger">*</span></label>
                                <input type="text" name="contact_position" class="form-control" id="contact_position" placeholder="" value="<?= $r->contact_position; ?>" required>
                            </div>
                            <!-- /.form-group -->

                            <div class="form-group">
                                <label for="contact_company">Company<span class="text-danger">*</span></label>
                                <input type="text" name="contact_company" class="form-control" id="contact_company" placeholder="" value="<?= $r->contact_company; ?>" required>
                            </div>
                            <!-- /.form-group -->

                            <div class="form-group">
                                <label>Agency<span class="text-danger">*</span></label>
                                <input type="text" name="contact_agency" class="form-control" id="contact_agency" placeholder="" value="<?= $r->contact_agency; ?>" v>


                                <input type="hidden" name="contact_staff" class="form-control" value="<?php echo ($_SESSION['fullname']); ?>" placeholder="">

                            </div>
                            <!-- /.form-group -->

                            <!-- textarea -->
                            <div class="form-group">
                                <label>Address</label>
                                <textarea class="form-control" name="contact_detail" id="contact_detail" rows="4" placeholder=""><?= $r->contact_detail; ?></textarea>
                            </div>


                            <div class="form-group">
                                <label>Province<span class="text-danger">*</span></label>
                                <select class="form-control select2" name="contact_province" required style="width: 100%;">
                                    <option value="<?= $r->contact_province; ?>"><?= $r->contact_province; ?></option>
                                    <option>กรุงเทพมหานคร</option>
                                    <option>ปทุมธานี</option>
                                    <option>สมุทรปราการ</option>
                                    <option>อ่างทอง</option>
                                    <option>สมุทรสาคร</option>
                                    <option>สิงห์บุรี</option>
                                    <option>นนทบุรี</option>
                                    <option>ภูเก็ต</option>
                                    <option>สมุทรสงคราม</option>
                                    <option>นครราชสีมา</option>
                                    <option>เชียงใหม่</option>
                                    <option>กาญจนบุรี</option>
                                    <option>ตาก</option>
                                    <option>อุบลราชธานี</option>
                                    <option>สุราษฎร์ธานี</option>
                                    <option>ชัยภูมิ</option>
                                    <option>แม่ฮ่องสอน</option>
                                    <option>เพชรบูรณ์</option>
                                    <option>ลำปาง</option>
                                    <option>อุดรธานี</option>
                                    <option>เชียงราย</option>
                                    <option>น่าน</option>
                                    <option>เลย</option>
                                    <option>ขอนแก่น</option>
                                    <option>พิษณุโลก</option>
                                    <option>บุรีรัมย์</option>
                                    <option>นครศรีธรรมราช</option>
                                    <option>สกลนคร</option>
                                    <option>นครสวรรค์</option>
                                    <option>ศรีสะเกษ</option>
                                    <option>กำแพงเพชร</option>
                                    <option>ร้อยเอ็ด</option>
                                    <option>สุรินทร์</option>
                                    <option>อุตรดิตถ์</option>
                                    <option>สงขลา</option>
                                    <option>สระแก้ว</option>
                                    <option>กาฬสินธุ์</option>
                                    <option>อุทัยธานี</option>
                                    <option>สุโขทัย</option>
                                    <option>แพร่</option>
                                    <option>ประจวบคีรีขันธ์</option>
                                    <option>จันทบุรี</option>
                                    <option>พะเยา</option>
                                    <option>เพชรบุรี</option>
                                    <option>ลพบุรี</option>
                                    <option>ชุมพร</option>
                                    <option>นครพนม</option>
                                    <option>สุพรรณบุรี</option>
                                    <option>ฉะเชิงเทรา</option>
                                    <option>มหาสารคาม</option>
                                    <option>ราชบุรี</option>
                                    <option>ตรัง</option>
                                    <option>ปราจีนบุรี</option>
                                    <option>กระบี่</option>
                                    <option>พิจิตร</option>
                                    <option>ยะลา</option>
                                    <option>ลำพูน</option>
                                    <option>นราธิวาส</option>
                                    <option>ชลบุรี</option>
                                    <option>มุกดาหาร</option>
                                    <option>บึงกาฬ</option>
                                    <option>พังงา</option>
                                    <option>ยโสธร</option>
                                    <option>หนองบัวลำภู</option>
                                    <option>สระบุรี</option>
                                    <option>ระยอง</option>
                                    <option>พัทลุง</option>
                                    <option>ระนอง</option>
                                    <option>อำนาจเจริญ</option>
                                    <option>หนองคาย</option>
                                    <option>ตราด</option>
                                    <option>พระนครศรีอยุธยา</option>
                                    <option>สตูล</option>
                                    <option>ชัยนาท</option>
                                    <option>นครปฐม</option>
                                    <option>นครนายก</option>
                                    <option>ปัตตานี</option>
                                </select>
                            </div>
                            <!-- /.form-group -->

                            <div class="form-group">
                                <label for="exampleInputEmail1">Phone Number</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                    </div>
                                    <input type="text" class="form-control" name="contact_tel" id="tel" data-inputmask='"mask": "(999) 999-9999"' data-mask value="<?= $r->contact_tel; ?>" required>
                                </div>
                                <!-- /.input group -->
                            </div>

                            <p>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                    </div>
                                    <input type="email" class="form-control" name="contact_email" id="email" placeholder="Email" value="<?= $r->contact_email; ?>" required>
                                </div>
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