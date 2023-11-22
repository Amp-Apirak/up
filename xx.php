<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deleted Images</title>

</head>
<style>
.col {
    padding-right: 0px;
    padding-left: 0px;
}
</style>

<style type="text/css">
@font-face {
    font-family: title;
    src: url('font/THSarabunNew.ttf');
}

.font1 {
    font-family: title;
    font-size: 25px;
}
</style>



<body>
    <!-- Start Configrate  -->
    <?php
    include('template.php');
    include('connect.php');
  



    // /* การลบข้อมูล */
    // if (isset($_GET['id_as'])) {

    //     $result = $conn->query("DELETE FROM imas WHERE id_as=" . $_GET['id_as']);

    //     if ($result) { /* ถ้า ตัวแปล $result  เชื่อมต่อฐานข้อมูล อ่านค่าเรียบร้อยให้ประกาศ */
    //             echo "<script>alert('ลบ รูปภาพ เรียบร้อยแล้ว'); window.location='asset_up_image.php?id_as=$_GET[id_as]'</script>";
    //     } else {
            
    //     }
    // }
    // /* การลบข้อมูล */



    ?>



    <!-- start Back to.. () -->
    <div class="container-fluid ">
        <div class="row">
            <div class="col col-sm-6  mr-5">
                <a href="asset_view.php"><button type="button" class="btn btn-success "> >>> Back <<< </button></a>
                <br>
            </div>
        </div>
    </div>
    <!-- End Back to.. () -->

    <div class="container  table table-dark table-borderless insertdata border  mt-5 txte-center mx-auto">
        <table class="table table-dark table-borderless insertdata ">
            <thead>
                <tr>
                    <th scope="col">Asset Froms</th>
                </tr>
            </thead>
        </table>
    </div>


    <?php

/* Start insert Data */

if(isset($_POST['submit'])){

    $id_as  = $_POST['id_as'];
    
    $num =  count($_FILES['upfile']['name']);

    for ($i=0;$i<$num;$i++){
        $fp = fopen($_FILES["upfile"]["tmp_name"][$i],"r");
        $ReadBinary = fread($fp,filesize($_FILES["upfile"]["tmp_name"][$i]));
        fclose($fp);
        $filedata = addslashes($ReadBinary);

        $filename = $_FILES['upfile']['name'][$i];
        $filesize = $_FILES['upfile']['size'][$i];
        $filetype = $_FILES['upfile']['type'][$i];

        $dir = "img/asset/";
        $fileimage = $dir . basename($_FILES["upfile"]["name"][$i]);

        move_uploaded_file($_FILES["upfile"]["tmp_name"][$i],$fileimage);
    
        $sql =  "INSERT INTO `imas` (`id_imas`, `id_as`, `upfile`) VALUES (NULL, '$id_as', '$filename')";
        $result = $conn->query($sql);

        if ($result) {
            echo "<script>alert('เพิ่มข้อมูลเรียบร้อยแล้ว'); window.location='asset_up_image.php?id_as=$_GET[id_as]'</script>";
        } else {
            echo "<script>alert('เพิ่มข้อมูลไม่สำเร็จ');</script>";
        }
        //echo  $fileimage;

    }
}
    // echo '<pre>';
    // print_r($_POST);
    // print_r($_FILES);
    // echo '</pre>';
/* End insert Data */

?>
    <!-- End Insert Data -->


    <?php
        if (isset($_GET['id_as'])) {
        $result = $conn->query("SELECT * FROM imas WHERE id_as=" . $_GET['id_as']);   
   
     ?>




    <form name="frmUpload" id="frmUpload" method="Post" action="#" enctype="multipart/form-data">
        <div class="container table-borderless insertdata border  mt-3 mb-1">
            <div class="row mt-3 ">
                <div class="form-group col-md-1 ml-auto">
                    <label for="id_as"></label>
                    <input type="text" class="form-control" id="id_as" name="id_as" value="<?= $_GET['id_as'];?>">
                </div>
            </div>
            <div class="row ">
                <div class="form-group col-md-6 mt-3">
                    <label for="">Uploads รูป (เลือกได้มากกว่า 1 ภาพ):</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="upfile[]" name="upfile[]" multiple="true">
                        <label class="custom-file-label" for="upfile[]">Choose file</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group  ml-auto mt-2">
                    <button type="submit" name="submit" value="submit" class="btn btn-primary">Insert Form</button>
                </div>
                &nbsp;&nbsp;
                <div class="form-group  mr-auto mt-2">
                    <a href="asset_view.php?id_as=<?= $_GET['id_as'];?>"><button type="button" class="btn btn-warning">
                            >>
                            ข้าม << </button></a>
                </div>

            </div>
        </div>
        <div class="container  table table-dark table-borderless insertdata border  mt-1 txte-center mx-auto">
            <table class="table table-dark table-borderless insertdata ">
                <thead>
                    <tr>
                        <th scope="col">Asset Froms</th>
                    </tr>
                </thead>
            </table>
        </div>
    </form>






    <div class="container">
        <div class="row">
            <table class="table table-bordered  mb-5  font1">
                <thead>
                    <tr class="table-active">
                        <th scope="col" class="text-nowrap text-center " height="" width="10%">ID :</th>
                        <th scope="col" class="text-nowrap text-center " height="" width="10%">ID :</th>
                        <th scope="col" class="text-nowrap text-center " height="" width="60%">Image</th>
                        <th scope="col" class="text-nowrap text-center " height="" width="20%">ลบ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php  while ($sr = $result->fetch_object()) {  ?>
                    <tr>
                        <th scope="row" class="text-nowrap text-center "><?= $sr->id_as; ?></th>
                        <th scope="row" class="text-nowrap text-center "><?= $sr->id_imas; ?></th>


                        <th scope="row" class="text-nowrap text-center "><a href="img/view-resolve/<?= $sr->upfile; ?>"
                                data-lightbox="image-1" data-title="<?= $sr->upfile; ?>" class="img-thumbnail">
                                <img width="200" height="200" src="img/asset/<?= $sr->upfile; ?>"></a></th>

                        <th scope="row" class="text-nowrap text-center "><a
                                href="asset_del.php?id_imas=<?= $sr->id_imas; ?>&id_as=<?= $sr->id_as; ?>"><button
                                    type="button" class="btn btn-danger btn-sm"> ลบรูป </button></a></th>
                    </tr>
                    <?php } ?>
                    <?php } ?>

                </tbody>
            </table>
        </div>
    </div>














    <script>
    // Add the following code if you want the name of the file appear on select
    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
    </script>



    <script>
    $(document).ready(function() {
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
    </script>

</body>

</html>