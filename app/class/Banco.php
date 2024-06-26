<?php
    class Banco {
        protected $dbtype;
        protected $dbname;
        protected $dbhost;
        protected $dbuser;
        protected $dbpass;
        var $conn = null;

        public function __construct() {
            $this->dbhost = getenv('database.default.hostname');
            $this->dbuser = getenv('database.default.username');
            $this->dbpass = getenv('database.default.password');
            $this->conectaOracle();
        }

        function conectaOracle() {
            try {
                $this->conn = new PDO("oci:dbname=" . $this->dbhost, $this->dbuser, $this->dbpass);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo 'Connection failed: ' . $e->getMessage();
            }
        }
    }
