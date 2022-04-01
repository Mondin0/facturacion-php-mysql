<?php 
    include("../conexion.php");
    $conn =conectar();
    $id= $_GET["id"];
    $sql="UPDATE `facturacion`.`clientes` SET `anulado` = 1 WHERE `clientes`.`id_cliente` = $id;";

    if(mysqli_query($conn, $sql)){
        header("Location: clientes.php");
    }else{
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    };
    mysqli_close($conn);
?>