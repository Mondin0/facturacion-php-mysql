<?php 
   
    include("../conexion.php");
    $conn= conectar();

    $sql= "SELECT * FROM `clientes` WHERE `anulado`=0;";
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
    <script>
        /*
        //===================== TOMAMOS EL EVENTO SUBMIT DEL FORMULARIO ===================
        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById("formCli").addEventListener('submit', validarFormulario); 
        });

        // ======== DEFINIMOS LA FUNCIÓN QUE SE EJECUTE CUANDO SE ENVIE EL FORMULARIO =======

        function validarFormulario(evento){
            evento.preventDefault(); // prevenimos el envio por default

            // VALIDAMOS VARIABLE POR VARIABLE, si falta alguna, return

            var nombres = document.getElementById('nombres');
            if(nombres.value == ''|| nombres.value == null ){
                alert('El campo nombres es obligatorio');
                nombres.focus();
                return;
            };
            var domicilio = document.getElementById('domicilio');
            if (domicilio.value == ''|| domicilio.value == null){
                alert('El campo domicilio es obligatorio');
                domicilio.focus();
                return;
            };
            var localidad = document.getElementById('localidad');
            if (localidad.value == ''|| localidad.value == null ){
                alert('El campo localidad es obligatorio');
                localidad.focus();
                return;
            };
            var provincia = document.getElementById('provincia');
            if (provincia.value == ''|| provincia.value == null ){
                alert('El campo provincia es obligatorio');
                provincia.focus();
                return;
            };
            var telefono = document.getElementById('telefono');
            if (telefono.value == ''|| telefono.value == null){
                alert('El campo telefono es obligatorio');
                telefono.focus();
                return;
            };

            // SI TODO ESTA COMPLETO, SE ENVIA  EL FORMULARIO

            alert("Muchas gracias por enviar el formulario");
            this.submit();
        }; */
    </script>
    <title>Clientes</title>
</head>
<body>
<?php
if (isset($_POST['nombres']))
{
    $nombres = $_POST['nombres'];
    $domicilio = $_POST['domicilio'];
    $localidad = $_POST['localidad'];
    $provincia = $_POST['provincia'];
    $telefono = $_POST['telefono'];
    
    if( $nombres == NULL or $domicilio == NULL or $localidad == NULL or $provincia == NULL or $telefono == NULL){
        echo "<br>";
        echo "<div class=\"alert alert-danger\" role=\"alert\">Faltaron datos</div>";
        echo "<script type=\"text/javascript\"\>setTimeout( function() { window.location.href = \"clientes.php\"; }, 2000 );</script>";
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
}
else
{
?>
<div class="container-fluid ">
<div class="row align-items-center">
    <div class="text-center " id="jumbo" style="background: #12c2e9;  /* fallback for old browsers */ background: -webkit-linear-gradient(to right, #f64f59, #c471ed, #12c2e9);  /* Chrome 10-25, Safari 5.1-6 */ background: linear-gradient(to right, #f64f59, #c471ed, #12c2e9); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */">
        <h1 class="display-1"> <u> Clientes </u> </h1><br>
    </div>
    <br>
    <div class="row text-center">
        <button type="button" class="btn btn btn-outline-secondary btn-lg" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Agregrar nuevo cliente</button>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Nuevo cliente</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form action="clientes.php" method="post" name="fvalida" id="formCli">
                    <label class="form-label lead" >Nombres </label> <br>
                    <input type="text" name="nombres"  id="nombres" > <br>
                    <label class="form-label lead" >Domicilio</label> <br>
                    <input type="text" name="domicilio"  id="domicilio" > <br>
                    <label class="form-label lead">Localidad </label><br>
                    <input type="text" name="localidad"  id="localidad" ><br>
                    <label class="form-label lead">Provincia </label><br>
                    <input type="text" name="provincia"  id="provincia"><br>
                    <label class="form-label lead">Teléfono </label><br>
                    <input type="text" name="telefono"  id="telefono"><br><br>
                    <button type="submit" class="btn btn-primary" >Agregar</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<div class="row justify-content-center">                
    <div id="div2" class="col-md-8 col-xs-12 justify-content-center">
        <table class="table table-dark ">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombres</th>
                    <th>Domicilio</th>
                    <th>Localidad</th>
                    <th>Provincia</th>
                    <th>Teléfono</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = mysqli_fetch_array($query)){?>
                <tr>
                    <th><?php  echo $row["id_cliente"];?></th>
                    <th><?php echo $row["nombres"];?></th>
                    <th><?php echo $row["domicilio"];?></th>
                    <th><?php echo $row["localidad"];?></th>
                    <th><?php echo $row["provincia"];?></th>
                    <th><?php echo $row["telefono"];?></th>
                    <th>
                        <a class="btn btn-outline-primary" href=javascript:popUp("editarcli.php?id=<?php echo $row["id_cliente"];?>")>Editar</a>
                    </th>
                    <th><a class="btn btn-outline-danger" onclick="return confirm('¿Desea eliminar al cliente?')" href="borrarcli.php?id=<?php echo $row["id_cliente"];?>">Eliminar</a></button></th>
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
<?php
}

?>
<script src="../js/app.js"></script> 
</body>
</html>

