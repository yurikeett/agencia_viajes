<?php 
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login_form.php");
    exit();
}
include 'templates/header.php'; 
?>

<div class="container">
    <h1 class="text-center">Carrito de Compras</h1>
    <div id="carrito" class="mt-4">
        <?php if (!empty($_SESSION['carrito'])): ?>
            <table class="table">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Precio</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($_SESSION['carrito'] as $producto): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($producto['nombre']); ?></td>
                            <td>$<?php echo htmlspecialchars($producto['precio']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No hay productos en el carrito.</p>
        <?php endif; ?>
    </div>
</div>

<?php include 'templates/footer.php'; ?>
