<!DOCTYPE html>
<html lang="en">
<?php $menu = "contact"; ?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>INO | Contact</title>


    <!----------------------------- start header ------------------------------->
    <?php include ("../ino/templated/head.php");?>
    <!----------------------------- end header --------------------------------->

    <!----------------------------- start menu ------------------------------->
    <?php include ("../ino/templated/menu.php");?>
    <!----------------------------- end menu --------------------------------->

    <?php
    /* การลบข้อมูล */
    if (isset($_GET['id'])) {

        $result = $conn->query("DELETE FROM tb_contact WHERE tb_contact=" . $_GET['id']);

        if ($result) {
            // <!-- sweetalert -->
            echo '<script>
                    setTimeout(function(){
                        swal({
                            title: "Delectd Successfully!",
                            text: "Thank You . ",
                            type:"success"
                        }, function(){
                            window.location = "conatct.php";
                        })
                    },1000);
                </script>';
            // echo "<script>alert('ยินดีตอนรับ Admin เข้าสู่ระบบ'); window.location='../index.php'</script>";
        } else {
            // <!-- sweetalert -->
            echo '<script>
                    setTimeout(function(){
                        swal({
                            title: "Can Not Delectd Successfully!",
                            text: "Checking Your Data",
                            type:"warning"
                        }, function(){
                            window.location = "conatct_is.php";
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
                        <h1>Contact Custormer</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active">Contact Custormer</li>
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
    $tb_position = "";
    $tb_group = "";
    $tb_status = "";

    $search_backup = "";
    $tb_position_backup = "";
    $tb_group_backup = "";

    $tb_createdate_backup = "";

    $_sql_position = "SELECT DISTINCT contact_group FROM tb_contact";
    $_sql_group = "SELECT DISTINCT contact_position FROM tb_contact";
    $_sql_status = "SELECT DISTINCT contact_date  FROM tb_contact";


    $query_position = mysqli_query($conn, $_sql_position);
    $query_group = mysqli_query($conn, $_sql_group);
    $query_status = mysqli_query($conn, $_sql_status);


    $_sql = "SELECT * FROM tb_contact";
    $_where = "";
    if (isset($_POST['search'])) {

        $search = $_POST['searchservice'];
        $tb_position = $_POST['contact_group'];
        $tb_group = $_POST['contact_position'];
        $tb_status = $_POST['contact_date'];

        $search_backup = $_POST['search_backup'];
        $tb_position_backup = $_POST['tb_position_backup'];
        $tb_group_backup = $_POST['tb_group_backup'];
        $tb_status_backup = $_POST['tb_status_backup'];

        // print_r($_sqlCount);

        if ($search != $search_backup || $tb_position != $tb_position_backup || $tb_group != $tb_group_backup || $tb_status  != $tb_status_backup )
        
        if (!empty($search)) {
            $_where = $_where . " WHERE contact_group LIKE '%$search%'OR contact_name LIKE '%$search%' OR contact_position LIKE '%$search%' OR contact_phone LIKE '%$search%' 
            OR contact_email LIKE '%$search%' OR contact_address LIKE '%$search%' OR contact_company LIKE '%$search%'";
        }
        if ($tb_position != "") {
            if (empty($_where)) {
                $_where = $_where . " WHERE contact_group = '$tb_position' ";
            } else {
                $_where = $_where . " AND contact_group = '$tb_position'";
            }
        }
        if ($tb_group != "") {
            if (empty($_where)) {
                $_where = $_where . " WHERE contact_position = '$tb_group' ";
            } else {
                $_where = $_where . " AND contact_position = '$tb_group'";
            }
        }
        if ($tb_status != "") {
            if (empty($_where)) {
                $_where = $_where . " WHERE contact_date = '$tb_status' ";
            } else {
                $_where = $_where . " AND  contact_date = '$tb_status'"; 
            }
        }

    }
    

    $query_search = mysqli_query($conn, $_sql .$_where); 
// print_r($query_search);
    ?>

                        <section class="content">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card card-outline card-info">
                                        <div class="card-header ">
                                            <h3 class="card-title font1">
                                                ค้นหา
                                            </h3>
                                        </div>
                                        <div class="card-body">
                                            <form action="contact.php" method="POST">
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <div class="form-group ">
                                                            <input type="text" class="form-control " id="searchservice"
                                                                name="searchservice" value="<?php echo $search; ?>"
                                                                placeholder="ค้นหา...">
                                                            <input type="hidden" class="form-control "
                                                                id="search_backup" name="search_backup"
                                                                value="<?php echo $search; ?>">
                                                            <input type="hidden" class="form-control "
                                                                id="tb_position_backup" name="tb_position_backup"
                                                                value="<?php echo $contact_group; ?>">
                                                            <input type="hidden" class="form-control "
                                                                id="tb_group_backup" name="tb_group_backup"
                                                                value="<?php echo $contact_position; ?>">
                                                            <input type="hidden" class="form-control "
                                                                id="tb_status_backup" name="tb_status_backup"
                                                                value="<?php echo $contact_date; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-group ">
                                                            <button type="submit" class="btn btn-primary" id="search"
                                                                name="search">ค้นหา</button>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-5">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-2">
                                                        <div class="form-group">
                                                            <label>ประเภท</label>
                                                            <select class="custom-select select2" name="contact_group">
                                                                <option value="">เลือก</option>
                                                                <?php while ($r = mysqli_fetch_array($query_position)) { ?>
                                                                <option value="<?php echo $r["contact_group"]; ?>"
                                                                    <?php if ($r['contact_group'] == $tb_position) : ?>
                                                                    selected="selected" <?php endif; ?>>
                                                                    <?php echo $r["contact_group"]; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="form-group">
                                                            <label>ตำแหน่ง</label>
                                                            <select class="custom-select select2" name="contact_position">
                                                                <option value="">เลือก</option>
                                                                <?php while ($rg = mysqli_fetch_array($query_group)) { ?>
                                                                <option value="<?php echo $rg["contact_position"]; ?>"
                                                                    <?php if ($rg['contact_position'] == $tb_group) : ?>
                                                                    selected="selected" <?php endif; ?>>
                                                                    <?php echo $rg["contact_position"]; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="form-group">
                                                            <label>วันสร้าง</label>
                                                            <select class="custom-select select2" name="contact_date">
                                                                <option value="">เลือก</option>
                                                                <?php while ($re = mysqli_fetch_array($query_status)) { ?>
                                                                <option value="<?php echo $re["contact_date"]; ?>"
                                                                    <?php if ($re['contact_date'] == $tb_status) : ?>
                                                                    selected="selected" <?php endif; ?>>
                                                                    <?php echo $re["contact_date"]; ?></option>
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
                            <a href="contact_is.php" class="btn btn-success btn-sm float-right">เพิ่มข้อมูล<i
                                    class=""></i></a>
                        </div><br>


                        <div class="card">
                            <div class="card-header">
                                <div class="container-fluid">
                                    <h3 class="card-title">Employee for CRA Project</h3>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>ประเภท</th>
                                            <th>ชื่อ-สกุล</th>
                                            <th>บริษัท</th>
                                            <th>ตำแหน่ง</th>
                                            <th>ทีม</th>
                                            <th>เบอร์โทรศัทพ์</th>
                                            <th>Email</th>
                                            <th>วันที่สร้าง</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php while ($res_search = mysqli_fetch_array($query_search)) { ?>
                                        <tr id="myTable">
                                            <td><?php echo $res_search["contact_group"]; ?></td>
                                            <td><?php echo $res_search["contact_name"]; ?></td>
                                            <td><?php echo $res_search["contact_company"]; ?></td>
                                            <td><?php echo $res_search["contact_position"];?></td>
                                            <td><?php echo $res_search["contact_team"];?></td>
                                            <td><?php echo $res_search["contact_phone"]; ?></td>
                                            <td><?php echo $res_search["contact_email"]; ?></td>
                                            <td><?php echo $res_search["contact_date"]; ?></td>

                                            <td>
                                            <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-default<?php echo $res_search["contact_id"]; ?>"><i class="fas fa-eye"></i></a>

                                                <div class="modal fade" id="modal-default<?php echo $res_search["contact_id"]; ?>">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title"><span class="text-danger"><?php echo $res_search["contact_name"]; ?></span></h4>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p><h6><span class="text-primary">ข้อมูล</p></span></h6>
                                                                    <p>ประเภท : <?php echo $res_search["contact_group"]; ?></p>
                                                                    <p>ชื่อ-สกุล : <?php echo $res_search["contact_name"]; ?></p>
                                                                    <p>ตำแหน่ง : <?php echo $res_search["contact_company"]; ?></p>
                                                                    <p>ทีม : <?php echo $res_search["contact_team"]; ?></p>
                                                                    <p>บริษัท : <?php echo $res_search["contact_position"]; ?></p>
                                                                   
                                                                    

                                                                    <p><h6><span class="text-primary">ข้อมูลติดต่อ</p></span></h6>
                                                                    <p>เบอร์โทรศัทพ์ : <?php echo $res_search["contact_phone"]; ?></p>
                                                                    <p>Email : <?php echo $res_search["contact_email"]; ?></p>

                                                                    <p><h6><span class="text-primary">ที่อยู่ :</p></span></h6>
                                                                    <p>
                                                                        <?php $lam = explode(PHP_EOL, $res_search["contact_address"]);
                                                                        for ($i = 0; $i < count($lam); $i++) { ?>
                                                                            <?php echo $lam[$i]; ?></br>
                                                                        <?php } ?>
                                                                    </p>

                                                                    <p>วันสร้าง : <?php echo $res_search["contact_date"]; ?></p>

                                                                </div>
                                                                <div class="modal-footer justify-content-between">
                                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                </div>
                                                            </div>
                                                            <!-- /.modal-content -->
                                                        </div>
                                                        <!-- /.modal-dialog -->
                                                    </div>
                                                    <!-- /.modal -->



                                                <a href="contact_edit.php?id=<?php echo $res_search["contact_id"]; ?>" class="btn btn-info btn-sm"><i
                                                        class="fas fa-pencil-alt"></i></a>
                                                <a href="#"
                                                    class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                                            </td>

                                        </tr>
                                        <?php } ?>

                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>ประเภท</th>
                                            <th>ชื่อ-สกุล</th>
                                            <th>บริษัท</th>
                                            <th>ตำแหน่ง</th>
                                            <th>ทีม</th>
                                            <th>เบอร์โทรศัทพ์</th>
                                            <th>Email</th>
                                            <th>วันที่สร้าง</th>
                                            <th>Action</th>
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
            </div>
            <!-- /.container-fluid -->
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
    $("#myTable tr").highlight();
    </script>
    <!-- highlight -->