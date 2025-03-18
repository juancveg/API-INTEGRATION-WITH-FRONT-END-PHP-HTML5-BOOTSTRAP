<?php
// listado.php: Muestra una tabla con los productos sin imágenes
$products = json_decode(file_get_contents('https://fakestoreapi.com/products'), true);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>TIENDA ONLINE - Listado de Productos</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Fuente limpia y moderna -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #f7f7f7;
            font-family: 'Montserrat', sans-serif;
            color: #333;
            margin: 0;
            padding: 0;
        }
        /* Navbar minimalista centrada */
        .navbar {
            background-color: #fff;
            border-bottom: 1px solid #e0e0e0;
        }
        .navbar-brand {
            font-weight: bold;
            font-size: 1.5rem;
            color: #333 !important;
            margin: 0 auto;
            text-align: center;
        }
        .container {
            margin-top: 15px;
        }
        .page-title {
            font-size: 2rem;
            font-weight: bold;
            color: #333;
            margin-bottom: 5px;
            text-align: center;
        }
        .page-subtitle {
            font-size: 1.2rem;
            color: #777;
            margin-bottom: 40px;
            text-align: center;
        }
        .table-container {
            margin: 0 auto;
            max-width: 1200px;
        }
        .table-responsive {
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            border-radius: 10px;
            overflow: hidden;
        }
        .table thead th {
            vertical-align: middle;
            text-align: center;
            font-size: 1rem;
            background-color: #333;
            color: #fff;
            border: none;
            padding: 15px;
        }
        .table tbody td {
            vertical-align: middle;
            text-align: center;
            font-size: 0.9rem;
            border-top: 1px solid #dee2e6;
            padding: 12px;
        }
        .table tbody tr:hover {
            background-color: #f1f1f1;
        }
        .btn-outline-dark {
            border-radius: 20px;
            padding: 10px 25px;
        }
        /* Footer sutil */
        .footer {
            margin-top: 60px;
            padding: 20px 0;
            background-color: #fff;
            border-top: 1px solid #e0e0e0;
            text-align: center;
            color: #777;
            font-size: 0.9rem;
        }
    </style>
</head>
<body>
    <!-- Navbar minimalista centrada -->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand" href="index.php"><strong>TIENDA ONLINE</strong></a>
        </div>
    </nav>
    
    <div class="container text-center"><br><br><br><br>
        <h1 class="page-title">LISTADO DE PRODUCTOS</h1>
        <p class="page-subtitle">Consulta el listado completo de nuestros productos disponibles.</p>
        <div class="table-container">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Título</th>
                            <th>Precio</th>
                            <th>Categoría</th>
                            <th>Descripción</th>
                            <th>Calificación</th>
                            <th>Cantidad</th>
                            <th>Opción</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($products as $product): ?>
                        <tr>
                            <td><?php echo $product['id']; ?></td>
                            <td><?php echo htmlspecialchars($product['title']); ?></td>
                            <td>$<?php echo $product['price']; ?></td>
                            <td><?php echo htmlspecialchars($product['category']); ?></td>
                            <td><?php echo htmlspecialchars($product['description']); ?></td>
                            <td><?php echo isset($product['rating']['rate']) ? $product['rating']['rate'] : 'N/A'; ?></td>
                            <td><?php echo isset($product['rating']['count']) ? $product['rating']['count'] : 'N/A'; ?></td>
                            <td>
                                <a href="detalle.php?id=<?php echo $product['id']; ?>" class="btn btn-outline-dark">Ver Detalles</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="mt-4 text-center"><br>
            <a href="index.php" class="btn btn-secondary" style="border-radius: 20px; padding: 10px 25px;">Home</a>
        </div>
    </div>
    
    <div class="footer">
        &copy; <?php echo date("Y"); ?> TIENDA ONLINE. Todos los derechos reservados.
    </div>
</body>
</html>
