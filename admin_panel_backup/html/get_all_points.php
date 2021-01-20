<?php

include_once "../../../api/config/database.php";

$conn = OpenCon();

GetAllPoints($conn);

function GetAllPoints($conn)
{
    $query = "
    SELECT category.id AS id, category.category_name AS category_name, category_chinese.category_alt_name AS category_alt_name
    FROM category
    INNER JOIN category_chinese
    ON category.id = category_chinese.id";

    try
    {
        $result = $conn->query($query); 

        if ($result -> num_rows > 0)
        {				
            $data = mysqli_fetch_all($result, MYSQLI_NUM);
            
            $categories_array = $data;
        }
    }
    catch(Exception $e)
    {
        echo json_encode(array("message" => $e -> getMessage()), JSON_UNESCAPED_UNICODE);
    }


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
    ";
    
    try
    {
        $result = $conn->query($query); 

        if ($result -> num_rows > 0)
        {				
            $data = mysqli_fetch_all($result, MYSQLI_NUM);

            echo '<p>';
            echo '<details>';
            echo '<summary>'.$categories_array[0][1].'</summary>';
            //echo '<h3>''</h3>';
            echo '<div>';
            for($i = 0; $i < count($data); $i++) {
                $point_value = $data[$i][0];
                if($data[$i][11] == 0)
                    echo '<input type="checkbox" name="point[]" class="delete_input" value="'.$point_value.'">'.$data[$i][1].'<Br>';
            }
            echo '</div>';
            echo '</details>';
            echo '</p>';
            echo '<p>';
            echo '<details>';
            echo '<summary>'.$categories_array[1][1].'</summary>';
            //echo '<h3>'.$categories_array[1][1].'</h3>';
            echo '<div>';
            for($i = 0; $i < count($data); $i++) {
                $point_value = $data[$i][0];
                if($data[$i][11] == 1)
                    echo '<input type="checkbox" name="point[]" class="delete_input" value="'.$point_value.'">'.$data[$i][1].'<Br>';
            }
            echo '</div>';
            echo '</details>';
            echo '</p>';
            echo '<p>';
            echo '<details>';
            echo '<summary>'.$categories_array[2][1].'</summary>';
            //echo '<h3>'.$categories_array[2][1].'</h3>';
            echo '<div>';
            for($i = 0; $i < count($data); $i++) {
                $point_value = $data[$i][0];
                if($data[$i][11] == 2)
                    echo '<input type="checkbox" name="point[]" class="delete_input" value="'.$point_value.'">'.$data[$i][1].'<Br>';
            }
            echo '</div>';
            echo '</details>';
            echo '</p>';
            echo '<p>';
            echo '<details>';
            echo '<summary>'.$categories_array[3][1].'</summary>';
            //echo '<h3>'.$categories_array[3][1].'</h3>';
            echo '<div>';
            for($i = 0; $i < count($data); $i++) {
                $point_value = $data[$i][0];
                if($data[$i][11] == 3)
                    echo '<input type="checkbox" name="point[]" class="delete_input" value="'.$point_value.'">'.$data[$i][1].'<Br>';
            }
            echo '</div>';
            echo '</details>';
            echo '</p>';
            echo '<p>';
            echo '<details>';
            echo '<summary>-Для маршрутов-</summary>';
            //echo '<h3>'.$categories_array[3][1].'</h3>';
            echo '<div>';
            for($i = 0; $i < count($data); $i++) {
                $point_value = $data[$i][0];
                if($data[$i][11] > 14)
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