<?php
/**
 * Created by IntelliJ IDEA.
 * User: madhuranga
 * Date: 3/14/16
 * Time: 2:25 PM
 */


class Database_connection
{

//Create Database connection
    public function db_connection()
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $db = "adtracker2015";


        $conn = mysqli_connect($servername, $username, $password, $db) or die('localhost connection problem' . mysqli_connect_error());
        return $conn;
    }
    public function get_provider_sms_all_data($conn)
    {

        $sql = "SELECT * FROM provider_sms_data ";
        $result = mysqli_query($conn, $sql);
        return $result;


    }
}