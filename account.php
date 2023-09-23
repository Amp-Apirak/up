<!DOCTYPE html>
<html lang="en">
<?php $menu = "account"; ?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>INO | Account</title>

    <!-- highlight -->
    <style>
    .highlight {
        background-color: #FFFF88;
    }
    </style>
    <!-- highlight -->



    <!----------------------------- start header ------------------------------->
    <?php include("../ino/templated/head.php"); ?>
    <!----------------------------- end header --------------------------------->

    <!----------------------------- start menu ------------------------------->
    <?php include("../ino/templated/menu.php"); ?>
    <!----------------------------- end menu --------------------------------->

    <?php
    /* การลบข้อมูล */
    if (isset($_GET['id'])) {

        $result = $conn->query("DELETE FROM user WHERE id=" . $_GET['id']);

        if ($result) {
            // <!-- sweetalert -->
            echo '<script>
                        setTimeout(function(){
                            swal({
                                title: "Successfully!",
                                text: "Delect Infomation Complatrd.",
                                type:"success"
                            }, function(){
                                window.location = "account.php";
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
                                window.location = "account.php";
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
                        $position = "";
                        $team = "";
                        $role = "";

                        $search_backup = "";
                        $position_backup = "";
                        $team_backup = "";
                        $role_backup = "";

                        $_sql_position = "SELECT DISTINCT position FROM user";
                        $_sql_team = "SELECT DISTINCT team FROM user";
                        $_sql_role = "SELECT DISTINCT role  FROM user";

                        $query_position = mysqli_query($conn, $_sql_position);
                        $query_team = mysqli_query($conn, $_sql_team);
                        $query_role = mysqli_query($conn, $_sql_role);

                        $_sql = "SELECT * FROM user";
                        $_where = "";

                        if (isset($_POST['search'])) {

                            $search = $_POST['searchservice'];
                            $position = $_POST['position'];
                            $team = $_POST['team'];
                            $role = $_POST['role'];

                            $search_backup = $_POST['search_backup'];
                            $position_backup = $_POST['position_backup'];
                            $team_backup = $_POST['team_backup'];
                            $role_backup = $_POST['role_backup'];

                            // print_r($_sqlCount);

                            if ($search != $search_backup || $position != $position_backup || $team != $team_backup || $role  != $role_backup)

                                if (!empty($search)) {
                                    $_where = $_where . " WHERE username LIKE '%$search%' OR fullname LIKE '%$search%' OR email LIKE '%$search%' 
                                                OR tel LIKE '%$search%' OR user_staff LIKE '%$search%' OR role LIKE '%$search%' OR team LIKE '%$search%' OR position LIKE '%$search%'";
                                }
                            if ($position != "") {
                                if (empty($_where)) {
                                    $_where = $_where . " WHERE position = '$position' ";
                                } else {
                                    $_where = $_where . " AND position = '$position'";
                                }
                            }
                            if ($team != "") {
                                if (empty($_where)) {
                                    $_where = $_where . " WHERE team = '$team' ";
                                } else {
                                    $_where = $_where . " AND team = '$team'";
                                }
                            }
                            if ($role != "") {
                                if (empty($_where)) {
                                    $_where = $_where . " WHERE role = '$role' ";
                                } else {
                                    $_where = $_where . " AND  role = '$role'";
                                }
                            }
                        }


                        $query_search = mysqli_query($conn, $_sql . $_where);
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
                                            <form action="account.php" method="POST">
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <div class="form-group ">
                                                            <input type="text" class="form-control " id="searchservice" name="searchservice" value="<?php echo $search; ?>" placeholder="ค้นหา...">
                                                            <input type="hidden" class="form-control " id="search_backup" name="search_backup" value="<?php echo $search; ?>">
                                                            <input type="hidden" class="form-control " id="position_backup" name="position_backup" value="<?php echo $position; ?>">
                                                            <input type="hidden" class="form-control " id="team_backup" name="team_backup" value="<?php echo $team; ?>">
                                                            <input type="hidden" class="form-control " id="role_backup" name="role_backup" value="<?php echo $role; ?>">
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
                                                            <select class="custom-select select2" name="position">
                                                                <option value="">Select</option>
                                                                <?php while ($r = mysqli_fetch_array($query_position)) { ?>
                                                                    <option value="<?php echo $r["position"]; ?>" <?php if ($r['position'] == $position) : ?> selected="selected" <?php endif; ?>>
                                                                        <?php echo $r["position"]; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="form-group">
                                                            <label>Team</label>
                                                            <select class="custom-select select2" name="team">
                                                                <option value="">Select</option>
                                                                <?php while ($rg = mysqli_fetch_array($query_team)) { ?>
                                                                    <option value="<?php echo $rg["team"]; ?>" <?php if ($rg['team'] == $team) : ?> selected="selected" <?php endif; ?>>
                                                                        <?php echo $rg["team"]; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="form-group">
                                                            <label>Role</label>
                                                            <select class="custom-select select2" name="role">
                                                                <option value="">Select</option>
                                                                <?php while ($re = mysqli_fetch_array($query_role)) { ?>
                                                                    <option value="<?php echo $re["role"]; ?>" <?php if ($re['role'] == $role) : ?> selected="selected" <?php endif; ?>>
                                                                        <?php echo $re["role"]; ?></option>
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
                            <a href="account_add.php" class="btn btn-success btn-sm float-right" data-toggle="modal" data-target="#editbtn"> Add <i class=""></i></a>
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
                                            <th scope="col" class="text-nowrap text-center " height="" width="">Username </th>
                                            <th scope="col" class="text-nowrap text-center " height="" width="">Full Name</th>
                                            <th scope="col" class="text-nowrap text-center " height="" width="">Team</th>
                                            <th scope="col" class="text-nowrap text-center " height="" width="">Position </th>
                                            <th scope="col" class="text-nowrap text-center " height="" width="">Role </th>
                                            <th scope="col" class="text-nowrap text-center " height="" width="">Phone </th>
                                            <th scope="col" class="text-nowrap text-center " height="" width="">Email </th>
                                            <th scope="col" class="text-nowrap text-center " height="" width="">Create Date</th>
                                            <th scope="col" class="text-nowrap text-center " height="" width="">Creater </th>
                                            <th scope="col" class="text-nowrap text-center " height="" width="">Action
                                            </th>
                                        </tr>
                                    </thead>

                                    <tbody id="myTable">
                                        <?php while ($res_search = mysqli_fetch_array($query_search)) { ?>
                                            <tr >
                                                <td scope="col" class="text-nowrap  " height="" width=""><?php echo $res_search["username"]; ?></td>
                                                <td scope="col" class="text-nowrap  " height="" width=""><?php echo $res_search["fullname"]; ?></td>
                                                <td scope="col" class="text-nowrap  " height="" width=""><?php echo $res_search["team"]; ?></td>
                                                <td scope="col" class="text-nowrap  " height="" width=""><?php echo $res_search["position"]; ?></td>
                                                <td scope="col" class="text-nowrap  " height="" width=""><?php echo $res_search["role"]; ?></td>
                                                <td scope="col" class="text-nowrap  " height="" width=""><?php echo $res_search["tel"]; ?></td>
                                                <td scope="col" class="text-nowrap  " height="" width=""><?php echo $res_search["email"]; ?></td>
                                                <td scope="col" class="text-nowrap  " height="" width=""><?php echo $res_search["user_crt"]; ?></td>
                                                <td scope="col" class="text-nowrap  " height="" width=""><?php echo $res_search["user_staff"]; ?></td>
                                                <td>
                                                    <a href="#" class="btn btn-info btn-sm " data-toggle="modal" data-target="#modal-lg<?php echo $res_search["id"]; ?>"> <i class="fas fa-pencil-alt"></i></a>


                                                    <!----------------------------- start Modal Edit user ------------------------------->
                                                    <div class="modal fade" id="modal-lg<?php echo $res_search["id"]; ?>">
                                                        <div class="modal-dialog modal-lg">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title">Add User</h4>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form action="account_edit.php" method="POST" enctype="multipart/form-data">
                                                                        <div class="card-body">
                                                                            <div class="form-group">
                                                                                <label for="fullname">Full Name<span class="text-danger">*</span></label>
                                                                                <input type="text" name="fullname" class="form-control" id="fullname" placeholder="" value="<?php echo $res_search["fullname"]; ?>" required>
                                                                            </div>
                                                                            <!-- /.form-group -->

                                                                            <div class="form-group">
                                                                                <label for="position">Position<span class="text-danger">*</span></label>
                                                                                <input type="text" name="position" class="form-control" id="position" placeholder="" value="<?php echo $res_search["position"]; ?>" required>
                                                                            </div>
                                                                            <!-- /.form-group -->

                                                                            <div class="form-group">
                                                                                <label>Team<span class="text-danger">*</span></label>
                                                                                <select class="form-control select2" name="team" value="<?php echo $res_search["team"]; ?>" required style="width: 100%;">
                                                                                    <option selected="selected"><?php echo $res_search["team"]; ?></option>
                                                                                    <option>Innovation</option>
                                                                                    <option>Infrastructure</option>
                                                                                    <option>Accounting</option>
                                                                                    <option>Stock</option>
                                                                                    <option>Service Solution</option>
                                                                                    <option>Service bank</option>
                                                                                </select>

                                                                                <input type="hidden" name="user_crt" value="<?php echo $date; ?> <?php echo $time; ?>" class="form-control datetimepicker-input" data-target="#reservationdate" />
                                                                                <input type="hidden" name="user_staff" class="form-control" value="<?php echo ($_SESSION['fullname']); ?>" placeholder="">
                                                                                <input type="hidden" name="id" class="form-control" value="<?php echo $res_search["id"]; ?>" placeholder="">

                                                                            </div>
                                                                            <!-- /.form-group -->

                                                                            <div class="form-group">
                                                                                <label>Role<span class="text-danger">*</span></label>
                                                                                <select class="form-control select2" name="role" value="<?php echo $res_search["role"]; ?>" required style="width: 100%;">
                                                                                    <option selected="selected"><?php echo $res_search["role"]; ?></option>
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
                                                                                    <input type="text" class="form-control" name="tel" id="tel" value="<?php echo $res_search["tel"]; ?>" data-inputmask='"mask": "(999) 999-9999"' data-mask required>
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
                                                                                    <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $res_search["email"]; ?>" required>
                                                                                </div>
                                                                            </div>
                                                                            <!-- /.form-group -->

                                                                            <div class="form-group">
                                                                                <label for="exampleInputEmail1">Username</label>
                                                                                <input type="text" name="username" class="form-control" id="exampleInputEmail1" value="<?php echo $res_search["username"]; ?>" placeholder="">
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


                                                    <a href="account.php?id=<?php echo $res_search["id"]; ?>" class="btn btn-danger btn-sm swalDefaultSuccess"><i class="fas fa-trash"></i></a>



                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>

                                    <tfoot>
                                        <tr>
                                            <th>Username</th>
                                            <th>Full Name</th>
                                            <th>Team</th>
                                            <th>Position</th>
                                            <th>Role</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                            <th>Create Date</th>
                                            <th>Creater</th>
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
                    <form action="account_add.php" method="POST" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="fullname">Full Name<span class="text-danger">*</span></label>
                                <input type="text" name="fullname" class="form-control" id="fullname" placeholder="" required>
                            </div>
                            <!-- /.form-group -->

                            <div class="form-group">
                                <label for="position">Position<span class="text-danger">*</span></label>
                                <input type="text" name="position" class="form-control" id="position" placeholder="" required>
                            </div>
                            <!-- /.form-group -->

                            <div class="form-group">
                                <label>Team<span class="text-danger">*</span></label>
                                <select class="form-control select2" name="team" required style="width: 100%;">
                                    <option selected="selected">Select</option>
                                    <option>Innovation</option>
                                    <option>Infrastructure</option>
                                    <option>Accounting</option>
                                    <option>Stock</option>
                                    <option>Service Solution</option>
                                    <option>Service bank</option>
                                </select>

                                <input type="hidden" name="user_crt" value="<?php echo $date; ?> <?php echo $time; ?>" class="form-control datetimepicker-input" data-target="#reservationdate" />
                                <input type="hidden" name="user_staff" class="form-control" value="<?php echo ($_SESSION['fullname']); ?>" placeholder="">

                            </div>
                            <!-- /.form-group -->

                            <div class="form-group">
                                <label>Role<span class="text-danger">*</span></label>
                                <select class="form-control select2" name="role" required style="width: 100%;">
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
                                    <input type="text" class="form-control" name="tel" id="tel" data-inputmask='"mask": "(999) 999-9999"' data-mask required>
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
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
                                </div>
                            </div>
                            <!-- /.form-group -->

                            <div class="form-group">
                                <label for="exampleInputEmail1">Username</label>
                                <input type="text" name="username" class="form-control" id="exampleInputEmail1" placeholder="">
                            </div>
                            <!-- /.form-group -->

                            <div class="form-group">
                                <label for="exampleInputEmail1">Password</label>
                                <input type="password" name="password" class="form-control" id="exampleInputEmail1" placeholder="">
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