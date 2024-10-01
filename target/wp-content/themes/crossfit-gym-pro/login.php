<?php
// Asegurarse de que WordPress esté cargado
if (!defined('ABSPATH')) {
    exit;
}

// Inicia el procesamiento del formulario si se ha enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['wp-submit'])) {
    $creds = array(
        'user_login'    => sanitize_user($_POST['user_login']),
        'user_password' => $_POST['user_pass'],
        'remember'      => isset($_POST['rememberme']) ? true : false
    );

    $user = wp_signon($creds, false);

    if (is_wp_error($user)) {
        echo '<div class="error">' . $user->get_error_message() . '</div>';
    } else {
        wp_redirect(home_url());
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Inicio de Sesión</title>
    <style>
        /* Añade algo de estilo básico */
        form { max-width: 400px; margin: 0 auto; padding: 1em; }
        .input { width: 100%; padding: 10px; margin: 10px 0; }
        .button { padding: 10px 20px; }
        .error { color: orangered; }
    </style>
</head>
<body>

<h2>Iniciar Sesión</h2>
<form method="post" action="<?php echo esc_url($_SERVER['REQUEST_URI']); ?>">
    <p>
        <label for="user_login">Nombre de usuario:</label>
        <input type="text" name="user_login" id="user_login" class="input" value="" size="20" required />
    </p>
    <p>
        <label for="user_pass">Contraseña:</label>
        <input type="password" name="user_pass" id="user_pass" class="input" value="" size="20" required />
    </p>
    <p class="submit">
        <input type="submit" name="wp-submit" id="wp-submit" class="button button-primary" value="Iniciar sesión" />
        <input type="hidden" name="redirect_to" value="<?php echo esc_url(home_url()); ?>" />
    </p>
</form>

</body>
</html>
