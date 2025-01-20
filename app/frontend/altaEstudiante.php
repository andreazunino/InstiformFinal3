<?php
require_once '../../sql/db.php'; // Conexión a la base de datos
require_once 'lib\smarty\libs\Smarty.class.php';

$smarty = new Smarty\Smarty;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recoger datos del formulario
    $dni = $_POST['dni'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];

    // Validar los campos
    if (!empty($dni) && !empty($nombre) && !empty($apellido) && !empty($email)) {
        try {
            // Insertar el nuevo estudiante en la base de datos
            $stmt = $pdo->prepare("INSERT INTO estudiante (dni, nombre, apellido, email) VALUES (:dni, :nombre, :apellido, :email)");
            $stmt->bindParam(':dni', $dni);
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':apellido', $apellido);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            $mensaje = "Estudiante dado de alta exitosamente.";
            $mensaje_tipo = 'success'; // Mensaje de éxito
        } catch (PDOException $e) {
            if ($e->getCode() == 23505) {
                // Código de error para duplicados (clave primaria o campo único violado)
                $mensaje = "Error: El DNI ya está registrado.";
                $mensaje_tipo = 'danger'; // Mensaje de error
            } else {
                $mensaje = "Error al dar de alta: " . $e->getMessage();
                $mensaje_tipo = 'danger'; // Mensaje de error
            }
        }
    } else {
        $mensaje = "Por favor, completa todos los campos.";
        $mensaje_tipo = 'warning'; // Mensaje de advertencia
    }

    // Asignar mensaje y tipo de mensaje a Smarty
    $smarty->assign('mensaje', $mensaje);
    $smarty->assign('mensaje_tipo', $mensaje_tipo);
}


$smarty->display('templates/altaEstudiante.tpl');
