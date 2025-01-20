<?php 
require_once '../../sql/db.php'; // Conexión a la base de datos
require_once 'lib/smarty/libs/Smarty.class.php';

$smarty = new Smarty\Smarty;

// Verificar si el formulario fue enviado para buscar cursos
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['dni'])) {
    $dniEstudiante = trim($_POST['dni']); // Limpiar espacios

    // Validar que el DNI no esté vacío
    if (!empty($dniEstudiante)) {
        try {
            // Verificar si el estudiante existe en la base de datos
            $stmtEstudiante = $pdo->prepare("SELECT * FROM estudiante WHERE dni = :dni");
            $stmtEstudiante->bindParam(':dni', $dniEstudiante, PDO::PARAM_STR);
            $stmtEstudiante->execute();
            $estudiante = $stmtEstudiante->fetch(PDO::FETCH_ASSOC);

            if ($estudiante) {
                // Buscar cursos en los que el estudiante está inscrito
                $stmtCursos = $pdo->prepare("
                    SELECT c.id, c.nombre, c.cupo
                    FROM curso c
                    WHERE c.id IN (
                        SELECT i.id_curso
                        FROM inscripcion i
                        WHERE i.dni_estudiante = :dniEstudiante
                    )
                ");
                $stmtCursos->bindParam(':dniEstudiante', $dniEstudiante, PDO::PARAM_STR);
                $stmtCursos->execute();
                $cursosInscritos = $stmtCursos->fetchAll(PDO::FETCH_ASSOC);

                // Verificar si el estudiante está inscrito en algún curso
                if ($cursosInscritos) {
                    $smarty->assign('cursos', $cursosInscritos);
                    $smarty->assign('dniEstudiante', $dniEstudiante); // Pasar el DNI para la anulación
                    $smarty->assign('mensaje', "Cursos en los que estás inscrito.");
                    $smarty->assign('mensaje_tipo', 'success');
                } else {
                    $smarty->assign('mensaje', "No estás inscrito en ningún curso.");
                    $smarty->assign('mensaje_tipo', 'warning');
                }
            } else {
                // Mensaje si el estudiante no existe
                $smarty->assign('mensaje', "El estudiante con DNI $dniEstudiante no está registrado.");
                $smarty->assign('mensaje_tipo', 'danger');
            }
        } catch (PDOException $e) {
            $smarty->assign('mensaje', "Error al obtener los cursos: " . $e->getMessage());
            $smarty->assign('mensaje_tipo', 'danger');
        }
    } else {
        $smarty->assign('mensaje', "Por favor ingresa un DNI válido.");
        $smarty->assign('mensaje_tipo', 'warning');
    }
}

// Verificar si el formulario fue enviado para anular la inscripción del estudiante
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['idCursoAnular'], $_POST['dniEstudiante'])) {
    $idCurso = $_POST['idCursoAnular'];
    $dniEstudiante = $_POST['dniEstudiante'];

    // Verificar si los valores no están vacíos
    if (!empty($idCurso) && !empty($dniEstudiante)) {
        try {
            // Anular la inscripción en la base de datos
            $stmt = $pdo->prepare("
                DELETE FROM inscripcion 
                WHERE id_curso = :idCurso AND dni_estudiante = :dniEstudiante
            ");
            $stmt->bindParam(':dniEstudiante', $dniEstudiante, PDO::PARAM_STR);
            $stmt->bindParam(':idCurso', $idCurso, PDO::PARAM_INT);
            $stmt->execute();

            $smarty->assign('mensaje', "La inscripción en el curso ha sido anulada exitosamente.");
            $smarty->assign('mensaje_tipo', 'success');
        } catch (PDOException $e) {
            $smarty->assign('mensaje', "Error al anular la inscripción: " . $e->getMessage());
            $smarty->assign('mensaje_tipo', 'danger');
        }
    } else {
        $smarty->assign('mensaje', "Por favor selecciona un curso válido.");
        $smarty->assign('mensaje_tipo', 'warning');
    }
}


$smarty->display('templates/anularInscripcion.tpl');


