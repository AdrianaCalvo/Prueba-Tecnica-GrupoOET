<?php 
    include "header/header.php";
?>

<body>
    <br>
    <div class="container-fluid row">
        <form class="col-4 p-3" method="POST">
            <h4 class="text-center text-secondary">Registro de vehículos </h4>
            <?php 
                include "../models/conexion.php";
                include "../controllers/vehiculos_controllers.php"
            ?>
            <div class="mb-3">
                <label class="form-label">Placa</label>
                <input type="text" class="form-control" name="placa">
            </div>
            <div class="mb-3">
                <label class="form-label">Color</label>
                <input type="text" class="form-control" name="color">
            </div>
            <div class="mb-3">
                <label class="form-label">Marca</label>
                <input type="text" class="form-control" name="marca">
            </div>
            <div class="mb-3">
                <select class="form-select" aria-label="Default select example" name="tipo">
                    <option selected>Tipo de vehículo</option>
                    <option value="1">Particular</option>
                    <option value="2">Público</option>
                </select>
            </div>
            <div class="mb-3">
                <select class="form-select" aria-label="Default select example" name="cc_propietario">
                    <option selected>Propietario</option>
                    <?php 
                        $sql = $conexion->query(" select cedula from propietario ");
                        while ($valores = mysqli_fetch_array($sql)) {                        
                            echo '<option value="'.$valores[cedula].'">'.$valores[cedula].'</option>';
                        }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <select class="form-select" aria-label="Default select example" name="cc_conductor">
                    <option selected>Conductor</option>
                    <?php 
                        $sql = $conexion->query(" select cedula from conductores ");
                        while ($valores = mysqli_fetch_array($sql)) {                        
                            echo '<option value="'.$valores[cedula].'">'.$valores[cedula].'</option>';
                        }
                    ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary" name="btnregistrar" value="ok">Registrar</button>
        </form>
        
        <div class="col-8 p-4">
            <table class="table table-hover">
            <h4 class="text-center text-secondary">Vehículos</h4>
            <br>
                <thead>
                    <tr>
                        <th scope="col">Placa</th>
                        <th scope="col">Color</th>
                        <th scope="col">Marca</th>
                        <th scope="col">Tipo de vehículo</th>
                        <th scope="col">Propietario</th>
                        <th scope="col">Conductor</th>
                    </tr>                    
                </thead>
                <tbody>
                    <?php 
                        $sql = $conexion->query(" select * from vehiculos ");
                        while($datos=$sql->fetch_object()){ 
                    ?>
                        <tr>
                            <th scope="row"> <?= $datos->id ?> </th>
                            <td> <?= $datos->placa ?> </td>
                            <td> <?= $datos->color ?> </td>
                            <td> <?= $datos->marca ?> </td>
                            <td> <?= $datos->tipo ?> </td>
                            <td> <?= $datos->cc_propietario ?> </td>
                            <td> <?= $datos->cc_conductor ?> </td>
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