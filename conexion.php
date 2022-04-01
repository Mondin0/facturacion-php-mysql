<?php 
    function conectar(){
        $servidor= "localhost";
        $usuario= "root";
        $pass= "";
        $db="facturacion";
        $conn=mysqli_connect($servidor,$usuario,$pass,$db);
        if(!$conn){
            die("Fallo de conexión a Base de datos: ".mysqli_connect_error());
        }else{
            return $conn;
        }
    }
?>