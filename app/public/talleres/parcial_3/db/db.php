<?php
class db {
        public $isConnected;
        protected $database;
        private $_dbOptionArray;
        const DB_USER = 'tutorial';
        const DB_PASS = 'secret';
        const DB_HOST = 'mysql';
        const DB_NAME = 'classicmodels';

        public function __construct($username, $password, $host, $dbname, $options=array())
        {
        $this->_dbOptionArray = [];
            $this->isConnected = true;
            try { 
                $this->database= new PDO('mysql:dbname=classicmodels;host=mysql', 'tutorial', 'secret', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
            } 
            catch(PDOException $e) { 
                $this->isConnected = false;
                throw new Exception($e->getMessage());
            }
        }       

    public function select($query, $params=array()){
            try{ 
                $stmt = $this->database->prepare($query); 
                $stmt->execute($params);
                return $stmt->fetchAll(PDO::FETCH_UNIQUE|PDO::FETCH_ASSOC);  
                }catch(PDOException $e){
                throw new Exception($e->getMessage());
            }
        }
        public function fetchAllTables() {
            try{ 
                $query = "SHOW TABLES FROM classicmodels";
                $stmt = $this->database->prepare($query); 
                $stmt->execute();
                return $stmt->fetchAll(PDO::FETCH_NUM);  
            }catch(PDOException $e){
                throw new Exception($e->getMessage());
            }
        }
    }
?>