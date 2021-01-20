<?php

    $path = "../../../api/config/database.php";

    include_once $path;

    $conn = OpenCon();

    $language = "0";

    GetRoutes($conn, $language);

    // Getting all points
    function GetRoutes($conn, $language)
    {
        $query = GetPreparedSqlQuery($language);
        
        try
        {
            $result = $conn->query($query); 

            if ($result -> num_rows > 0)
            {				
                $data = mysqli_fetch_all($result, MYSQLI_NUM);
                
                //$response_data = json_decode($data);
                echo '<div style="margin-top: 2%;"><b>Маршрут: </b></div>';
                echo '<select name="route" class="custom-select" style="margin: 5px; text-align-last: center;">';
                for($i = 0; $i < count($data); $i++)
                {
                    $title = $data[$i][1];
                    echo '<option value="route_'.$data[$i][0].'">'.$title.'</option>';
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

    function GetPreparedSqlQuery($id)
    {
        switch($id)
        {
            case "0":
            return "
            SELECT route.route_category_id AS id, route.route_name AS route_name, route_chinese.route_alt_name AS route_alt_name
            FROM route
            INNER JOIN route_chinese
            ON route.route_category_id = route_chinese.id
            ";
            /*case "1": 
            return "
            SELECT category.id AS id, category.category_name AS category_name, category_english.category_alt_name AS category_alt_name
            FROM category
            INNER JOIN category_english
            ON category.id = category_english.id
            ";*/
        }
    }

?>