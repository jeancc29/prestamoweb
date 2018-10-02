<?php

$u = new Utilidades();
if($_GET['controller']== "prestamos")
    $u->verificar_session();

class PrestamosModel extends Model{
    public $comboCliente = "jean carlos";
    public function Index(){
        $this->query("exec sp_prestamos_obtener_todos");
        return $this->resultSet();
    }

    public function Nuevo(){
        if(isset($_POST['detalle'])){ $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING); }
        if(isset($_POST['guardar'])){
            $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);




            $this->query("exec sp_prestamos_actualizar
										@codigo_usuario = :codigo_usuario,
										@codigo_usuario_registro = :codigo_usuario_registro,
										@capital = :capital,
										@porciento_interes = :porciento_interes,
										@cantidad_cuotas = :cantidad_cuotas,
										@codigo_usuario_garante = :codigo_usuario_garante,
										@monto_prestamo = :monto_prestamo,
										@tipo_prestamo = :tipo_prestamo,
										@detalle = :detalle,
										@formapago = :formapago,
										@fecha = :fechaapertura,
										@mora_porcentaje = :mora
										");
            $this->bind(":codigo_usuario", $post['codigo_cliente']);
            $this->bind(":codigo_usuario_registro", $_SESSION['codigo_usuario']);
            $this->bind(":capital", $post['monto']);
            $this->bind(":porciento_interes", $post['tasa']);
            $this->bind(":cantidad_cuotas", $post['cuotas']);
            $this->bind(":codigo_usuario_garante", $post['codigo_garante']);
            $this->bind(":monto_prestamo", $post['monto']);
            $this->bind(":tipo_prestamo", $post['tipo_prestamo']);
            $this->bind(":detalle", $post['detalle']);
            $this->bind(":formapago", $post['forma_pago']);
            $this->bind(":fechaapertura", $post['fecha']);
            $this->bind(":mora", $post['mora']);
            $r = $this->resultSet();






        }


    }
}
