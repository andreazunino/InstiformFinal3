<?php
require_once '../../sql/db.php';
require_once 'lib/smarty/libs/Smarty.class.php';

$smarty = new Smarty\Smarty;

$mensaje = '';
$mensaje_tipo = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $dni = filter_input(INPUT_POST, 'dni', FILTER_SANITIZE_NUMBER_INT);

    if ($dni) {
        try {
            $sql = "
                SELECT 
                    c.nombre AS materia,
                    COALESCE(b.notas::TEXT, '[]') AS calificacion
                FROM 
                    boletin b
                INNER JOIN 
                    curso c ON b.id_curso = c.id
                WHERE 
                    b.dni_estudiante = :dni
            ";

            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':dni', $dni);
            $stmt->execute();
            $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Decodificar calificaciones JSON
            foreach ($resultados as &$resultado) {
                $resultado['calificacion'] = json_decode($resultado['calificacion'], true) ?: "Sin calificación";
            }

            if ($resultados) {
                $smarty->assign('notas', $resultados);
                $mensaje = "";
            } else {
                $mensaje = "No se encontraron boletines para el DNI ingresado.";
                $mensaje_tipo = 'warning';
                $smarty->assign('notas', []);
            }
        } catch (PDOException $e) {
            $mensaje = "Error al obtener el boletín: " . $e->getMessage();
            $mensaje_tipo = 'danger';
        }
    } else {
        $mensaje = "Por favor, ingresa un DNI válido.";
        $mensaje_tipo = 'warning';
    }

    $smarty->assign('mensaje', $mensaje);
    $smarty->assign('mensaje_tipo', $mensaje_tipo);
}

$smarty->clearAllCache();
$smarty->display('templates/boletin.tpl');
