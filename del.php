<!DOCTYPE html>
<html lang="en">
<?php $menu = "km"; ?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>INO | Del</title>

    <!-- highlight -->
    <style>
        .highlight {
            background-color: #FFFF88;
        }
    </style>
    <!-- highlight -->


    <!----------------------------- start header ------------------------------->
        <?php include("../its/templated/head.php"); ?>
    <!----------------------------- end header --------------------------------->

    <!----------------------------- start menu ------------------------------->
        <?php include("../its/templated/menu.php"); ?>
    <!----------------------------- end menu --------------------------------->

    <?php
        /* การลบข้อมูล */
        if (isset($_GET['files_id'])) {

            $result = $conn->query("DELETE FROM tb_files WHERE files_id=" . $_GET['files_id']);

            if ($result) { /* ถ้า ตัวแปล $result  เชื่อมต่อฐานข้อมูล อ่านค่าเรียบร้อยให้ประกาศ */
                // <!-- sweetalert -->
                echo '<script>
            setTimeout(function(){
                swal({
                    title: "Delect Successfully!",
                    text: "Thank You . ",
                    type:"success"
                }, function(){
                    window.location = "project_view.php?id='.$_GET['id'].';
                })
            },1000);
        </script>';
                // echo "<script>alert('ยินดีตอนรับ Admin เข้าสู่ระบบ'); window.location='../index.php'</script>";
            } else {
                // <!-- sweetalert -->
                echo '<script>
            setTimeout(function(){
                swal({
                    title: "Can Not Delect Successfully!",
                    text: "Checking Your Data",
                    type:"warning"
                }, function(){
                    window.location = "project_view.php?id='.$_GET['id'].';
                })
            },1000);
        </script>';
                // echo "<script>alert('ยินดีตอนรับ Admin เข้าสู่ระบบ'); window.location='../index.php'</script>";
            }
        }
        /* การลบข้อมูล */
    ?>

