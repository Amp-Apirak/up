

    <!-- Start Configrate  -->
    <?php
    include("connection/connection.php");
    ?>
    <!-- End Configrate  -->

    <!-- sweetalert -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">


    <?php
    if (isset($_POST['submit'])) { /* ถ้า POST มีการกด Submit ให้ทำส่วนล่าง */

        $work_type  = $_POST['work_type']; /* ประกาศตัวแปลเก็บค่า  POST ที่รับมาจาก INPUT  */
        $subject = $_POST['subject'];
        $status = $_POST['status'];
        $detail = $_POST['detail'];
        $result = $_POST['result'];
        $service_id = $_POST['service_id'];
        $requester = $_POST['requester'];
        $staff_crt = $_POST['staff_crt'];


        $target_dir = "../up/file/";
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
                            window.location = "doc_add.php";
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
                            window.location = "doc_add.php";
                        })
                    },1000);
                </script>';
            // echo "<script>alert('ยินดีตอนรับ Admin เข้าสู่ระบบ'); window.location='../index.php'</script>";
        } else {

            $file_upfile = $_FILES['file_upfile']['name'];
            $file_tmp = $_FILES['file_upfile']['tmp_name'];
            move_uploaded_file($file_tmp, "../up/file/$file_upfile");




            $sql =  "INSERT INTO `work` ( `work_type`, `status`, `subject`,`detail`, `requester`, `result`, `staff_crt`, `file_upfile`, `service_id`) 
                            VALUES ( '$work_type', '$status', '$subject', '$detail', '$requester', '$result', '$staff_crt', '$file_upfile', '$service_id')";
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
                                window.location = "index.php";
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
                                                    window.location = "add.php";
                                                })
                                            },1000);
                                        </script>';
                // echo "<script>alert('ยินดีตอนรับ Admin เข้าสู่ระบบ'); window.location='../index.php'</script>";
            }
        }
    }
    // echo '<pre>';
    // print_r($_POST);
    // print_r($_FILES);
    // echo '</pre>';
    ?>


<!-- sweetalert -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.min.js"></script>