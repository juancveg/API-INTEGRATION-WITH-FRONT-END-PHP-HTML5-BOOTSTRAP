<?php
//https://codeshare.io/tiweb
 $host='localhost';
 $user='root';
 $password='';
 $database='turismo';
 $mysqli= new mysqli($host,$user,$password,$database);
if($mysqli->connect_errno)
{
    echo "Error falló al conectarse a la BD: ".$mysqli->connect_errno;
}
?>