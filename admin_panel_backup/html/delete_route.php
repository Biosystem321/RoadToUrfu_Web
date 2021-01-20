<?php

include_once "../../../api/config/database.php";

$conn = OpenCon();

$full_delete = $_POST['insta_delete'];

$route_id = $_POST['route'];

//echo var_dump($route_id);
DeleteRoute($conn, $route_id, $full_delete);

function DeleteRoute($conn, $route_id, $full_delete) {

    $route_id = explode('_', $route_id);
    $route_id = $route_id[1];

    $query = "
    DELETE FROM route WHERE route_category_id = '$route_id'
    ";

    if ($conn->query($query) === TRUE) {
        //echo "Record deleted successfully";
      } else {
        echo "Error deleting record: " . $conn->error;
      }

    $query = "
    DELETE FROM route_chinese WHERE id = '$route_id'
    ";

    if ($conn->query($query) === TRUE) {
        //echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
    $query = "
    DELETE FROM route_english WHERE id = '$route_id'
    ";
    
    if ($conn->query($query) === TRUE) {
        //echo "Record deleted successfully";
        } else {
        echo "Error deleting record: " . $conn->error;
        }
            
    
    if(isset($full_delete))
    {
        $query = "
        SELECT id FROM point WHERE category = '$route_id'
        ";
        $result = $conn->query($query); 

        if ($result -> num_rows > 0)
        {
            $data = mysqli_fetch_all($result, MYSQLI_NUM);

            var_dump($data);

            for($i = 0; $i < count($data); $i++) {

                $id = $data[$i][0];

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
        }


        /*$query = "
        DELETE FROM point WHERE category = '$route_id'
        ";
        if ($conn->query($query) === TRUE) {
            //echo "Record deleted successfully";
        }
        else {
            echo "Error deleting record: " . $conn->error;
        }*/
    }

    CloseCon($conn);
    echo '<meta http-equiv="refresh" content="0; url=http://roadtourfu.ai-info.ru/frontend/admin_panel_backup/html/index.php?category=deleteroute" />';
}



?>