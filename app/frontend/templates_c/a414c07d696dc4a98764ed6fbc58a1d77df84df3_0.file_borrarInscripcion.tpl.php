<?php
/* Smarty version 5.4.0, created on 2024-12-02 14:03:23
  from 'file:templates/borrarInscripcion.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.0',
  'unifunc' => 'content_674db01bd047f0_87276163',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a414c07d696dc4a98764ed6fbc58a1d77df84df3' => 
    array (
      0 => 'templates/borrarInscripcion.tpl',
      1 => 1732300054,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:templates/head.tpl' => 1,
  ),
))) {
function content_674db01bd047f0_87276163 (\Smarty\Template $_smarty_tpl) {
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
    .btn-custom:hover {
        background-color: #357ABD;
    }
</style>

<!-- Botón de cerrar sesión -->
<button class="btn btn-logout" onclick="window.location.href='index.php'">Cerrar sesión</button>

<!-- Encabezado con logo y título -->
<div class="container-fluid text-center welcome-section">
    <img src="Logo instiform.png" alt="Logo de Instiform" class="img-fluid logo-small">
    <h1 class="welcome-heading">Borrar Inscripción</h1>
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
    <?php if ((null !== ($_smarty_tpl->getValue('mensaje') ?? null))) {?>
        <div class="alert alert-success"><?php echo $_smarty_tpl->getValue('mensaje');?>
</div>
    <?php }?>
    <?php if ((null !== ($_smarty_tpl->getValue('mensaje_error') ?? null))) {?>
        <div class="alert alert-danger"><?php echo $_smarty_tpl->getValue('mensaje_error');?>
</div>
    <?php }?>

    <!-- Formulario de búsqueda -->
    <form method="POST" action="borrarInscripcion.php" class="mb-5">
        <div class="form-group mb-3">
            <label for="dniAlumno">DNI del Alumno:</label>
            <input type="text" class="form-control" id="dniAlumno" name="dniAlumno" placeholder="Ej: 12345678">
        </div>
        <div class="form-group mb-3">
            <label for="nombreMateria">Nombre de la Materia:</label>
            <input type="text" class="form-control" id="nombreMateria" name="nombreMateria" placeholder="Ej: Matemática">
        </div>
        <button type="submit" class="btn btn-custom">Buscar</button>
    </form>

    <!-- Tabla de resultados -->
    <?php if ((null !== ($_smarty_tpl->getValue('inscripciones') ?? null))) {?>
        <h2 class="mb-4">Resultados</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>DNI Alumno</th>
                    <th>Nombre Alumno</th>
                    <th>Curso</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('inscripciones'), 'inscripcion');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('inscripcion')->value) {
$foreach0DoElse = false;
?>
                    <tr>
                        <td><?php echo $_smarty_tpl->getValue('inscripcion')['id'];?>
</td>
                        <td><?php echo $_smarty_tpl->getValue('inscripcion')['dni_estudiante'];?>
</td>
                        <td><?php echo $_smarty_tpl->getValue('inscripcion')['nombre'];?>
</td>
                        <td><?php echo $_smarty_tpl->getValue('inscripcion')['curso_nombre'];?>
</td>
                        <td>
                            <a href="borrarInscripcion.php?id=<?php echo $_smarty_tpl->getValue('inscripcion')['id'];?>
" 
                               class="btn btn-danger btn-sm" 
                               onclick="return confirm('¿Estás seguro de que deseas eliminar esta inscripción?');">
                                Borrar
                            </a>
                        </td>
                    </tr>
                <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
            </tbody>
        </table>
    <?php } else { ?>
        <?php if ((null !== ($_smarty_tpl->getValue('mensaje') ?? null)) && $_smarty_tpl->getValue('mensaje_tipo') == 'warning') {?>
            <p class="mt-4 text-warning">No se encontraron inscripciones que coincidan con los criterios.</p>
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
