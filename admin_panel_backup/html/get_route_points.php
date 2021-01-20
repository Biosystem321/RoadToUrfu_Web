<?php

include_once "../../../api/config/database.php";

$conn = OpenCon();

GetPointsForRoute($conn);

function GetPointsForRoute($conn) {

    $query  = "
    SELECT point.id AS point_id,
        point.name AS point_name,
        data_chinese.name AS point_alt_name,
        point.latitude AS point_latitude,
        point.longitude AS point_longitude,
        point.classroom AS point_classroom,
        point.description AS point_description,
        data_chinese.description AS point_alt_description,
        point.address AS point_address,
        point.contacts AS point_contacts,
        point.site AS point_site,
        point.category AS point_category
    FROM point
    INNER JOIN data_chinese
    ON point.id = data_chinese.id
    AND
    point.category > 14
    ";

    try
    {
        $result = $conn->query($query); 

        if ($result -> num_rows > 0)
        {				
            $data = mysqli_fetch_all($result, MYSQLI_NUM);

            echo '<p>';
            echo '<details>';
            echo '<summary>Доступные точки</summary>';
            //echo '<h3>''</h3>';
            echo '<div>';
            for($i = 0; $i < count($data); $i++) {
                $point_value = $data[$i][0];
                echo '<input type="checkbox" name="point[]" class="delete_input" value="'.$point_value.'">'.$data[$i][1].'<Br>';
            }
            echo '</div>';
            echo '</details>';
            echo '</p>';
			
        }
    }
    catch(Exception $e)
    {
        echo json_encode(array("message" => $e -> getMessage()), JSON_UNESCAPED_UNICODE);
    }
    
    CloseCon($conn);
}
?>