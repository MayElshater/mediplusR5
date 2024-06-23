<?php
include_once("include/loginchecker.php");
    
    if(isset($_GET['id']))
   {include_once("../../conn.php");
    try{
        $sql = "DELETE FROM `users` WHERE `id` = ?";
        $id=$_GET['id'];
        $stmt = $conn->prepare($sql);
        $stmt->execute([$id]);
        header('location: users.php');
        die();
    } catch(PDOException $e) {
        echo $e->getMessage();
    }
   }else{
    echo " error";
   }