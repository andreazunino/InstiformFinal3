<?php
require_once '../../sql/db.php'; // Conexión a la base de datos
require_once 'lib/smarty/libs/Smarty.class.php';

$smarty = new Smarty\Smarty;

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Manejo de la búsqueda y actualización de estudiante
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Búsqueda de estudiante por DNI
    if (isset($_POST['dni']) && !empty($_POST['dni']) && !isset($_POST['nombre'])) {
        $documento = $_POST['dni'];

        $query = "SELECT * FROM estudiante WHERE dni = ?";
        try {
            $stmt = $pdo->prepare($query);
            $stmt->execute([$documento]);
            $estudiante = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($estudiante) {
                $smarty->assign('estudiante', $estudiante);
            } else {
                $smarty->assign('mensaje', "No se encontró al estudiante con el documento: " . htmlspecialchars($documento));
            }
        } catch (PDOException $e) {
            $smarty->assign('mensaje', "Error al buscar el estudiante: " . $e->getMessage());
        }
    }

    // Actualización del estudiante
    if (isset($_POST['dni'], $_POST['nombre'], $_POST['apellido'], $_POST['email'])) {
        $documento = $_POST['dni'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $email = $_POST['email'];

        $updateQuery = "UPDATE estudiante SET nombre = ?, apellido = ?, email = ? WHERE dni = ?";
        try {
            $stmt = $pdo->prepare($updateQuery);
            $stmt->execute([$nombre, $apellido, $email, $documento]);

            $smarty->assign('mensaje', 'Estudiante actualizado exitosamente.');
        } catch (PDOException $e) {
            $smarty->assign('mensaje', "Error al actualizar el estudiante: " . $e->getMessage());
        }
    }
}

$smarty->display('templates/modificarEstudiante.tpl');
