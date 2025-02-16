<?php
/* Smarty version 5.4.0, created on 2025-02-16 12:39:24
  from 'file:templates/modificarEstudiante.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.0',
  'unifunc' => 'content_67b1ce6c8f5b44_35177519',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '02267d13b6c76c02a1a262bca0ffb0bf6b1e1e5c' => 
    array (
      0 => 'templates/modificarEstudiante.tpl',
      1 => 1739705951,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:templates/head.tpl' => 1,
  ),
))) {
function content_67b1ce6c8f5b44_35177519 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Instiform\\app\\frontend\\templates';
?><!DOCTYPE html>
<html lang="es">
<?php $_smarty_tpl->renderSubTemplate('file:templates/head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>
<body>

<button class="btn btn-logout" onclick="window.location.href='index.php'">Cerrar sesión</button>

<div class="container-fluid text-center welcome-section">
    <img src="Logo instiform.png" alt="Logo de Instiform" class="img-fluid logo-small">
    <h1>Modificar Estudiante</h1>
</div>

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

<div class="container text-center">
    <!-- Mostrar mensajes de éxito o error -->
    <?php if ($_smarty_tpl->getValue('mensaje')) {?>
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="background-color: #d4edda; color: #155724;">
            <?php echo $_smarty_tpl->getValue('mensaje');?>

            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php }?>

    <?php if ((null !== ($_smarty_tpl->getValue('estudiante') ?? null))) {?>
        <form method="POST" action="modificarEstudiante.php">
            <input type="hidden" name="dni" value="<?php echo $_smarty_tpl->getValue('estudiante')['dni'];?>
">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" name="nombre" value="<?php echo $_smarty_tpl->getValue('estudiante')['nombre'];?>
" required>
            </div>
            <div class="form-group">
                <label for="apellido">Apellido:</label>
                <input type="text" class="form-control" name="apellido" value="<?php echo $_smarty_tpl->getValue('estudiante')['apellido'];?>
" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" name="email" value="<?php echo $_smarty_tpl->getValue('estudiante')['email'];?>
" required>
            </div>
            <button type="submit" class="btn btn-custom">Modificar</button>
        </form>
    <?php } else { ?>
        <form method="POST" action="modificarEstudiante.php">
            <div class="form-group">
                <label for="dni">DNI:</label>
                <input type="text" class="form-control" name="dni" required>
            </div>
            <button type="submit" class="btn btn-danger">Buscar</button>
        </form>
    <?php }?>
</div>

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
