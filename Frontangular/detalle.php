<?php
// detalle.php: Muestra todos los campos del producto, incluida la imagen, calificación y cantidad
if (!isset($_GET['id'])) {
    echo "Producto no especificado.";
    exit;
}
$id = intval($_GET['id']);
$product = json_decode(file_get_contents("https://fakestoreapi.com/products/$id"), true);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>DETALLE DEL PRODUCTO</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Fuente moderna -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #f7f7f7;
            font-family: 'Montserrat', sans-serif;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .container {
            margin-top: 100px;
        }
        .card {
            border: none;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 6px rgba(0,0,0,0.08);
            background-color: #fff;
            margin: 0 auto;
        }
        .card-img {
            height: 300px;
            object-fit: contain;
            background-color: #fafafa;
            padding: 20px;
        }
        .card-body {
            padding: 20px;
        }
        .card-title {
            font-size: 1.4rem;
            font-weight: 600;
        }
        .btn-secondary {
            background-color: transparent;
            border: 1px solid #333;
            border-radius: 20px;
            padding: 10px 25px;
            color: #333;
            transition: background-color 0.3s ease;
        }
        .btn-secondary:hover {
            background-color: #e0e0e0;
        }
    </style>
</head>
<body>
<div class="container">
    <h1 class="text-center mb-4"><strong>DETALLE DEL PRODUCTO</strong></h1> 
    <div class="card mb-3" style="max-width: 800px;">
        <div class="row no-gutters">
            <div class="col-md-4">
                <img src="<?php echo $product['image']; ?>" class="card-img" alt="<?php echo htmlspecialchars($product['title']); ?>">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><?php echo htmlspecialchars($product['title']); ?></h5>
                    <p class="card-text"><strong>Descripción:</strong> <?php echo htmlspecialchars($product['description']); ?></p>
                    <p class="card-text"><strong>Precio:</strong> $<?php echo $product['price']; ?></p>
                    <p class="card-text"><strong>Categoría:</strong> <?php echo htmlspecialchars($product['category']); ?></p>
                    <p class="card-text"><strong>Calificación:</strong> <?php echo isset($product['rating']['rate']) ? $product['rating']['rate'] : 'N/A'; ?></p>
                    <p class="card-text"><strong>Cantidad:</strong> <?php echo isset($product['rating']['count']) ? $product['rating']['count'] : 'N/A'; ?></p>
                    <a href="index.php" class="btn btn-secondary mt-3">Home</a>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
