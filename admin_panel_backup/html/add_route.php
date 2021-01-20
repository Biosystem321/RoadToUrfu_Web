<?php

include_once "../../../api/config/database.php";

$conn = OpenCon();

//GetLastRouteID($conn);
AddRoute($conn);

function AddRoute($conn) {

    $name = $_POST['name'];
    $name_chinese = $_POST['name_chinese'];
    $name_english = $_POST['name_english'];

    $next_id = intval(GetLastRouteID($conn)) + 1;

    $sql = "
    INSERT INTO route (route_category_id, route_name)
        VALUES ('$next_id', '$name')";
    
    if ($conn->query($sql) === TRUE) {
        $inserted_id = $conn->insert_id;
        //echo "New record created successfully";
        } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        }

    $sql = "
    INSERT INTO route_chinese (id, route_alt_name)
        VALUES ('$next_id', '$name_chinese')";
    
    if ($conn->query($sql) === TRUE) {
        $inserted_id = $conn->insert_id;
        //echo "New record created successfully";
        } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        }
    
    $sql = "
    INSERT INTO route_english (id, route_alt_name)
        VALUES ('$next_id', '$name_english')";
    
    if ($conn->query($sql) === TRUE) {
        $inserted_id = $conn->insert_id;
        //echo "New record created successfully";
        } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        }

    CloseCon($conn); 
    echo '<meta http-equiv="refresh" content="0; url=http://roadtourfu.ai-info.ru/frontend/admin_panel_backup/html/index.php?category=addroute" />';
}

function GetLastRouteID($conn) {

    $query = "
    SELECT MAX(route_category_id) FROM route
    ";

    try
    {
        $result = $conn->query($query); 

        if ($result -> num_rows > 0)
        {				
            $data = mysqli_fetch_all($result, MYSQLI_NUM);

            return $data[0][0];
        }
        return 0;
    }
    catch(Exception $e)
    {
        echo json_encode(array("message" => $e -> getMessage()), JSON_UNESCAPED_UNICODE);
        return 0;
    }
    
}

?>