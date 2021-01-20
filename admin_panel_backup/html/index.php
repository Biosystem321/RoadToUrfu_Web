<?php

    session_start();

    /*if(isset($_COOKIE["login"]))
    {
        $_SESSION['auth'] = true;
    }*/

    if(!isset($_SESSION['auth']))
    {
        exit("Вы не авторизованы для просмотра этой страницы");
    }

?>
<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
        content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 4 admin, bootstrap 4, css3 dashboard, bootstrap 4 dashboard, materialpro admin bootstrap 4 dashboard, frontend, responsive bootstrap 4 admin template, materialpro admin lite design, materialpro admin lite dashboard bootstrap 4 dashboard template">
    <meta name="description"
        content="Material Pro Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
    <title>Road to UrFU</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/materialpro-lite/" />
    <!-- Favicon icon -->
    <link rel="icon" sizes="16x16" href="../assets/images/favicon.ico">
    <!-- chartist CSS -->
    <link href="../assets/plugins/chartist-js/dist/chartist.min.css" rel="stylesheet">
    <link href="../assets/plugins/chartist-js/dist/chartist-init.css" rel="stylesheet">
    <link href="../assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css" rel="stylesheet">
    <!--This page css - Morris CSS -->
    <link href="../assets/plugins/c3-master/c3.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style_form.css">
    <!--
        Set your own API-key. Testing key is not valid for other web-sites and services.
        Get your API-key on the Developer Dashboard: https://developer.tech.yandex.ru/keys/
    -->
    <script src="https://api-maps.yandex.ru/2.1/?lang=en_RU&amp;apikey=87d446bc-d08e-4919-bacf-f0ca2c8d8793" type="text/javascript"></script>
    <script src="event_properties.js" type="text/javascript"></script>
    <script src="js/selectsrc.js" type="text/javascript"></script>
	<style>
        #map {
            width: 100%; height: 600px;
            margin-left: 100px;
        }
    </style>
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin6">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin6">
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <a class="navbar-brand ml-4" href="#">
                        <!-- Logo icon -->
                        <b class="logo-icon">
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="../assets/images/logo-light-icon.png" alt="homepage" class="dark-logo" width="25" height="24"/>

                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span class="logo-text">
                            <!-- dark Logo text -->
                            <img src="../assets/images/logo-light-text.png" alt="homepage" class="dark-logo" width="148" height="19" />

                        </span>
                    </a>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <a class="nav-toggler waves-effect waves-light text-white d-block d-md-none"
                        href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    <ul class="navbar-nav d-lg-none d-md-block ">
                        <li class="nav-item">
                            <a class="nav-toggler nav-link waves-effect waves-light text-white "
                                href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                        </li>
                    </ul>
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto mt-md-0 ">

                    </ul>

                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    
                    <ul class="navbar-nav">
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href=""
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img
                                    src="../assets/images/users/user-male-circle-white.png" alt="user" class="profile-pic m-r-10">Админ</a>
                        </li>
                    </ul>

                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href=""
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img
                                    src="../assets/images/users/logout.png" class="profile-pic" onclick="logout()"
                                    width="33" height="33">
                            </a>
                        </li>
                    </ul>
                </div>
                <script>
                    function logout(){
                        window.location.href = "logout.php";
                    }
                    </script>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <!-- User Profile-->
                        <li class="divider" style="margin-bottom: 10px;"><b>Здания УрФУ</b></li>
                        <li class="sidebar-item"> 
                        <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="http://roadtourfu.ai-info.ru/frontend/admin_panel_backup/html/index.php?category=add" aria-expanded="false">
                                <i class="mdi mr-2 mdi-plus-box"></i>
                                <span
                                    class="hide-menu">Добавить место
                                </span>
                        </a>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="http://roadtourfu.ai-info.ru/frontend/admin_panel_backup/html/index.php?category=edit&point=0" aria-expanded="false">
                                <i class="mdi mr-2 mdi-table-edit"></i><span class="hide-menu">Редактировать</span></a>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="http://roadtourfu.ai-info.ru/frontend/admin_panel_backup/html/index.php?category=delete" aria-expanded="false"><i class="mdi mr-2 mdi-close-circle"></i><span
                                    class="hide-menu">Удалить место</span></a></li>
                        </li>
                        <li class="divider" style="margin-bottom: 10px;"><b>Достопримечательности</b></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="http://roadtourfu.ai-info.ru/frontend/admin_panel_backup/html/index.php?category=addroute" aria-expanded="false"><i class="mdi mr-2 mdi-plus-box"></i><span
                                    class="hide-menu">Добавить маршрут</span></a></li>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="http://roadtourfu.ai-info.ru/frontend/admin_panel_backup/html/index.php?category=addpoints" aria-expanded="false"><i class="mdi mr-2 mdi-plus-outline"></i><span
                                    class="hide-menu">Добавить места в маршрут</span></a></li>
                        </li><li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="http://roadtourfu.ai-info.ru/frontend/admin_panel_backup/html/index.php?category=deleteroute" aria-expanded="false"><i class="mdi mr-2 mdi-playlist-remove"></i><span
                                    class="hide-menu">Удалить маршрут</span></a></li>
                        </li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation --> 
            </div>
            <!-- End Sidebar scroll-->
        </aside>
    </div>


    
    <?php
    /*
        if($_GET['category'] == "add" || $_GET['category'] == "edit")
        {
            echo '<div id="map"></div>';
        }
        */

    ?>
    <div class="container d-flex justify-content-center align-items-center">
    
    <?php

    if($_GET['category'] == "add")
    {
        echo '<div class="wrapper fadeInDown">';
        echo '<div id="formContent">';
        echo '<form enctype="multipart/form-data" action="add_point.php" method=post class="d-flex flex-column justify-content-center">';
        include("get_categories.php");
        echo '<input type="text" name="name" placeholder="Название здания" class="fadeIn second" />';
        echo '<input type="text" name="name_chinese" placeholder="Название здания (китайский)" class="fadeIn second"/>';
        echo '<input type="text" name="name_english" placeholder="Название здания (английский)" class="fadeIn second"/>';
        echo '<input type="text" name="address" placeholder="Адрес" class="fadeIn second"/>';
        echo '<input type="text" id="latitude" name="latitude" placeholder="Широта" class="fadeIn second"/>';
        echo '<input type="text" id="longitude" name="longitude" placeholder="Долгота" class="fadeIn second"/>';
        echo '<input type="text" name="description" placeholder="Описание" class="fadeIn second"/>';
        echo '<input type="text" name="description_ch" placeholder="Описание на китайском" class="fadeIn second"/>';
        echo '<input type="text" name="description_eng" placeholder="Описание на английском" class="fadeIn second"/>';
        echo '<input type="text" name="classroom" placeholder="Буква аудитории" class="fadeIn second"/>';
        echo '<input type="text" name="contacts" placeholder="Контакты" class="fadeIn second"/>';
        echo '<input type="text" name="site" placeholder="Сайт" class="fadeIn second"/>';
        echo '<div class="d-flex justify-content-center flex-column" style="margin:10px">';
        echo '<label for="file1"><b>Фотография №1</b></label>';	
        echo '<input type="file" id="file1" name="image0" value="Добавление фото"/>';	
        echo '<label for="file2" style="margin-top:10px;"><b>Фотография №2</b></label>';	
        echo '<input type="file" id="file2" name="image1" value="Добавление фото"/>';	
        echo '<label for="file3" style="margin-top:10px;"><b>Фотография №3</b></label>';	
        echo '<input type="file" id="file3" name="image2" value="Добавление фото"/>';
        echo '</div>';
        echo '<input type="submit" name="point_info" value="Добавить" class="fadeIn fourth"/>';
        echo '</form>';
        echo '</div>';
        echo '</div>';

    }        
    elseif($_GET['category'] == "edit")
    {
        function IsRoutedPoint($point_id) {

            $path = "../../../api/config/database.php";

            include_once $path;

            $conn = OpenCon();

            $point_id = intval($point_id);

            $query = "
            SELECT category FROM point WHERE id='$point_id'
            ";

            $result = $conn->query($query); 
            
            if ($result -> num_rows > 0)
            {			
                $data = mysqli_fetch_all($result, MYSQLI_NUM);
            }

            CloseCon($conn);

            return intval($data[0][0]) > 14;
        }

        

        function GetRoutes() {

            $path = "../../../api/config/database.php";

            include_once $path;
        
            $conn = OpenCon();
        
            $language = "0";
        
            $query = "
            SELECT route.route_category_id AS id, route.route_name AS route_name, route_chinese.route_alt_name AS route_alt_name
            FROM route
            INNER JOIN route_chinese
            ON route.route_category_id = route_chinese.id
            ";
            
            try
            {
                $result = $conn->query($query); 
    
                if ($result -> num_rows > 0)
                {				
                    $data = mysqli_fetch_all($result, MYSQLI_NUM);
                    
                    //$response_data = json_decode($data);
                    echo '<div style="margin-top: 2%;"><b>Маршрут: </b></div>';
                    echo '<select name="route" class="custom-select" style="margin: 3% 0%; text-align-last: center;">';
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
                        echo '<select name="category" class="custom-select" style="margin: 3% 0%; text-align-last: center;">';
                        for($i = 0; $i < count($data); $i++)
                        {
                            $title = $data[$i][1];
                            echo '<option value="category_'.$i.'">'.$title.'</option>';
                            //echo $data[$i][1]."<br>";
                            //print_r(array_count_values($data[$i]));
                        }
                        echo '<option value="category_9999999">-Для маршрута-</option>';
                        echo '</select>';
                    }
                }
                catch(Exception $e)
                {
                    echo json_encode(array("message" => $e -> getMessage()), JSON_UNESCAPED_UNICODE);
                }

                CloseCon($conn);
            }

        function GetCategory($code_id) {

            $path = "../../../api/config/database.php";

            include_once $path;

            $conn = OpenCon();

            $language = "0";
            //echo var_dump(IsRoutedPoint($code_id));

            if(!IsRoutedPoint($code_id))
                GetCategories($conn, $language);
            else
                GetRoutes();

            // Getting all points
            
            

        }

        function LoadPoint($point_id) {

            $path = "../../../api/config/database.php";

            $data_array = 0;
            $data_array_chinese = 0;
            $data_array_english = 0;

            include_once $path;

            $conn = OpenCon();

            $query  = "
            SELECT * FROM point WHERE id = '$point_id'
            ";

            try
            {
                $result = $conn->query($query); 

                if ($result -> num_rows > 0)
                {				
                    $data = mysqli_fetch_all($result, MYSQLI_NUM);

                    $json_encoded = json_encode($data[0], JSON_UNESCAPED_UNICODE);

                    $data_array = json_decode($json_encoded);

                    
                    //echo count($json_encoded);	
                }
            }
            catch(Exception $e)
            {
                echo json_encode(array("message" => $e -> getMessage()), JSON_UNESCAPED_UNICODE);
            }

            $query  = "
            SELECT * FROM data_chinese WHERE id = '$point_id'
            ";

            try
            {
                $result = $conn->query($query); 

                if ($result -> num_rows > 0)
                {				
                    $data = mysqli_fetch_all($result, MYSQLI_NUM);

                    $json_encoded = json_encode($data[0], JSON_UNESCAPED_UNICODE);

                    $data_array_chinese = json_decode($json_encoded);
                    
                }
            }
            catch(Exception $e)
            {
                echo json_encode(array("message" => $e -> getMessage()), JSON_UNESCAPED_UNICODE);
            }

            $query  = "
            SELECT * FROM data_english WHERE id = '$point_id'
            ";

            try
            {
                $result = $conn->query($query); 

                if ($result -> num_rows > 0)
                {				
                    $data = mysqli_fetch_all($result, MYSQLI_NUM);

                    $json_encoded = json_encode($data[0], JSON_UNESCAPED_UNICODE);

                    $data_array_english = json_decode($json_encoded);
                    
                }
            }
            catch(Exception $e)
            {
                echo json_encode(array("message" => $e -> getMessage()), JSON_UNESCAPED_UNICODE);
            }
                    
            echo '<input type="text" name="name" value="'.$data_array[3].'" class="fadeIn second"/>';
            echo '<input type="text" name="name_chinese" value="'.$data_array_chinese[1].'" class="fadeIn second"/>';
            echo '<input type="text" name="name_english" value="'.$data_array_english[1].'" class="fadeIn second"/>';
            
            echo '<input type="text" name="description" value="'.$data_array[4].'" class="fadeIn second"/>';
            echo '<input type="text" name="description_ch" value="'.$data_array_chinese[2].'" class="fadeIn second"/>';
            echo '<input type="text" name="description_eng" value="'.$data_array_english[2].'" class="fadeIn second"/>';

            echo '<input type="text" name="address" value="'.$data_array[7].'" class="fadeIn second"/>';
            echo '<input type="text" id="latitude" name="latitude" value="'.$data_array[1].'" class="fadeIn second"/>';
            echo '<input type="text" id="longitude" name="longitude" value="'.$data_array[2].'" class="fadeIn second"/>';
            echo '<input type="text" name="classroom" value="'.$data_array[6].'" class="fadeIn second"/>';
            echo '<input type="text" name="contacts" value="'.$data_array[8].'" class="fadeIn second"/>';
            echo '<input type="text" name="site" value="'.$data_array[9].'" class="fadeIn second"/>';
            echo '<div class="d-flex justify-content-center flex-column" style="margin:10px">';
            echo '<label for="file1"><b>Фотография №1</b></label>';
            echo '<input type="file" id="file1" name="image0" value="Добавление фото"/>';
            echo '<label for="file2" style="margin-top:10px;"><b>Фотография №2</b></label>';
            echo '<input type="file" id="file2" name="image1" value="Добавление фото"/>';
            echo '<label for="file3" style="margin-top:10px;"><b>Фотография №3</b></label>';
            echo '<input type="file" id="file3" name="image2" value="Добавление фото"/>';
            echo '</div>';            
            echo '<input type="submit" name="point_info" value="Изменить" class="fadeIn fourth"/>';	

            CloseCon($conn);
        }
        
        echo '<div class="wrapper fadeInDown">';
        echo '<div id="formContent">';
        echo '<form enctype="multipart/form-data" action="http://roadtourfu.ai-info.ru/frontend/admin_panel_backup/html/update_point.php" method=post>';
        include("get_points.php");
        if(isset($_GET['point']))
            GetCategory($_GET['point']);
        else
            GetCategory(0);
        if(isset($_GET['point']))
        {
            $message = $_GET['point'];
            //echo "<script type='text/javascript'>alert('$message');</script>";
            LoadPoint($message);
        }
        echo '</form>';
        echo '</div>';
        echo '</div>'; 

        
        /*echo '<form action="reset_choice.php" method=POST>';
        echo '<input name="edit" type="submit" value="Вернуться">';
        echo '</form>';*/

    }
    elseif($_GET['category'] == "delete")
    {
        echo '<form method="post" action="delete_points.php">';
        echo '<p><b>Выберите точки для удаления</b></p>';

        include("get_all_points.php");

        echo '<p><input type="submit" value="Удалить"></p>';
        echo '</form>';


        /*echo '<form action="reset_choice.php" method=POST>';
        echo '<input name="delete" type="submit" value="Вернуться">';
        echo '</form>';*/
    }
    elseif($_GET['category'] == "addroute") {

        echo '<div class="wrapper fadeInDown">';
        echo '<div id="formContent">';
        echo '<form action="add_route.php" method=post class="d-flex flex-column justify-content-center">';
        echo '<input type="text" name="name" placeholder="Название маршрута" class="fadeIn second" />';
        echo '<input type="text" name="name_chinese" placeholder="Название маршрута (китайский)" class="fadeIn second"/>';
        echo '<input type="text" name="name_english" placeholder="Название маршрута (английский)" class="fadeIn second"/>';
        echo '<input type="submit" name="point_info" value="Добавить" class="fadeIn fourth"/>';
        echo '</div>';
        echo '</form>';
        echo '</div>';
        echo '</div>';

    }
    elseif($_GET['category'] == "addpoints") {

        echo '<div class="wrapper fadeInDown">';
        echo '<div id="formContent">';
        echo '<form action="add_points_to_route.php" method=post class="d-flex flex-column justify-content-center">';
        include("get_routes.php");
        include("get_route_points.php");
        echo '<input type="submit" name="point_info" value="Добавить" class="fadeIn fourth""/>';
        echo '</div>';
        //echo '<input type="submit" name="point_info" value="Добавить" class="fadeIn fourth""/>';
        echo '</form>';
        echo '</div>';
        echo '</div>';
    }
    elseif($_GET['category'] == 'deleteroute') {

        echo '<div class="wrapper fadeInDown">';
        echo '<div id="formContent">';
        echo '<h4><b>ВНИМАНИЕ. </b>Удаление маршрута не удалит точки, находящиеся в нём</h4>';
        echo '<form action="delete_route.php" method=post>';
        echo '<input type="checkbox" name="insta_delete" class="delete_input" value="checkbox">Удалить вместе с точками<Br>';
        include("get_routes.php");
        echo '<input type="submit" name="point_info" value="Удалить" class="fadeIn fourth"/>';
        echo '</div>';
        echo '</form>';
        echo '</div>';
        echo '</div>';
    }
?>       
    <?php
        if($_GET['category'] == "add" || $_GET['category'] == "edit")
        {
            echo '<div id="map"></div>';
        }

    ?>
    
    <script>

        var activities = document.getElementById("points_selector");
        activities.addEventListener("change", function() {
            var value = activities.value;
            window.location.replace("http://roadtourfu.ai-info.ru/frontend/admin_panel_backup/html/index.php?category=edit&point=" + value);
        });
    </script>
    </div>

    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="../assets/plugins/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../assets/plugins/popper.js/dist/umd/popper.min.js"></script>
    <script src="../assets/plugins/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="js/app-style-switcher.js"></script>
    <script src="js/popper.min.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <!-- chartist chart -->
    <script src="../assets/plugins/chartist-js/dist/chartist.min.js"></script>
    <script src="../assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js"></script>
    <!--c3 JavaScript -->
    <script src="../assets/plugins/d3/d3.min.js"></script>
    <script src="../assets/plugins/c3-master/c3.min.js"></script>
    <!--Custom JavaScript -->
    <script src="js/pages/dashboards/dashboard1.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>