<?php


class DBController extends PDO
{
    // Database Connection Properties
    protected $host = 'sql3.freemysqlhosting.net';
    protected $user = 'sql3457968';
    protected $password = 'NctgCVifbG';
    protected $database = "sql3457968";
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
