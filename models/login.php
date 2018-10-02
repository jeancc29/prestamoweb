<?php

class LoginModel extends Model{
    public function Index(){

        $u = "";
        $error = "";
        if(isset($_POST['login']))
        {
            global $u, $error;
            $u = $_POST['usuario'];
            $c = $_POST['clave'];

            $this->query("exec sp_usuarios_acceder @usuario = :usuario, @clave = :clave");
            $this->bind(":usuario", $u);
            $this->bind(":clave", $c);
            $r = $this->resultSet();

            if($r[0]['error'] == 0)
            {
                //echo "<h1>".$r[0]['error']."</h1>";
                $_SESSION['codigo_usuario'] = $r[0]['codigo_usuario'];
                $_SESSION['nombre'] = $r[0]['nombre'];

               
                if($r[0]['tipo_usuario'] == "Empleado")
                    header("location:". ROOT_PATH.'home');
                else
                    header("location:". ROOT_PATH.'home-clientes');
            }
            else
            {
                $error = $r[0]['info'];
                //echo "<h1>".$r[0]['error']."</h1>";
            }

            //echo "<h1>".$r[0]['error']."</h1>";
           // print_r($r);
           // echo "<h1>".$r[0]['error']."</h1>";
        }
    }
}
