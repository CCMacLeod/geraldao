<?php
    class Banco {
        protected $dbtype;
        protected $dbname;
        protected $dbhost;
        protected $dbuser;
        protected $dbpass;
        protected $conn = null;

        public function __construct() 
        {
            $this->dbtype = getenv('database.default.DBDriver');
            $this->dbname = getenv('database.default.database');
            $this->dbhost = getenv('database.default.hostname');
            $this->dbuser = getenv('database.default.username');
            $this->dbpass = getenv('database.default.password');
        }

        function conectaOracle(){
            try {
                $dsn = "oci:dbname=" . $this->dbhost;
                $this->conn = new PDO($dsn, $this->dbuser, $this->dbpass);
                // Configurar o PDO para lançar exceções em caso de erro
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $this->conn;
            } catch (PDOException $e) {
                echo 'Erro na conexão: ' . $e->getMessage();
            }
        }
    }
