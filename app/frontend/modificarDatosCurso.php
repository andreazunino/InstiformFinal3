<?php
require_once '../../sql/db.php'; // Conexión a la base de datos
require_once 'lib/smarty/libs/Smarty.class.php';

$smarty = new Smarty\Smarty;

// Verificar si el formulario fue enviado por el método POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recoger los valores enviados por el formulario
    $cursoId = $_POST['curso'];
    $nuevoNombre = $_POST['nombreCurso'];
    $nuevoCupo = $_POST['cupo'];

    // Validar que no estén vacíos los datos
    if (!empty($cursoId) && !empty($nuevoNombre) && !empty($nuevoCupo)) {
        try {
            // Preparar la consulta para modificar los datos del curso
            $stmt = $pdo->prepare("UPDATE curso SET nombre = :nombreCurso, cupo = :cupo WHERE id = :cursoId");
            $stmt->bindParam(':nombreCurso', $nuevoNombre, PDO::PARAM_STR);
            $stmt->bindParam(':cupo', $nuevoCupo, PDO::PARAM_INT);
            $stmt->bindParam(':cursoId', $cursoId, PDO::PARAM_INT);

            // Ejecutar la consulta
            $stmt->execute();

            // Verificar si el curso fue actualizado exitosamente
            if ($stmt->rowCount() > 0) {
                $mensaje = "Los datos del curso se han actualizado correctamente.";
                $mensaje_tipo = 'success'; // Mensaje de éxito
            } else {
                $mensaje = "No se realizaron cambios. Verifica los datos ingresados.";
                $mensaje_tipo = 'warning'; // Mensaje de advertencia
            }
        } catch (PDOException $e) {
            $mensaje = "Error al modificar los datos del curso: " . $e->getMessage();
            $mensaje_tipo = 'danger'; // Mensaje de error
        }
    } else {
        $mensaje = "Por favor completa todos los campos.";
        $mensaje_tipo = 'warning'; // Mensaje de advertencia
    }

    // Asignar el mensaje y el tipo de mensaje a Smarty
    $smarty->assign('mensaje', $mensaje);
    $smarty->assign('mensaje_tipo', $mensaje_tipo);
}

// Obtener la lista de cursos para mostrar en el formulario
try {
    $stmt = $pdo->query("SELECT id, nombre FROM curso");
    $cursos = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Asignar los cursos a Smarty para mostrarlos en el formulario
    $smarty->assign('cursos', $cursos);
} catch (PDOException $e) {
    $smarty->assign('mensaje', "Error al obtener los cursos: " . $e->getMessage());
    $smarty->assign('mensaje_tipo', 'danger');
}

$smarty->display('templates/modificarDatosCurso.tpl');
