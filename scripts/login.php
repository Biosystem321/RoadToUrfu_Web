<?php

session_start();

include_once "../../api/config/database.php";

$conn = OpenCon();

$login = $_POST['login'];

$pass = $_POST['pass'];

Login($conn, $login, $pass);

function Login($conn, $login, $pass)
{
    $pass = md5($pass);

    $query = "
    SELECT password FROM users WHERE login = '$login'
    ";

    try
    {
        $result = $conn->query($query);

        if ($result -> num_rows > 0)
        {				
            $data = mysqli_fetch_all($result, MYSQLI_ASSOC);

            $password_from_database = $data[0]["password"];
            
            if($pass === $password_from_database)
            {
                setcookie("login", "login", time()+60*60*24*30, '/');

                $_SESSION["auth"] = true;

                echo '<meta http-equiv="refresh" content="0; url=http://roadtourfu.ai-info.ru/frontend/admin_panel_backup/html/index.php?category=add" />';
            }
            else
                echo "Неверный логин или пароль";
        }
    }
    catch(Exception $e)
    {
        echo $e -> getMessage();
    }
}

?>