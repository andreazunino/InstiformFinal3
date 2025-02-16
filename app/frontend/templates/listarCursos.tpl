<!DOCTYPE html>
<html lang="es">
<meta charset="UTF-8">
{include 'templates/head.tpl'} <!-- Aquí se incluye el archivo head.tpl que puedes configurar con los metadatos comunes -->


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
        {if $mensaje}
            <div class="alert alert-{$mensaje_tipo} alert-dismissible fade show" role="alert">
                {$mensaje}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        {/if}

        {if $cursos|@count > 0}
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre del Curso</th>
                    </tr>
                </thead>
                <tbody>
                    {foreach from=$cursos item=curso}
                        <tr>
                            <td>{$curso.id}</td>
                            <td>{$curso.nombre}</td>
                        </tr>
                    {/foreach}
                </tbody>
            </table>
        {else}
            <p>No hay cursos disponibles.</p>
        {/if}
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
