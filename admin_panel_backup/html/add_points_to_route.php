<?php

include_once "../../../api/config/database.php";

$conn = OpenCon();

AddPointsToRoute($conn);

function AddPointsToRoute($conn) {

    $points = $_POST['point'];
    
    $route = $_POST['route'];
    $route = explode('_', $route);
    $route = $route[1];

    for($i = 0; $i < count($points); $i++) {

        $point_id = $points[$i];

        $query = "
        UPDATE point SET category = '$route' WHERE id = $point_id
        ";

        if ($conn->query($query) === TRUE) {
            $inserted_id = $conn->insert_id;
            //echo "New record created successfully";
            } else {
            echo "Error: " . $query . "<br>" . $conn->error;
            }
    }
    
    CloseCon($conn);

    echo '<meta http-equiv="refresh" content="0; url=http://roadtourfu.ai-info.ru/frontend/admin_panel_backup/html/index.php?category=addpoints" />';
}

?>