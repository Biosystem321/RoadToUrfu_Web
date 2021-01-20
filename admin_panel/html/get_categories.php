<?php

    $path = "../../../api/config/database.php";

    include_once $path;

    $conn = OpenCon();

    $language = "0";

    GetCategories($conn, $language);

    // Getting all points
    function GetCategories($conn, $language)
    {
        $query = GetPreparedSqlQuery($language);
        
        try
        {
            $result = $conn->query($query); 

            if ($result -> num_rows > 0)
            {				
                $data = mysqli_fetch_all($result, MYSQLI_NUM);
                
                //$response_data = json_decode($data);
                echo '<div style="margin-top: 2%;"><b>Категория здания: </b></div>';
                echo '<select name="category" class="custom-select" style="margin: 5px; text-align-last: center;">';
                for($i = 0; $i < count($data); $i++)
                {
                    $title = $data[$i][1];
                    echo '<option value="category_'.$i.'">'.$title.'</option>';
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
            SELECT category.id AS id, category.category_name AS category_name, category_chinese.category_alt_name AS category_alt_name
            FROM category
            INNER JOIN category_chinese
            ON category.id = category_chinese.id
            ";
            case "1": 
            return "
            SELECT category.id AS id, category.category_name AS category_name, category_english.category_alt_name AS category_alt_name
            FROM category
            INNER JOIN category_english
            ON category.id = category_english.id
            ";
        }
    }

?>