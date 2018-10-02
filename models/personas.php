<?php


$u = new Utilidades();
if($_GET['controller']== "personas")
    $u->verificar_session();

class PersonasModel extends Model{
    public function Index(){
        $this->query("select * from usuarios");

        $r = $this->resultSet();

        return $r;
    }

    public function agregar(){
        if(isset($_GET['id']) && !isset($_POST['guardar'])){

            if($_GET['id'] != "" && !is_numeric($_GET['id'])){
                header("location:". ROOT_PATH.'clientes/');
            }
            $this->query("select * from usuarios u inner join tipos_registros t on u.tipo_registro_usuario = t.tipo_registro where codigo_usuario = :codigo_usuario ");
            $this->bind(":codigo_usuario", $_GET['id']);
            $r = $this->resultSet();
            return $r;
        }

        if(isset($_POST['guardar'])){
            $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $codigo_usuario = (isset($_GET['id']) && is_numeric($_GET['id'])) ? $_GET['id'] : null;

            
            $this->query("exec persona_actualizar
			                            @codigo_usuario = :codigo_usuario,
										@nombre = :nombre,
										@direccion = :direccion,
										@identificacion = :identificacion,
										@sexo = :sexo,
										@telefono = :telefono,
										@idSector = :sector,
										@correo = :correo,
                                        @tipo_usuario = :tipo_usuario,
										@tipo_cliente = :tipo_cliente,
										@fecha_nacimiento = :fecha_nacimiento");
            $this->bind(":codigo_usuario", $codigo_usuario);
            $this->bind(":nombre", $post['nombre']);
            $this->bind(":direccion", $post['direccion']);
            $this->bind(":identificacion", $post['identificacion']);
            $this->bind(":sexo", $post['sexo']);
            $this->bind(":telefono", $post['telefono']);
            $this->bind(":sector", $post['sector']);
            $this->bind(":correo", $post['correo']);
            $this->bind(":tipo_usuario", $post['tipo_usuario']);
            $this->bind(":tipo_cliente", $post['tipo_cliente']);
            $this->bind(":fecha_nacimiento", $post['fecha_nacimiento']);
            $r = $this->resultSet();

            print_r($r);


            $this->query("select * from usuarios u inner join tipos_registros t on u.tipo_registro_usuario = t.tipo_registro where codigo_usuario = :codigo_usuario and t.descripcion = 'Cliente' ");
            $this->bind(":codigo_usuario", $_GET['id']);
            $r = $this->resultSet();
            if(isset($_GET['id'])){
                header("location:". ROOT_PATH.'personas/agregar/' . $_GET['id']);
            }
            else {
                header("location:". ROOT_PATH.'personas/agregar/');
            }

            return $r;

        }


    }
}
