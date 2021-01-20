<?php

include_once "../../../api/config/database.php";

$conn = OpenCon();

//echo $_FILES['image0']["tmp_name"];


/*$id = 89;
$folder = "POINT_".$id."/";
$id2 = 0;
$image_name = "image".$id2;
echo $_FILES[$image_name]['name'];
$full_path = $folder.$_FILES['$image_name']['name'];

echo $full_path;*/
//echo var_dump($_FILES);
/*echo $_FILES['image0']['name']."<br>";
echo $_FILES['image1']['size']."<br>";
echo $_FILES['image2']['type']."<br>";*/

AddPoint($conn);

function AddPoint($conn)
{
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

    $inserted_id = 0;

    $sql = "
    INSERT INTO point (latitude, longitude, name, description, category, classroom, address, contacts, site)
        VALUES ('$lat', '$lon', '$name', 'description', '$category', '$classroom', '$address', '$contacts', '$site')";

    if ($conn->query($sql) === TRUE) {
        $inserted_id = $conn->insert_id;
        //echo "New record created successfully";
        } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        }
    //------------------------
    $sql = "
    INSERT INTO data_chinese (id, name, description)
        VALUES ('$inserted_id', '$name_chinese', 'chinese description')";

    if ($conn->query($sql) === TRUE) {
        //echo "New record created successfully";
        } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        }
    //------------------------
    $sql = "
    INSERT INTO data_english (id, name, description)
        VALUES ('$inserted_id', '$name_english', 'english description')";

    if ($conn->query($sql) === TRUE) {
        //echo "New record created successfully";
        } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        }

    
    $folder = "POINT_".$inserted_id;

    $full_directory = "../../../image/".$folder;
    
    mkdir($full_directory);

    $folder = $folder."/";
    

    for($i = 0; $i < count($_FILES); $i++) {

        $image_name = "image".$i;

        $full_path = $folder.$_FILES[$image_name]['name'];
        
        $sql = "
        INSERT INTO point_photoes (point_id, photo)
            VALUES ('$inserted_id', '$full_path')";

        if ($conn->query($sql) === TRUE) {
            //echo "New record created successfully";
            } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
            }

        move_uploaded_file($_FILES[$image_name]['tmp_name'], $full_directory."/".$_FILES[$image_name]['name']);

    }

    CloseCon($conn);
    echo '<meta http-equiv="refresh" content="0; url=http://roadtourfu.ai-info.ru/frontend/admin_panel/html/index.php?category=add" />';
}

?>