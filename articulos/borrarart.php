<?php 
    include("../conexion.php");
    $conn =conectar();
    $id= $_GET["id"];
    $sql="UPDATE `facturacion`.`articulos` SET `anulado` = 1 WHERE `articulos`.`id_art` = $id;";

    if(mysqli_query($conn, $sql)){
        header("Location: articulos.php");
    }else{
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    };
    mysqli_close($conn);
?>