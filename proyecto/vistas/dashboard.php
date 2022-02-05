<?php
session_start();

if (empty($_SESSION['usuario'])) {
    header('Location: ../index.php');
    exit;
}


// var_dump($_SESSION['usuario']['nivel']);
// die;
$backgroundColor = $_SESSION['usuario']['nivel'] == '1' ? 'yellow' : 'blue';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>

<body style="background-color: <?php echo $backgroundColor; ?>;">
    <div style="display: flex; justify-content: end;">
        <form action="../controladores/Login.php?tipo=logout" method="POST">
            <button type="submit">Cerrar sesión</button>
        </form>
    </div>
</body>

</html>