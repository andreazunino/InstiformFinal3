<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Incluye el archivo CSS de Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- Incluye tu archivo de estilos personalizados -->
    <style>
    body {
        background: linear-gradient(to bottom, #a1c4fd, #c2e9fb); /* Degradado de fondo */
        min-height: 100vh;
        margin: 0;
        font-family: 'Arial', sans-serif;
    }

    .welcome-heading {
        font-size: 36px;
        font-weight: bold;
        color: #343a40;
        margin-top: 20px;
        text-transform: uppercase;
        letter-spacing: 2px;
        font-family: 'Arial', sans-serif;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
    }

    /* Botón de login personalizado */
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
        background-color: #357abd;
    }

    /* Estilo del modal */
    .modal-content {
        border-radius: 15px;
    }

    /* Centrar contenido de bienvenida */
    .container-welcome {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        height: 100vh;
    }

    /* Estilos del formulario */
    #admin-login-form {
        margin-top: 20px;
        display: none;
    }
    </style>
</head>

<body>
    <div class="container-fluid text-center container-welcome">
        <h1 class="welcome-heading">Bienvenido a Instiform</h1>
        <!-- Aplicación de la clase 'logo-small' para el logo pequeño -->
        <img src="Logo instiform.png" alt="Logo de Instiform" class="img-fluid logo-small">
        <button id="btn-bienvenido" class="btn btn-custom mt-4" data-toggle="modal" data-target="#loginModal">Login</button>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModalLabel">Selecciona tu rol</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <button id="btn-estudiante" onclick="window.location.href='menuEstudiante.php'" class="btn btn-primary btn-block">Soy Estudiante</button>
                    <button id="btn-administrador" class="btn btn-secondary btn-block mt-2" onclick="showAdminLoginForm()">Soy Administrador</button>
                    
                    <!-- Formulario de inicio de sesión para administrador (oculto por defecto) -->
                    <div id="admin-login-form">
                        <form id="admin-login">
                            <div class="form-group">
                                <label for="admin-password">Contraseña</label>
                                <input type="password" id="admin-password" class="form-control" placeholder="Ingresa tu contraseña">
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Entrar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Importa las librerías JavaScript de Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
    function showAdminLoginForm() {
        // Ocultar el botón de administrador y mostrar el formulario de inicio de sesión
        document.getElementById('btn-administrador').style.display = 'none';
        document.getElementById('admin-login-form').style.display = 'block';
    }

    document.getElementById('admin-login').addEventListener('submit', function(e) {
        e.preventDefault(); // Evita que el formulario se envíe de forma tradicional
        
        // Obtener la contraseña del formulario
        var password = document.getElementById('admin-password').value;
        
        // Aquí puedes validar la contraseña. Por ejemplo, usando una contraseña fija.
        // En producción, deberías verificar la contraseña con un servidor de forma segura.
        if (password === 'admin123') {
            // Redirigir a la página de administración si la contraseña es correcta
            window.location.href = 'menuAdministrador.php';
        } else {
            // Si la contraseña es incorrecta, muestra un mensaje de error
            alert('Contraseña incorrecta');
        }
    });
    </script>
</body>

</html>
