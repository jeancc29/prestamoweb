<?php

class Prestamos extends Controller{
    public function Index(){
        $viewmodel = new PrestamosModel();
        $this->returnView($viewmodel->Index(), true);
    }

    public function Nuevo(){
        $viewmodel = new PrestamosModel();
        $this->returnView($viewmodel->Nuevo(), true);
    }
}
