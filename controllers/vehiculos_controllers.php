<?php
    if(!empty($_POST["btnregistrar"])) {
        if(!empty($_POST["placa"]) and !empty($_POST["color"]) and !empty($_POST["marca"]) and !empty($_POST["tipo"]) and !empty($_POST["cc_propietario"]) and !empty($_POST["cc_conductor"])) {
            
            $placa = $_POST["placa"];
            $color = $_POST["color"];
            $marca = $_POST["marca"];
            $tipo = $_POST["tipo"];
            $cc_propietario = $_POST["cc_propietario"];
            $cc_conductor = $_POST["cc_conductor"];

            $sql = $conexion->query("insert into vehiculos(placa, color, marca, tipo, cc_propietario, cc_conductor) values('$placa', '$color', ' $marca', $tipo, $cc_propietario, $cc_conductor) ");
            if ($sql==1) {
                echo '<div class="alert alert-success"> Propietario Registrado con Éxito!.</div>';
            } else {
                echo '<div class="alert alert-danger"> Error al registrar propietario.</div>';
            }
            
        } else {
            echo '<div class="alert alert-danger">TODOS LOS DATOS DEBEN DE ESTAR COMPLETOS.</div>';
        }
    }
?>