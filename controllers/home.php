<?php

class Home extends Controller{
    public function Index(){
        $viewmodel = new HomeModel();
        $this->returnView($viewmodel->Index(), true);
    }
}
