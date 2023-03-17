<?php
    // Cambia esta variable según la configuración de tu servidor
    $uploadDirectory = "img/";

    $response = [
        "success" => false,
        "message" => "",
        "imageName" => "",
    ];

    if (isset($_FILES["image"])) {
        $file = $_FILES["image"];
        $fileName = basename($file["name"]);
        $targetFile = $uploadDirectory . $fileName;

        // Verificar si el archivo es una imagen
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
        $check = getimagesize($file["tmp_name"]);
        if (!$check) {
            $response["message"] = "El archivo no es una imagen.";
            echo json_encode($response);
            exit;
        }

        // Subir el archivo al servidor
        if (move_uploaded_file($file["tmp_name"], $targetFile)) {
            $response["success"] = true;
            $response["message"] = "La imagen se ha subido correctamente.";
            $response["imageName"] = $fileName;
        } else {
            $response["message"] = "Error al subir la imagen.";
        }
    } else {
        $response["message"] = "No se recibió ninguna imagen.";
    }

    header("Content-Type: application/json");
    echo json_encode($response);
?>
