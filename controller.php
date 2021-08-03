<?php
class Controller
{
    public function view($name, $data = [])
    {
        extract($data);
       
        require __DIR__ . '/view/' . strtolower($name) . '.php';
    }
    public function model($name)
    {
        
    }
}
