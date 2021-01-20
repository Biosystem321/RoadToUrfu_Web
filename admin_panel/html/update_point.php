<?php

include_once "../../../api/config/database.php";

$conn = OpenCon();

//echo var_dump($_FILES);
//echo var_dump($_FILES);

UpdatePoint($conn);

function UpdatePoint($conn)
{
    $point_id = $_POST['point'];

    $category = $_POST['category'];

    $category = explode('_', $category);
    $category = $category[1];

    $name = $_POST['name'];
    $name_chinese = $_POST['name_chinese'];
    $name_english = $_POST['name_english'];
    $address = $_POST['address'];
    $lat = $_POST['latitude'];
    $lon = $_POST['longitude'];
    $classroom = $_POST['classroom'];
    $contacts = $_POST['contacts'];
    $site = $_POST['site'];
    $folder = $_POST['folder'];

    $inserted_id = 0;


    $sql = "
    UPDATE point SET 
    latitude='$lat', longitude='$lon', name='$name', description='Description', category = '$category', classroom = '$classroom', address = '$address', contacts = '$contacts', site = '$site'
    WHERE id='$point_id'";

    /*$sql = "
    INSERT INTO point (latitude, longitude, name, description, category, classroom, address, contacts, site)
        VALUES ('$lat', '$lon', '$name', 'description', '$category', '$classroom', '$address', '$contacts', '$site')";*/

    if ($conn->query($sql) === TRUE) {
        $inserted_id = $conn->insert_id;
        //echo "New record created successfully";
        } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        }
    //------------------------
    $sql = "
    UPDATE data_chinese SET
    name = '$name_chinese', description = 'chinese description'
    WHERE id='$point_id'";

    if ($conn->query($sql) === TRUE) {
        //echo "New record created successfully";
        } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        }
    //------------------------
    $sql = "
    UPDATE data_english SET
    name = '$name_english', description = 'english description'
    WHERE id='$point_id'";

    if ($conn->query($sql) === TRUE) {
        //echo "New record created successfully";
        } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        }

        if(strlen($_FILES['image0']['tmp_name']) > 0 && strlen($_FILES['image1']['tmp_name']) > 0 && strlen($_FILES['image2']['tmp_name']) > 0) {

        $folder = "POINT_".$point_id;

        $full_directory = "../../../image/".$folder;

        $files = scandir($full_directory);

        unlink($full_directory."/".$files[4]);

        unlink($full_directory."/".$files[3]);

        unlink($full_directory."/".$files[2]);

        rmdir($full_directory);

        //echo 'Folder has been removed';


        $folder = "POINT_".$point_id;

        $full_directory = "../../../image/".$folder;
        
        mkdir($full_directory);

        $folder = $folder."/";
        

        for($i = 0; $i < count($_FILES); $i++) {

            //echo 'In loop';

            $image_name = "image".$i;

            $full_path = $folder.$_FILES[$image_name]['name'];
            
            $sql = "
            UPDATE point_photoes SET photo = '$full_path'
                WHERE point_id='$point_id'";

            
            //echo $sql;

            if ($conn->query($sql) === TRUE) {
                //echo "New record created successfully";
                } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
                }

            move_uploaded_file($_FILES[$image_name]['tmp_name'], $full_directory."/".$_FILES[$image_name]['name']);

        }
    }

    CloseCon($conn);
    echo '<meta http-equiv="refresh" content="0; url=http://roadtourfu.ai-info.ru/frontend/admin_panel/html/index.php?category=edit&point=0" />';
}

?>