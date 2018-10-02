<?php

$u = new Utilidades();
if($_GET['controller']== "general")
    $u->verificar_session();


class GeneralModel extends Model{
    public function Index(){
        return;
    }

    public function tipo_registro(){
        $r = "";
        $d = "";
        $error = 0;
        $info = "";
        if(isset($_POST['guardar']))
        {
            global $r, $d, $error, $info;
            $r = $_POST['renglon'];
            $d = $_POST['descripcion'];

            $this->query("exec sp_tipos_registros_actualizar
										@renglon = :r,
										@descripcion = :d");
            $this->bind(":r", $r);
            $this->bind(":d", $d);
            $r = $this->resultSet();
            if($r[0]['error'] == 0)
            {
                $info = $r[0]['info']."</h1>";
                $error = 2;


            }
            else
            {
                $info = $r[0]['info'];
                $error = 1;
                //echo "<h1>".$r[0]['error']."</h1>";
            }
        }
    }
}
