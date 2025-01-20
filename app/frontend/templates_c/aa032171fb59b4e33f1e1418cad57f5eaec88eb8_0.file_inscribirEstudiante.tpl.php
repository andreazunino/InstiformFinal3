<?php
/* Smarty version 5.4.0, created on 2024-12-02 14:02:32
  from 'file:templates/inscribirEstudiante.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.0',
  'unifunc' => 'content_674dafe8455a89_93321397',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'aa032171fb59b4e33f1e1418cad57f5eaec88eb8' => 
    array (
      0 => 'templates/inscribirEstudiante.tpl',
      1 => 1732306409,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:templates/head.tpl' => 1,
  ),
))) {
function content_674dafe8455a89_93321397 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Instiform nuevo\\instiSmarty\\Instiform\\app\\frontend\\templates';
?><!DOCTYPE html>
<html lang="es">
<?php $_smarty_tpl->renderSubTemplate('file:templates/head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>
<body>
<style>
    body {
        background: linear-gradient(to bottom, #a1c4fd, #c2e9fb);
        min-height: 100vh;
        margin: 0;
        font-family: 'Arial', sans-serif;
    }
    .logo-small {
        max-width: 50px;
        margin-top: 10px;
    }
    .navbar {
        margin-bottom: 20px;
    }
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
    .btn-custom {
        background-color: #4a90e2;
        color: #ffffff;
        border: none;
        padding: 15px 30px;
        font-size: 18px;
        font-weight: bold;
        text-transform: uppercase;
        border-radius: 50px;
        transition: background-color 0.3s ease;
    }
    .welcome-section {
        margin-top: 20px;
    }
    .welcome-heading {
        font-size: 24px;
        color: #333;
        font-weight: bold;
    }
</style>

<!-- Botón para cerrar sesión -->
<button class="btn btn-logout" onclick="window.location.href='index.php'">Cerrar sesión</button>

<div class="container-fluid text-center welcome-section">
    <img src="Logo instiform.png" alt="Logo de Instiform" class="img-fluid logo-small">
    <h1 class="welcome-heading">Inscribir Estudiante en Cursos</h1>
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
    <!-- Formulario para buscar cursos por DNI -->
    <h3>Buscar Cursos Disponibles</h3>
    <form method="POST">
        <div class="form-group">
            <label for="dni">DNI del Estudiante:</label>
            <input type="text" class="form-control" id="dni" name="dni" placeholder="Ingrese el DNI del estudiante" required>
        </div>
        <button type="submit" class="btn btn-custom mt-3">Buscar</button>
    </form>

    <!-- Mostrar mensaje -->
    <?php if ($_smarty_tpl->getValue('mensaje')) {?>
        <div class="alert alert-<?php echo $_smarty_tpl->getValue('mensaje_tipo');?>
 mt-3"><?php echo $_smarty_tpl->getValue('mensaje');?>
</div>
    <?php }?>

    <!-- Mostrar cursos disponibles -->
    <?php if ($_smarty_tpl->getValue('cursos')) {?>
        <h3 class="mt-4">Cursos Disponibles</h3>
        <table class="table table-striped mt-3">
            <thead>
                <tr>
                    <th>Nombre del Curso</th>
                    <th>Cupo Disponible</th>
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
                    <td><?php echo $_smarty_tpl->getValue('curso')['cupo'];?>
</td>
                    <td>
                        <!-- Botón para inscribir al estudiante -->
                        <form method="POST" class="d-inline">
                            <input type="hidden" name="idCurso" value="<?php echo $_smarty_tpl->getValue('curso')['id'];?>
">
                            <input type="hidden" name="dniEstudiante" value="<?php echo $_smarty_tpl->getValue('dniEstudiante');?>
">
                            <button type="submit" class="btn btn-success btn-sm">Inscribir</button>
                        </form>
                    </td>
                </tr>
                <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
            </tbody>
        </table>
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
