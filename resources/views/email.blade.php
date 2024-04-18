<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Notificación</title>
    <style>
        .header {
            background-color: #28a745; /* Verde */
            color: white;
            padding: 10px;
            text-align: center;
        }
        .content {
            padding: 20px;
            background-color: white;
        }
        .footer {
            background-color: #dc3545; /* Rojo */
            color: white;
            padding: 10px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="https://via.placeholder.com/150" alt="Logo" style="width: 100px; height: auto;">
            <h1>¡Notificación Importante!</h1>
        </div>
        <div class="content">
            <p>Hola {{ $user0->name }}</p>
            <p>Queremos informarte sobre una actualización importante en tu cuenta. Por favor, verifica tus datos y confirma que todo está correcto.</p>
            <p>Si tienes alguna duda o consulta, no dudes en contactarnos.</p>
            <p>¡Gracias por tu atención!</p>
        </div>
        <div class="footer">
            <p>Contacto: info@tusitio.com</p>
        </div>
    </div>
</body>
</html>