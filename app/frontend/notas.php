<?php
require_once '../../sql/db.php';
require_once 'lib/smarty/libs/Smarty.class.php';

$smarty = new Smarty\Smarty;

// Inicializar variables para mensajes y datos
$mensaje = '';
$mensaje_tipo = '';
$cursos = [];
$dniEstudiante = '';

// Procesar el formulario de búsqueda
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['buscar_dni'])) {
    $dniEstudiante = $_POST['dni_estudiante'];

    try {
        // Obtener los cursos en los que está inscrito el estudiante
        $stmt = $pdo->prepare("
            SELECT c.id, c.nombre 
            FROM curso c
            INNER JOIN inscripcion i ON c.id = i.id_curso
            WHERE i.dni_estudiante = :dniEstudiante
        ");
        $stmt->bindParam(':dniEstudiante', $dniEstudiante, PDO::PARAM_STR);
        $stmt->execute();
        $cursos = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (empty($cursos)) {
            $mensaje = "No se encontraron cursos para el DNI ingresado.";
            $mensaje_tipo = 'warning';
        }
    } catch (PDOException $e) {
        $mensaje = "Error al buscar los cursos: " . $e->getMessage();
        $mensaje_tipo = 'danger';
    }
}

// Procesar el formulario de ingreso de nota
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['ingresar_nota'])) {
    $idCurso = $_POST['id_curso'];
    $nota = $_POST['nota'];
    $dniEstudiante = $_POST['dni_estudiante'];

    try {
        // Insertar o actualizar la nota en la tabla boletin
        $stmt = $pdo->prepare("
            INSERT INTO boletin (id_curso, dni_estudiante, notas)
            VALUES (:id_curso, :dni_estudiante, to_jsonb(ARRAY[:nota]::INTEGER[]))
            ON CONFLICT (id_curso, dni_estudiante)
            DO UPDATE SET notas = boletin.notas || to_jsonb(:nota::INTEGER)
        ");
        $stmt->execute([
            ':id_curso' => $idCurso,
            ':dni_estudiante' => $dniEstudiante,
            ':nota' => $nota,
        ]);

        $mensaje = "Nota guardada correctamente.";
        $mensaje_tipo = 'success';
    } catch (PDOException $e) {
        $mensaje = "Error al guardar la nota: " . $e->getMessage();
        $mensaje_tipo = 'danger';
    }
}

// Asignar las variables a Smarty
$smarty->assign('cursos', $cursos);
$smarty->assign('dniEstudiante', $dniEstudiante);
$smarty->assign('mensaje', $mensaje);
$smarty->assign('mensaje_tipo', $mensaje_tipo);


$smarty->display('templates/notas.tpl');

