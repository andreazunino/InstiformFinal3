<?php
require_once '../../sql/db.php'; // Conexión a la base de datos
require_once 'lib/smarty/libs/Smarty.class.php';

$smarty = new Smarty\Smarty;

// Mostrar errores para depuración
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Verifica que la solicitud es POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // Buscar el estudiante por DNI
    if (isset($_POST['buscarDocumento'])) {
        $dni = trim($_POST['documento']); // trim para eliminar espacios en blanco
        
        try {
            // Verificar el DNI
            $query = "SELECT * FROM estudiante WHERE dni = ?";
            $stmt = $pdo->prepare($query);
            $stmt->execute([$dni]);
            $estudiante = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($estudiante) {
                // Asignar los datos del estudiante a Smarty
                $smarty->assign('estudiante', $estudiante);
            } else {
                $smarty->assign('mensaje', "No se encontró al estudiante con el DNI: " . htmlspecialchars($dni));
            }
        } catch (Exception $e) {
            $smarty->assign('mensaje', "Error en la búsqueda: " . $e->getMessage());
        }
    }
    
    // Eliminar estudiante
    if (isset($_POST['dni_estudiante'])) {
        $dniEstudiante = trim($_POST['dni_estudiante']); // Obtenemos el DNI correctamente
        
        if (!empty($dniEstudiante)) {
            try {
                // Iniciar transacción
                $pdo->beginTransaction();

                // Eliminar primero las inscripciones relacionadas
                $query1 = "DELETE FROM inscripcion WHERE dni_estudiante = ?";
                $stmt1 = $pdo->prepare($query1);
                $stmt1->execute([$dniEstudiante]);

                // Luego eliminar al estudiante
                $query2 = "DELETE FROM estudiante WHERE dni = ?";
                $stmt2 = $pdo->prepare($query2);
                $stmt2->execute([$dniEstudiante]);

                // Confirmar transacción
                $pdo->commit();

                if ($stmt2->rowCount() > 0) {
                    $smarty->assign('mensaje', "Estudiante eliminado con éxito.");
                    $smarty->assign('estudiante', null); // Limpiar la información del estudiante
                } else {
                    $smarty->assign('mensaje', "No se pudo eliminar el estudiante o el DNI no existe.");
                }
            } catch (PDOException $e) {
                // Revertir en caso de error
                $pdo->rollBack();
                $smarty->assign('mensaje', "Error al eliminar el estudiante: " . $e->getMessage());
            }
        } else {
            $smarty->assign('mensaje', "DNI del estudiante no proporcionado");
        }
    }
}

// Mostrar la plantilla
$smarty->display('templates/bajaEstudiante.tpl');
