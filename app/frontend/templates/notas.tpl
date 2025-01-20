<!DOCTYPE html>
<html lang="es">
{include 'templates/head.tpl'}
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
    <h1 class="welcome-heading">Notas de Estudiantes</h1>
</div>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mx-auto d-flex">
            <li class="nav-item">
                <a class="nav-link" href="menuAdministrador.php">Volver al Menú Administrador</a>
            </li>
        </ul>
    </div>
</nav>

<div class="container text-center">
    <!-- Mensaje de estado -->
    {if isset($mensaje)}
        <div class="alert alert-{$mensaje_tipo}" role="alert">
            {$mensaje}
        </div>
    {/if}

    <!-- Formulario para buscar DNI -->
    <form action="" method="POST" class="mb-4">
        <div class="form-group">
            <label for="dni_estudiante">DNI del Estudiante:</label>
            <input type="text" class="form-control" id="dni_estudiante" name="dni_estudiante" value="{$dniEstudiante}" required>
        </div>
        <button type="submit" name="buscar_dni" class="btn btn-primary">Buscar</button>
    </form>

    <!-- Si hay cursos, mostrar formulario para ingresar notas -->
    {if $cursos|@count > 0}
        <h2>Ingresar Notas</h2>
        <form action="" method="POST">
            <div class="form-group">
                <label for="id_curso">Curso:</label>
                <select class="form-control" id="id_curso" name="id_curso" required>
                    {foreach from=$cursos item=curso}
                        <option value="{$curso.id}">{$curso.nombre}</option>
                    {/foreach}
                </select>
            </div>
            <div class="form-group">
                <label for="nota">Nota:</label>
                <input type="number" class="form-control" id="nota" name="nota" required>
            </div>
            <input type="hidden" name="dni_estudiante" value="{$dniEstudiante}">
            <button type="submit" name="ingresar_nota" class="btn btn-success">Guardar Nota</button>
        </form>

    {/if}
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
</body>
</html>
