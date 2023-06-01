
<?php
    
//print_r($_POST); //ตรวจสอบมี input อะไรบ้าง และส่งอะไรมาบ้าง 
//ถ้ามีค่าส่งมาจากฟอร์ม
  if(isset($_POST['username']) && isset($_POST['user_email']) && isset($_POST['user_tel']) && isset($_POST['password']) ){
  // sweet alert 
  echo '
  <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';

  //ไฟล์เชื่อมต่อฐานข้อมูล
  
  require_once '../ino/connection/connection.php';
  //ประกาศตัวแปรรับค่าจากฟอร์ม
  $username = $_POST['username'];
  $user_email = $_POST['user_email'];
  $user_tel = $_POST['user_tel'];
  $password = sha1($_POST['password']); //เก็บรหัสผ่านในรูปแบบ sha1 

  //check duplicat
    $stmt = $conn->prepare("SELECT user_id FROM tb_user WHERE username = :username");
    //$stmt->bindParam(':username', $username , PDO::PARAM_STR);
    $stmt->execute(array(':username' => $username));
    //ถ้า username ซ้ำ ให้เด้งกลับไปหน้าสมัครสมาชิก ปล.ข้อความใน sweetalert ปรับแต่งได้ตามความเหมาะสม
    if($stmt->rowCount() > 0){
        echo '<script>
                     setTimeout(function() {
                      swal({
                          title: "Username ซ้ำ !! ",  
                          text: "กรุณาสมัครใหม่อีกครั้ง",
                          type: "warning"
                      }, function() {
                          window.location = "regis.php"; //หน้าที่ต้องการให้กระโดดไป
                      });
                    }, 1000);
              </script>';
    }else{ //ถ้า username ไม่ซ้ำ เก็บข้อมูลลงตาราง
            //sql insert
            $stmt = $conn->prepare("INSERT INTO tb_user (username, user_email, user_tel, password)
            VALUES (:username, :user_email, :user_tel, :password)");
            $stmt->bindParam(':username', $username, PDO::PARAM_STR);
            $stmt->bindParam(':user_email', $user_email , PDO::PARAM_STR);
            $stmt->bindParam(':user_tel', $user_tel , PDO::PARAM_STR);
            $stmt->bindParam(':password', $password , PDO::PARAM_STR);
            $result = $stmt->execute();
            if($result){
                echo '<script>
                     setTimeout(function() {
                      swal({
                          title: "สมัครสมาชิกสำเร็จ",
                          text: "กรุณารอระบบ Login เข้าใช้งานระบบ Sale Service ",
                          type: "success"
                      }, function() {
                          window.location = "login.php"; //หน้าที่ต้องการให้กระโดดไป
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
                          window.location = "regis.php"; //หน้าที่ต้องการให้กระโดดไป
                      });
                    }, 1000);
                </script>';
            }
            $conn = null; //close connect db
      } //else chk dup
  } //isset 
  //devbanban.com
  ?>