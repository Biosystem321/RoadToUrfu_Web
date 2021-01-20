<?php

    $path = "../../../api/config/database.php";

    include_once $path;

    $conn = OpenCon();

    $language = "0";

    GetPoints($conn, $language);

    // Getting all points
    function GetPoints($conn, $language)
    {
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
                
                //$response_data = json_decode($data);
                echo '<br>';
                echo '<div style="margin-top: 1%;"><b>Здание: </b></div>';
                echo '<select name="point" id="points_selector" class="custom-select" style="margin: 5px; text-align-last: center;">';
                for($i = 0; $i < count($data); $i++)
                {
                    $title = $data[$i][1];
                    if(isset($_GET['point']))
                    {
                        $current_point = "".$data[$i][0];
                        if($_GET['point'] === $current_point)
                        {                            
                            echo '<option value="'.$current_point.'" selected>'.$title.'</option>';
                        }
                        else
                        {
                            echo '<option value="'.$current_point.'">'.$title.'</option>';
                        }
                    }
                    else
                    {                            
                        echo '<option value="'.$current_point.'">'.$title.'</option>';
                    }
                    //echo $data[$i][1]."<br>";
                    //print_r(array_count_values($data[$i]));
                }
                echo '</select>';
            }
        }
        catch(Exception $e)
        {
            echo json_encode(array("message" => $e -> getMessage()), JSON_UNESCAPED_UNICODE);
        }

        CloseCon($conn);
    }

?>