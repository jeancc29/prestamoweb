<?php
$u = new Utilidades();
if($_GET['controller']== "home" || $_GET['controller']== "")
    $u->verificar_session();

class HomeModel extends Model{
	public function Index(){

    

		return;
	}
}
