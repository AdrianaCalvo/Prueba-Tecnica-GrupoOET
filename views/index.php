<?php 
    include "header/header.php";
?>
<div class="container-fluid row justify-content-center">
    <div class="col-8 p-4">
    <h4 class="text-center text-secondary">Informe General de los Vehículos</h4>
    <?php 
        include "../models/conexion.php";
    ?>
    <br>
        <table class="table table-hover">        
            <thead>
                <tr>
                    <th scope="col">Placa</th>
                    <th scope="col">Marca</th>
                    <th scope="col">Cc del Propetario</th>
                    <th scope="col">Nombre del Propetario</th>
                    <th scope="col">Cc del Conductor</th>
                    <th scope="col">Nombre del Conductor</th>                    
                </tr>                    
            </thead>
            <tbody>
                <?php 
                    include "../models/conexion.php";
                    $sql = $conexion->query(" SELECT v.marca, 
                                                    v.placa, 
                                                    v.cc_propietario,
                                                    v.cc_conductor,
                                                    p.nombre_propietario,
                                                    c.nombre
                                            FROM vehiculos AS v
                                            INNER JOIN propietario AS p 
                                            ON  v.cc_propietario = p.cedula                                             
                                            INNER JOIN conductores AS c
                                            ON v.cc_conductor = c.cedula; ");
                    while($datos=$sql->fetch_object()){ 
                ?>
                    <tr>
                        <th scope="row"> <?= $datos->placa ?> </th>
                        <td> <?= $datos->marca ?> </td>
                        <td> <?= $datos->cc_propietario ?> </td>
                        <td> <?= $datos->nombre_propietario ?> </td>
                        <td> <?= $datos->cc_conductor ?> </td>
                        <td> <?= $datos->nombre ?> </td>
                    </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>