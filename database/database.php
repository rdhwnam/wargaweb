<?php

class Database
{
    // properti data database
    private $host = 'localhost';
    private $username = 'root';
    private $passwd = '';
    private $dbname = 'wargaweb_db';

    // properti koneksi
    public $conn = null;

    // fungsi koneksi database
    public function databaseConnection()
    {
        $conn = mysqli_connect($this->host, $this->username, $this->passwd, $this->dbname);

        // pengecekan koneksi database
        if (!$conn) {
            die('Error : ' . mysqli_connect_error());
        }

        return $conn;
    }
}
