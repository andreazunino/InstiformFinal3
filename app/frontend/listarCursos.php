<?php
require_once '../../sql/db.php'; // Conexión a la base de datos
require_once 'lib/smarty/libs/Smarty.class.php';

$smarty = new Smarty\Smarty;

// Obtener la lista de cursos desde la base de datos
try {
    // Consulta para obtener los cursos desde la base de datos
    $stmt = $pdo->query("SELECT id, nombre FROM curso");
    $cursos = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Verificar si se obtuvieron resultados
    if (empty($cursos)) {
        $mensaje = "No hay cursos disponibles.";
        $mensaje_tipo = 'warning';
    } else {
        // Asignar los cursos a Smarty para mostrarlos en el listado
        $smarty->assign('cursos', $cursos);
    }

} catch (PDOException $e) {
    // Si ocurre un error, asignar un mensaje de error
    $mensaje = "Error al obtener los cursos: " . $e->getMessage();
    $mensaje_tipo = 'danger';
    $smarty->assign('mensaje', $mensaje);
    $smarty->assign('mensaje_tipo', $mensaje_tipo);
}

// Asignar el mensaje si lo hay
$smarty->assign('mensaje', $mensaje ?? null);
$smarty->assign('mensaje_tipo', $mensaje_tipo ?? 'info');


$smarty->display('templates/listarCursos.tpl');
