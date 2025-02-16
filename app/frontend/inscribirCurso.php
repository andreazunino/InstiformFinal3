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
                // Buscar cursos disponibles para el estudiante
                $stmtCursos = $pdo->prepare("
                    SELECT c.id, c.nombre, c.cupo
                    FROM curso c
                    WHERE c.id NOT IN (
                        SELECT i.id_curso
                        FROM inscripcion i
                        WHERE i.dni_estudiante = :dniEstudiante
                    )
                ");
                $stmtCursos->bindParam(':dniEstudiante', $dniEstudiante, PDO::PARAM_STR);
                $stmtCursos->execute();
                $cursosDisponibles = $stmtCursos->fetchAll(PDO::FETCH_ASSOC);

                // Verificar si hay cursos disponibles
                if ($cursosDisponibles) {
                    $smarty->assign('cursos', $cursosDisponibles);
                    $smarty->assign('dniEstudiante', $dniEstudiante); // Pasar el DNI para la inscripción
                    $smarty->assign('mensaje', "Cursos que tenés disponibles.");
                    $smarty->assign('mensaje_tipo', 'success');
                } else {
                    $smarty->assign('mensaje', "Ya estás inscrito en todos los cursos.");
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

// Verificar si el formulario fue enviado para inscribir al estudiante
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['idCurso'], $_POST['dniEstudiante'])) {
    $idCurso = $_POST['idCurso'];
    $dniEstudiante = $_POST['dniEstudiante'];

    // Verificar si los valores no están vacíos
    if (!empty($idCurso) && !empty($dniEstudiante)) {
        try {
            // Insertar la inscripción en la base de datos
            $stmt = $pdo->prepare("
                INSERT INTO inscripcion (id_curso, dni_estudiante)
                VALUES (:idCurso, :dniEstudiante)
            ");
            $stmt->bindParam(':dniEstudiante', $dniEstudiante, PDO::PARAM_STR);
            $stmt->bindParam(':idCurso', $idCurso, PDO::PARAM_INT);
            $stmt->execute();

            $smarty->assign('mensaje', "Fuiste inscrito exitosamente en el curso.");
            $smarty->assign('mensaje_tipo', 'success');
        } catch (PDOException $e) {
            $smarty->assign('mensaje', "Error al inscribir al estudiante: " . $e->getMessage());
            $smarty->assign('mensaje_tipo', 'danger');
        }
    } else {
        $smarty->assign('mensaje', "Por favor selecciona un curso válido.");
        $smarty->assign('mensaje_tipo', 'warning');
    }
}


$smarty->display('templates/inscribirCurso.tpl');
