<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="keywords" content="">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!--Meta Responsive tag-->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--Bootstrap CSS-->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!--Custom style.css-->
        <link rel="stylesheet" href="assets/css/quicksand.css">
        <link rel="stylesheet" href="assets/css/style.css">
    <!--Font Awesome-->
        <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
        <link rel="stylesheet" href="assets/css/fontawesome.css">

    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->


    <!-- sweetalert -->
        <?php 
            echo'
            <script src="../its/code/plugins/jquery/jquery.min.js"></script>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
            <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.min.js"></script>
            ';
        ?>

    <!----------------------------- start Time ------------------------------->
        <?php
            date_default_timezone_set('asia/bangkok');
            $date = date('d/m/Y');
            $time = date("H:i:s", "1359780799");
        ?>
    <!----------------------------- start Time ------------------------------->


<title>Registion Form</title>
</head>

<body class="login-body">

    <?php
      //print_r($_POST); //ตรวจสอบมี input อะไรบ้าง และส่งอะไรมาบ้าง 
                //ถ้ามีค่าส่งมาจากฟอร์ม
                if(isset($_POST['username']) && isset($_POST['email']) && isset($_POST['tel']) && isset($_POST['team']) && isset($_POST['password']) && isset($_POST['user_crt'])  ){
                    // sweet alert 
    
    
                    //ไฟล์เชื่อมต่อฐานข้อมูล
                    
                    include("connection/connection.php"); 
                    //ประกาศตัวแปรรับค่าจากฟอร์ม
                    $username = $_POST['username'];
                    $email = $_POST['email'];
                    $tel = $_POST['tel'];
                    $team = $_POST['team'];
                    $password = sha1($_POST['password']);
                    $user_crt = $_POST['user_crt']; //เก็บรหัสผ่านในรูปแบบ sha1 
    
                    //check duplicat
                        $sql = "SELECT * From user WHERE username = '$username' OR email = '$email'";
                        //$stmt->bindParam(':username', $username , PDO::PARAM_STR);
                        $result = $conn->query($sql);
                        $num = mysqli_num_rows($result);
                        //ถ้า username ซ้ำ ให้เด้งกลับไปหน้าสมัครสมาชิก ปล.ข้อความใน sweetalert ปรับแต่งได้ตามความเหมาะสม
                        if($num > 0){
                            echo '<script>
                                        setTimeout(function() {
                                        swal({
                                            title: "Username or email ซ้ำ มีผู้ใช้งานอยู่ในระบบแล้ว !! ",  
                                            text: "กรุณาสมัครใหม่อีกครั้ง",
                                            type: "warning"
                                        }, function() {
                                            window.location = "regis.php"; //หน้าที่ต้องการให้กระโดดไป
                                        });
                                        }, 1000);
                                </script>';
                        }else{ 
                            //ถ้า username ไม่ซ้ำ เก็บข้อมูลลงตาราง
                                //sql insert
                                $sql =  "INSERT INTO `user` (`id`, `username`, `email`, `tel`, `team`, `password`, `user_crt` ) 
                                VALUES (NULL, '$username', '$email', '$tel', '$team', '$password', '$user_crt')";
                                $result = $conn->query($sql);
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
            
    <!--Login Wrapper-->

    <div class="container-fluid login-wrapper">
        <div class="login-box">
            <h1 class="text-center mb-5"><i class="fas fa-handshake text-primary"></i> Sale Service</h1>
            <div class="row">
                <div class="col-md-6 col-sm-6 col-12 login-box-info">
                    <h3 class="mb-4">Sign in</h3>
                    <p class="mb-4">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry
                        richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch.</p>
                    <p class="text-center"><a href="login.php" class="btn btn-light">Login here</a></p>
                </div>
                <div class="col-md-6 col-sm-6 col-12 login-box-form p-4">
                    <h3 class="mb-2">Sign up</h3>
                    <small class="text-muted bc-description">Create new account</small>
                    <form action="regis.php" class="mt-2" method="POST">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
                            </div>
                            <input type="text" class="form-control mt-0" placeholder="username" aria-label="username"
                                required name="username" aria-describedby="basic-addon1">
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-envelope"></i></span>
                            </div>
                            <input type="email" class="form-control mt-0" placeholder="johndoe@gmail.com" required
                                name="email" aria-label="email" aria-describedby="basic-addon1">
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-phone"></i></span>
                            </div>
                            <input type="text" class="form-control mt-0" placeholder="555-098-444" aria-label="phone"
                                required name="tel" aria-describedby="basic-addon1">
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-users"></i></span>
                            </div>
                            <select class="form-control" name="team" required id="exampleFormControlSelect1">
                                <option selected="selected">Select team</option>
                                <option>Innovation</option>
                                <option>Service Solution</option>
                                <option>Service bank</option>
                                <option>Infrastructure</option>
                                <option>Sale</option>
                                <option>Accounting</option>
                                <option>Stock</option>
                            </select>
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-lock"></i></span>
                            </div>
                            <input type="text" class="form-control mt-0" placeholder="password" aria-label="password"
                                required name="password" aria-describedby="basic-addon1">
                        </div>



                        <input type="hidden" class="form-control mt-0" placeholder="user_crt" aria-label="user_crt"
                            name="user_crt" value="<?php echo $user_crt; ?>" aria-describedby="basic-addon1">


                        <div class="form-group">
                            <button type="submit" name="submit" value="submit"
                                class="btn btn-theme btn-block p-2 mb-1">Register</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!--Login Wrapper-->

    <!-- Page JavaScript Files-->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/jquery-1.12.4.min.js"></script>
    <!--Popper JS-->
    <script src="assets/js/popper.min.js"></script>
    <!--Bootstrap-->
    <script src="assets/js/bootstrap.min.js"></script>

    <!--Custom Js Script-->
    <script src="assets/js/custom.js"></script>
    <!--Custom Js Script-->
</body>

</html>