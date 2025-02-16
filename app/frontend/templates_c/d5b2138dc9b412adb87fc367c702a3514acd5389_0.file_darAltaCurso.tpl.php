<?php
/* Smarty version 5.4.0, created on 2025-02-16 12:39:59
  from 'file:templates/darAltaCurso.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.0',
  'unifunc' => 'content_67b1ce8ff0b9d7_85317019',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd5b2138dc9b412adb87fc367c702a3514acd5389' => 
    array (
      0 => 'templates/darAltaCurso.tpl',
      1 => 1739705651,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:templates/head.tpl' => 1,
  ),
))) {
function content_67b1ce8ff0b9d7_85317019 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Instiform\\app\\frontend\\templates';
?><!DOCTYPE html>
<html lang="es">
<?php $_smarty_tpl->renderSubTemplate('file:templates/head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>
<body>

<!-- Botón de cerrar sesión -->
<button class="btn btn-logout" onclick="window.location.href='index.php'">Cerrar sesión</button>

<!-- Encabezado con logo y título -->
<div class="container-fluid text-center welcome-section">
    <img src="Logo instiform.png" alt="Logo de Instiform" class="img-fluid logo-small">
    <h1 class="welcome-heading">Dar de Alta Curso</h1>
</div>

<!-- Menú de navegación -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mx-auto d-flex">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="menuAdministrador.php" id="navbarDropdownMenuLink" role="button" aria-haspopup="true" aria-expanded="false">
                    Volver al Menú Administrador
                </a>
            </li>
        </ul>
    </div>
</nav>

<!-- Contenedor principal -->
<div class="container text-center">
    <!-- Mostrar mensajes de éxito o error -->
    <?php if ((null !== ($_smarty_tpl->getValue('error') ?? null))) {?>
        <div class="alert alert-danger"><?php echo $_smarty_tpl->getValue('error');?>
</div>
    <?php }?>
    <?php if ((null !== ($_smarty_tpl->getValue('mensaje') ?? null))) {?>
        <div class="alert alert-success"><?php echo $_smarty_tpl->getValue('mensaje');?>
</div>
    <?php }?>

    <!-- Formulario para dar de alta un curso -->
    <form action="darAltaCurso.php" method="POST">
        <div class="form-group">
            <label for="id">ID del Curso:</label>
            <input type="number" class="form-control" id="id" name="id" required>
        </div>
        <div class="form-group">
            <label for="nombre">Nombre del Curso:</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>
        <div class="form-group">
            <label for="cupo">Cupo:</label>
            <input type="number" class="form-control" id="cupo" name="cupo" required>
        </div>
        <button type="submit" class="btn btn-custom">Dar de Alta</button>
    </form>
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
