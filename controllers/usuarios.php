<?php

class Usuarios extends Controller{
    public function Index(){
        $viewmodel = new UsuariosModel();
        $this->returnView($viewmodel->Index(), true);
    }
}
