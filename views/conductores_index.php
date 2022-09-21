<?php 
    include "header/header.php";
?>
    <br>
    <div class="container-fluid row">
        <form class="col-4 p-3" method="POST">
            <h4 class="text-center text-secondary">Registro de Conductores </h4>
            <?php 
                include "../models/conexion.php";
                include "../controllers/conductores_controllers.php"
            ?>
            <div class="mb-3">
                <label class="form-label">Número de Cedula</label>
                <input type="text" class="form-control" name="cedulaConductor">
            </div>
            <div class="mb-3">
                <label class="form-label">Nombre Completo</label>
                <input type="text" class="form-control" name="nombresConductor">
            </div>
            <div class="mb-3">
                <label class="form-label">Apellidos</label>
                <input type="text" class="form-control" name="apellidosConductor">
            </div>
            <div class="mb-3">
                <label class="form-label">Dirección</label>
                <input type="text" class="form-control" name="direccionConductor">
            </div>
            <div class="mb-3">
                <label class="form-label">Teléfono</label>
                <input type="text" class="form-control" name="telefonoConductor">
            </div>
            <div class="mb-3">
                <label class="form-label">Ciudad</label>
                <input type="text" class="form-control" name="ciudadConductor">
            </div>
            <button type="submit" class="btn btn-primary" name="btnregistrarconductor" value="ok">Registrar</button>
        </form>
        
        <div class="col-8 p-4">
            <table class="table table-hover">
            <h4 class="text-center text-secondary">Conductores </h4>
            <br>
                <thead>
                    <tr>
                        <th scope="col">Cedula</th>
                        <th scope="col">Nombre Completo</th>
                        <th scope="col">Apellidos</th>
                        <th scope="col">Dirección</th>
                        <th scope="col">Teléfono</th>
                        <th scope="col">Ciudad</th>
                    </tr>                    
                </thead>
                <tbody>
                    <?php 
                        include "../models/conexion.php";
                        $sql = $conexion->query(" select * from conductores ");
                        while($datos=$sql->fetch_object()){ 
                    ?>
                        <tr>
                            <th scope="row"> <?= $datos->cedula ?> </th>
                            <td> <?= $datos->nombre ?> </td>
                            <td> <?= $datos->apellido ?> </td>
                            <td> <?= $datos->direccion ?> </td>
                            <td> <?= $datos->telefono ?> </td>
                            <td> <?= $datos->ciudad ?> </td>
                        </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>
</html>
