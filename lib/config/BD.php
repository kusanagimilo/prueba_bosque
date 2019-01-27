<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of BD
 *
 * @author JuanCamilo
 */
include_once 'conf.php';

class BD {

    public $db;
    private static $dns = "mysql:host=".HOST.";dbname=".BD."";
    private static $user = USUARIO;
    private static $pass = PASSWORD;
    private static $instance;

    public function __construct() {
        $this->db = new PDO(self::$dns, self::$user, self::$pass);
    }

    public static function getInstance() {
        if (!isset(self::$instance)) {
            $object = __CLASS__;
            self::$instance = new $object;
        }
        return self::$instance;
    }

}
