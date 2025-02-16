<?php
/* Smarty version 5.4.0, created on 2025-02-16 12:30:39
  from 'file:templates/inscribirCurso.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.0',
  'unifunc' => 'content_67b1cc5f9a66f6_47248794',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0c8972229c8ea4ef8df8d30b629a43fb1921e889' => 
    array (
      0 => 'templates/inscribirCurso.tpl',
      1 => 1739705431,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:templates/head.tpl' => 1,
  ),
))) {
function content_67b1cc5f9a66f6_47248794 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Instiform\\app\\frontend\\templates';
?><!DOCTYPE html>
<html lang="es">
<meta charset="UTF-8">
<?php $_smarty_tpl->renderSubTemplate('file:templates/head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>
<body>

<!-- Botón de cierre de sesión -->
<button class="btn btn-logout" onclick="window.location.href='index.php'">Cerrar sesión</button>

<!-- Encabezado -->
<div class="container-fluid text-center welcome-section">
    <img src="Logo instiform.png" alt="Logo de Instiform" class="img-fluid logo-small">
    <h1 class="welcome-heading">Consultar y Anular Inscripción en Cursos</h1>
</div>

<!-- Menú de navegación -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mx-auto d-flex">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="menuEstudiante.php" id="navbarDropdownMenuLink" role="button" aria-haspopup="true" aria-expanded="false">
                    Volver al Menú Estudiante
                </a>
            </li>
        </ul>
    </div>
</nav>

<!-- Contenido principal -->
<div class="container text-center">
    <!-- Mensaje de éxito o error -->
    <?php if ((null !== ($_smarty_tpl->getValue('mensaje') ?? null))) {?>
        <div class="alert alert-<?php echo $_smarty_tpl->getValue('mensaje_tipo');?>
 mt-3"><?php echo $_smarty_tpl->getValue('mensaje');?>
</div>
    <?php }?>

    <!-- Formulario para buscar boletín -->
    <form method="POST" action="">
        <div class="form-group">
            <label for="dni">Ingrese el DNI del estudiante:</label>
            <input type="text" class="form-control" id="dni" name="dni" required pattern="\d+" title="Solo se permiten números">
        </div>
        <button type="submit" class="btn btn-custom">Buscar</button>
    </form>

    <!-- Mostrar tabla o mensaje según los resultados -->
    <?php if ((null !== ($_smarty_tpl->getValue('cursos') ?? null))) {?>
        <?php if ($_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('cursos')) > 0) {?>
            <h2>Cursos en los que estás inscrito</h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Curso</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('cursos'), 'curso');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('curso')->value) {
$foreach0DoElse = false;
?>
                        <tr>
                            <td><?php echo $_smarty_tpl->getValue('curso')['nombre'];?>
</td>
                            <td>
                                <form method="POST" action="">
                                    <input type="hidden" name="dniEstudiante" value="<?php echo $_smarty_tpl->getValue('dniEstudiante');?>
">
                                    <input type="hidden" name="idCursoAnular" value="<?php echo $_smarty_tpl->getValue('curso')['id'];?>
">
                                    <button type="submit" class="btn btn-danger">Anular Inscripción</button>
                                </form>
                            </td>
                        </tr>
                    <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                </tbody>
            </table>
        <?php } else { ?>
            <p>No estás inscrito en ningún curso.</p>
        <?php }?>
    <?php }?>
</div>

<!-- Scripts -->
<?php echo '<script'; ?>
 src="https://code.jquery.com/jquery-3.5.1.slim.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"><?php echo '</script'; ?>
>
</body>
</html>
<?php }
}
