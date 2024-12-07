<?php

$servername = "mano.cjkioe6eoc42.us-east-1.rds.amazonaws.com:3306";
$username = "root";
$password = "3Hermanos*";
$database = "edkena";

 $conexion = mysqli_connect("mano.cjkioe6eoc42.us-east-1.rds.amazonaws.com:3306","root","3Hermanos*","edkena");
 /*if ($conexion){

    echo 'conectado exitosamente';

 }else {

    echo 'conexion fallida a la base de datos ';
 }*/


 try{

   $pdo = new PDO("mano.cjkioe6eoc42.us-east-1.rds.amazonaws.com:3306;dbname=edkena", "root", "3Hermanos*",
   array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8"));

    //echo "<script>alert('Conectado...')</script>";
 }catch(PDOException $e){
    
   echo "<script>alert('Error...')</script>";
  
 }
?>