<?php
$conexion = new mysqli('localhost', 'root', '', 'acceso');

if (isset($_POST['eliminar']) && isset($_POST['id'])) {
    $id = $_POST['id'];
    $conexion->query("DELETE FROM empleados WHERE empeados_id = '$id'");
}

// if (isset($_POST['editar']) && isset($_POST['id'])) {
//     $id = $_POST['id'];
//     $empleado = $conexion->query("SELECT * FROM empleados WHERE empeados_id = '$id'");
// }

if (isset($_POST['registrar'])) {
    $correo = isset($_POST['correo']) ? $_POST['correo'] : '';
    $clave = isset($_POST['clave']) ? $_POST['clave'] : '';
    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
    $nivel = isset($_POST['nivel']) ? $_POST['nivel'] : '';
    $pregunta1 = isset($_POST['pregunta1']) ? $_POST['pregunta1'] : '';
    $respuesta1 = isset($_POST['respuesta1']) ?  $_POST['respuesta1'] : '';
    $pregunta2 = isset($_POST['pregunta2']) ? $_POST['pregunta2'] : '';
    $respuesta2 = isset($_POST['respuesta2']) ? $_POST['respuesta2'] : '';

    $conexion->query("INSERT INTO `empleados`(`correo`, `clave`, `nombre`, `nivel`, `pregunta1`, `respuesta1`, `pregunta2`, `respuesta2`) VALUES ('$correo','$clave','$nombre','$nivel','$pregunta1','$respuesta1','$pregunta2','$respuesta2')");
}

if (isset($_POST['mostrar']) && isset($_POST['id'])) {
    $id = $_POST['id'];
    $empleado = $conexion->query("SELECT * FROM `empleados` WHERE empeados_id = '$id'");
    $empleado = $empleado->fetch_assoc();
    // var_dump($empleado);
    // die;
}

if (isset($_POST['editar']) && isset($_POST['id'])) {

    $id = $_POST['id'];
    $correo = isset($_POST['correo']) ? $_POST['correo'] : '';
    $clave = isset($_POST['clave']) ? $_POST['clave'] : '';
    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
    $nivel = isset($_POST['nivel']) ? $_POST['nivel'] : '';
    $pregunta1 = isset($_POST['pregunta1']) ? $_POST['pregunta1'] : '';
    $respuesta1 = isset($_POST['respuesta1']) ?  $_POST['respuesta1'] : '';
    $pregunta2 = isset($_POST['pregunta2']) ? $_POST['pregunta2'] : '';
    $respuesta2 = isset($_POST['respuesta2']) ? $_POST['respuesta2'] : '';

    $response = $conexion->query("UPDATE empleados SET correo = '$correo', clave = '$clave', nombre = '$nombre', nivel = '$nivel', pregunta1 = '$pregunta1', respuesta1 = '$respuesta1', pregunta2 = '$pregunta2', respuesta2 = '$respuesta2' WHERE empeados_id = '$id' ");
    // var_dump($conexion);
    // die;
}

$empleados = $conexion->query('SELECT * FROM empleados');

$empleados = $empleados->fetch_all(MYSQLI_ASSOC);

// var_dump($empleados);
// die;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Crud empleados</title>
</head>

<body>
    <div class="container">
        <!-- <div class="row"> -->
        <!-- <div class="col-md-12"> -->

        <form class="row" method="POST" id="formulario">
            <div class="form-group col-md-4">
                <label for="correo">Correo</label>
                <input type="email" class="form-control" id="correo" name="correo" placeholder="Correo" value="<?php echo isset($empleado['correo']) ? $empleado['correo'] : ''; ?>" maxlength="30" minlength="1">
            </div>
            <div class="form-group col-md-4">
                <label for="clave">Clave</label>
                <input type="password" class="form-control" name="clave" id="clave" placeholder="Contraseña" value="<?php echo isset($empleado['clave']) ? $empleado['clave'] : ''; ?>" maxlength="128" minlength="7">
                <small id="passwordError" class="form-text text-muted" style="display: none;">
                    La contraseña debe contener al menos 7 carácteres, una letra mayúscula, una letra minúscula, números y al menos un carácter especial.
                </small>
            </div>
            <div class="form-group col-md-4">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" value="<?php echo isset($empleado['nombre']) ? $empleado['nombre'] : ''; ?>">
            </div>
            <div class="form-group col-md-4">
                <label for="nivel">Nivel</label>
                <select name="nivel" id="nivel" class="form-control">
                    <option value="1" <?php echo isset($empleado['nivel']) && $empleado['nivel'] == '1' ? 'selected' : ''; ?>>Administrador</option>
                    <option value="2" <?php echo isset($empleado['nivel']) && $empleado['nivel'] == '2' ? 'selected' : ''; ?>>Operario</option>
                </select>

            </div>

            <div class="form-group col-md-4">
                <label for="pregunta1">Pregunta 1</label>
                <input type="text" class="form-control" id="pregunta1" name="pregunta1" placeholder="Pregunta 1" value="<?php echo isset($empleado['pregunta1']) ? $empleado['pregunta1'] : ''; ?>">
            </div>

            <div class="form-group col-md-4">
                <label for="respuesta1">Respuesta 1</label>
                <input type="text" class="form-control" id="respuesta1" name="respuesta1" placeholder="Respuesta 1" value="<?php echo isset($empleado['respuesta1']) ? $empleado['respuesta1'] : ''; ?>">
            </div>
            <div class="form-group col-md-4">
                <label for="pregunta2">Pregunta 2</label>
                <input type="text" class="form-control" id="pregunta2" name="pregunta2" placeholder="Pregunta 2" value="<?php echo isset($empleado['pregunta2']) ? $empleado['pregunta2'] : ''; ?>">
            </div>

            <div class="form-group col-md-4">
                <label for="respuesta2">Respuesta 2</label>
                <input type="text" class="form-control" id="respuesta2" name="respuesta2" placeholder="Respuesta 2" value="<?php echo isset($empleado['respuesta2']) ? $empleado['respuesta2'] : ''; ?>">
            </div>
            <div class="col-md-12">
                <?php
                if (empty($empleado)) :
                ?>
                    <button class="btn btn-primary" name="registrar">Registrar</button>
                <?php endif; ?>
                <?php
                if (!empty($empleado)) :
                ?>
                    <button class="btn btn-primary" name="editar">Editar</button>
                <?php endif; ?>
            </div>
            <input type="hidden" value="<?php echo isset($empleado['empeados_id']) ? $empleado['empeados_id'] : ''; ?>" name="id">
        </form>
        <div class="row mt-4">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Nivel</th>
                        <th scope="col">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($empleados as $key => $empleado) :
                    ?>
                        <tr>
                            <th><?php echo $empleado['empeados_id']; ?></th>
                            <td><?php echo $empleado['correo']; ?></td>
                            <td><?php echo $empleado['nombre']; ?></td>
                            <td><?php echo $empleado['nivel'] == '1' ? 'Administrador' : 'Operador'; ?></td>
                            <td>
                                <form method="POST">
                                    <button class="btn btn-primary" name="mostrar">EDITAR</button>
                                    <button class="btn btn-danger" name="eliminar">ELIMINAR</button>
                                    <input type="hidden" value="<?php echo $empleado['empeados_id']; ?>" name="id">
                                </form>
                            </td>
                        </tr>

                    <?php
                    endforeach;
                    ?>

                </tbody>
            </table>


        </div>
        <!-- </div> -->
        <!-- </div> -->
    </div>

    <!-- jquery-->
    <script src="js/jquery-3.5.0.min.js"></script>
    <!-- Popper js -->
    <script src="js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function() {

            $('button[name="registrar"]').click(function(e) {
                e.preventDefault();

                var clave = $('#clave').val();

                let result = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{7,}$/.test(clave);

                if (result) {
                    $('#passwordError').hide();
                    $('#formulario').submit();
                } else {
                    $('#passwordError').show();
                }

            })

            $('button[name="editar"]').click(function(e) {
                e.preventDefault();

                var clave = $('#clave').val();

                let result = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{7,}$/.test(clave);

                if (result) {
                    $('#passwordError').hide();
                    $('#formulario').submit();
                } else {
                    $('#passwordError').show();
                }

            })
        })
    </script>
</body>

</html>