<?php

$u = new Utilidades();
if($_GET['controller']== "usuarios")
    $u->verificar_session();

class UsuariosModel extends Model{
    public function Index(){

        if(isset($_POST['guardar'])){
            $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $codigo_usuario = (isset($_GET['id']) && is_numeric($_GET['id'])) ? $_GET['id'] : null;


            $this->query("exec sp_usuarios_clave
			                            @codigo_usuario = :codigo_usuario,
										@usuario = :usuario,
										@clave = :clave");
            $this->bind(":codigo_usuario", $post['codigo_usuario']);
            $this->bind(":usuario", $post['usuario']);
            $this->bind(":clave", $post['clave']);

            $r = $this->resultSet();


            return $r;

        }


        return;
    }
}
