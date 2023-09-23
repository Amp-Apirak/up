<!DOCTYPE html>
<html lang="en">
<?php $menu = "project"; ?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>INO | Project</title>


    <!----------------------------- start header ------------------------------->
    <?php include ("../ino/templated/head.php");?>
    <!----------------------------- end header --------------------------------->

    <!----------------------------- start menu ------------------------------->
    <?php include ("../ino/templated/menu.php");?>
    <!----------------------------- end menu --------------------------------->

    <?php
        /* การลบข้อมูล */
        if (isset($_GET['id'])) {

            $result = $conn->query("DELETE FROM project INNER JOIN estime  WHERE project_id=" . $_GET['projecr_id']);

            if ($result) {
                // <!-- sweetalert -->
                echo '<script>
                        setTimeout(function(){
                            swal({
                                title: "Successfully!",
                                text: "Delect Infomation Complatrd.",
                                type:"success"
                            }, function(){
                                window.location = "project.php";
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
                                window.location = "project.php";
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
                        <h1>Project Management</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active">Project Management</li>
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
                                    $project_name = "";
                                    $project_m = "";
                                    $project_status = "";
                                    $project_staff = "";


                                    $search_backup = "";
                                    $project_name_backup = "";
                                    $project_m_backup = "";
                                    $project_status_backup = "";
                                    $project_staff_backup = "";

                        
                                    $_sql_project_name = "SELECT DISTINCT project_name FROM pipeline ";
                                    $_sql_project_m = "SELECT DISTINCT project_m FROM project ";
                                    $_sql_project_status = "SELECT DISTINCT project_status  FROM project ";
                                    $_sql_project_staff = "SELECT DISTINCT project_staff  FROM project ";


                                    $query_project_name = mysqli_query($conn, $_sql_project_name);
                                    $query_project_m = mysqli_query($conn, $_sql_project_m);
                                    $query_project_status = mysqli_query($conn, $_sql_project_status);
                                    $query_project_staff = mysqli_query($conn, $_sql_project_staff);


                                    $_sql = "SELECT * FROM project LEFT JOIN pipeline On (project.pip_id = pipeline.pip_id)";
                                    $_where = "";

                                        if (isset($_POST['search'])) {

                                            $search = $_POST['searchservice'];
                                            $project_name = $_POST['project_name'];
                                            $project_m = $_POST['project_m'];
                                            $project_status = $_POST['project_status'];
                                            $project_staff = $_POST['project_staff'];
                                            $project_quarter = $_POST['project_quarter'];
                                            $project_up_status = $_POST['project_up_status'];

                                            $search_backup = $_POST['search_backup'];
                                            $project_name_backup = $_POST['project_name_backup'];
                                            $project_m_backup = $_POST['project_m_backup'];
                                            $project_status_backup = $_POST['project_status_backup'];
                                            $project_staff_backup = $_POST['project_staff_backup'];
                                            $project_quarter_backup = $_POST['project_quarter_backup'];
                                            $project_up_status_backup = $_POST['project_up_status_backup'];

                                        // print_r($_sqlCount);

                                            if ($search != $search_backup || $project_name != $project_name_backup || $project_m != $project_m_backup || $project_status  != $project_status_backup 
                                            || $project_staff  != $project_staff_backup || $project_quarter  != $project_quarter_backup || $project_up_status  != $project_up_status_backup )
                                        
                                            if (!empty($search)) {
                                                $_where = $_where . " WHERE project_name  LIKE '%$search%' OR project_m LIKE '%$search%' OR project_brand LIKE '%$search%' 
                                                OR project_mean LIKE '%$search%' OR project_remark LIKE '%$search%' OR project_up_status LIKE '%$search%' OR project_status LIKE '%$search%' OR project_staff LIKE '%$search%'";
                                            }
                                            if ($project_name != "") {
                                                if (empty($_where)) {
                                                    $_where = $_where . " WHERE project_name = '$project_name' ";
                                                } else {
                                                    $_where = $_where . " AND project_name = '$project_name'";
                                                }
                                            }
                                            if ($project_m != "") {
                                                if (empty($_where)) {
                                                    $_where = $_where . " WHERE project_m = '$project_m' ";
                                                } else {
                                                    $_where = $_where . " AND project_m = '$project_m'";
                                                }
                                            }
                                            if ($project_status != "") {
                                                if (empty($_where)) {
                                                    $_where = $_where . " WHERE project_status = '$project_status' ";
                                                } else {
                                                    $_where = $_where . " AND  project_status = '$project_status'"; 
                                                }
                                            }
                                            if ($project_staff != "") {
                                                if (empty($_where)) {
                                                    $_where = $_where . " WHERE project_staff = '$project_staff' ";
                                                } else {
                                                    $_where = $_where . " AND  project_staff = '$project_staff'"; 
                                                }
                                            }
                                        }
                                        

                                    $query_search = mysqli_query($conn, $_sql .$_where); 
                                // print_r($query_search);
                                ?>

                        <?php if ($_SESSION["role"] == "Administrator") { ?>
                        <!-- Main content -->
                        <section class="content">
                            <div class="container-fluid">
                                <!-- Small boxes (Stat box) -->
                                <div class="row">

                                    <div class="col-lg-3 col-6">
                                        <!-- small box -->
                                        <div class="small-box bg-info">

                                            <!-- Qeury Count All Service -->
                                            <?php 
                                                                $query2 = "SELECT COUNT(`project_m`) as AMP FROM project ";
                                                                $query1 = $query2 . $_where . "" . " ORDER BY project_id DESC ";
                                                                $result = mysqli_query($conn, $query1);
                                                                $rs = mysqli_fetch_array($result);
                                                                $a = $rs['AMP'];
                                                        ?>

                                            <div class="inner">
                                                <h3><?php echo number_format( $a, 0 ) ; ?></h3>

                                                <p>Project Name</p>
                                            </div>
                                            <div class="icon">
                                                <i class="ion ion-person-add"></i>
                                            </div>
                                            <a href="#" class="small-box-footer"></i></a>
                                        </div>
                                    </div>
                                    <!-- ./col -->

                                    <!-- ------------------------------------------------------------------------------------------------------------------ -->


                                    <div class="col-lg-3 col-6">
                                        <!-- small box -->
                                        <div class="small-box bg-warning">

                                            <!-- Qeury Count All Service -->
                                            <?php 
                                                                $query2 = "SELECT COUNT(`project_m`) as AMP FROM project ";
                                                                $query1 = $query2 . $_where . "" . " ORDER BY project_id DESC ";
                                                                $result = mysqli_query($conn, $query1);
                                                                $rs = mysqli_fetch_array($result);
                                                                $a = $rs['AMP'];
                                                        ?>

                                            <div class="inner">
                                                <h3><?php echo number_format( $a, 0 ) ; ?></h3>

                                                <p>Product/Solution</p>
                                            </div>
                                            <div class="icon">
                                                <i class="ion ion-person-add"></i>
                                            </div>
                                            <a href="#" class="small-box-footer"></i></a>
                                        </div>
                                    </div>
                                    <!-- ./col -->

                                    <!-- ------------------------------------------------------------------------------------------------------------------ -->

                                    <div class="col-lg-3 col-6">
                                        <!-- small box -->
                                        <div class="small-box bg-success">

                                            <!-- Qeury Count All Service -->
                                            <?php 
                                                                $query2 = "SELECT SUM(`project_m`) as AMP FROM project ";
                                                                $query1 = $query2 . $_where . "" . " ORDER BY project_id DESC ";
                                                                $result = mysqli_query($conn, $query1);
                                                                $rs = mysqli_fetch_array($result);
                                                                $a = $rs['AMP'];
                                                        ?>

                                            <div class="inner">
                                                <h3><?php echo number_format( $a, 0 ) ; ?></h3>

                                                <p>Estimated Sales</p>
                                            </div>
                                            <div class="icon">
                                                <i class="ion ion-person-add"></i>
                                            </div>
                                            <a href="#" class="small-box-footer"></i></a>
                                        </div>
                                    </div>
                                    <!-- ./col -->

                                    <!-- ------------------------------------------------------------------------------------------------------------------ -->

                                    <div class="col-lg-3 col-6">
                                        <!-- small box -->
                                        <div class="small-box bg-danger">

                                            <!-- Qeury Count All Service -->
                                            <?php 
                                                            
                                                            $query = "SELECT SUM(`project_m`) as AMP FROM project ";
                                                            $query1 = $query . $_where . "" . " ORDER BY project_id DESC ";
                                                            $result = mysqli_query($conn, $query1);
                                                            $ls = mysqli_fetch_array($result);   
                                                            $a = $ls['AMP'];                               
                                                        ?>

                                            <div class="inner">
                                                <h3><?php echo number_format( $a, 0 ) ; ?></h3>

                                                <p>Estimated GP</p>
                                            </div>
                                            <div class="icon">
                                                <i class="ion ion-pie-graph"></i>
                                            </div>
                                            <a href="#" class="small-box-footer"></i></a>
                                        </div>
                                    </div>
                                    <!-- ./col -->
                                </div>

                                <!-- ------------------------------------------------------------------------------------------------------------------ -->
                            </div><!-- /.container-fluid -->
                        </section>
                        <!-- /.content -->
                        <?php } ?>

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
                                            <form action="project.php" method="POST">
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <div class="form-group ">
                                                            <input type="text" class="form-control " id="searchservice" name="searchservice" value="<?php echo $search; ?>" placeholder="ค้นหา...">
                                                            <input type="hidden" class="form-control " id="search_backup" name="search_backup" value="<?php echo $search; ?>">
                                                            <input type="hidden" class="form-control " id="project_name_backup" name="project_name_backup" value="<?php echo $project_name; ?>">
                                                            <input type="hidden" class="form-control " id="project_m_backup" name="project_m_backup" value="<?php echo $project_m; ?>">
                                                            <input type="hidden" class="form-control " id="project_status_backup" name="project_status_backup" value="<?php echo $project_status; ?>">
                                                            <input type="hidden" class="form-control " id="project_staff_backup" name="project_staff_backup" value="<?php echo $project_staff; ?>">
                                                    
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-group ">
                                                            <button type="submit" class="btn btn-primary" id="search"
                                                                name="search">Search</button>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-5">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-2">
                                                        <div class="form-group">
                                                            <label>Project</label>
                                                            <select class="custom-select select2" name="project_name">
                                                                <option value="">Select</option>
                                                                <?php while ($r = mysqli_fetch_array($query_project_name)) { ?>
                                                                <option value="<?php echo $r["project_name"]; ?>"
                                                                    <?php if ($r['project_name'] == $project_name) : ?>
                                                                    selected="selected" <?php endif; ?>>
                                                                    <?php echo $r["project_name"]; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="form-group">
                                                            <label>Product</label>
                                                            <select class="custom-select select2"
                                                                name="project_m">
                                                                <option value="">Select</option>
                                                                <?php while ($rg = mysqli_fetch_array($query_project_m)) { ?>
                                                                <option value="<?php echo $rg["project_m"]; ?>"
                                                                    <?php if ($rg['project_m'] == $project_m) : ?>
                                                                    selected="selected" <?php endif; ?>>
                                                                    <?php echo $rg["project_m"]; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="form-group">
                                                            <label>Status</label>
                                                            <select class="custom-select select2" name="project_status">
                                                                <option value="">Select</option>
                                                                <?php while ($re = mysqli_fetch_array($query_project_status)) { ?>
                                                                <option value="<?php echo $re["project_status"]; ?>"
                                                                    <?php if ($re['project_status'] == $project_status) : ?>
                                                                    selected="selected" <?php endif; ?>>
                                                                    <?php echo $re["project_status"]; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="form-group">
                                                            <label>Creater</label>
                                                            <select class="custom-select select2" name="project_staff">
                                                                <option value="">Select</option>
                                                                <?php while ($rd = mysqli_fetch_array($query_project_staff)) { ?>
                                                                <option value="<?php echo $rd["project_staff"]; ?>"
                                                                    <?php if ($rd['project_staff'] == $project_staff) : ?>
                                                                    selected="selected" <?php endif; ?>>
                                                                    <?php echo $rd["project_staff"]; ?></option>
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

                        <?php if ($_SESSION["role"] == "Administrator") { ?>
                        <div class="col-md-12 pb-3">
                            <a href="project_add.php" class="btn btn-success btn-sm float-right"> Add <i class=""></i></a>
                        </div><br>
                        <?php } ?>


                        <?php if ($_SESSION["role"] == "Administrator") { ?>
                        <div class="card">
                            <div class="card-header">
                                <div class="container-fluid">
                                    <h3 class="card-title">Project Management</h3>
                                </div>
                            </div>

                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="text-nowrap text-center " height="" width="">No.</th>
                                            <th scope="col" class="text-nowrap text-center " height="" width="">Project Name</th>
                                            <th scope="col" class="text-nowrap text-center " height="" width="">Task Amount</th>
                                            <th scope="col" class="text-nowrap text-center " height="" width="">Completed Task</th>
                                            <th scope="col" class="text-nowrap text-center " height="" width="">Prograss</th>
                                            <th scope="col" class="text-nowrap text-center " height="" width="">Status</th>
                                            <th scope="col" class="text-nowrap text-center " height="" width="">Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php while ($res_search = mysqli_fetch_array($query_search)) { ?>
                                        <tr id="myTable">
                                            <td scope="col" class="text-nowrap  " height="" width="">1</td>
                                            <td scope="col" class="text-nowrap  " height="" width=""><a href="project_view.php?id=<?php echo $res_search["project_id"]; ?>"><?php echo $res_search["pip_name"]; ?></a></td>
                                            <td scope="col" class="text-nowrap  " height="" width=""><?php echo $res_search["project_brand"];?></td>
                                            <td scope="col" class="text-nowrap  " height="" width=""><?php echo $res_search["project_price"];?></td>
                                            <td scope="col" class="text-nowrap  " height="" width=""><?php echo $res_search["project_qty"];?></td>
                                            <td scope="col" class="text-nowrap  " height="" width=""><?php echo $res_search["project_sales_novat"]; ?></td>

                                            <td>
                                                <a href="project_edit.php" class="btn btn-info btn-sm " data-toggle="modal" data-target="#modal-lg"><i class="fas fa-pencil-alt"></i></a>
                                                <a href="project.php?id=" class="btn btn-danger btn-sm swalDefaultSuccess"><i class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>

                                    <tfoot>
                                        <tr>
                                            <th scope="col" class="text-nowrap text-center " height="" width="">No.</th>
                                            <th scope="col" class="text-nowrap text-center " height="" width="">Project Name</th>
                                            <th scope="col" class="text-nowrap text-center " height="" width="">Task Amount</th>
                                            <th scope="col" class="text-nowrap text-center " height="" width="">Completed Task</th>
                                            <th scope="col" class="text-nowrap text-center " height="" width="">Prograss</th>
                                            <th scope="col" class="text-nowrap text-center " height="" width="">Status</th>
                                            <th scope="col" class="text-nowrap text-center " height="" width="">Action</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->


                        <!-------------------------------- User Role ---------------------------------------------->
                        <?php }else{ ?>

                        <div class="card">
                            <div class="card-header">
                                <div class="container-fluid">
                                    <h3 class="card-title">Project Management</h3>
                                </div>
                            </div>

                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="text-nowrap text-center " height="" width="">ProjectName</th>
                                            <th scope="col" class="text-nowrap text-center " height="" width="">Product/Solution</th>
                                            <th scope="col" class="text-nowrap text-center " height="" width="">Brand</th>
                                            <th scope="col" class="text-nowrap text-center " height="" width="">Remark</th>
                                            <th scope="col" class="text-nowrap text-center " height="" width="">UpdateStatus</th>
                                            <th scope="col" class="text-nowrap text-center " height="" width="">Quarter</th>
                                            <th scope="col" class="text-nowrap text-center " height="" width="">status</th>
                                            <th scope="col" class="text-nowrap text-center " height="" width="">Customer</th>
                                            <th scope="col" class="text-nowrap text-center " height="" width="">Contact Phone</th>
                                            <th scope="col" class="text-nowrap text-center " height="" width="">Contact Email</th>
                                            <th scope="col" class="text-nowrap text-center " height="" width="">Company</th>
                                            <th scope="col" class="text-nowrap text-center " height="" width="">Address</th>
                                            <th scope="col" class="text-nowrap text-center " height="" width="">Createdate</th>
                                            <th scope="col" class="text-nowrap text-center " height="" width="">Creater</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php while ($res_search = mysqli_fetch_array($query_search)) { ?>
                                        <tr id="myTable">
                                            <td scope="col" class="text-nowrap  " height="" width=""><?php echo $res_search["project_name"]; ?></td>
                                            <td scope="col" class="text-nowrap  " height="" width=""><?php echo $res_search["project_product"]; ?></td>
                                            <td scope="col" class="text-nowrap  " height="" width=""><?php echo $res_search["project_brand"];?></td>
                                            <td scope="col" class="text-nowrap  " height="" width=""><?php echo $res_search["project_remark"]; ?></td>
                                            <td scope="col" class="text-nowrap  " height="" width=""><?php echo $res_search["project_up_status"]; ?></td>
                                            <td scope="col" class="text-nowrap text-center " height="" width=""><?php echo $res_search["project_quarter"]; ?></td>
                                            <td scope="col" class="text-nowrap  " height="" width=""><?php echo $res_search["project_status"]; ?></td>
                                            <td scope="col" class="text-nowrap  " height="" width=""><?php echo $res_search["contact_fullname"]; ?></td>
                                            <td scope="col" class="text-nowrap  " height="" width=""><?php echo $res_search["contact_tel"]; ?></td>
                                            <td scope="col" class="text-nowrap  " height="" width=""><?php echo $res_search["contact_email"]; ?></td>
                                            <td scope="col" class="text-nowrap  " height="" width=""><?php echo $res_search["contact_company"]; ?></td>
                                            <td scope="col" class="text-nowrap  " height="" width=""><?php echo $res_search["contact_detail"]; ?></td>
                                            <td scope="col" class="text-nowrap  " height="" width=""><?php echo $res_search["project_crt"]; ?></td>
                                            <td scope="col" class="text-nowrap  " height="" width=""><?php echo $res_search["project_staff"]; ?></td>
                                        </tr>
                                        <?php } ?>

                                    </tbody>

                                    <tfoot>
                                        <tr>
                                            <th scope="col" class="text-nowrap text-center " height="" width="">ProjectName</th>
                                            <th scope="col" class="text-nowrap text-center " height="" width="">Product/Solution</th>
                                            <th scope="col" class="text-nowrap text-center " height="" width="">Brand</th>
                                            <th scope="col" class="text-nowrap text-center " height="" width="">Remark</th>
                                            <th scope="col" class="text-nowrap text-center " height="" width="">UpdateStatus</th>
                                            <th scope="col" class="text-nowrap text-center " height="" width="">Quarter</th>
                                            <th scope="col" class="text-nowrap text-center " height="" width="">status</th>
                                            <th scope="col" class="text-nowrap text-center " height="" width="">Customer</th>
                                            <th scope="col" class="text-nowrap text-center " height="" width="">Contact Phone</th>
                                            <th scope="col" class="text-nowrap text-center " height="" width="">Contact Email</th>
                                            <th scope="col" class="text-nowrap text-center " height="" width="">Company</th>
                                            <th scope="col" class="text-nowrap text-center " height="" width="">Address</th>
                                            <th scope="col" class="text-nowrap text-center " height="" width="">Createdate</th>
                                            <th scope="col" class="text-nowrap text-center " height="" width="">Creater</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <?php } ?>

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
    $("#myTable tr").highlight();
    </script>
    <!-- highlight -->




    <!----------------------------- start Modal Add user ------------------------------->
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
                    <form action="project_add.php" method="POST" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="fullname">Full Name<span class="text-danger">*</span></label>
                                <input type="text" name="fullname" class="form-control" id="fullname" placeholder=""
                                    required>
                            </div>
                            <!-- /.form-group -->

                            <div class="form-group">
                                <label for="project_name">Position<span class="text-danger">*</span></label>
                                <input type="text" name="project_name" class="form-control" id="project_name"
                                    placeholder="" required>
                            </div>
                            <!-- /.form-group -->

                            <div class="form-group">
                                <label>Team<span class="text-danger">*</span></label>
                                <select class="form-control select2" name="project_product" required
                                    style="width: 100%;">
                                    <option selected="selected">Select</option>
                                    <option>Innovation</option>
                                    <option>Infrastructure</option>
                                    <option>Projecting</option>
                                    <option>Stock</option>
                                    <option>Service Solution</option>
                                    <option>Service bank</option>
                                </select>

                                <input type="hidden" name="user_crt" value="<?php echo $date; ?> <?php echo $time; ?>"
                                    class="form-control datetimepicker-input" data-target="#reservationdate" />
                                <input type="hidden" name="user_staff" class="form-control"
                                    value="<?php echo ($_SESSION['fullname']);?>" placeholder="">

                            </div>
                            <!-- /.form-group -->

                            <div class="form-group">
                                <label>Role<span class="text-danger">*</span></label>
                                <select class="form-control select2" name="project_status" required
                                    style="width: 100%;">
                                    <option selected="selected">Select</option>
                                    <option>Administrator</option>
                                    <option>Engineer</option>
                                    <option>Viewer</option>
                                </select>
                            </div>
                            <!-- /.form-group -->

                            <div class="form-group">
                                <label for="exampleInputEmail1">Phone Number</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                    </div>
                                    <input type="text" class="form-control" name="tel" id="tel"
                                        data-inputmask='"mask": "(999) 999-9999"' data-mask required>
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
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Email"
                                        required>
                                </div>
                            </div>
                            <!-- /.form-group -->

                            <div class="form-group">
                                <label for="exampleInputEmail1">Username</label>
                                <input type="text" name="username" class="form-control" id="exampleInputEmail1"
                                    placeholder="">
                            </div>
                            <!-- /.form-group -->

                            <div class="form-group">
                                <label for="exampleInputEmail1">Password</label>
                                <input type="password" name="password" class="form-control" id="exampleInputEmail1"
                                    placeholder="">
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