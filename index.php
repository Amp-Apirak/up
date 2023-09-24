<!DOCTYPE html>
<html lang="en">
<?php $menu = "index"; ?>

<head>
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>

    <script>
    //Zoom Images
    $(function(){

    $('.imgx').hover(function(){
    var w = 600;
    var h = 660;
    var d = 600;//duration
    var imgx = $(this);
    $('.imgy').remove();
    var imgy = $('<img class="imgy" src="'+$(this).attr('src')+'"/>').appendTo('body');
    imgy.css({
    position: 'absolute',
    left: imgx.offset().left,
    top: imgx.offset().top,
    width: imgx.width(),
    height: imgx.height()
        }).mouseout(function(){
            $('.imgy').remove();
        }).click(function(){
            $('.imgy').remove();
        });
    imgy.animate({
    left: imgx.offset().left - (w/2),
    top: imgx.offset().top - (h/2),
    width: w+'px',
    height: h+'px'
    },d);
    },function(){});
    });
    //]]>
    </script>


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Uplevel | Work Task</title>

    <!-- highlight -->
    <style>
    .highlight {
        background-color: #FFFF88;
    }
    </style>
    <!-- highlight -->

    <!----------------------------- start header ------------------------------->
    <?php include ("../up/templated/head.php");?>
    <!----------------------------- end header --------------------------------->

    <!----------------------------- start menu ------------------------------->
    <?php include ("../up/templated/menu.php");?>
    <!----------------------------- end menu --------------------------------->


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Work Task Management</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active">Work Task Management</li>
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
                                    $status = "";
                                    $requester = "";
                                    $work_type = "";
                                    $service_cate = "";
                                    $service_type = "";
                                    $service_sup = "";

                                    $search_backup = "";
                                    $status_backup = "";
                                    $requester_backup = "";
                                    $work_type_backup = "";
                                    $service_cate_backup = "";
                                    $service_type_backup = "";
                                    $service_sup_backup = "";
                        
                                    $_sql_status = "SELECT DISTINCT status FROM work INNER JOIN category On (work.service_id = category.service_id)";
                                    $_sql_requester = "SELECT DISTINCT requester FROM work INNER JOIN category On (work.service_id = category.service_id)";
                                    $_sql_work_type = "SELECT DISTINCT work_type  FROM work INNER JOIN category On (work.service_id = category.service_id)";
                                    $_sql_service_cate = "SELECT DISTINCT service_cate  FROM category ";
                                    $_sql_service_type = "SELECT DISTINCT service_type  FROM category ";
                                    $_sql_service_sup = "SELECT DISTINCT service_sup   FROM category ";


                                    $query_status = mysqli_query($conn, $_sql_status);
                                    $query_requester = mysqli_query($conn, $_sql_requester);
                                    $query_work_type = mysqli_query($conn, $_sql_work_type);
                                    $query_service_cate = mysqli_query($conn, $_sql_service_cate);
                                    $query_service_type = mysqli_query($conn, $_sql_service_type);
                                    $query_service_sup = mysqli_query($conn, $_sql_service_sup);

                                    //print_r($query_status);

                                    $_sql = "SELECT * FROM work INNER JOIN category On (work.service_id = category.service_id)";
                                    $_where = "";

                                        if (isset($_POST['search'])) {

                                            $search = $_POST['searchservice'];
                                            $status = $_POST['status'];
                                            $requester = $_POST['requester'];
                                            $work_type = $_POST['work_type'];
                                            $service_cate = $_POST['service_cate'];
                                            $service_type = $_POST['service_type'];
                                            $service_sup = $_POST['service_sup'];

                                            $search_backup = $_POST['search_backup'];
                                            $status_backup = $_POST['status_backup'];
                                            $requester_backup = $_POST['requester_backup'];
                                            $work_type_backup = $_POST['work_type_backup'];
                                            $service_cate_backup = $_POST['service_cate_backup'];
                                            $service_type_backup = $_POST['service_type_backup'];
                                            $service_sup_backup = $_POST['service_sup_backup'];

                                        //print_r($_sqlCount);

                                            if ($search != $search_backup || $status != $status_backup || $requester != $requester_backup || $work_type  != $work_type_backup 
                                            || $service_cate  != $service_cate_backup || $service_type  != $service_type_backup || $service_sup  != $service_sup_backup )
                                        
                                            if (!empty($search)) {
                                                $_where = $_where . " WHERE service_cate LIKE '%$search%' OR service_type LIKE '%$search%' OR service_sup LIKE '%$search%' OR upfile LIKE '%$search%' OR work_type LIKE '%$search%' OR subject LIKE '%$search%' OR status LIKE '%$search%' OR detail LIKE '%$search%' 
                                                OR result LIKE '%$search%' OR requester LIKE '%$search%' OR staff_crt LIKE '%$search%' OR staff_edit LIKE '%$search%' ";
                                            }
                                            if ($status != "") {
                                                if (empty($_where)) {
                                                    $_where = $_where . " WHERE status = '$status' ";
                                                } else {
                                                    $_where = $_where . " AND status = '$status'";
                                                }
                                            }
                                            if ($requester != "") {
                                                if (empty($_where)) {
                                                    $_where = $_where . " WHERE requester = '$requester' ";
                                                } else {
                                                    $_where = $_where . " AND requester = '$requester'";
                                                }
                                            }
                                            if ($work_type != "") {
                                                if (empty($_where)) {
                                                    $_where = $_where . " WHERE work_type = '$work_type' ";
                                                } else {
                                                    $_where = $_where . " AND  work_type = '$work_type'"; 
                                                }
                                            }
                                            if ($service_cate != "") {
                                                if (empty($_where)) {
                                                    $_where = $_where . " WHERE service_cate = '$service_cate' ";
                                                } else {
                                                    $_where = $_where . " AND  service_cate = '$service_cate'"; 
                                                }
                                            }
                                            if ($service_type != "") {
                                                if (empty($_where)) {
                                                    $_where = $_where . " WHERE service_type = '$service_type' ";
                                                } else {
                                                    $_where = $_where . " AND  service_type = '$service_type'"; 
                                                }
                                            }
                                            if ($service_sup != "") {
                                                if (empty($_where)) {
                                                    $_where = $_where . " WHERE service_sup = '$service_sup' ";
                                                } else {
                                                    $_where = $_where . " AND  service_sup = '$service_sup'"; 
                                                }
                                            }

                                        }
                                        
                                    $_sql = $_sql . $_where . "" . " ORDER BY work.work_id desc ";
                                    $query_search = mysqli_query($conn, $_sql ); 

                                // print_r($query_search);
                                // print_r($_sql);
                                // print_r($_where);
                                ?>


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
                                                                $query2 = "SELECT DISTINCT COUNT(`work_id`) as AMP FROM work INNER JOIN category On (work.service_id = category.service_id)";
                                                                $query1 = $query2 . $_where . "" . " ORDER BY work.work_id DESC ";
                                                                $result = mysqli_query($conn, $query1);
                                                                $rs = mysqli_fetch_array($result);
                                                                $a = $rs['AMP'];
                                                        ?>

                                            <div class="inner">
                                                <h3><?php echo number_format( $a, 0 ) ; ?></h3>

                                                <p>Task All</p>
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
                                                                $query2 = "SELECT DISTINCT COUNT(`work_id`) as AMP FROM work INNER JOIN category On (work.service_id = category.service_id) WHERE `status` = 'On Process'";
                                                                $query1 = $query2 . $_where . "" . " ORDER BY work.work_id DESC ";
                                                                $result = mysqli_query($conn, $query1);
                                                                $rs = mysqli_fetch_array($result);
                                                                $a = $rs['AMP'];
                                                        ?>

                                            <div class="inner">
                                                <h3><?php echo number_format( $a, 0 ) ; ?></h3>

                                                <p>On Process</p>
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
                                                                $query2 = "SELECT DISTINCT COUNT(`work_id`) as AMP FROM work INNER JOIN category On (work.service_id = category.service_id) WHERE `status` = 'Done'";
                                                                $query1 = $query2 . $_where . "" . " ORDER BY work.work_id DESC";
                                                                $result = mysqli_query($conn, $query1);
                                                                $rs = mysqli_fetch_array($result);
                                                                $a = $rs['AMP'];
                                                        ?>

                                            <div class="inner">
                                                <h3><?php echo number_format( $a, 0 ) ; ?></h3>

                                                <p>Done</p>
                                            </div>
                                            <div class="icon">
                                                <i class="ion ion-person-add"></i>
                                            </div>
                                            <a href="#" class="small-box-footer"></i></a>
                                        </div>
                                    </div>
                                    <!-- ./col -->

                                    <!-- ------------------------------------------------------------------------------------------------------------------ -->
                                </div>

                                <!-- ------------------------------------------------------------------------------------------------------------------ -->
                            </div><!-- /.container-fluid -->
                        </section>
                        <!-- /.content -->


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
                                            <form action="index.php" method="POST">
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <div class="form-group ">
                                                            <input type="text" class="form-control " id="searchservice" name="searchservice" value="<?php echo $search; ?>" placeholder="ค้นหา...">
                                                            <input type="hidden" class="form-control " id="search_backup" name="search_backup" value="<?php echo $search; ?>">
                                                            <input type="hidden" class="form-control " id="status_backup" name="status_backup" value="<?php echo $status; ?>">
                                                            <input type="hidden" class="form-control " id="requester_backup" name="requester_backup" value="<?php echo $requester; ?>">
                                                            <input type="hidden" class="form-control " id="work_type_backup" name="work_type_backup" value="<?php echo $work_type; ?>">
                                                            <input type="hidden" class="form-control " id="service_cate_backup" name="service_cate_backup" value="<?php echo $service_cate; ?>">
                                                            <input type="hidden" class="form-control " id="service_type_backup" name="service_type_backup" value="<?php echo $service_type; ?>">
                                                            <input type="hidden" class="form-control " id="service_sup_backup" name="service_sup_backup" value="<?php echo $service_sup; ?>">
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
                                                            <label>Status</label>
                                                            <select class="custom-select select2" name="status">
                                                                <option value="">Select</option>
                                                                <?php while ($r = mysqli_fetch_array($query_status)) { ?>
                                                                <option value="<?php echo $r["status"]; ?>"
                                                                    <?php if ($r['status'] == $status) : ?>
                                                                    selected="selected" <?php endif; ?>>
                                                                    <?php echo $r["status"]; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="form-group">
                                                            <label>Requester</label>
                                                            <select class="custom-select select2"
                                                                name="requester">
                                                                <option value="">Select</option>
                                                                <?php while ($rg = mysqli_fetch_array($query_requester)) { ?>
                                                                <option value="<?php echo $rg["requester"]; ?>"
                                                                    <?php if ($rg['requester'] == $requester) : ?>
                                                                    selected="selected" <?php endif; ?>>
                                                                    <?php echo $rg["requester"]; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="form-group">
                                                            <label>Type</label>
                                                            <select class="custom-select select2" name="work_type">
                                                                <option value="">Select</option>
                                                                <?php while ($re = mysqli_fetch_array($query_work_type)) { ?>
                                                                <option value="<?php echo $re["work_type"]; ?>"
                                                                    <?php if ($re['work_type'] == $work_type) : ?>
                                                                    selected="selected" <?php endif; ?>>
                                                                    <?php echo $re["work_type"]; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="form-group">
                                                            <label>Service Cate</label>
                                                            <select class="custom-select select2" name="service_cate">
                                                                <option value="">Select</option>
                                                                <?php while ($rd = mysqli_fetch_array($query_service_cate)) { ?>
                                                                <option value="<?php echo $rd["service_cate"]; ?>"
                                                                    <?php if ($rd['service_cate'] == $service_cate) : ?>
                                                                    selected="selected" <?php endif; ?>>
                                                                    <?php echo $rd["service_cate"]; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="form-group">
                                                            <label>Service Type</label>
                                                            <select class="custom-select select2" name="service_type">
                                                                <option value="">Select</option>
                                                                <?php while ($rf = mysqli_fetch_array($query_service_type)) { ?>
                                                                <option value="<?php echo $rf["service_type"]; ?>"
                                                                    <?php if ($rf['service_type'] == $service_type) : ?>
                                                                    selected="selected" <?php endif; ?>>
                                                                    <?php echo $rf["service_type"]; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="form-group">
                                                            <label>Subcategoty</label>
                                                            <select class="custom-select select2" name="service_sup">
                                                                <option value="">Select</option>
                                                                <?php while ($rh = mysqli_fetch_array($query_service_sup)) { ?>
                                                                <option value="<?php echo $rh["service_sup"]; ?>"
                                                                    <?php if ($rh['service_sup'] == $service_sup) : ?>
                                                                    selected="selected" <?php endif; ?>>
                                                                    <?php echo $rh["service_sup"]; ?></option>
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
                            <a href="add.php" class="btn btn-success btn-sm float-right"> Add <i class=""></i></a>
                        </div><br>




                        <div class="card">
                            <div class="card-header">
                                <div class="container-fluid">
                                    <h3 class="card-title">Task Management</h3>
                                </div>
                            </div>

                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="text-nowrap text-center " height="" width="100">Type</th>
                                            <th scope="col" class="text-nowrap text-center " height="" width="100">Service Cate</th>
                                            <th scope="col" class="text-nowrap text-center " height="" width="100">Service Type</th>
                                            <th scope="col" class="text-nowrap text-center " height="" width="100">Subcategoty</th>
                                            <th scope="col" class="text-nowrap text-center " height="" width="100">Status</th>
                                            <th scope="col" class="text-nowrap text-center " height="" width="100">Subject</th>
                                            <th scope="col" class="text-nowrap text-center " height="" width="100">Requester</th>
                                            <th scope="col" class="text-nowrap text-center " height="" width="100">Staff Create</th>
                                            <th scope="col" class="text-nowrap text-center " height="" width="100">Date Create</th>
                                            <th scope="col" class="text-nowrap text-center " height="" width="100">Staff Update</th>
                                            <th scope="col" class="text-nowrap text-center " height="" width="100">Last Update</th>
                                            <th scope="col" class="text-nowrap text-center " height="" width="100">Detail</th>
                                            <th scope="col" class="text-nowrap text-center " height="" width="100">Result</th>
                                            <th scope="col" class="text-nowrap text-center " height="" width="100">Link Image</th>
                                            <th scope="col" class="text-nowrap text-center " height="" width="100">Action</th>
                                        </tr>
                                    </thead>

                                    <tbody id="myTable">
                                        <?php while ($res_search = mysqli_fetch_array($query_search)) { ?>
                                        <tr>
                                        <td scope="col" class="text-nowrap " height="" width="100">
                                        <?php
                                                    if($res_search["work_type"] =='Service'){
                                                        echo "<i class='badge badge-success nav-icon '>{$res_search["work_type"]}</i></a></i>";
                                                    }elseif($res_search["work_type"] =='Incident'){
                                                        echo "<i class='badge badge-danger nav-icon '>{$res_search["work_type"]}</i></a></i>";
                                                    }
                                                ?>
                                        </td>
                                        <td scope="col" class="text-nowrap  " height="" width="100"><?php echo $res_search["service_cate"]; ?></td>
                                        <td scope="col" class="text-nowrap  " height="" width="100"><?php echo $res_search["service_type"]; ?></td>
                                        <td scope="col" class="text-nowrap  " height="" width="100"><?php echo $res_search["service_sup"]; ?></td>
                                         
                                            <td scope="col" class="text-nowrap text-center " height="" width="100">
                                                <?php
                                                    if($res_search["status"] =='Wiating for approve'){
                                                        echo "<span class='badge badge-primary'>{$res_search["status"]}</span>";
                                                    }elseif($res_search["status"] =='On Process'){
                                                        echo "<span class='badge badge-warning'>{$res_search["status"]}</span>";
                                                    }elseif($res_search["status"] =='On-Hold'){
                                                        echo "<span class='badge badge-info'>{$res_search["status"]}</span>";
                                                    }elseif($res_search["status"] =='Done'){
                                                        echo "<span class='badge badge-success'>{$res_search["status"]}</span>";
                                                    }elseif($res_search["status"] =='Loss'){
                                                        echo "<span class='badge badge-danger'>{$res_search["status"]}</span>";
                                                    }
                                                ?>
                                            </td>

                                            <td  scope="col" class="text-nowrap " height="" width="100">
                                                
                                            

                                            <a href="../up/file/<?php echo $res_search["file_upfile"]; ?>" data-lightbox="image-1" data-title="../up/file/<?php echo $res_search["file_upfile"]; ?>  (<?php echo $res_search["file_upfile"]; ?>)" class="img-fluid "   >
                                            <?php echo $res_search["subject"]; ?>
                                            </a>
                                            <img class="imgx"  width="20" height="15" src="../up/file/<?php echo $res_search["file_upfile"]; ?> ">

                                            
                                        
                                            </td> 

                                            <td scope="col" class="text-nowrap text-center " height="" width="100"><?php echo $res_search["requester"]; ?></td>
                                            <td scope="col" class="text-nowrap text-center " height="" width="100"><?php echo $res_search["staff_crt"]; ?></td>
                                            <td scope="col" class="text-nowrap text-center " height="" width="100"><?php echo $res_search["date_crt"]; ?></td>
                                            <td scope="col" class="text-nowrap text-center " height="" width="100"><?php echo $res_search["staff_edit"]; ?></td>
                                            <td scope="col" class="text-nowrap text-center " height="" width="100"><?php echo $res_search["date_edit"]; ?></td>
                                            <td scope="col" class="text-nowrap text-center " height="" width="18000" ><?php echo $res_search["detail"]; ?></td>
                                            <td scope="col" class="text-nowrap text-center " height="" width="100"><?php echo $res_search["result"]; ?></td>
                                            <td scope="col" class="text-nowrap text-center " height="" width="100">http://58.137.58.163/up/<?php echo $res_search["file_upfile"]; ?></td>

                                            <td>
                                                <!-- <a href="copy.php?id=<?php echo $res_search["work_id"]; ?>&id_c=<?php echo $res_search["service_id"]; ?>" class="btn btn-success btn-sm "><i class="fas fa-copy"></i></a> -->
                                                <a href="edit.php?id=<?php echo $res_search["work_id"]; ?>&id_c=<?php echo $res_search["service_id"]; ?>" class="btn btn-info btn-sm " ><i class="fas fa-pencil-alt"></i></a>
                                                <a href="del.php?id=<?php echo $res_search["work_id"]; ?>" class="btn btn-danger btn-sm swalDefaultSuccess"><i class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>

                                    <tfoot>
                                        <tr>
                                            <th scope="col" class="text-nowrap text-center " height="" width="100">Type</th>
                                            <th scope="col" class="text-nowrap text-center " height="" width="100">Service Cate</th>
                                            <th scope="col" class="text-nowrap text-center " height="" width="100">Service Type</th>
                                            <th scope="col" class="text-nowrap text-center " height="" width="100">Subcategoty</th>
                                            <th scope="col" class="text-nowrap text-center " height="" width="100">Status</th>
                                            <th scope="col" class="text-nowrap text-center " height="" width="100">Subject</th>
                                            <th scope="col" class="text-nowrap text-center " height="" width="100">Requester</th>
                                            <th scope="col" class="text-nowrap text-center " height="" width="100">Staff Create</th>
                                            <th scope="col" class="text-nowrap text-center " height="" width="100">Date Create</th>
                                            <th scope="col" class="text-nowrap text-center " height="" width="100">Staff Update</th>
                                            <th scope="col" class="text-nowrap text-center " height="" width="100">Last Update</th>
                                            <th scope="col" class="text-nowrap text-center " height="" width="100">Detail</th>
                                            <th scope="col" class="text-nowrap text-center " height="" width="100">Result</th>
                                            <th scope="col" class="text-nowrap text-center " height="" width="100">Link Image</th>
                                            <th scope="col" class="text-nowrap text-center " height="" width="100">Action</th>
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
    <?php include ("../up/templated/footer.php");?>
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
                    <form action="add.php" method="POST" enctype="multipart/form-data">
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

                                <input type="hidden" name="user_crt" value="<?php echo $date; ?> <?php echo $time; ?>" class="form-control datetimepicker-input" data-target="#reservationdate" />
                                <input type="hidden" name="user_staff" class="form-control" value="<?php echo ($_SESSION['fullname']);?>" placeholder="">

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