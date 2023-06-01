<?php
    
    if (isset($_POST['submit'])){

        require_once '../ino/connection/connection.php';
          // เชื่อมต่อฐานข้อมูล

      $username = $_POST['username'];
      echo $username;
      // รับค่า Username and password //เข้ารหัสผ่านแบบ md5

      //Query เรียกฐานข้อมูลขึ้นมาตรวจสอบ
      $sql="SELECT * FROM tb_user 
      WHERE username='".$username."'";

    // ตรวจสอบการรับค่าจากตัวแปล $SQL   
        //echo $sql;
        // exit;


      $result = mysqli_query($conn,$sql);

      //ตรวจสอบหากรับค่าจาก Form กรอกข้อมูล Username/Password = 1 แต่ถ้าไม่จะได้เท่ากับ 0 
        // echo mysqli_num_rows($result);
        // exit;

        if(mysqli_num_rows($result)==1){

            echo '<script>
            setTimeout(function(){
                swal({
                    title: "Login Error!",
                    text: "Username or Password is not correct, please try again.",
                    type:"warning"
                }, function(){
                    window.location = "../ino/regis.php";
                })
            },1000);
            </script>';
                    // echo "<script>alert('ยินดีตอนรับ Admin เข้าสู่ระบบ'); window.location='../index.php'</script>";
                }else{
           

                        $username  = $_POST['username']; /* ประกาศตัวแปลเก็บค่า  POST ที่รับมาจาก INPUT  */
                        $user_email = $_POST['user_email'];
                        $user_tel = $_POST['user_tel'];
                        $password = md5($_POST['password']);


                        // print_r($_POST);

                        $sql =  "INSERT INTO `tb_user` (`user_id`, `username`,`user_email`, `user_tel`, `password`)
                        VALUES (NULL, '$username', '$user_email', '$user_tel', '$password'";
                        $result = $conn->query($sql);

                        // print_r($_POST);

                        if ($result) {
                            // <!-- sweetalert -->
                            echo '<script>
                                    setTimeout(function(){
                                        swal({
                                            title: "Save Successfully!",
                                            text: "Thank You . ",
                                            type:"success"
                                        }, function(){
                                            window.location = "login.php";
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
                                            window.location = "regit.php";
                                        })
                                    },1000);
                                </script>';
                            // echo "<script>alert('ยินดีตอนรับ Admin เข้าสู่ระบบ'); window.location='../index.php'</script>";
                        }
                    }
    }
?>