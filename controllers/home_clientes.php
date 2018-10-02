<?php

class Home_Clientes extends Controller{
    public function Index(){
        $viewmodel = new Home_Clientes_Model();
        $this->returnView($viewmodel->Index(), true);
    }
}
