<?php

class Conexion extends PDO {
    public function __construct () {
        try {
                parent:: __construct('mysql:host=localhost;dbname=dpto_fisica', 'root', '');
                parent:: setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }
}
