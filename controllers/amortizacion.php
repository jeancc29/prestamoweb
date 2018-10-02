<?php

class Amortizacion extends Controller{
    public function Index(){
        $viewmodel = new AmortizacionModel();
        $this->returnView($viewmodel->Index(), true);
    }
}
