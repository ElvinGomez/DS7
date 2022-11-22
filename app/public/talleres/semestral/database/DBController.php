<?php


class DBController extends PDO
{
    // Database Connection Properties
    protected $host = '172.19.0.3';
    protected $user = 'root';
    protected $password = 'secret';
    protected $database = "shopee";
    protected $port = 3306;

    // connection property
    public $con = null;

    // call constructor
    public function __construct()
    {
        $this->con = mysqli_connect($this->host, $this->user, $this->password, $this->database, $this->port);
        if ($this->con->connect_error){
            echo "Fail " . $this->con->connect_error;
        }
    }

    public function __destruct()
    {
        $this->closeConnection();
    }

    // for mysqli closing connection
    protected function closeConnection(){
        if ($this->con != null ){
            $this->con->close();
            $this->con = null;
        }
    }
}
