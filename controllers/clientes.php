<?php

class Clientes extends Controller{
	public function Index(){
		$viewmodel = new ClientesModel();
		$this->returnView($viewmodel->Index(), true);
	}

	public function agregar(){
		$viewmodel = new ClientesModel();
		$this->returnView($viewmodel->agregar(), true);
	}
}
