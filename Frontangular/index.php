<?php
// index.php: Producto Recomendado de Hoy con diseño minimalista y detalles de tienda
$products = json_decode(file_get_contents('https://fakestoreapi.com/products'), true);
$product = $products[array_rand($products)];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>TIENDA ONLINE - Producto Recomendado de Hoy</title>
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
            font-size: 3rem; /* Aumenta el tamaño del texto */
            color: #333 !important;
            margin: 0 auto;
            text-align: center;
        }
        .container {
            margin-top: 15px;
        }
        .featured-title {
            font-size: 2rem; /* Aumenta el tamaño del título */
            font-weight: bold; /* Se muestra en negrita */
            color: #333;
            margin-bottom: 5px;
        }
        .featured-subtitle {
            font-size: 1.2rem;
            color: #777;
            margin-bottom: 40px;
        }
        /* Estilo de tarjeta simplificado */
        .card {
            border: none;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 6px rgba(0,0,0,0.08);
            background-color: #fff;
        }
        .card-img-top {
            height: 280px;
            object-fit: contain;
            background-color: #fafafa;
            padding: 20px;
        }
        .card-body {
            padding: 20px;
        }
        .card-title {
            font-size: 1.2rem;
            /* Puedes ajustar el peso si lo deseas, por ejemplo: font-weight: bold; */
        }
        /* Botones minimalistas */
        .btn-primary {
            background-color: #333;
            border: none;
            border-radius: 20px;
            padding: 10px 25px;
            transition: background-color 0.3s ease;
        }
        .btn-primary:hover {
            background-color: #555;
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
    
    <div class="container text-center"><br><br><br><br><br><br><br>
        <h1 class="featured-title"><b>PRODUCTO RECOMENDADO DE HOY</b></h1>
        <p class="featured-subtitle">Descubre nuestros productos seleccionados especialmente para ti.</p><br>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <img src="<?php echo $product['image']; ?>" class="card-img-top" alt="<?php echo htmlspecialchars($product['title']); ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo htmlspecialchars($product['title']); ?></h5>
                        <p class="card-text"><strong>Precio:</strong> $<?php echo $product['price']; ?></p>
                        <a href="detalle.php?id=<?php echo $product['id']; ?>" class="btn btn-primary">Ver detalles</a>
                    </div>
                </div>
                <div class="mt-4">
                    <a href="listado.php" class="btn btn-secondary">Ver listado</a>
                </div>
            </div>
        </div>
    </div>
    
    <div class="footer">
        &copy; <?php echo date("Y"); ?> TIENDA ONLINE. Todos los derechos reservados.
    </div>
</body>
</html>
