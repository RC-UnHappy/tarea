<?php

class Conexion
{
    protected $hostname = 'localhost';
    protected $user = 'root';
    protected $password = '';
    protected $db = 'acceso';
    protected $conexion;

    protected function conectar()
    {
        return $this->conexion = new mysqli($this->hostname, $this->user, $this->password, $this->db);
    }

    public function login($correo, $clave)
    {
        $this->conectar();
        $resultado = $this->conexion->query("SELECT * FROM empleados WHERE correo = '$correo' AND clave = '$clave'");

        return $resultado->fetch_assoc();
    }
}
