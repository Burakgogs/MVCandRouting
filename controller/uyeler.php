<?php

class Uyeler extends Controller{

    public function index(){

        $this->view('uyeler');

    }
    public function post(){
        print_r($_POST);
    }
}
?>