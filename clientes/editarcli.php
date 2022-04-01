<?php 
    include("../conexion.php");
    $conn =conectar();

    $id=$_GET["id"];
    $sql= "SELECT * FROM `facturacion`.`clientes` WHERE `id_cliente`=$id;";
    $query=mysqli_query($conn,$sql);

    $row = mysqli_fetch_array($query);      
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
    <title>Document</title>
</head>
<body>
    <form action="updatecli.php" method="post">
        <br>
        <h1 class="display-5">Actualizar cliente</h1>
        <input type="hidden" name="id_cliente" value="<?php echo $row["id_cliente"] ?>" readonly> <br>
        Nombres <br>
        <input type="text" name="nombres" value="<?php echo $row["nombres"] ?>" required> <br>
        Domicilio <br>
        <input type="text" name="domicilio" value="<?php echo $row["domicilio"] ?>" required> <br>
        Localidad <br>
        <input type="text" name="localidad" value="<?php echo $row["localidad"] ?>" required> <br>
        Provincia <br>
        <input type="text" name="provincia" value="<?php echo $row["provincia"] ?>" required> <br>
        Teléfono <br>
        <input type="text" name="telefono" value="<?php echo $row["telefono"] ?>" required> <br>
        <br>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
    <a href="clientes.php">Volver</a>
</body>
</html>

