<div>
    <form action="<?php '/app/controllers/auth.controller.php' ?>" method="post">
        <h3>Admin Login</h3>
        <input type="hidden" name="auth_admin" value="1">
        <?php require_once view('partials/login_fields.php') ?>
    </form>
</div>