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
    <h1 class="welcome-heading">Instiform</h1>
</div>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mx-auto d-flex">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Administrar Estudiantes
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="altaEstudiante.php">Dar de Alta</a>
                    <a class="dropdown-item" href="bajaEstudiante.php">Dar de Baja</a>
                    <a class="dropdown-item" href="modificarEstudiante.php">Modificar Datos</a>
                    <a class="dropdown-item" href="verDatosEstudiante.php">Ver Datos de estudiantes</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Administrar Cursos
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="darAltaCurso.php">Dar de Alta</a>
                    <a class="dropdown-item" href="darBajaCurso.php">Dar de Baja</a>
                    <a class="dropdown-item" href="modificarDatosCurso.php">Modificar Datos</a>
                    <a class="dropdown-item" href="listarCursos.php">Listar cursos</a>
                    <a class="dropdown-item" href="notas.php">Notas</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Administrar Inscripciones
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="inscribirEstudiante.php">Inscribir</a>
                    <a class="dropdown-item" href="borrarInscripcion.php">Borrar Inscripción</a>
                    <a class="dropdown-item" href="listarInscripciones.php">Listar Inscripciones</a>
                </div>
            </li>
        </ul>
    </div>
</nav>

<div class="container text-center">
    <h2>Bienvenido Administrador</h2>
    <!-- ver si agregamos texto -->
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>