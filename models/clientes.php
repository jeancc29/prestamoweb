<?php

class ClientesModel extends Model{
	public function Index(){
        $this->query("select * from usuarios where tipo_registro_usuario = 86");

        $r = $this->resultSet();

        return $r;
	}

	public function agregar(){
        if(isset($_GET['id']) && !isset($_POST['guardar'])){
            //print_r( is_int($_GET['id']));
            if($_GET['id'] != "" && !is_numeric($_GET['id'])){
                header("location:". ROOT_PATH.'clientes/');
            }
            $this->query("select * from usuarios u inner join tipos_registros t on u.tipo_registro_usuario = t.tipo_registro where codigo_usuario = :codigo_usuario and t.descripcion = 'Cliente' ");
            $this->bind(":codigo_usuario", $_GET['id']);
            $r = $this->resultSet();
            return $r;
        }

		if(isset($_POST['guardar'])){
            $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $codigo_usuario = (isset($_GET['id']) && is_numeric($_GET['id'])) ? $_GET['id'] : null;


			$this->query("exec clientes_actualizar
			                            @codigo_usuario = :codigo_usuario,
										@nombre = :nombre,
										@direccion = :direccion,
										@identificacion = :identificacion,
										@sexo = :sexo,
										@telefono = :telefono,
										@idSector = :sector,
										@correo = :correo,
										@tipo_usuario = :tipo_usuario,
										@fecha_nacimiento = :fecha_nacimiento");
            $this->bind(":codigo_usuario", $codigo_usuario);
			$this->bind(":nombre", $post['nombre']);
            $this->bind(":direccion", $post['direccion']);
            $this->bind(":identificacion", $post['identificacion']);
            $this->bind(":sexo", $post['sexo']);
            $this->bind(":telefono", $post['telefono']);
            $this->bind(":sector", $post['sector']);
            $this->bind(":correo", $post['correo']);
            $this->bind(":fecha_nacimiento", $post['fecha_nacimiento']);
			$r = $this->resultSet();



            if($_GET['id'] == "" || !is_numeric($_GET['id'])){
              //  header("location:". ROOT_PATH.'clientes/');
            }
            $this->query("select * from usuarios u inner join tipos_registros t on u.tipo_registro_usuario = t.tipo_registro where codigo_usuario = :codigo_usuario and t.descripcion = 'Cliente' ");
            $this->bind(":codigo_usuario", $_GET['id']);
            $r = $this->resultSet();
            return $r;

		}


	}
}
