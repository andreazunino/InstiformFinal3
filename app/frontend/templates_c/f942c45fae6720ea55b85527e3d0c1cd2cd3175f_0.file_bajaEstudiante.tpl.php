<?php
/* Smarty version 5.4.0, created on 2025-02-16 12:32:55
  from 'file:templates/bajaEstudiante.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.0',
  'unifunc' => 'content_67b1cce7e68299_22438278',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f942c45fae6720ea55b85527e3d0c1cd2cd3175f' => 
    array (
      0 => 'templates/bajaEstudiante.tpl',
      1 => 1739705534,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:templates/head.tpl' => 1,
  ),
))) {
function content_67b1cce7e68299_22438278 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Instiform\\app\\frontend\\templates';
?><!DOCTYPE html>
<html lang="es">
<?php $_smarty_tpl->renderSubTemplate('file:templates/head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>
<body>


<!-- Botón para cerrar sesión -->
<button class="btn btn-logout" onclick="window.location.href='index.php'">Cerrar sesión</button>

<div class="container-fluid text-center welcome-section">
    <img src="Logo instiform.png" alt="Logo de Instiform" class="img-fluid logo-small">
    <h1 class="welcome-heading">Dar de Baja Estudiantes</h1>
</div>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mx-auto">
            <li class="nav-item">
                <a class="nav-link" href="menuAdministrador.php">Volver al Menú Administrador</a>
            </li>
        </ul>
    </div>
</nav>

<div class="container text-center">
    <!-- Formulario para buscar estudiante -->
    <h3>Buscar por Número de Documento</h3>
    <form action="bajaEstudiante.php" method="post">
        <div class="form-group">
            <label for="documento">Número de Documento:</label>
            <input type="text" class="form-control" id="documento" name="documento" required>
        </div>
        <button type="submit" name="buscarDocumento" class="btn btn-danger">Buscar Estudiante</button>
    </form>

    <!-- Mostrar mensaje -->
    <?php if ((null !== ($_smarty_tpl->getValue('mensaje') ?? null))) {?>
        <div class="alert alert-warning mt-3"><?php echo $_smarty_tpl->getValue('mensaje');?>
</div>
    <?php }?>

    <!-- Mostrar datos del estudiante encontrado -->
    <?php if ((null !== ($_smarty_tpl->getValue('estudiante') ?? null))) {?>
        <h3>Datos del Estudiante</h3>
        <p><strong>DNI:</strong> <?php echo (($tmp = $_smarty_tpl->getValue('estudiante')['dni'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
</p>
        <p><strong>Nombre:</strong> <?php echo (($tmp = $_smarty_tpl->getValue('estudiante')['nombre'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
</p>
        <p><strong>Apellido:</strong> <?php echo (($tmp = $_smarty_tpl->getValue('estudiante')['apellido'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
</p>
        <p><strong>Email:</strong> <?php echo (($tmp = $_smarty_tpl->getValue('estudiante')['email'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
</p>
        <form action="bajaEstudiante.php" method="POST">
            <!-- Campo oculto con el DNI del estudiante -->
            <input type="hidden" name="dni_estudiante" value="<?php echo (($tmp = $_smarty_tpl->getValue('estudiante')['dni'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
            <button type="submit" class="btn btn-danger">Eliminar Estudiante</button>
        </form>
    <?php }?>
</div>

<!-- Scripts necesarios para Bootstrap -->
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
