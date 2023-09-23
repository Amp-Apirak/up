<?php session_start(); ?>

<?php
if (!isset($_SESSION["id"])) {
    Header("Location: login.php");
} else { ?>

    <!-- Start Configrate  -->
    <?php
    include("connection/connection.php");
    ?>
    <!-- End Configrate  -->

    <!-- sweetalert -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">

    

    <?php
    if (isset($_POST['submit'])) { /* ถ้า POST มีการกด Submit ให้ทำส่วนล่าง */

        $t_name  = $_POST['t_name']; /* ประกาศตัวแปลเก็บค่า  POST ที่รับมาจาก INPUT  */
        $file_staff = $_POST['file_staff'];
        $file_name = $_POST['file_name'];
        $file_type = $_POST['file_type'];
        $file_link = $_POST['file_link'];
        $file_r = $_POST['file_r'];
        $file_status = $_POST['file_status'];
        $pip_id = $_POST['pip_id'];

        $t_name = $_POST['t_name'];

        $target_dir = "../ino/docker/$t_name/";
        $target_file = $target_dir . basename($_FILES["file_upfile"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // printf($imageFileType);

        // Check if $uploadOk is set to 0 by an error
        if ($imageFileType == " ") {

            //echo "Sorry, your file was not uploaded.";
            echo '<script>
                    setTimeout(function(){
                        swal({
                            title: "Sorry, your file was not uploaded.",
                            text: "Please check the file name.",
                            type:"warning"
                        }, function(){
                            window.location = "pipeline_view.php?id='.$_GET['id'].'";
                        })
                    },1000);
                </script>';
            // echo "<script>alert('ยินดีตอนรับ Admin เข้าสู่ระบบ'); window.location='../index.php'</script>
        }

        // Check if file already exists
        if (file_exists($target_file)) {

            //echo "Sorry, file already exists.";
            // <!-- sweetalert -->
            echo '<script>
                    setTimeout(function(){
                        swal({
                            title: "Sorry, file already exists.",
                            text: "Please check the file name.",
                            type:"warning"
                        }, function(){
                            window.location = "pipeline_view.php?id='.$_GET['id'].'";
                        })
                    },1000);
                </script>';
            // echo "<script>alert('ยินดีตอนรับ Admin เข้าสู่ระบบ'); window.location='../index.php'</script>";
        } else {

            $file_upfile = $_FILES['file_upfile']['name'];
            $file_tmp = $_FILES['file_upfile']['tmp_name'];
            move_uploaded_file($file_tmp, "../ino/docker/$t_name/$file_upfile");




            $sql =  "INSERT INTO `pip_file` ( `t_name`, `file_name`, `file_staff`,`file_type`, `file_link`, `file_r`, `file_status`, `pip_id`, `file_upfile`) 
                            VALUES ( '$t_name', '$file_name', '$file_staff', '$file_type', '$file_link', '$file_r', '$file_status', '$pip_id', '$file_upfile')";

            $result = $conn->query($sql);

            //print_r($sql);

            if ($result) {
                // <!-- sweetalert -->
                echo '<script>
                        setTimeout(function(){
                            swal({
                                title: "Save data successfully",
                                text: "Thank You . ",
                                type:"success"
                            }, function(){
                                window.location = "pipeline_view.php?id='.$_GET['id'].'";
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
                                                    window.location = "pipeline_view.php?id='.$_GET['id'].'";
                                                })
                                            },1000);
                                        </script>';
                // echo "<script>alert('ยินดีตอนรับ Admin เข้าสู่ระบบ'); window.location='../index.php'</script>";
            }
        }
    }
    // echo '<pre>';
    //print_r($_POST);
    // print_r($_FILES);
    // echo '</pre>';
    ?>
<?php } ?>



<!-- sweetalert -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.min.js"></script>