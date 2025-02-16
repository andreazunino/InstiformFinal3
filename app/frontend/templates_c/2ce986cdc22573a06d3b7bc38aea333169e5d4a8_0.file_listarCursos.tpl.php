<?php
/* Smarty version 5.4.0, created on 2025-02-16 12:41:17
  from 'file:templates/listarCursos.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.0',
  'unifunc' => 'content_67b1cedd3530c6_56696802',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2ce986cdc22573a06d3b7bc38aea333169e5d4a8' => 
    array (
      0 => 'templates/listarCursos.tpl',
      1 => 1739705699,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:templates/head.tpl' => 1,
  ),
))) {
function content_67b1cedd3530c6_56696802 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Instiform\\app\\frontend\\templates';
?><!DOCTYPE html>
<html lang="es">
<meta charset="UTF-8">
<?php $_smarty_tpl->renderSubTemplate('file:templates/head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?> <!-- Aquí se incluye el archivo head.tpl que puedes configurar con los metadatos comunes -->


    <button class="btn btn-logout" onclick="window.location.href='index.php'">Cerrar sesión</button>

    <div class="container-fluid text-center welcome-section">
        <img src="Logo instiform.png" alt="Logo de Instiform" class="img-fluid logo-small">
        <h1 class="welcome-heading">Listado de Cursos</h1>
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
            <div class="alert alert-<?php echo $_smarty_tpl->getValue('mensaje_tipo');?>
 alert-dismissible fade show" role="alert">
                <?php echo $_smarty_tpl->getValue('mensaje');?>

                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php }?>

        <?php if ($_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('cursos')) > 0) {?>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre del Curso</th>
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
                            <td><?php echo $_smarty_tpl->getValue('curso')['id'];?>
</td>
                            <td><?php echo $_smarty_tpl->getValue('curso')['nombre'];?>
</td>
                        </tr>
                    <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                </tbody>
            </table>
        <?php } else { ?>
            <p>No hay cursos disponibles.</p>
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
