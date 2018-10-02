<?php

class Login extends Controller{
    public function Index(){
        $viewmodel = new LoginModel();
        $this->returnView($viewmodel->Index(), true);
    }
}
