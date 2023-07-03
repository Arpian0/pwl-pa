<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f7f7f7;
        margin: 0;
        padding: 0;
    }

    .container {
        max-width: 400px;
        margin: 100px auto;
        background-color: #fff;
        border-radius: 5px;
        padding: 20px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    h2 {
        margin-top: 0;
        margin-bottom: 20px;
        text-align: center;
    }

    .form-group {
        margin-bottom: 20px;
    }

    label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
    }

    input[type="email"],
    input[type="password"] {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    button[type="submit"] {
        display: block;
        width: 100%;
        padding: 10px;
        background-color: #4caf50;
        color: #fff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    button[type="submit"]:hover {
        background-color: #45a049;
    }

    .alert {
        margin-bottom: 20px;
        padding: 10px;
        border-radius: 4px;
    }

    .alert-success {
        background-color: #dff0d8;
        color: #3c763d;
    }

    .alert-danger {
        background-color: #f2dede;
        color: #a94442;
    }
</style>

<?php if (session()->getFlashData('success')) : ?>
    <div class="alert alert-success"><?= session()->getFlashData('success') ?></div>
<?php endif; ?>

<?php if (session()->getFlashData('error')) : ?>
    <div class="alert alert-danger"><?= session()->getFlashData('error') ?></div>
<?php endif; ?>

<form class="container" action="/register" method="post">
    <h2>Register</h2>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" id="password" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="confirm_password">Confirm Password</label>
        <input type="password" name="confirm_password" id="confirm_password" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Register</button>
    <p>Sudah Punya Akun? <a href="/">Login</a></p>
</form>