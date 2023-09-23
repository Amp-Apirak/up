<!DOCTYPE html>
<html lang="en">
<?php $menu = "project"; ?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>INO | Open Project</title>


    <!----------------------------- start header ------------------------------->
    <?php include("../ino/templated/head.php"); ?>
    <!----------------------------- end header --------------------------------->

    <!----------------------------- start menu ------------------------------->
    <?php include("../ino/templated/menu.php"); ?>
    <!----------------------------- end menu --------------------------------->

    <!----------------------------- start Time ------------------------------->
    <?php
    date_default_timezone_set('asia/bangkok');
    $date = date('d/m/Y');
    $time = date("H:i:s", "1359780799");
    ?>
    <!----------------------------- start Time ------------------------------->


    
    <?php
        
    if (isset($_POST['submit'])) {
        $test_d = $_POST['test_d'];

        $target_dir = "../ino/file/$test_d/";
        $target_file = $target_dir . basename($_FILES["file_upfile"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // printf($imageFileType);
        
        // Check if $uploadOk is set to 0 by an error
        if ($imageFileType == "") {
            echo "Sorry, your file was not uploaded.";
        }else{

      
        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";

        }
        


        $file_upfile = $_FILES['file_upfile']['name'];
        $file_tmp = $_FILES['file_upfile']['tmp_name'];

        move_uploaded_file($file_tmp, "../ino/file/$test_d/$file_upfile");
    }
}

    ?>



    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Open Project</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active">Open Project</li>
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
                        <div class="row">
                            <!-- /.col (left) -->
                            <div class="col-md-6">
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">Project descriptions</h3>
                                    </div>
                                    <form action="#" method="POST" enctype="multipart/form-data">



                                        <div class="card-body">

                                            <?php
                                            $folder_name = "";
                                            $_sql_folder_name = "SELECT DISTINCT folder_name FROM folder_doc";
                                            $query_folder_name = mysqli_query($conn, $_sql_folder_name);
                                            ?>


                                            <div class="form-group">
                                                <label>Folder <span class="text-danger">*</span></label>
                                                <select class="custom-select select2 " width="" name="test_d" id="test_d">
                                                    <option selected="selected"></option>
                                                    <?php while ($r = mysqli_fetch_array($query_folder_name)) { ?>
                                                        <option value="<?php echo $r["folder_name"]; ?>" <?php if ($r['folder_name'] == $folder_name) : ?> selected="selected" <?php endif; ?>><?php echo $r["folder_name"]; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>

                                            <!-- /.form-group-->
                                            <div class="form-group">
                                                <label for="test_name">File input</label>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="file_upfile" name="file_upfile">
                                                    <label class="custom-file-label" for="test_name">Choose file</label>
                                                </div>
                                            </div>
                                            <!-- /.form-group -->

                                            <!-- Date range -->
                                            <div class="form-group mt-5">
                                                <button type="submit" name="submit" value="submit" class="btn btn-success">Save</button>
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