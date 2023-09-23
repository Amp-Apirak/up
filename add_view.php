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
        $user_staff  = $_POST['user_staff'];
        $user_crt  = $_POST['user_crt'];
        $fullname = $_POST['fullname'];
        $position = $_POST['position'];
        $team = $_POST['team'];
        $role = $_POST['role'];
        $email = $_POST['email'];
        $tel = $_POST['tel'];
        $username = $_POST['username'];
        $password = sha1($_POST['password']);

        print_r($_POST);
        //check duplicat
            $sql = "SELECT * From user WHERE username = '$username' OR email = '$email'";
            $result = $conn->query($sql);
            $num = mysqli_num_rows($result);

            print_r($result); 
            print_r($num);
            //ถ้า username ซ้ำ ให้เด้งกลับไปหน้าสมัครสมาชิก ปล.ข้อความใน sweetalert ปรับแต่งได้ตามความเหมาะสม
                if($num > 0){
                    echo '<script>
                        setTimeout(function() {
                            swal({
                                    title: "Username or email ซ้ำ มีผู้ใช้งานอยู่ในระบบแล้ว !! ",  
                                    text: "กรุณาสมัครใหม่อีกครั้ง",
                                    type: "warning"
                                }, function() {
                                    window.location = "account.php"; //หน้าที่ต้องการให้กระโดดไป
                                    });
                                    }, 1000);
                                </script>';
                             }else{ 
                            //ถ้า username ไม่ซ้ำ เก็บข้อมูลลงตาราง

                            //sql insert
                                    $sql = "INSERT INTO `user` (`id`, `fullname`,`user_staff`,`user_crt`,
                                        `position`, `team`, `role`, `email`, `tel`, `username`,
                                        `password`)
                                    VALUES (NULL ,'$fullname','$user_staff','$user_crt','$position', '$team',
                                        '$role', '$email', '$tel', '$username', '$password')";

                                    $result = $conn->query($sql);
                                        if($result){
                                            echo '<script>
                                                setTimeout(function() {
                                                swal({
                                                        title: "สมัครสมาชิกสำเร็จ",
                                                        text: "",
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
                                                        title: "เกิดข้อผิดพลาด",
                                                        type: "error"
                                                }, function() {
                                                        window.location = "account.php"; //หน้าที่ต้องการให้กระโดดไป
                                                        });
                                                        }, 1000);
                                                    </script>';
                                    }
                                                $conn = null; //close connect db
                                } //else chk dup
                                    
                            } //isset 
                                //devbanban.com
?>




<!-- sweetalert -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.min.js"></script>