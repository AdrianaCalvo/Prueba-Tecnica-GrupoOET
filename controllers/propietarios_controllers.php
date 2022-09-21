<?php
    if(!empty($_POST["btnregistrar"])) {
        if(!empty($_POST["cc_propietario"]) and !empty($_POST["nombres"]) and !empty($_POST["apellidos"]) and !empty($_POST["direccion"]) and !empty($_POST["telefono"]) and !empty($_POST["ciudad"])) {
            
            $cc_propietario = $_POST["cc_propietario"];
            $nombre = $_POST["nombres"];
            $apellidos = $_POST["apellidos"];
            $direccion = $_POST["direccion"];
            $telefono = $_POST["telefono"];
            $ciudad = $_POST["ciudad"];

            $sql = $conexion->query("insert into propietario(cedula, nombre_propietario, apellido, direccion, telefono, ciudad) values($cc_propietario, '$nombre', ' $apellidos', '$direccion', '$telefono', '$ciudad') ");
            if ($sql==1) {
                echo '<div class="alert alert-success"> Propietario Registrado con Éxito!.</div>';
            } else {
                echo '<div class="alert alert-danger"> Error al registrar propietario.</div>';
            }
            
        } else {
            echo "TODOS LOS DATOS DEBEN DE ESTAR COMPLETOS.";
        }
    }
?>