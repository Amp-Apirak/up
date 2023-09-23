 <!-- Start Configrate  -->
 <?php
     include("connection/connection.php"); 
    ?>
 <!-- End Configrate  -->

 <!-- sweetalert -->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">


 <!-- เพิ่มข้อมูล -->
 <?php
    if (isset($_POST['submit'])) { /* ถ้า POST มีการกด Submit ให้ทำส่วนล่าง */
    /* ประกาศตัวแปลเก็บค่า  POST ที่รับมาจาก INPUT  */
        $id  = $_POST['id'];
        $user_staff  = $_POST['user_staff'];
        $user_crt  = $_POST['user_crt'];
        $fullname = $_POST['fullname'];
        $position = $_POST['position'];
        $team = $_POST['team'];
        $role = $_POST['role'];
        $email = $_POST['email'];
        $tel = $_POST['tel'];
        $username = $_POST['username'];

        // print_r($_POST);
  
        $sql =  "UPDATE `user` SET `user_staff` = '$user_staff', `user_crt` = '$user_crt', `fullname` = '$fullname', 
                        `position` = '$position', `team` = '$team', `role` = '$role', `email` = '$email', 
                        `tel` = '$tel',`username` = '$username' WHERE id=" . $_POST['id'];

        $result = $conn->query($sql);

        //  print_r($result);
        if ($result) {
            // <!-- sweetalert -->
            echo '<script>
            setTimeout(function() {
            swal({
                    title: "You have completed the edit information item",
                    text: "Updated the information successfully",
                    type: "success"
                }, function() {
                    window.location = "account.php"; //หน้าที่ต้องการให้กระโดดไป
                    });
                    }, 1000);
                </script>';
    }else{
        echo '<script>
            setTimeout(function() {
            swal({
                    title: "Failed to edit data",
                    type: "error"
            }, function() {
                    window.location = "account.php"; //หน้าที่ต้องการให้กระโดดไป
                    });
                    }, 1000);
                </script>';
                                // echo "<script>alert('ยินดีตอนรับ Admin เข้าสู่ระบบ'); window.location='../index.php'</script>";
            }
        }

                        // echo '<pre>';
                        // print_r($_POST);
                        // print_r($_FILES);
                        // echo '</pre>';
 ?>

 <!-- sweetalert -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.min.js"></script>
