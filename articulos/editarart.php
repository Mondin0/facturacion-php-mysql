<?php 
    include("../conexion.php");
    $conn =conectar();

    $id=$_GET["id"];
    $sql= "SELECT * FROM `facturacion`.`articulos` WHERE `id_art`=$id;";
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
    <form action="updateart.php" method="post">
        <br>
        <h1 class="display-5">Actualizar artículo</h1>
        <input type="hidden" name="id_art" value="<?php echo $row["id_art"] ?>" readonly> <br>
        Descripción <br>
        <input type="text" name="descripcion" value="<?php echo $row["descripcion"] ?>" required> <br>
        Codigo de barras <br>
        <input type="text" name="codbar" value="<?php echo $row["codbar"] ?>" required> <br>
        Costo <br>
        <input type="text" name="costo" value="<?php echo $row["costo"] ?>" required> <br>
        Precio <br>
        <input type="text" name="precio" value="<?php echo $row["precio"] ?>" required> <br>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
    <a href="articulos.php">Volver</a>
</body>
</html>