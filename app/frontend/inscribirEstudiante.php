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
                // Buscar cursos disponibles para el estudiante, solo aquellos con cupo mayor a 0
                $stmtCursos = $pdo->prepare("
                    SELECT c.id, c.nombre, c.cupo
                    FROM curso c
                    WHERE c.id NOT IN (
                        SELECT i.id_curso
                        FROM inscripcion i
                        WHERE i.dni_estudiante = :dniEstudiante
                    ) AND c.cupo > 0
                ");
                $stmtCursos->bindParam(':dniEstudiante', $dniEstudiante, PDO::PARAM_STR);
                $stmtCursos->execute();
                $cursosDisponibles = $stmtCursos->fetchAll(PDO::FETCH_ASSOC);

                // Verificar si hay cursos disponibles
                if ($cursosDisponibles) {
                    // Recorrer los cursos y agregar un mensaje si el cupo es 0
                    foreach ($cursosDisponibles as $key => $curso) {
                        if ($curso['cupo'] == 0) {
                            $cursosDisponibles[$key]['mensaje'] = "Este curso no tiene cupo disponible.";
                        }
                    }

                    $smarty->assign('cursos', $cursosDisponibles);
                    $smarty->assign('dniEstudiante', $dniEstudiante); // Pasar el DNI para la inscripción
                    $smarty->assign('mensaje', "Cursos disponibles para el estudiante.");
                    $smarty->assign('mensaje_tipo', 'success');
                } else {
                    $smarty->assign('mensaje', "No hay cursos disponibles con cupo para este estudiante.");
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
    
    $stmtCursos = $pdo->prepare("SELECT *
                                 FROM curso");
    $stmtCursos->execute();
    $cursosDisponibles = $stmtCursos->fetchAll(PDO::FETCH_ASSOC);

    foreach ($cursosDisponibles as $key => $curso) {
                        if ($curso['id'] == $idCurso ) {
                            $cupo = $curso['cupo'];
                        }
                    }
   
  
    try {
        // Insertar la inscripción en la base de datos
        $stmt = $pdo->prepare("
            INSERT INTO inscripcion (id_curso, dni_estudiante)
            VALUES (:idCurso, :dniEstudiante)
        ");
        $stmt->bindParam(':dniEstudiante', $dniEstudiante, PDO::PARAM_STR);
        $stmt->bindParam(':idCurso', $idCurso, PDO::PARAM_INT);
        $stmt->execute();

        $smarty->assign('mensaje', "El estudiante fue inscrito exitosamente en el curso.");
        $smarty->assign('mensaje_tipo', 'success');
        // Descuenta en 1 el cupo en el curso
        $cupo = $cupo -1;
        $stmt = $pdo->prepare("UPDATE curso SET cupo = :cupo WHERE id = :idCurso");
        $stmt->bindParam(':cupo', $cupo, PDO::PARAM_INT);
        $stmt->bindParam(':idCurso', $idCurso, PDO::PARAM_INT);

        // Ejecutar la consulta
        $stmt->execute();
        
    } catch (PDOException $e) {
        $smarty->assign('mensaje', "Error al inscribir al estudiante: " . $e->getMessage());
        $smarty->assign('mensaje_tipo', 'danger');
    }
}

$smarty->display('templates/inscribirEstudiante.tpl');