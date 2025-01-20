<?php
/* Smarty version 5.4.0, created on 2024-11-29 20:33:24
  from 'file:templates/index.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.0',
  'unifunc' => 'content_674a1704f27931_27013325',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5532fde51bc345d6c1e7e68feecb250c71c7b425' => 
    array (
      0 => 'templates/index.tpl',
      1 => 1732300742,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_674a1704f27931_27013325 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Instiform nuevo\\instiSmarty\\Instiform\\app\\frontend\\templates';
$_smarty_tpl->getCompiled()->nocache_hash = '1428425683674a1704ea1ee3_24152031';
?>
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
    <?php echo '<script'; ?>
 src="https://code.jquery.com/jquery-3.5.1.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"><?php echo '</script'; ?>
>

    <?php echo '<script'; ?>
>
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
    <?php echo '</script'; ?>
>
</body>

</html>
<?php }
}
