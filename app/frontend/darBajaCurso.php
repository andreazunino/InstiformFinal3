<?php
require_once '../../sql/db.php'; // Conexión a la base de datos
require_once 'lib/smarty/libs/Smarty.class.php';

$smarty = new Smarty\Smarty;

// Verificar si el formulario fue enviado por el método POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recoger el valor del curso seleccionado
    $cursoId = $_POST['curso'];

    // Validar que el curso no esté vacío
    if (!empty($cursoId)) {
        try {
            // Preparar la consulta para eliminar el curso
            $stmt = $pdo->prepare("DELETE FROM curso WHERE id = :cursoId");
            $stmt->bindParam(':cursoId', $cursoId, PDO::PARAM_INT);

            // Ejecutar la consulta
            $stmt->execute();

            // Verificar si el curso fue eliminado exitosamente
            if ($stmt->rowCount() > 0) {
                $mensaje = "El curso ha sido dado de baja exitosamente.";
                $mensaje_tipo = 'success'; // Mensaje de éxito
            } else {
                $mensaje = "No se encontró el curso seleccionado.";
                $mensaje_tipo = 'warning'; // Mensaje de advertencia
            }
        } catch (PDOException $e) {
            $mensaje = "Error al dar de baja el curso: " . $e->getMessage();
            $mensaje_tipo = 'danger'; // Mensaje de error
        }
    } else {
        $mensaje = "Por favor selecciona un curso válido.";
        $mensaje_tipo = 'warning'; // Mensaje de advertencia
    }

    // Asignar mensaje y tipo de mensaje a Smarty
    $smarty->assign('mensaje', $mensaje);
    $smarty->assign('mensaje_tipo', $mensaje_tipo);
}

// Obtener la lista de cursos para mostrar en el formulario
try {
    $stmt = $pdo->query("SELECT id, nombre, cupo FROM curso");
    $cursos = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Asignar los cursos a Smarty
    $smarty->assign('cursos', $cursos);
} catch (PDOException $e) {
    $smarty->assign('mensaje', "Error al obtener los cursos: " . $e->getMessage());
    $smarty->assign('mensaje_tipo', 'danger');
}

$smarty->display('templates/darBajaCurso.tpl');

