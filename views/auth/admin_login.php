<div>
    <form action="<?php echo controller('auth.controller.php') ?>" method="post">
        <h3>Admin Login</h3>
        <?php echo hidden_field('auth_admin') ?>
        <?php require_once view('partials/login_fields.php') ?>
    </form>
</div>