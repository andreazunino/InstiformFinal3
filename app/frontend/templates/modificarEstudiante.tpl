<!DOCTYPE html>
<html lang="es">
{include 'templates/head.tpl'}
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
    {if $mensaje}
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="background-color: #d4edda; color: #155724;">
            {$mensaje}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    {/if}

    {if isset($estudiante)}
        <form method="POST" action="modificarEstudiante.php">
            <input type="hidden" name="dni" value="{$estudiante.dni}">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" name="nombre" value="{$estudiante.nombre}" required>
            </div>
            <div class="form-group">
                <label for="apellido">Apellido:</label>
                <input type="text" class="form-control" name="apellido" value="{$estudiante.apellido}" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" name="email" value="{$estudiante.email}" required>
            </div>
            <button type="submit" class="btn btn-custom">Modificar</button>
        </form>
    {else}
        <form method="POST" action="modificarEstudiante.php">
            <div class="form-group">
                <label for="dni">DNI:</label>
                <input type="text" class="form-control" name="dni" required>
            </div>
            <button type="submit" class="btn btn-danger">Buscar</button>
        </form>
    {/if}
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
