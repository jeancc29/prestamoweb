<?php

class Principal extends Controller{
    public function Index(){
        $viewmodel = new PrincipalModel();
        $this->returnView($viewmodel->Index(), true);
    }

    public function Amortizacion(){
        $viewmodel = new PrincipalModel();
        $this->returnView($viewmodel->Amortizacion(), true);
    }

    public function Sucursales(){
        $viewmodel = new PrincipalModel();
        $this->returnView($viewmodel->Sucursales(), true);
    }
}
