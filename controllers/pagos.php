<?php

class Pagos extends Controller{
    public function Index(){
        $viewmodel = new PagosModel();
        $this->returnView($viewmodel->Index(), true);
    }
}
