<td scope="col" class="text-nowrap text-center " height="" width=""><?php echo $res_search1["t_name"]; ?></td>
<td scope="col" class="text-nowrap  " height="" width=""><?php echo $res_search1["file_type"]; ?></td>
<td scope="col" class="text-nowrap text-center " height="" width="">
    <?php
    if ($res_search1["file_type"] == 'Wiating for approve') {
        echo "<span class='badge badge-secondary'>{$res_search1["file_type"]}</span>";
    } elseif ($res_search1["file_type"] == 'Word') {
        echo "<span class='badge badge-info'>{$res_search1["file_type"]}</span>";
    } elseif ($res_search1["file_type"] == 'Excel') {
        echo "<span class='badge badge-warning'>{$res_search1["file_type"]}</span>";
    } elseif ($res_search1["file_type"] == 'Presentation') {
        echo "<span class='badge badge-success'>{$res_search1["file_type"]}</span>";
    } elseif ($res_search1["file_type"] == 'PDF') {
        echo "<span class='badge badge-danger'>{$res_search1["file_type"]}</span>";
    } elseif ($res_search1["file_type"] == 'Images') {
        echo "<span class='badge badge-primary'>{$res_search1["file_type"]}</span>";
    }
    ?>
</td>

<td scope="col" class="text-nowrap " height="" width="">
    <?php
    if ($res_search1["file_upfile"] == "") {
        echo "<i class='badge badge-danger nav-icon fa fa-folder-open'>&nbsp;ไม่มีเอกสารแนบ</i></a></i>";
    } elseif ($res_search1["file_upfile"]) {
        echo "<a target ='_blank' href='file/{$res_search1["file_name"]}/{$res_search1["file_upfile"]}'>{$res_search1["file_name"]} &nbsp; <i class='badge badge-success nav-icon fa fa-folder-open'>&nbsp;Doc</i></a></i>";
    }
    ?>
</td>

<td scope="col" class="text-nowrap  " height="" width=""><?php echo $res_search1["file_r"]; ?></td>

<td scope="col" class="text-nowrap text-center " height="" width="">
    <?php
    if ($res_search1["file_status"] == 'Process') {
        echo "<span class='badge badge-warning'>{$res_search1["file_status"]}</span>";
    } elseif ($res_search1["file_status"] == 'Complated') {
        echo "<span class='badge badge-success'>{$res_search1["file_status"]}</span>";
    } elseif ($res_search1["file_status"] == 'Wait Approve') {
        echo "<span class='badge badge-primary'>{$res_search1["file_status"]}</span>";
    }
    ?>

</td>