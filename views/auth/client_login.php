<div>
    <form action="<?php '/app/controllers/auth.controller.phpp' ?>" method="post">
        <h3>Client Login</h3>
        <input type="hidden" name="auth_client" value="1">
        <?php require_once view('partials/login_fields.php') ?>
    </form>
</div>