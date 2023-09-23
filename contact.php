<!DOCTYPE html>
<html lang="en">
<?php $menu = "Contact"; ?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>INO | Contact</title>

     <!-- highlight -->
    <style>
    .highlight {
        background-color: #FFFF88;
    }
    </style>
    <!-- highlight -->


    <!----------------------------- start header ------------------------------->
    <?php include ("../ino/templated/head.php");?>
    <!----------------------------- end header --------------------------------->

    <!----------------------------- start menu ------------------------------->
    <?php include ("../ino/templated/menu.php");?>
    <!----------------------------- end menu --------------------------------->

    <?php
        /* การลบข้อมูล */
        if (isset($_GET['id'])) {

            $result = $conn->query("DELETE FROM contact WHERE contact_id=" . $_GET['id']);

            if ($result) {
                // <!-- sweetalert -->
                echo '<script>
                        setTimeout(function(){
                            swal({
                                title: "Successfully!",
                                text: "Delect Infomation Complatrd.",
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
                                title: "Can Not Successfully!",
                                text: "Type again",
                                type:"warning"
                            }, function(){
                                window.location = "contact.php";
                            })
                        },1000);
                    </script>';
            //     echo "<script>alert('ยินดีตอนรับ Admin เข้าสู่ระบบ'); window.location='../index.php'</script>";
            }
        }
        /* การลบข้อมูล */
    ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Contact Management</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active">Contact Management</li>
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
                        <!-- Start ค้นหาและ ดึงข้อมูล -->
                        <?php
                                    $search = "";
                                    $contact_type = "";
                                    $contact_province = "";
                                    $contact_staff = "";

                                    $search_backup = "";
                                    $contact_type_backup = "";
                                    $contact_province_backup = "";
                                    $contact_staff_backup = "";
                        
                                    $_sql_contact_type = "SELECT DISTINCT contact_type FROM contact";
                                    $_sql_contact_province = "SELECT DISTINCT contact_province FROM contact";
                                    $_sql_contact_staff = "SELECT DISTINCT contact_staff  FROM contact";

                                    $query_contact_type = mysqli_query($conn, $_sql_contact_type);
                                    $query_contact_province = mysqli_query($conn, $_sql_contact_province);
                                    $query_contact_staff = mysqli_query($conn, $_sql_contact_staff);

                                    $_sql = "SELECT * FROM contact ";
                                    $_where = "";

                                        if (isset($_POST['search'])) {

                                            $search = $_POST['searchservice'];
                                            $contact_type = $_POST['contact_type'];
                                            $contact_province = $_POST['contact_province'];
                                            $contact_staff = $_POST['contact_staff'];

                                            $search_backup = $_POST['search_backup'];
                                            $contact_type_backup = $_POST['contact_type_backup'];
                                            $contact_province_backup = $_POST['contact_province_backup'];
                                            $contact_staff_backup = $_POST['contact_staff_backup'];

                                        // print_r($_sqlCount);

                                            if ($search != $search_backup || $contact_type != $contact_type_backup || $contact_province != $contact_province_backup || $contact_staff  != $contact_staff_backup )
                                        
                                            if (!empty($search)) {
                                                $_where = $_where . " WHERE contact_fullname LIKE '%$search%' OR contact_position LIKE '%$search%' OR contact_agency LIKE '%$search%' OR contact_province LIKE '%$search%' OR contact_staff LIKE '%$search%'
                                                OR contact_tel LIKE '%$search%' OR contact_email LIKE '%$search%' OR contact_detail LIKE '%$search%' OR contact_company	 LIKE '%$search%' OR contact_type LIKE '%$search%'";
                                            }
                                            if ($contact_type != "") {
                                                if (empty($_where)) {
                                                    $_where = $_where . " WHERE contact_type = '$contact_type' ";
                                                } else {
                                                    $_where = $_where . " AND contact_type = '$contact_type'";
                                                }
                                            }
                                            if ($contact_province != "") {
                                                if (empty($_where)) {
                                                    $_where = $_where . " WHERE contact_province = '$contact_province' ";
                                                } else {
                                                    $_where = $_where . " AND contact_province = '$contact_province'";
                                                }
                                            }
                                            if ($contact_staff != "") {
                                                if (empty($_where)) {
                                                    $_where = $_where . " WHERE contact_staff = '$contact_staff' ";
                                                } else {
                                                    $_where = $_where . " AND  contact_staff = '$contact_staff'"; 
                                                }
                                            }

                                        }
                                        

                                        $_sql = $_sql . $_where . "" . " ORDER BY contact_id desc ";
                                        $query_search = mysqli_query($conn, $_sql);

                                // print_r($query_search);
                                // print_r($_sql);
                                // print_r($_where);
                                ?>

                        <section class="content">
                            <div class="row">

                                <div class="col-md-12">
                                    <div class="card card-outline card-info">
                                        <div class="card-header ">
                                            <h3 class="card-title font1">
                                                Search
                                            </h3>
                                        </div>
                                        <div class="card-body">
                                            <form action="contact.php" method="POST">
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <div class="form-group ">
                                                            <input type="text" class="form-control " id="searchservice" name="searchservice" value="<?php echo $search; ?>"
                                                                placeholder="ค้นหา...">
                                                            <input type="hidden" class="form-control " id="search_backup" name="search_backup" value="<?php echo $search; ?>">
                                                            <input type="hidden" class="form-control " id="contact_type_backup" name="contact_type_backup" value="<?php echo $contact_type; ?>">
                                                            <input type="hidden" class="form-control " id="contact_province_backup" name="contact_province_backup" value="<?php echo $contact_province; ?>">
                                                            <input type="hidden" class="form-control " id="contact_staff_backup" name="contact_staff_backup" value="<?php echo $contact_staff; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-group ">
                                                            <button type="submit" class="btn btn-primary" id="search" name="search">Search</button>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-5">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-2">
                                                        <div class="form-group">
                                                            <label>Type</label>
                                                            <select class="custom-select select2" name="contact_type">
                                                                <option value="">Select</option>
                                                                <?php while ($r = mysqli_fetch_array($query_contact_type)) { ?>
                                                                <option value="<?php echo $r["contact_type"]; ?>"
                                                                    <?php if ($r['contact_type'] == $contact_type) : ?>
                                                                    selected="selected" <?php endif; ?>>
                                                                    <?php echo $r["contact_type"]; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="form-group">
                                                            <label>Province</label>
                                                            <select class="custom-select select2" name="contact_province">
                                                                <option value="">Select</option>
                                                                <?php while ($rg = mysqli_fetch_array($query_contact_province)) { ?>
                                                                <option value="<?php echo $rg["contact_province"]; ?>"
                                                                    <?php if ($rg['contact_province'] == $contact_province) : ?>
                                                                    selected="selected" <?php endif; ?>>
                                                                    <?php echo $rg["contact_province"]; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="form-group">
                                                            <label>Crate by</label>
                                                            <select class="custom-select select2" name="contact_staff">
                                                                <option value="">Select</option>
                                                                <?php while ($re = mysqli_fetch_array($query_contact_staff)) { ?>
                                                                <option value="<?php echo $re["contact_staff"]; ?>"
                                                                    <?php if ($re['contact_staff'] == $contact_staff) : ?>
                                                                    selected="selected" <?php endif; ?>>
                                                                    <?php echo $re["contact_staff"]; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>

                                                </div>
                                            </form>
                                        </div>
                                        <div class="card-footer">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                </div>

                        </section>

                        <div class="col-md-12 pb-3">
                            <a href="contact_add.php" class="btn btn-success btn-sm float-right" data-toggle="modal" data-target="#editbtn"> Add <i class=""></i></a>
                        </div><br>


                        <div class="card">
                            <div class="card-header">
                                <div class="container-fluid">
                                    <h3 class="card-title">Contact Management</h3>
                                </div>
                            </div>

                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">

                                    <thead>
                                        <tr>
                                            <th scope="col" class="text-nowrap text-center " height="" width="">Type</th>
                                            <th scope="col" class="text-nowrap text-center " height="" width="">Name</th>
                                            <th scope="col" class="text-nowrap text-center " height="" width="">Position</th>
                                            <th scope="col" class="text-nowrap text-center " height="" width="">Group</th>
                                            <th scope="col" class="text-nowrap text-center " height="" width="">Phone</th>
                                            <th scope="col" class="text-nowrap text-center " height="" width="">Email</th>
                                            <th scope="col" class="text-nowrap text-center " height="" width="">Phone</th>
                                            <th scope="col" class="text-nowrap text-center " height="" width="">Company</th>
                                            <th scope="col" class="text-nowrap text-center " height="" width="">Address</th>
                                            <th scope="col" class="text-nowrap text-center " height="" width="">Creater</th>
                                            <th scope="col" class="text-nowrap text-center " height="" width="">Create Date</th>
                                            <th scope="col" class="text-nowrap text-center " height="" width="">Action </th>
                                        </tr>
                                    </thead>

                                    <tbody id="myTable">
                                        <?php while ($res_search = mysqli_fetch_array($query_search)) { ?>
                                        <tr >
                                            <td scope="col" class="text-nowrap  " height="" width=""><?php echo $res_search["contact_type"]; ?></td>
                                            <td scope="col" class="text-nowrap  " height="" width=""><?php echo $res_search["contact_fullname"]; ?></td>
                                            <td scope="col" class="text-nowrap  " height="" width=""><?php echo $res_search["contact_position"];?></td>
                                            <td scope="col" class="text-nowrap  " height="" width=""><?php echo $res_search["contact_agency"];?></td>
                                            <td scope="col" class="text-nowrap  " height="" width=""><?php echo $res_search["contact_tel"];?></td>
                                            <td scope="col" class="text-nowrap  " height="" width=""><?php echo $res_search["contact_email"]; ?></td>
                                            <td scope="col" class="text-nowrap  " height="" width=""><?php echo $res_search["contact_tel"]; ?></td>
                                            <td scope="col" class="text-nowrap  " height="" width=""><?php echo $res_search["contact_company"]; ?></td>
                                            <td scope="col" class="text-nowrap  " height="" width=""><?php echo $res_search["contact_detail"]; ?></td>
                                            <td scope="col" class="text-nowrap  " height="" width=""><?php echo $res_search["contact_staff"]; ?></td>
                                            <td scope="col" class="text-nowrap  " height="" width=""><?php echo $res_search["contact_crt"]; ?></td>
                                            
                                            <td>
                                                 <a href="contact_copy.php?id=<?php echo $res_search["contact_id"]; ?>" class="btn btn-success btn-sm "><i class="fas fa-copy"></i></a>
                                                <a href="contact_edit.php?id=<?php echo $res_search["contact_id"]; ?>" class="btn btn-info btn-sm swalDefaultSuccess"><i class="fas fa-pencil-alt"></i></a>
                                                <a href="contact.php?id=<?php echo $res_search["contact_id"]; ?>" class="btn btn-danger btn-sm swalDefaultSuccess"><i class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>

                                    <tfoot>
                                        <tr>
                                        <th scope="col" class="text-nowrap text-center " height="" width="">Type</th>
                                            <th scope="col" class="text-nowrap text-center " height="" width="">Name</th>
                                            <th scope="col" class="text-nowrap text-center " height="" width="">Position</th>
                                            <th scope="col" class="text-nowrap text-center " height="" width="">Group</th>
                                            <th scope="col" class="text-nowrap text-center " height="" width="">Phone</th>
                                            <th scope="col" class="text-nowrap text-center " height="" width="">Email</th>
                                            <th scope="col" class="text-nowrap text-center " height="" width="">Phone</th>
                                            <th scope="col" class="text-nowrap text-center " height="" width="">Company</th>
                                            <th scope="col" class="text-nowrap text-center " height="" width="">Address</th>
                                            <th scope="col" class="text-nowrap text-center " height="" width="">Creater</th>
                                            <th scope="col" class="text-nowrap text-center " height="" width="">Create Date</th>
                                            <th scope="col" class="text-nowrap text-center " height="" width="">Action </th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


    <!----------------------------- start menu ------------------------------->
    <?php include ("../ino/templated/footer.php");?>
    <!----------------------------- end menu --------------------------------->

      <!-- highlight -->
      <script src="code/dist/js/highlight.js"></script>

    <script>
    //<!-- Fillter -->
    $(document).ready(function() {
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
        // <!-- Fillter -->
        // <!-- Copy -->
        $(document).on('click', '.btncoppy', function() {
            var copyText = $(this).attr("name");
            console.log(copyText);
            var el = $('<input style="position: absolute; bottom: -120%" type="text" value="' +
                copyText + '"/>').appendTo('body');
            el[0].select();
            document.execCommand("copy");
            el.remove();
        });
    });

    
    $("#myTable tr").highlight("<?php echo $search;?>");
    </script>
    <!-- highlight -->




  <!----------------------------- start Modal Add user ------------------------------->
  <?php
    if (isset($_POST['submit1'])) { /* ถ้า POST มีการกด Submit ให้ทำส่วนล่าง */
        /* ประกาศตัวแปลเก็บค่า  POST ที่รับมาจาก INPUT  */
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

        //print_r($_POST);
        //check duplicat
        $sql = "SELECT * From contact WHERE contact_fullname = '$contact_fullname' OR contact_email = '$contact_email' OR contact_tel = '$contact_tel' ";
        $result = $conn->query($sql);
        $num = mysqli_num_rows($result);

        // print_r($result); 
        // print_r($num);
        //ถ้า username ซ้ำ ให้เด้งกลับไปหน้าสมัครสมาชิก ปล.ข้อความใน sweetalert ปรับแต่งได้ตามความเหมาะสม
        if ($num > 0) {
            echo '<script>
                        setTimeout(function() {
                            swal({
                                    title: "The data already exists in the system.!! ",  
                                    text: "Please check the information again.",
                                    type: "warning"
                                }, function() {
                                    window.location = "#"; //หน้าที่ต้องการให้กระโดดไป
                                    });
                                    }, 1000);
                                </script>';
        } else {
            //ถ้า username ไม่ซ้ำ เก็บข้อมูลลงตาราง

            //sql insert
            $sql = "INSERT INTO `contact` ( `contact_fullname`,`contact_position`,`contact_agency`,
                                        `contact_tel`, `contact_email`, `contact_detail`, `contact_company`, `contact_type`, `contact_staff`,
                                        `contact_province`)
                                    VALUES ('$contact_fullname','$contact_position','$contact_agency','$contact_tel', '$contact_email',
                                        '$contact_detail', '$contact_company', '$contact_type', '$contact_staff', '$contact_province')";

            $result = $conn->query($sql);
            if ($result) {
                echo '<script>
                                                setTimeout(function() {
                                                swal({
                                                        title: "Save data successfully",
                                                        text: "",
                                                        type: "success"
                                                    }, function() {
                                                        window.location = "contact.php"; //หน้าที่ต้องการให้กระโดดไป
                                                        });
                                                        }, 1000);
                                                    </script>';
            } else {
                echo '<script>
                                                setTimeout(function() {
                                                swal({
                                                        title: "Please check the information again.",
                                                        type: "error"
                                                }, function() {
                                                        window.location = "contact.php"; //หน้าที่ต้องการให้กระโดดไป
                                                        });
                                                        }, 1000);
                                                    </script>';
            }
            $conn = null; //close connect db
        } //else chk dup

    } //isset 
    //devbanban.com
    ?>

    <div class="modal fade" id="editbtn">
        <div class="modal-dialog editbtn">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Customer</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="contact.php" method="POST" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Type<span class="text-danger">*</span></label>
                                <select class="form-control select2" name="contact_type" required style="width: 100%;">
                                    <option selected="selected">Select</option>
                                    <option>Staff</option>
                                    <option>Customer</option>
                                    <option>Partner</option>
                                    <option>Sale</option>
                                </select>
                            </div>
                            <!-- /.form-group -->

                            <div class="form-group">
                                <label for="contact_fullname">Full Name<span class="text-danger">*</span></label>
                                <input type="text" name="contact_fullname" class="form-control" id="contact_fullname" placeholder="" required>
                            </div>
                            <!-- /.form-group -->

                            <div class="form-group">
                                <label for="contact_position">Position<span class="text-danger">*</span></label>
                                <input type="text" name="contact_position" class="form-control" id="contact_position" placeholder="" required>
                            </div>
                            <!-- /.form-group -->

                            <div class="form-group">
                                <label for="contact_company">Company<span class="text-danger">*</span></label>
                                <input type="text" name="contact_company" class="form-control" id="contact_company" placeholder="" required>
                            </div>
                            <!-- /.form-group -->

                            <div class="form-group">
                                <label>Agency<span class="text-danger">*</span></label>
                                <input type="text" name="contact_agency" class="form-control" id="contact_agency" placeholder="">


                                <input type="hidden" name="contact_staff" class="form-control" value="<?php echo ($_SESSION['fullname']); ?>" placeholder="">

                            </div>
                            <!-- /.form-group -->

                            <!-- textarea -->
                            <div class="form-group">
                                <label>Address</label>
                                <textarea class="form-control" name="contact_detail" id="contact_detail" rows="4" placeholder=""></textarea>
                            </div>


                            <div class="form-group">
                                <label>Province<span class="text-danger">*</span></label>
                                <select class="form-control select2" name="contact_province" required style="width: 100%;">
                                    <option selected="selected">Select</option>
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
                                    <input type="text" class="form-control" name="contact_tel" id="tel" data-inputmask='"mask": "(999) 999-9999"' data-mask required>
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
                                    <input type="email" class="form-control" name="contact_email" id="email" placeholder="Email" required>
                                </div>
                            </div>
                            <!-- /.form-group -->

                        </div>

                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit1" name="submit1" value="submit1" class="btn btn-success">Save</button>
                </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    <!----------------------------- end Modal Add user --------------------------------->

    


