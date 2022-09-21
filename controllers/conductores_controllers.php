<?php
    if(!empty($_POST["btnregistrarconductor"])) {
        if(!empty($_POST["cedulaConductor"]) and !empty($_POST["nombresConductor"]) and !empty($_POST["apellidosConductor"]) and !empty($_POST["direccionConductor"]) and !empty($_POST["telefonoConductor"]) and !empty($_POST["ciudadConductor"])) {
            
            $cedula = $_POST["cedulaConductor"];
            $nombre = $_POST["nombresConductor"];
            $apellidos = $_POST["apellidosConductor"];
            $direccion = $_POST["direccionConductor"];
            $telefono = $_POST["telefonoConductor"];
            $ciudad = $_POST["ciudadConductor"];

            $sql = $conexion->query("insert into conductores(cedula, nombre, apellido, direccion, telefono, ciudad) values($cedula, '$nombre', ' $apellidos', '$direccion', '$telefono', '$ciudad') ");
            if ($sql==1) {
                echo '<div class="alert alert-success"> Conductor Registrado con Éxito!.</div>';
            } else {
                echo '<div class="alert alert-danger"> Error al registrar conductor.</div>';
            }
            
        } else {
            echo "TODOS LOS DATOS DEBEN DE ESTAR COMPLETOS.";
        }
    }
?>