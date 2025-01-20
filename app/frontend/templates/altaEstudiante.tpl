<!DOCTYPE html>
<html lang="es">
<meta charset="UTF-8">
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
</style>

<button class="btn btn-logout" onclick="window.location.href='index.php'">Cerrar sesión</button>

<div class="container-fluid text-center welcome-section">
    <img src="Logo instiform.png" alt="Logo de Instiform" class="img-fluid logo-small">
    <h1 class="welcome-heading">Dar de Alta Estudiantes</h1>
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
        <div class="alert alert-{$mensaje_tipo} alert-dismissible fade show" role="alert">
           {$mensaje}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
        </div>
    {/if}


    <form action="altaEstudiante.php" method="POST">
        <div class="form-group">
            <label for="dni">DNI:</label>
            <input type="text" class="form-control" id="dni" name="dni" required pattern="\d+" title="Solo se permiten números">
        </div>
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>
        <div class="form-group">
            <label for="apellido">Apellido:</label>
            <input type="text" class="form-control" id="apellido" name="apellido" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <button type="submit" class="btn btn-custom">Dar de Alta</button>
    </form>
    
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
