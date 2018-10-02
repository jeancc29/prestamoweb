<?php

$u = new Utilidades();
if($_GET['controller']== "amortizacion")
    $u->verificar_session();

class AmortizacionModel extends Model{
    public function Index(){



        return;
    }
}
