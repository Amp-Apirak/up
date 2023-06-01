<!DOCTYPE html>
<html lang="en">
<?php $menu = "index"; ?>

<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<link rel="stylesheet" href="../ino/code/plugins/fontawesome-free/css/all.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="../ino/code/dist/css/adminlte.min.css">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>INO | Dashboard</title>


    <!----------------------------- start header ------------------------------->
    <?php include ("../ino/templated/head.php");?>
    <!----------------------------- end header --------------------------------->

    <!----------------------------- start menu ------------------------------->
    <?php include ("../ino/templated/menu.php");?>
    <!----------------------------- end menu --------------------------------->


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard </li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!----------------------------------- Search ---------------------------->
        <?php
            $tb_project_year = "";
            $_sql_project_year = "SELECT DISTINCT project_year FROM tb_project ";
            $query_project_year = mysqli_query($conn, $_sql_project_year);
            
            $_sql = "SELECT * FROM tb_project WHERE project_team = 'Innovation' ";

            $_where = "";
            if (isset($_POST['search'])) {
                $tb_project_year = $_POST['project_year'];

                
                $_where = $_where . " AND project_team = 'Innovation' ";
                     

                if ($tb_project_year != "") {
                    if (empty($_where)) {
                        $_where = $_where . " AND project_year = '$tb_project_year' ";
                    } else {
                        $_where = $_where . " AND project_year = '$tb_project_year'";
                    }
                }               
            }
            $_sql = $_sql . $_where . "" . " ' ORDER BY project_id DESC ";
            $query_search = mysqli_query($conn, $_sql);

            
        ?>


        <div class="card-body">
            <form action="index.php" method="POST">
                <div class="row">
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label>เลือกปี</label>
                            <select class="custom-select select2" name="project_year">
                                <option value="">เลือก</option>
                                <?php while ($r = mysqli_fetch_array($query_project_year)) { ?>
                                <option value="<?php echo $r["project_year"]; ?>"
                                    <?php if ($r['project_year'] == $tb_project_year) : ?> selected="selected"
                                    <?php endif; ?>>
                                    <?php echo $r["project_year"]; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary" id="search" name="search">ค้นหา</button>
                    </div>
                </div>
            </form>
        </div>
        <!----------------------------------- Search ---------------------------->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <!-- Qeury All Ticket -->
                            <?php 
                                $query = "SELECT DISTINCT project_line FROM tb_project  WHERE project_team = 'Innovation' ";
                                $query3 = $query . $_where . "" . "  ORDER BY project_id DESC ";
                                $result = mysqli_query($conn, $query3);
                                $row = mysqli_num_rows($result);                                 
                             ?>

                            <div class="inner">
                                <h3><?php  echo $row; ?></h3>

                                <p>Line Product</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-cog"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->

                    <!-- ------------------------------------------------------------------------------------------------------------------ -->

                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <!-- Qeury Count All Knowledge -->
                            <?php 
                                
                                $query = "SELECT DISTINCT project_cate FROM tb_project WHERE project_team = 'Innovation' ";
                                $query2 = $query . $_where . "" . " ORDER BY project_id DESC ";
                                $result = mysqli_query($conn, $query2);
                                $row_ = mysqli_num_rows($result);                                  
                             ?>

                            <div class="inner">
                                <h3><?php  echo $row_; ?></h3>

                                <p>Product</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->

                    <!-- ------------------------------------------------------------------------------------------------------------------ -->

                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">

                            <!-- Qeury Count All Service -->
                            <?php 
                                $query = "SELECT DISTINCT project_name FROM tb_project WHERE project_team = 'Innovation' ";
                                $query1 = $query . $_where . "" . " ORDER BY project_id DESC ";
                                $result = mysqli_query($conn, $query1);
                                $rs = mysqli_num_rows($result); 
                                
                             ?>

                            <div class="inner">
                                <h3><?php  echo $rs; ?></h3>

                                <p>Project</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->

                    <!-- ------------------------------------------------------------------------------------------------------------------ -->

                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">

                            <!-- Qeury Count All Service -->
                            <?php 
                                $query = "SELECT SUM(`project_cost`) as AMP FROM tb_project WHERE project_team = 'Innovation' ";
                                $query1 = $query . $_where . "" . " ORDER BY project_id DESC ";
                                $result = mysqli_query($conn, $query1);
                                $ls = mysqli_fetch_array($result); 
                                $a = $ls['AMP'];                                 
                             ?>

                            <div class="inner">
                                <h3><?php echo number_format( $a, 0 ) ; ?></h3>

                                <p>Summary Price</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                </div>

                <!-- ------------------------------------------------------------------------------------------------------------------ -->


                <!-- Main content -->
                <section class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <!-- AREA CHART -->
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">Line Product</h3>

                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="chart">
                                            <canvas id="areaChart"
                                                style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->

                                <!-- DONUT CHART -->
                                <div class="card card-danger">
                                    <div class="card-header">
                                        <h3 class="card-title">Price Value</h3>

                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <canvas id="donutChart"
                                            style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->

                            </div>
                            <!-- /.col (LEFT) -->
                            <div class="col-md-6">
                                <!-- LINE CHART -->
                                <div class="card card-info">
                                    <div class="card-header">
                                        <h3 class="card-title">Project Status</h3>

                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="chart">
                                            <canvas id="lineChart"
                                                style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->

                                <!-- BAR CHART -->
                                <div class="card card-success">
                                    <div class="card-header">
                                        <h3 class="card-title">Zone Project</h3>

                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="chart">
                                            <canvas id="barChart"
                                                style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->


                            </div>
                            <!-- /.col (RIGHT) -->
                        </div>
                        <!-- /.row -->
                    </div><!-- /.container-fluid -->
                </section>
                <!-- /.content -->

            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->

    </div>

    <!-- jQuery -->
    <script src="../ino/code/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../ino/code/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="../ino/code/plugins/chart.js/Chart.min.js"></script>
    <!-- AdminLTE App -->

    <script>
    $(function() {
        /* ChartJS
         * -------
         * Here we will create a few charts using ChartJS
         */

        //--------------------------------------------------------------------------------------------------------------------
        //- Project Status -
        //--------------------------------------------------------------------------------------------------------------------

        <?php 
            $query ="SELECT `project_line`, COUNT(*) AS totalStatus
            FROM tb_project WHERE `project_team` = 'Innovation'";
            $query1 = $query . $_where . "" . " GROUP BY project_line ORDER BY project_line ";
           
            $result = mysqli_query($conn, $query1);
            $label = array();
            $data = array();
            foreach($result as $key => $value){
                $label[] = $value['project_line'];
                $data[] = $value['totalStatus'];
            }
        ?>

        // Get context with jQuery - using jQuery's .get() method.
        var areaChartCanvas = $('#areaChart').get(0).getContext('2d')
        var areaData = {
            labels: <?php echo json_encode($label)?>,
            datasets: [{
                data: <?php echo json_encode($data)?>,
                backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
            }]
        }
        var areaOptions = {
            maintainAspectRatio: false,
            responsive: true,
        }
        //Create pie or douhnut chart
        // You can switch between pie and douhnut using the method below.
        new Chart(areaChartCanvas, {
            type: 'doughnut',
            data: areaData,
            options: areaOptions
        })

        //--------------------------------------------------------------------------------------------------------------------
        //- Line Product -
        //--------------------------------------------------------------------------------------------------------------------

        <?php 
            $query ="SELECT `project_status`, COUNT(*) AS totalStatus
            FROM tb_project WHERE `project_team` = 'Innovation'";
            $query1 = $query . $_where . "" . " GROUP BY project_status ORDER BY project_status ";
           
            $result = mysqli_query($conn, $query1);
            $label = array();
            $data = array();
            foreach($result as $key => $value){
                $label[] = $value['project_status'];
                $data[] = $value['totalStatus'];
            }
        ?>

        // Get context with jQuery - using jQuery's .get() method.
        var ampChartCanvas = $('#lineChart').get(0).getContext('2d')
        var ampData = {
            labels: <?php echo json_encode($label)?>,
            datasets: [{
                data: <?php echo json_encode($data)?>,
                backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
            }]
        }
        var ampOptions = {
            maintainAspectRatio: false,
            responsive: true,
        }
        //Create pie or douhnut chart
        // You can switch between pie and douhnut using the method below.
        new Chart(ampChartCanvas, {
            type: 'doughnut',
            data: ampData,
            options: ampOptions
        })


        //--------------------------------------------------------------------------------------------------------------------
        //- Price Value -
        //--------------------------------------------------------------------------------------------------------------------

        <?php 
            $query ="SELECT `project_status`, SUM(project_cost) AS totalStatus FROM tb_project WHERE `project_team` = 'Innovation' ";
            $query1 = $query . $_where . "" . " GROUP BY project_status;  ";

            $result = mysqli_query($conn, $query1);
            $label = array();
            $data = array();
            foreach($result as $key => $value){
                $label[] = $value['project_status'];
                $data[] = $value['totalStatus'];
            }
        ?>

        //-------------
        //- DONUT CHART -
        //-------------
        // Get context with jQuery - using jQuery's .get() method.
        var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
        var donutData = {
            labels: <?php echo json_encode($label)?>,
            datasets: [{
                data: <?php echo json_encode($data)?>,
                backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
            }]
        }
        var donutOptions = {
            maintainAspectRatio: false,
            responsive: true,
            legend: {
                display: false
            },
            scales: {
                xAxes: [{
                    gridLines: {
                        display: false,
                    }
                }],
                yAxes: [{
                    gridLines: {
                        display: false,
                    }
                }]
            }
        }
        //Create pie or douhnut chart
        // You can switch between pie and douhnut using the method below.
        new Chart(donutChartCanvas, {
            type: 'line',
            data: donutData,
            options: donutOptions
        })



        //--------------------------------------------------------------------------------------------------------------------
        //- Zone Project -
        //--------------------------------------------------------------------------------------------------------------------

        <?php 
            $query ="SELECT `project_sub`, COUNT(*) AS totalStatus FROM tb_project WHERE `project_team` = 'Innovation' ";
            $query1 = $query . $_where . "" . " GROUP BY project_sub ";
            
            $result = mysqli_query($conn, $query1);
            $label = array();
            $data = array();
            foreach($result as $key => $value){
                $label[] = $value['project_sub'];
                $data[] = $value['totalStatus'];
            }
        ?>

        //-------------
        //- DONUT CHART -
        //-------------
        // Get context with jQuery - using jQuery's .get() method.
        var amppChartCanvas = $('#barChart').get(0).getContext('2d')
        var amppData = {
            labels: <?php echo json_encode($label)?>,
            datasets: [{
                data: <?php echo json_encode($data)?>,
                backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
            }]
        }
        var amppOptions = {
            maintainAspectRatio: false,
            responsive: true,
            legend: {
                display: false
            },
            scales: {
                xAxes: [{
                    gridLines: {
                        display: false,
                    }
                }],
                yAxes: [{
                    gridLines: {
                        display: false,
                    }
                }]
            }
        }
        //Create pie or douhnut chart
        // You can switch between pie and douhnut using the method below.
        new Chart(amppChartCanvas, {
            type: 'bar',
            data: amppData,
            options: amppOptions
        })





    })
    </script>




    <!----------------------------- start menu ------------------------------->
    <?php include ("../ino/templated/footer.php");?>
    <!----------------------------- end menu --------------------------------->