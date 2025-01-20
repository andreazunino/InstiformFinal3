<?php
require_once '../../sql/db.php'; // Conexión a la base de datos
require_once 'lib/smarty/libs/Smarty.class.php';

$smarty = new Smarty\Smarty;

try {
    // Consulta para obtener todos los estudiantes con el nombre correcto de la columna
    $stmt = $pdo->prepare("SELECT dni, nombre, apellido, email FROM estudiante ORDER BY apellido, nombre");
    $stmt->execute();

    // Obtener los resultados
    $estudiantes = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Pasar los datos a la plantilla
    if ($estudiantes) {
        $smarty->assign('estudiantes', $estudiantes);
    } else {
        $smarty->assign('mensaje', 'No hay estudiantes registrados.');
        $smarty->assign('mensaje_tipo', 'warning');
    }
} catch (PDOException $e) {
    $smarty->assign('mensaje', 'Error al obtener los estudiantes: ' . $e->getMessage());
    $smarty->assign('mensaje_tipo', 'danger');
}


$smarty->display('templates/verDatosEstudiante.tpl');

