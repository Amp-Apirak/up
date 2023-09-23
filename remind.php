<!DOCTYPE html>
<html lang="en">
<?php $menu = "Contact"; ?>

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
                                    $contact_position = "";
                                    $contact_agency = "";
                                    $contact_type = "";

                                    $search_backup = "";
                                    $contact_position_backup = "";
                                    $contact_agency_backup = "";
                                    $contact_type_backup = "";
                        
                                    $_sql_contact_position = "SELECT DISTINCT contact_position FROM contact";
                                    $_sql_contact_agency = "SELECT DISTINCT contact_agency FROM contact";
                                    $_sql_contact_type = "SELECT DISTINCT contact_type  FROM contact";

                                    $query_contact_position = mysqli_query($conn, $_sql_contact_position);
                                    $query_contact_agency = mysqli_query($conn, $_sql_contact_agency);
                                    $query_contact_type = mysqli_query($conn, $_sql_contact_type);

                                    $_sql = "SELECT * FROM contact INNER JOIN project On (project.project_id = contact.project_id)";
                                    $_where = "";

                                        if (isset($_POST['search'])) {

                                            $search = $_POST['searchservice'];
                                            $contact_position = $_POST['contact_position'];
                                            $contact_agency = $_POST['contact_agency'];
                                            $contact_type = $_POST['contact_type'];

                                            $search_backup = $_POST['search_backup'];
                                            $contact_position_backup = $_POST['contact_position_backup'];
                                            $contact_agency_backup = $_POST['contact_agency_backup'];
                                            $contact_type_backup = $_POST['contact_type_backup'];

                                        // print_r($_sqlCount);

                                            if ($search != $search_backup || $contact_position != $contact_position_backup || $contact_agency != $contact_agency_backup || $contact_type  != $contact_type_backup )
                                        
                                            if (!empty($search)) {
                                                $_where = $_where . " WHERE fullname  LIKE '%$search%' OR contact_position LIKE '%$search%' OR contact_agency LIKE '%$search%' 
                                                OR email LIKE '%$search%' OR contact_type LIKE '%$search%' OR company LIKE '%$search%' OR tel LIKE '%$search%' OR username LIKE '%$search%'";
                                            }
                                            if ($contact_position != "") {
                                                if (empty($_where)) {
                                                    $_where = $_where . " WHERE contact_position = '$contact_position' ";
                                                } else {
                                                    $_where = $_where . " AND contact_position = '$contact_position'";
                                                }
                                            }
                                            if ($contact_agency != "") {
                                                if (empty($_where)) {
                                                    $_where = $_where . " WHERE contact_agency = '$contact_agency' ";
                                                } else {
                                                    $_where = $_where . " AND contact_agency = '$contact_agency'";
                                                }
                                            }
                                            if ($contact_type != "") {
                                                if (empty($_where)) {
                                                    $_where = $_where . " WHERE contact_type = '$contact_type' ";
                                                } else {
                                                    $_where = $_where . " AND  contact_type = '$contact_type'"; 
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
                                                            <input type="hidden" class="form-control " id="contact_position_backup" name="contact_position_backup" value="<?php echo $contact_position; ?>">
                                                            <input type="hidden" class="form-control " id="contact_agency_backup" name="contact_agency_backup" value="<?php echo $contact_agency; ?>">
                                                            <input type="hidden" class="form-control " id="contact_type_backup" name="contact_type_backup" value="<?php echo $contact_type; ?>">
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
                                                            <label>Position</label>
                                                            <select class="custom-select select2" name="contact_position">
                                                                <option value="">Select</option>
                                                                <?php while ($r = mysqli_fetch_array($query_contact_position)) { ?>
                                                                <option value="<?php echo $r["contact_position"]; ?>"
                                                                    <?php if ($r['contact_position'] == $contact_position) : ?>
                                                                    selected="selected" <?php endif; ?>>
                                                                    <?php echo $r["contact_position"]; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="form-group">
                                                            <label>Team</label>
                                                            <select class="custom-select select2" name="contact_agency">
                                                                <option value="">Select</option>
                                                                <?php while ($rg = mysqli_fetch_array($query_contact_agency)) { ?>
                                                                <option value="<?php echo $rg["contact_agency"]; ?>"
                                                                    <?php if ($rg['contact_agency'] == $contact_agency) : ?>
                                                                    selected="selected" <?php endif; ?>>
                                                                    <?php echo $rg["contact_agency"]; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="form-group">
                                                            <label>Role</label>
                                                            <select class="custom-select select2" name="contact_type">
                                                                <option value="">Select</option>
                                                                <?php while ($re = mysqli_fetch_array($query_contact_type)) { ?>
                                                                <option value="<?php echo $re["contact_type"]; ?>"
                                                                    <?php if ($re['contact_type'] == $contact_type) : ?>
                                                                    selected="selected" <?php endif; ?>>
                                                                    <?php echo $re["contact_type"]; ?></option>
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
                            <a href="contact_add.php" class="btn btn-success btn-sm float-right" data-toggle="modal"
                                data-target="#editbtn"> Add <i class=""></i></a>
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

                                    <tbody>
                                        <?php while ($res_search = mysqli_fetch_array($query_search)) { ?>
                                        <tr id="myTable">
                                            <td scope="col" class="text-nowrap  " height="" width=""><?php echo $res_search["contact_type"]; ?></td>
                                            <td scope="col" class="text-nowrap  " height="" width=""><?php echo $res_search["contact_fullname"]; ?></td>
                                            <td scope="col" class="text-nowrap  " height="" width=""><?php echo $res_search["contact_position"];?></td>
                                            <td scope="col" class="text-nowrap  " height="" width=""><?php echo $res_search["contact_agency"];?></td>
                                            <td scope="col" class="text-nowrap  " height="" width=""><?php echo $res_search["contact_tel"];?></td>
                                            <td scope="col" class="text-nowrap  " height="" width=""><?php echo $res_search["contact_email"]; ?></td>
                                            <td scope="col" class="text-nowrap  " height="" width=""><?php echo $res_search["contact_email"]; ?></td>
                                            <td scope="col" class="text-nowrap  " height="" width=""><?php echo $res_search["contact_company"]; ?></td>
                                            <td scope="col" class="text-nowrap  " height="" width=""><?php echo $res_search["contact_detail"]; ?></td>
                                            <td scope="col" class="text-nowrap  " height="" width=""><?php echo $res_search["contact_staff"]; ?></td>
                                            <td scope="col" class="text-nowrap  " height="" width=""><?php echo $res_search["contact_crt"]; ?></td>
                                            
                                            <td>
                                                <a href="#" class="btn btn-info btn-sm " data-toggle="modal" data-target="#modal-lg<?php echo $res_search["contact_id"]; ?>"> <i class="fas fa-pencil-alt"></i></a>


                                                        <!----------------------------- start Modal Edit user ------------------------------->
                                                        <div class="modal fade" id="modal-lg<?php echo $res_search["contact_id"]; ?>">
                                                            <div class="modal-dialog modal-lg">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title">Add User</h4>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form action="contact_edit.php" method="POST" enctype="multipart/form-data">
                                                                            <div class="card-body">
                                                                                <div class="form-group">
                                                                                    <label for="fullname">Full Name<span class="text-danger">*</span></label><input type="text" name="fullname" class="form-control" id="fullname" placeholder="" value="<?php echo $res_search["fullname"]; ?>" required>
                                                                                </div>
                                                                                <!-- /.form-group -->

                                                                                <div class="form-group">
                                                                                    <label for="contact_position">Position<span class="text-danger">*</span></label>
                                                                                    <input type="text" name="contact_position" class="form-control" id="contact_position" placeholder="" value="<?php echo $res_search["contact_position"]; ?>"
                                                                                        required>
                                                                                </div>
                                                                                <!-- /.form-group -->

                                                                                <div class="form-group">
                                                                                    <label>Team<span class="text-danger">*</span></label> 
                                                                                    <select class="form-control select2" name="contact_agency" value="<?php echo $res_search["contact_agency"]; ?>" required style="width: 100%;"> 
                                                                                        <option selected="selected"><?php echo $res_search["contact_agency"]; ?></option>
                                                                                        <option>Innovation</option>
                                                                                        <option>Infrastructure</option>
                                                                                        <option>Contacting</option>
                                                                                        <option>Stock</option>
                                                                                        <option>Service Solution</option>
                                                                                        <option>Service bank</option>
                                                                                    </select>

                                                                                    <input type="hidden" name="user_crt" value="<?php echo $date; ?> <?php echo $time; ?>" 
                                                                                        class="form-control datetimepicker-input" data-target="#reservationdate" />
                                                                                    <input type="hidden" name="contact_staff" class="form-control"  value="<?php echo ($_SESSION['fullname']);?>" placeholder="">
                                                                                        <input type="hidden" name="id" class="form-control"value="<?php echo $res_search["contact_id"]; ?>" placeholder="">
                                                                                </div>
                                                                                <!-- /.form-group -->

                                                                                <div class="form-group">
                                                                                    <label>Role<span class="text-danger">*</span></label>
                                                                                    <select class="form-control select2" name="contact_type" value="<?php echo $res_search["contact_type"]; ?>" required style="width: 100%;">
                                                                                        <option selected="selected"><?php echo $res_search["contact_type"]; ?></option>
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
                                                                                        <input type="text" class="form-control" name="tel" id="tel" value="<?php echo $res_search["tel"]; ?>"
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
                                                                                        <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $res_search["email"]; ?>"
                                                                                            required>
                                                                                    </div>
                                                                                </div>
                                                                                <!-- /.form-group -->

                                                                                <div class="form-group">
                                                                                    <label for="exampleInputEmail1">Username</label>
                                                                                    <input type="text" name="username" class="form-control" id="exampleInputEmail1" value="<?php echo $res_search["username"]; ?>"
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
                                                        <!----------------------------- end Modal Edit user --------------------------------->


                                                <a href="contact.php?id=<?php echo $res_search["contact_id"]; ?>" class="btn btn-danger btn-sm swalDefaultSuccess"><i
                                                        class="fas fa-trash"></i></a>



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
                    <form action="contact_add.php" method="POST" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="fullname">Full Name<span class="text-danger">*</span></label>
                                <input type="text" name="fullname" class="form-control" id="fullname" placeholder=""
                                    required>
                            </div>
                            <!-- /.form-group -->

                            <div class="form-group">
                                <label for="contact_position">Position<span class="text-danger">*</span></label>
                                <input type="text" name="contact_position" class="form-control" id="contact_position" placeholder=""
                                    required>
                            </div>
                            <!-- /.form-group -->

                            <div class="form-group">
                                <label>Team<span class="text-danger">*</span></label>
                                <select class="form-control select2" name="contact_agency" required style="width: 100%;">
                                    <option selected="selected">Select</option>
                                    <option>Innovation</option>
                                    <option>Infrastructure</option>
                                    <option>Contacting</option>
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
                                <select class="form-control select2" name="contact_type" required style="width: 100%;">
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

    


