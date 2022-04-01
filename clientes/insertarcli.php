<?php 
    include("../conexion.php");
    $conn =conectar();
    //recibimos datos de formulario con post
    $nombres=$_POST["nombres"];
    $domicilio=$_POST["domicilio"];
    $localidad=$_POST["localidad"];
    $provincia=$_POST["provincia"];
    $telefono=$_POST["telefono"];
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

    if( $nombres == NULL or $domicilio == NULL or $localidad == NULL or $provincia == NULL or $telefono == NULL){
        echo "<br>";
        echo "<div class=\"alert alert-danger\" role=\"alert\">Faltaron datos</div>";
        echo "<script type=\"text/javascript\"\>setTimeout( function() { window.location.href = \"persona.php\"; }, 2000 );</script>";
        return;
    }
    else{
        $sql = "INSERT INTO `facturacion`.`clientes`(`nombres`, `domicilio`, `localidad`, `provincia`, `telefono`, `anulado`) VALUES ('$nombres','$domicilio','$localidad','$provincia','$telefono',0)";
    };

    echo "<br>";
    if (mysqli_query($conn, $sql)) {
        echo "<div class=\"alert alert-success\" role=\"alert\">Nuevo cliente agregado correctamente</div>";
        //redireccionamos tras 2 segundos
        echo "<script type=\"text/javascript\"\>setTimeout( function() { window.location.href = \"clientes.php\"; }, 2000 );</script>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    };
    mysqli_close($conn);
    ?>

</body>
</html>