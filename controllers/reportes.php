<?php

class Reportes extends Controller{
    public function Index(){
        $viewmodel = new ReportesModel();
        $this->returnView($viewmodel->Index(), true);
    }

    public function Prestamos(){
        $viewmodel = new ReportesModel();
        $this->returnView($viewmodel->Prestamos(), true);
    }

    public function Pagos(){
        $viewmodel = new ReportesModel();
        $this->returnView($viewmodel->Pagos(), true);
    } 

    public function Ganancias(){
        $viewmodel = new ReportesModel();
        $this->returnView($viewmodel->Ganancias(), true);
    }
}
