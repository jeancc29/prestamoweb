<?php

$u = new Utilidades();
if($_GET['controller']== "home-clientes")
    $u->verificar_session();

class Home_Clientes_Model extends Model{
    public function Index(){



        return;
    }
}
