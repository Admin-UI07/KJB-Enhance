<?php

 $host = 'db';
 $dbname = 'kjb_admin';
 $username = 'user';
 $password = 'userpass';

 try {
  $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 } catch (PDOException $e) {
  die("Connection failed: " . $e->getMessage());
 }

 // $conn = mysqli_connect("localhost", "root", "", "admin_in_kjb");

 // if (!$conn) {
 //  die ('Connection Failed: ' . mysqli_connect_error());
 // } 

?>
