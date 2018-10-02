<?php
$u = new Utilidades();
if($_GET['controller']== "pagos")
    $u->verificar_session();

class PagosModel extends Model{
    public function Index(){

        return;
    }
}
