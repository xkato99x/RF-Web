<?php
if(isset($_POST["submit"])){
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false){
        $direccion = $_POST['direccion'];
        $precio = $_POST['precio'];
        $descripcion = $_POST['descripcion'];
        $image = $_FILES['image']['tmp_name'];
        $imgContent = addslashes(file_get_contents($image));
        // echo $direccion . " ," . $precio . " ," . $descripcion . " ," . $image . " ";
        
        //DB details
        $dbHost     = 'localhost';
        $dbUsername = 'root';
        $dbPassword = 'pass12345';
        $dbName     = 'inmuebles';
        
        //Create connection and select DB
        $db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
        
        // Check connection
        if($db->connect_error){
            die("Connection failed: " . $db->connect_error);
        }
        
        $dataTime = date("Y-m-d H:i:s");
        
        //Insert image content into database
        $insert = $db->query("INSERT into inmuebles (direccion, precio, descripcion, imagen) VALUES ('$direccion', '$precio', 'descripcion', '$imgContent')");
        if($insert){
            echo "File uploaded successfully.";
        }else{
            echo "File upload failed, please try again.";
        } 
    }else{
        echo "Please select an image file to upload.";
    }
} else{
    echo "what";
}
?>