<!DOCTYPE html>
<html lang="en">
<?php $menu = "account"; ?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>INO | Account</title>


    <!----------------------------- start header ------------------------------->
    <?php include ("../ino/templated/head.php");?>
    <!----------------------------- end header --------------------------------->

    <!----------------------------- start menu ------------------------------->
    <?php include ("../ino/templated/menu.php");?>
    <!----------------------------- end menu --------------------------------->

    <?php
    /* การลบข้อมูล */
    if (isset($_GET['id'])) {

        $result = $conn->query("DELETE FROM tb_user WHERE tb_user=" . $_GET['id']);

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
                        <h1>Account Management</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active">Account Management</li>
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
    $tb_team = "";
    $tb_role = "";

    $search_backup = "";
    $tb_position_backup = "";
    $tb_team_backup = "";
    $tb_role_backup = "";

    
    
    $_sql_position = "SELECT DISTINCT user_position FROM tb_user";
    $_sql_team = "SELECT DISTINCT user_team FROM tb_user";
    $_sql_role = "SELECT DISTINCT user_role  FROM tb_user";


    $query_position = mysqli_query($conn, $_sql_position);
    $query_team = mysqli_query($conn, $_sql_team);
    $query_role = mysqli_query($conn, $_sql_role);


    $_sql = "SELECT * FROM tb_user";
    $_where = "";
    if (isset($_POST['search'])) {

        $search = $_POST['searchservice'];
        $tb_position = $_POST['user_position'];
        $tb_team = $_POST['user_team'];
        $tb_role = $_POST['user_role'];

        $search_backup = $_POST['search_backup'];
        $tb_position_backup = $_POST['tb_position_backup'];
        $tb_team_backup = $_POST['tb_team_backup'];
        $tb_role_backup = $_POST['tb_role_backup'];

        // print_r($_sqlCount);

        if ($search != $search_backup || $tb_position != $tb_position_backup || $tb_team != $tb_team_backup || $tb_role  != $tb_role_backup )
        
        if (!empty($search)) {
            $_where = $_where . " WHERE user_name LIKE '%$search%'OR user_lastname LIKE '%$search%' OR user_position LIKE '%$search%' OR user_team LIKE '%$search%' 
            OR user_email LIKE '%$search%' OR user_role LIKE '%$search%' OR user_company LIKE '%$search%' OR user_tel LIKE '%$search%' OR username LIKE '%$search%'";
        }
        if ($tb_position != "") {
            if (empty($_where)) {
                $_where = $_where . " WHERE user_position = '$tb_position' ";
            } else {
                $_where = $_where . " AND user_position = '$tb_position'";
            }
        }
        if ($tb_team != "") {
            if (empty($_where)) {
                $_where = $_where . " WHERE user_team = '$tb_team' ";
            } else {
                $_where = $_where . " AND user_team = '$tb_team'";
            }
        }
        if ($tb_role != "") {
            if (empty($_where)) {
                $_where = $_where . " WHERE user_role = '$tb_role' ";
            } else {
                $_where = $_where . " AND  user_role = '$tb_role'"; 
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
                                            <form action="account.php" method="POST">
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <div class="form-group ">
                                                            <input type="text" class="form-control " id="searchservice" name="searchservice" value="<?php echo $search; ?>" placeholder="ค้นหา...">
                                                            <input type="hidden" class="form-control " id="search_backup" name="search_backup" value="<?php echo $search; ?>">
                                                            <input type="hidden" class="form-control " id="tb_position_backup" name="tb_position_backup" value="<?php echo $user_position; ?>">
                                                            <input type="hidden" class="form-control " id="tb_team_backup" name="tb_team_backup" value="<?php echo $user_team; ?>">
                                                            <input type="hidden" class="form-control " id="tb_role_backup" name="tb_role_backup" value="<?php echo $user_role; ?>">
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
                                                            <label>ตำแหน่ง</label>
                                                            <select class="custom-select select2" name="user_position">
                                                                <option value="">เลือก</option>
                                                                <?php while ($r = mysqli_fetch_array($query_position)) { ?>
                                                                <option value="<?php echo $r["user_position"]; ?>"
                                                                    <?php if ($r['user_position'] == $tb_position) : ?>
                                                                    selected="selected" <?php endif; ?>>
                                                                    <?php echo $r["user_position"]; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="form-group">
                                                            <label>ทีม</label>
                                                            <select class="custom-select select2" name="user_team">
                                                                <option value="">เลือก</option>
                                                                <?php while ($rg = mysqli_fetch_array($query_team)) { ?>
                                                                <option value="<?php echo $rg["user_team"]; ?>"
                                                                    <?php if ($rg['user_team'] == $tb_team) : ?>
                                                                    selected="selected" <?php endif; ?>>
                                                                    <?php echo $rg["user_team"]; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="form-group">
                                                            <label>วันสร้าง</label>
                                                            <select class="custom-select select2" name="user_role">
                                                                <option value="">เลือก</option>
                                                                <?php while ($re = mysqli_fetch_array($query_role)) { ?>
                                                                <option value="<?php echo $re["user_role"]; ?>"
                                                                    <?php if ($re['user_role'] == $tb_role) : ?>
                                                                    selected="selected" <?php endif; ?>>
                                                                    <?php echo $re["user_role"]; ?></option>
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
                            <a href="account_is.php" class="btn btn-success btn-sm float-right">เพิ่มข้อมูล<i
                                    class=""></i></a>
                        </div><br>


                        <div class="card">
                            <div class="card-header">
                                <div class="container-fluid">
                                    <h3 class="card-title">Account Management</h3>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>ชื่อผู้ใช้งาน</th>
                                            <th>ชื่อ-สกุล</th>
                                            <th>บริษัท</th>
                                            <th>ทีม</th>
                                            <th>ตำแหน่ง</th>
                                            <th>บทบาท</th>
                                            <th>เบอร์โทรศัทพ์</th>
                                            <th>Email</th>
                                            <th>วันที่สร้าง</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php while ($res_search = mysqli_fetch_array($query_search)) { ?>
                                        <tr id="myTable">
                                            <td><?php echo $res_search["username"]; ?></td>
                                            <td><?php echo $res_search["user_name"]; ?> <?php echo $res_search["user_lastname"]; ?></td>
                                            <td><?php echo $res_search["user_company"]; ?></td>
                                            <td><?php echo $res_search["user_team"];?></td>
                                            <td><?php echo $res_search["user_position"];?></td>
                                            <td><?php echo $res_search["user_role"];?></td>
                                            <td><?php echo $res_search["user_tel"]; ?></td>
                                            <td><?php echo $res_search["user_email"]; ?></td>
                                            <td><?php echo $res_search["user_date"]; ?></td>
                                            <td>
                                                <a href="account_edit.php?user_id=<?php echo $res_search["user_id"]; ?>" class="btn btn-info btn-sm"><i class="fas fa-pencil-alt"></i></a>
                                                <a href="#" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                                            </td>

                                        </tr>
                                        <?php } ?>

                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>ชื่อผู้ใช้งาน</th>
                                            <th>ชื่อ-สกุล</th>
                                            <th>บริษัท</th>
                                            <th>ทีม</th>
                                            <th>ตำแหน่ง</th>
                                            <th>บทบาท</th>
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