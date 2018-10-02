<?php

class Personas extends Controller{
    public function Index(){
        $viewmodel = new PersonasModel();
        $this->returnView($viewmodel->Index(), true);
    }

    public function agregar(){
        $viewmodel = new PersonasModel();
        $this->returnView($viewmodel->agregar(), true);
    }
}
