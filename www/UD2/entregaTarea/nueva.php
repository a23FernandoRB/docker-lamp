<?php
include 'utils.php';

// Declaramos una variable global para almacenar las tareas
global $tareasGlobales;
$tareasGlobales = $tareasGlobales ?? [];// inicializa la variable como lista vacía si es nula

// Verificar si se recibió el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los valores del formulario
    $descripcion = $_POST['descripcion'];
    $estado = $_POST['estado'];

    // Llamar a la función para guardar la tarea
    if (guardarTarea($descripcion, $estado)) {
        $mensaje = "Tarea guardada con éxito.";
    } else {
        $mensaje = "Error: Verifica que los campos sean válidos.";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php include 'header.php'; ?>
    <div class="container-fluid">
        <div class="row">
            <?php include 'menu.php'; ?>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h2>Resultado de la Operación</h2>
                </div>
                <div class="container">
                    <p><?php 
                    // Transforma los caracteres especiales a html e imprime el mensaje
                    echo htmlspecialchars($mensaje); 
                    ?></p>
                </div>
            </main>
        </div>
    </div>
    <?php include 'footer.php'; ?>
</body>
</html>
