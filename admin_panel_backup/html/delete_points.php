<?php

$path = "../../../api/config/database.php";

include_once $path;

//$files = scandir($full_directory);

$conn = OpenCon();

$selected = $_POST['point'];

DeleteRecords($conn, $selected);

function DeleteRecords($conn, $selected_points) {

    $count = count($selected_points);

    for($i = 0; $i < $count; $i++) {

        $id = $selected_points[$i];

        $sql = "
        DELETE FROM data_chinese WHERE id='$id'";
        if ($conn->query($sql) === TRUE) {
            //echo "Record deleted successfully";
          } else {
            echo "Error deleting record: " . $conn->error;
          }
        $sql = "
        DELETE FROM data_english WHERE id='$id'";
        if ($conn->query($sql) === TRUE) {
              //echo "Record deleted successfully";
            } else {
              echo "Error deleting record: " . $conn->error;
            }

        $sql = "
        DELETE FROM point WHERE id='$id'";

        if ($conn->query($sql) === TRUE) {
            //echo "Record deleted successfully";
            } else {
            echo "Error deleting record: " . $conn->error;
            }

        $sql = "
        DELETE FROM point_photoes WHERE point_id='$id'";

        if ($conn->query($sql) === TRUE) {
            //echo "Record deleted successfully";
            } else {
            echo "Error deleting record: " . $conn->error;
            }

        $folder = "POINT_".$id;

        $full_directory = "../../../image/".$folder;

        $files = scandir($full_directory);

        unlink($full_directory."/".$files[4]);

        unlink($full_directory."/".$files[3]);

        unlink($full_directory."/".$files[2]);

        rmdir($full_directory);
        
    }
    CloseCon($conn);

    echo '<meta http-equiv="refresh" content="0; url=http://roadtourfu.ai-info.ru/frontend/admin_panel_backup/html/index.php?category=delete" />';
}

?>