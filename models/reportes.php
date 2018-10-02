<?php

$u = new Utilidades();
if($_GET['controller']== "reportes")
    $u->verificar_session();

class ReportesModel extends Model{
    public function Index(){
        return;
    }

    public function Prestamos(){

        return;

    }

    public function Pagos(){
        return;

    }
    public function Ganancias(){
        return;

    }
}
