<?php

// Función para devolver el listado de tareas de la variable global
function obtenerTareas() {
    global $tareasGlobales;
    return $tareasGlobales ?? [];
}

// Función para filtrar contenido
function filtrarCampo($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Función para validar campo de texto
function validarTexto($texto) {
    $texto = filtrarCampo($texto);
    return !empty($texto);
}


// Función para guardar una tarea en la variable global
function guardarTarea($descripcion, $estado) {
    // Usar la variable global
    global $tareasGlobales;

    // Si los campos no son válidos devuelve falso
    if (!validarTexto($descripcion) || !in_array($estado, ["pendiente", "en proceso", "completada"])) {
        return false;
    }

    // Crear una nueva tarea y añadirla al array global
    $nuevaTarea = [
        "id" => count($tareasGlobales) + 1, // Generar el ID basado en la cantidad actual de tareas
        "descripcion" => filtrarCampo($descripcion),
        "estado" => $estado
    ];
    $tareasGlobales[] = $nuevaTarea;

    return true;
}
