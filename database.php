<?php

    class DbConnect{
        private static ?DbConnect $_instancia = null;
        private PDO $_connection;
        private String $_host = 'localhost';
        private String $_database = 'testdb';
        private String $_user = 'root';
        private String $_password = '';
        private $_opts = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false
        ];
        
        private function __construct(){
            try{
                $testHost = 'localhost';
                $this->_connection = new PDO("mysql:host=$this->_host;dbname=$this->_database", $this->_user, $this->_password, $this->_opts);
            }catch(PDOException $e){
                echo 'Conexion fallida: '.$e->getMessage();
            }
        }
        private function __clone(){}
        public function connection(): PDO{
            return $this->_connection;
        }
        public static function getInstance(): DbConnect{
            if(self::$_instancia == null){
                self::$_instancia = new DbConnect();
            }
            return self::$_instancia;
        }

    }