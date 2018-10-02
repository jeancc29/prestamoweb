<?php

class Home2 extends Controller{
    public function Index(){
        $viewmodel = new Home2Model();
        $this->returnView($viewmodel->Index(), true);
    }
}
