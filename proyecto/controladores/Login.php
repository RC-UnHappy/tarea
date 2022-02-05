<?php
class Login
{
    public $correo = '';
    public $clave = '';
    public function __construct()
    {
        session_start();
    }

    public function login()
    {
        if (empty($this->correo) && empty($this->clave)) {
            header('Location: ../index.php');
            exit;
        }

        require_once './../modelos/Conexion.php';

        $conexion = new Conexion();
        $login = $conexion->login($this->correo, $this->clave);

        if (!empty($login)) {
            $_SESSION['usuario'] = $login;
            header('Location: ../vistas/dashboard.php');
            exit;
        } else {
            $_SESSION['errores']['login'] = 'Usuario o contraseña incorrecta';
            header('Location: ../index.php');
            exit;
        }
    }

    public function logout()
    {
        unset($_SESSION['usuario']);
        session_destroy();
        header('Location: ../index.php');
        exit;
    }
}

$tipo = isset($_GET['tipo']) ? $_GET['tipo'] : '';

switch ($tipo) {
    case 'login':
        $correo = isset($_POST['correo']) ? $_POST['correo'] : '';
        $clave = isset($_POST['clave']) ? $_POST['clave'] : '';

        $login = new Login();
        $login->correo = $correo;
        $login->clave = $clave;
        $login->login();
        break;

    case 'logout':

        $login = new Login();
        $login->logout();
        break;

    default:
        header('Location: ../index.php');
        exit;
        break;
}
