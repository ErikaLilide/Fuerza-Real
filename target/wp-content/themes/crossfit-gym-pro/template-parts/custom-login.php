<?php
/* Template Name: Custom Login */
get_header();
?>
<div class="login-form-container">
    <form name="loginform" id="loginform" action="<?php echo site_url('/wp-login.php'); ?>" method="post">
        <p>
            <label for="user_login">Nombre de usuario<br />
            <input type="text" name="log" id="user_login" class="input" value="" size="20" /></label>
        </p>
        <p>
            <label for="user_pass">Contraseña<br />
            <input type="password" name="pwd" id="user_pass" class="input" value="" size="20" /></label>
        </p>
        <p class="forgetmenot">
            <label for="rememberme"><input name="rememberme" type="checkbox" id="rememberme" value="forever" /> Recuérdame</label>
        </p>
        <p class="submit">
            <input type="submit" name="wp-submit" id="wp-submit" class="button button-primary button-large" value="Ingresar" />
            <input type="hidden" name="redirect_to" value="<?php echo $_SERVER['REQUEST_URI']; ?>" />
        </p>
    </form>
</div>
<?php get_footer(); ?>
