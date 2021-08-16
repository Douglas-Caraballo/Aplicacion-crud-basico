<?php

class ConexionBD{
    public function cBD(){
        $bd = new PDO ("mysql:host=localhost;dbname=aplicacion", "root", "");

        return $bd;
    }
}