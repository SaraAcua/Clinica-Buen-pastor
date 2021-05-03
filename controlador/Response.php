<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Response
 *
 * @author SARA
 */
class Response {
   
    private $estado;
    private $mensaje;
    private $userId;
    
    
    public function __construct() {
        
    }

    public function getEstado() {
        return $this->estado;
    }

    public function getMensaje() {
        return $this->mensaje;
    }

    public function getUserId() {
        return $this->userId;
    }

    public function setEstado($estado): void {
        $this->estado = $estado;
    }

    public function setMensaje($mensaje): void {
        $this->mensaje = $mensaje;
    }

    public function setUserId($userId): void {
        $this->userId = $userId;
    }


    
    
    
}
