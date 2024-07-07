<?php 
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login_form.php");
    exit();
}
include 'templates/header.php'; 
require 'db/connection.php'; // Archivo para la conexión a la base de datos

$query = "SELECT * FROM paquetes";
$result = mysqli_query($conn, $query);
?>

<div class="container">
    <h1 class="text-center">Bienvenido a la Agencia de Viajes</h1>
    <div class="row">
        <div class="col-lg-12">
            <div class="jumbotron">
                <h1 class="display-4">¡Explora nuestros paquetes turísticos!</h1>
                <p class="lead">Encuentra el paquete perfecto para tu próximo viaje.</p>
                <a class="btn btn-primary btn-lg" href="paquetes.php" role="button">Ver Paquetes</a>
            </div>
        </div>
    </div>
    <div class="row">
        <?php while($row = mysqli_fetch_assoc($result)): ?>
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo htmlspecialchars($row['nombre']); ?></h5>
                        <p class="card-text"><?php echo htmlspecialchars($row['descripcion']); ?></p>
                        <p class="card-text">Precio: $<?php echo htmlspecialchars($row['precio']); ?></p>
                        <form method="post" action="agregar_carrito.php">
                            <input type="hidden" name="nombre" value="<?php echo htmlspecialchars($row['nombre']); ?>">
                            <input type="hidden" name="precio" value="<?php echo htmlspecialchars($row['precio']); ?>">
                            <button type="submit" class="btn btn-primary">Agregar al Carrito</button>
                        </form>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</div>

<?php include 'templates/footer.php'; ?>
