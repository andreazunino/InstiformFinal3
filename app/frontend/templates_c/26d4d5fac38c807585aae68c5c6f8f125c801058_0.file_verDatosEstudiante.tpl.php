<?php
/* Smarty version 5.4.0, created on 2025-02-16 12:39:52
  from 'file:templates/verDatosEstudiante.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.0',
  'unifunc' => 'content_67b1ce88794259_75919682',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '26d4d5fac38c807585aae68c5c6f8f125c801058' => 
    array (
      0 => 'templates/verDatosEstudiante.tpl',
      1 => 1739705770,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:templates/head.tpl' => 1,
  ),
))) {
function content_67b1ce88794259_75919682 (\Smarty\Template $_smarty_tpl) {
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
    <h1 class="welcome-heading">Listado de Estudiantes</h1>
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
    <!-- Mostrar mensaje -->
    <?php if ($_smarty_tpl->getValue('mensaje')) {?>
        <div class="alert alert-<?php echo $_smarty_tpl->getValue('mensaje_tipo');?>
 mt-3"><?php echo $_smarty_tpl->getValue('mensaje');?>
</div>
    <?php }?>

    <!-- Mostrar los estudiantes -->
    <h3 class="mt-4">Estudiantes Registrados</h3>
    <table class="table table-striped mt-3">
        <thead>
            <tr>
                <th>DNI</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('estudiantes'), 'estudiante');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('estudiante')->value) {
$foreach0DoElse = false;
?>
            <tr>
                <td><?php echo $_smarty_tpl->getValue('estudiante')['dni'];?>
</td>
                <td><?php echo $_smarty_tpl->getValue('estudiante')['nombre'];?>
</td>
                <td><?php echo $_smarty_tpl->getValue('estudiante')['apellido'];?>
</td>
                <td><?php echo $_smarty_tpl->getValue('estudiante')['email'];?>
</td> <!-- Asegúrate de usar 'email' en lugar de 'mail' -->
            </tr>
            <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
        </tbody>
    </table>
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
