<?php
require_once('lib/smarty/libs/Smarty.class.php');
require_once('../../sql/db.php'); // Conexión a la base de datos

$smarty = new Smarty\Smarty;

// Verificar si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos enviados desde el formulario
    $nombre = $_POST['nombre'];
    $id = $_POST['id'];
    $cupo = $_POST['cupo'];

    // Validar los datos
    if (!empty($nombre) && is_numeric($id) && is_numeric($cupo)) {
        try {
            // Preparar la consulta para insertar los datos en la base de datos
            $query = "INSERT INTO curso (id, nombre, cupo) VALUES (?, ?, ?)";
            $stmt = $pdo->prepare($query);

            // Ejecutar la consulta
            $stmt->execute([$id, $nombre, $cupo]);

            // Asignar un mensaje de éxito a Smarty
            $smarty->assign('mensaje', "El curso ha sido dado de alta correctamente.");
        } catch (PDOException $e) {
            // Capturar cualquier error en la consulta o conexión
            $smarty->assign('error', "Error al dar de alta el curso: " . $e->getMessage());
        }
    } else {
        // Si los datos no son válidos, mostrar un mensaje de error
        $smarty->assign('error', "Por favor, complete todos los campos correctamente. El ID y el cupo deben ser números.");
    }
}


$smarty->display('templates/darAltaCurso.tpl');



