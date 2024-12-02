<?php


 $conexion = mysqli_connect("localhost","root","","edkena");
 /*if ($conexion){

    echo 'conectado exitosamente';

 }else {

    echo 'conexion fallida a la base de datos ';
 }*/


 try{

   $pdo = new PDO("mysql:host=localhost;dbname=edkena", "root", "",
   array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8"));

    //echo "<script>alert('Conectado...')</script>";
 }catch(PDOException $e){
    
   echo "<script>alert('Error...')</script>";
  
 }
?>