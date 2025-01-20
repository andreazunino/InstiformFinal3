<?php

require_once '../../sql/db.php'; // Conexión a la base de datos
require_once 'lib/smarty/libs/Smarty.class.php';

$smarty = new Smarty\Smarty;

// Consultar las inscripciones
try {
    $stmt = $pdo->prepare("
        SELECT e.dni, e.nombre, e.apellido, c.nombre AS curso
        FROM inscripcion i
        JOIN estudiante e ON i.dni_estudiante = e.dni
        JOIN curso c ON i.id_curso = c.id
        ORDER BY e.nombre, e.apellido
    ");
    $stmt->execute();

    // Obtener los datos
    $inscripciones = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($inscripciones) {
        $smarty->assign('inscripciones', $inscripciones);
    } else {
        $smarty->assign('mensaje', "No hay inscripciones registradas.");
        $smarty->assign('mensaje_tipo', 'warning');
    }

} catch (PDOException $e) {
    $smarty->assign('mensaje', "Error al obtener las inscripciones: " . $e->getMessage());
    $smarty->assign('mensaje_tipo', 'danger');
}


$smarty->display('templates/listarInscripciones.tpl');
