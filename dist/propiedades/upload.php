<?php
if(isset($_POST["submit"])){
    try {
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if ($check !== false) {
            $dbHost = 'localhost';
            $dbUsername = 'root';
            $dbPassword = 'pass12345';
            $dbName = 'inmuebles';
            $db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

            $direccion = $_POST['direccion'];
            $precio = $_POST['precio'];
            $descripcion = $_POST['descripcion'];
            $tipo = substr($_POST['tipoIn'], 0, -2);
            // echo $tipo;

            $imgData = file_get_contents($_FILES['image']['tmp_name']);
            $imgType = $_FILES['image']['type'];
            $sql = "INSERT INTO inmuebles(direccion, precio, descripcion, imagen, imagen_tipo, tipo) VALUES(?, ?, ?, ?, ?, ?)";
            $statement = $db->prepare($sql);
            $statement->bind_param('ssssbs', $direccion, $precio, $descripcion, $imgData, $imgType, $tipo);
            $current_id = $statement->execute() or die("<b>Error:</b> Problem on Image Insert<br/>" . mysqli_connect_error());

            echo $direccion . "\n";
            header("Content-type: " . $imgType);
            echo $imgData;
            // $image = $_FILES['image']['tmp_name'];
            // $imgContent = addslashes(file_get_contents($image));
            // echo $direccion . " ," . $precio . " ," . $descripcion . " ," . $image . " ";


            //     // Check connection
            //     if($db->connect_error){
            //         die("Connection failed: " . $db->connect_error);
            //     }

            //     //Insert image content into database
            //     $insert = $db->query("INSERT INTO inmuebles (direccion, precio, descripcion, imagen) 
            //         VALUES ('$direccion', '$precio', 'descripcion', '$imgContent')");
            //     if($insert){
            //         echo "File uploaded successfully.";
            //     }else{
            //         echo "File upload failed, please try again.";
            //     } 
            // }else{
            //     echo "Please select an image file to upload.";
        }
    } catch(ValueError $e){
        // echo "entra try catch";
        require("propiedades.php");
    }
} else{
    echo "Error";
};
?>