<?php
    $con=mysqli_connect("example.com","peter","abc123","my_db");
    // Check connection
    if (mysqli_connect_errno())
    {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    
    $result = mysqli_query($con,"SELECT * FROM Inmuebles");
    
    while($row = mysqli_fetch_array($result))
    {
        echo "<article class='astro-MGDH35U5'>";
        echo "<img src=".$row["imagen"]." alt='imagen de la propiedad' class='astro-MGDH35U5'/>";
        echo "<h2>".$row["nombre"]."</h2>";
        echo "<p class='astro-MGDH35U5'>".$row["descripcion"]."</p>";
        echo "<p class='astro-MGDH35U5'>".$row["precio"]."</p>";
        echo "</article>";
    }
    
    mysqli_close($con);
