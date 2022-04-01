<?php 
    include("../conexion.php");
    $conn =conectar();
    //recibimos datos de formulario con post
    $id=$_POST["id_art"];
    $descripcion=$_POST["descripcion"];
    $codbar=$_POST["codbar"];
    $costo=$_POST["costo"];
    $precio=$_POST["precio"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./styles/style.css">
    <title>Insertar</title>
</head>
<body> 
    <?php
    if( $descripcion == NULL or $codbar == NULL or $costo == NULL or $precio == NULL){
        echo "<br>";
        echo "<div class=\"alert alert-danger\" role=\"alert\">Faltaron datos</div>";
        echo "<script type=\"text/javascript\"\>setTimeout( function() { window.location.href = \"articulos.php\"; }, 2000 );</script>";
        return;
    }else{
        $sql = "UPDATE `facturacion`.`articulos`  SET `descripcion`='$descripcion',`codbar`='$codbar',`costo`='$costo', `precio`='$precio' WHERE `id_art`=$id;";     
    };
    $query=mysqli_query($conn, $sql);
    if($query){
        echo '<script languaje="javascript">';
        echo 'opener.location.reload();';
        echo 'window.close();';
        echo '</script>';
    };
    ?>
</body>
</html>