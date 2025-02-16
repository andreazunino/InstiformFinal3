<!DOCTYPE html>
<html lang="es">
{include 'templates/head.tpl'}
<body>


<!-- Botón para cerrar sesión -->
<button class="btn btn-logout" onclick="window.location.href='index.php'">Cerrar sesión</button>

<div class="container-fluid text-center welcome-section">
    <img src="Logo instiform.png" alt="Logo de Instiform" class="img-fluid logo-small">
    <h1 class="welcome-heading">Dar de Baja Estudiantes</h1>
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
    <!-- Formulario para buscar estudiante -->
    <h3>Buscar por Número de Documento</h3>
    <form action="bajaEstudiante.php" method="post">
        <div class="form-group">
            <label for="documento">Número de Documento:</label>
            <input type="text" class="form-control" id="documento" name="documento" required>
        </div>
        <button type="submit" name="buscarDocumento" class="btn btn-danger">Buscar Estudiante</button>
    </form>

    <!-- Mostrar mensaje -->
    {if isset($mensaje)}
        <div class="alert alert-warning mt-3">{$mensaje}</div>
    {/if}

    <!-- Mostrar datos del estudiante encontrado -->
    {if isset($estudiante)}
        <h3>Datos del Estudiante</h3>
        <p><strong>DNI:</strong> {$estudiante.dni|default:''}</p>
        <p><strong>Nombre:</strong> {$estudiante.nombre|default:''}</p>
        <p><strong>Apellido:</strong> {$estudiante.apellido|default:''}</p>
        <p><strong>Email:</strong> {$estudiante.email|default:''}</p>
        <form action="bajaEstudiante.php" method="POST">
            <!-- Campo oculto con el DNI del estudiante -->
            <input type="hidden" name="dni_estudiante" value="{$estudiante.dni|default:''}">
            <button type="submit" class="btn btn-danger">Eliminar Estudiante</button>
        </form>
    {/if}
</div>

<!-- Scripts necesarios para Bootstrap -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

