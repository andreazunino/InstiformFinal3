<?php
/* Smarty version 5.4.0, created on 2024-12-02 14:01:13
  from 'file:templates/modificarDatosCurso.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.0',
  'unifunc' => 'content_674daf99ea1ab3_19221439',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '51489817e6417970ec80bb7181c0d74573655bf5' => 
    array (
      0 => 'templates/modificarDatosCurso.tpl',
      1 => 1732206194,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:templates/head.tpl' => 1,
  ),
))) {
function content_674daf99ea1ab3_19221439 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Instiform nuevo\\instiSmarty\\Instiform\\app\\frontend\\templates';
?><!DOCTYPE html>
<html lang="es">
<?php $_smarty_tpl->renderSubTemplate('file:templates/head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>
<body>
<style>
    body {
        background: url('fondo.avif') no-repeat center center fixed;
        background-size: cover;
        background: linear-gradient(to bottom, #a1c4fd, #c2e9fb); /* Degradado de fondo */
        min-height: 100vh;
        margin: 0;
        font-family: 'Arial', sans-serif;
    }
    .logo-small {
        max-width: 50px;
        margin-top: 10px;
    }

    /* Barra de navegación */
    .navbar {
        margin-bottom: 20px;
    }

    .dropdown-menu {
        background-color: #f8f9fa;
        border: 1px solid #dee2e6;
    }

    .dropdown-item:hover {
        background-color: #e9ecef;
    }

    /* Botón de cerrar sesión */
    .btn-logout {
        background-color: #d33f4d;
        color: #ffffff;
        border: none;
        padding: 10px 20px;
        font-size: 14px;
        font-weight: bold;
        text-transform: uppercase;
        border-radius: 50px;
        transition: background-color 0.3s ease;
        position: absolute;
        top: 20px;
        right: 20px;
    }

    .btn-logout:hover {
        background-color: #63597a;
    }
</style>

<button class="btn btn-logout" onclick="window.location.href='index.php'">Cerrar sesión</button>

<div class="container-fluid text-center welcome-section">
    <img src="Logo instiform.png" alt="Logo de Instiform" class="img-fluid logo-small">
    <h1 class="welcome-heading">Modificar Datos del Curso</h1>
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
    <h2>Formulario para Modificar Datos del Curso</h2>
    
    <!-- Mostrar alertas -->
    <?php if ((null !== ($_smarty_tpl->getValue('mensaje') ?? null))) {?>
        <div class="alert alert-<?php echo $_smarty_tpl->getValue('mensaje_tipo');?>
" role="alert">
            <?php echo $_smarty_tpl->getValue('mensaje');?>

        </div>
    <?php }?>

    <!-- Formulario para modificar los datos del curso -->
    <form action="modificarDatosCurso.php" method="POST">
        <div class="form-group">
            <label for="curso">Seleccionar Curso:</label>
            <select class="form-control" id="curso" name="curso" onchange="loadCourseDetails()" required>
                <!-- Opciones llenadas por PHP -->
                <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('cursos'), 'curso');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('curso')->value) {
$foreach0DoElse = false;
?>
                    <option value="<?php echo $_smarty_tpl->getValue('curso')['id'];?>
"><?php echo $_smarty_tpl->getValue('curso')['nombre'];?>
</option>
                <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
            </select>
        </div>
        <div class="form-group">
            <label for="nombreCurso">Nuevo Nombre del Curso:</label>
            <input type="text" class="form-control" id="nombreCurso" name="nombreCurso" required>
        </div>
        <div class="form-group">
            <label for="cupo">Nuevo Cupo:</label>
            <input type="number" class="form-control" id="cupo" name="cupo" required>
        </div>
        <button type="submit" class="btn btn-primary">Modificar Curso</button>
    </form>
</div>

<?php echo '<script'; ?>
 src="https://code.jquery.com/jquery-3.5.1.slim.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"><?php echo '</script'; ?>
>

</body>
</html>
<?php }
}
