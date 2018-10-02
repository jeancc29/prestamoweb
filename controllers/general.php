<?php

class General extends Controller{
    public function Index(){
        return;
    }

    public function tipo_registro(){
        $viewmodel = new GeneralModel();
        $this->returnView($viewmodel->tipo_registro(), true);
    }
}
