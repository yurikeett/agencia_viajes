<?php include 'templates/header.php'; ?>
<div class="container">
    <h2 class="text-center">Inicio de Sesión</h2>
    <form action="php/login_process.php" method="POST">
        <div class="form-group">
            <label for="email">Correo Electrónico:</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="password">Contraseña:</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
    </form>
</div>
<?php include 'templates/footer.php'; ?>
