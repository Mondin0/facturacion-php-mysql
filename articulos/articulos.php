<?php 
   
    include("../conexion.php");
    $conn= conectar();

    $sql= "SELECT * FROM `articulos` WHERE `anulado`=0;";
    $query=mysqli_query($conn,$sql);

    $row = mysqli_fetch_array($query); //guarda un array con los datos.
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
    <script type="text/javascript">
    function popUp(URL) {
        window.open(URL, 'Editar cliente', 'toolbar=0,scrollbars=0,location=0,statusbar=0,menubar=0,resizable=1,width=3000,height=5000,left = 3000,top = 100');
    }
    </script>
    <title>Artículos</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="text-center " id="jumbo" style="background: #fe8c00;  /* fallback for old browsers */background: -webkit-linear-gradient(to right, #f83600, #fe8c00);  /* Chrome 10-25, Safari 5.1-6 */background: linear-gradient(to right, #f83600, #fe8c00); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */">
                <h1 class="display-1"> <u> Artículos </u> </h1><br>
            </div>
            
            <div class="row text-center">
                <button type="button" class="btn btn btn-outline-secondary btn-lg" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Agregrar nuevo artículo</button>

                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Nuevo Artículo</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                            <form action="insertarart.php" method="post">
                                <label class="form-label lead" >Descripcion </label> <br>
                                <input type="text" name="descripcion" required > <br>
                                <label class="form-label lead" >Codigo de barras</label> <br>
                                <input type="text" name="codbar" required > <br>
                                <label class="form-label lead">Costo </label><br>
                                <input type="text" name="costo" required ><br>
                                <label class="form-label lead">Precio </label><br>
                                <input type="text" name="precio" required ><br><br>
                                <button type="submit" class="btn btn-primary">Agregar</button>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div id="div2" class="col-md-8 col-xs-12">
                <h1 class="display-5 text-center">Lista de artículos</h1><br>
            
                <table class="table table-dark ">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Descripción</th>
                            <th>Codigo de barras</th>
                            <th>Costo</th>
                            <th>Precio</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($row = mysqli_fetch_array($query)){?>
                        <tr>
                            <th><?php  echo $row["id_art"];?></th>
                            <th><?php echo $row["descripcion"];?></th>
                            <th><?php echo $row["codbar"];?></th>
                            <th>$<?php echo $row["costo"];?></th>
                            <th>$<?php echo $row["precio"];?></th>
                            <th><a class="btn btn-outline-primary" href=javascript:popUp("editarart.php?id=<?php echo $row["id_art"];?>")>Editar</a></th>
                            <th><a class="btn btn-outline-danger" onclick="return confirm('¿Desea eliminar el artículo?')" href="borrarart.php?id=<?php echo $row["id_art"];?>">Eliminar</a></button></th>
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <a  type="button" class="btn btn btn-outline-secondary btn-lg" href="../indice.php">Volver al indice</a>
        </div>
    </div>
</body>
</html>
