<?php
class DatabaseSMS
{

    private $dbHost = '127.0.0.1';
    private $dbUser = 'root';
    private $dbPassword = '';
    private $dbName = 'student_managment_system';

    public function __construct()
    {
    }

    public function connectToDb()
    {
        $db_connection = mysqli_connect($this->dbHost, $this->dbUser, $this->dbPassword, $this->dbName);
        return $db_connection;
        if ($db_connection == false) {
            echo "Error Connection" . mysqli_connect_error();
            die();
        }
    }
    
    function setQuery($query)
    {
        $this->query=$query;
    }


    public function executeQuery()
    {
        $db_connection = $this->connectToDb();
        $result = mysqli_query($db_connection,$this->query);

        if ($result == false) {
            echo " Query Error" . mysqli_error($db_connection);
            die();
        } else
            return $result;
    }


    // bta3mol execution w bterja3 btale3 l data
    public function selectQuery()
    {
        $query_result = $this->executeQuery();
        $resultArray = [];
        $resultArray = mysqli_fetch_all($query_result, MYSQLI_ASSOC);
        return $resultArray;
    }


    public function __destruct()
    {
    }
}
