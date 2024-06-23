<?php
include_once("conn.php");


  
/*

try{
    $sql = "INSERT INTO `cars`(`title`, `image`, `content`, `model`, `automatic`, `consumption`, `options`, `category_id`,`published`) VALUES (?,?,?,?,?,?,?,?,?)";
    $title=$_POST['title'];
    $content=$_POST['content'];
    $model=$_POST['model'];
    $options=$_POST['options'];
    $category_id=$_POST['category_id'];
    $automatic = isset($_POST['automatic']) ? 1 : 0;
    $consumption = $_POST['consumption'];
    $published = isset($_POST['published']) ? 1 : 0;
    include_once('include/upload.php');
    $stmt = $conn->prepare($sql);
    $stmt->execute([$title, $image_name, $content, $model, $automatic, $consumption, $options, $category_id, $published]);
    
    
} catch(PDOException $e) {
    echo $e->getMessage();
}*/
try{
    $sql = "SELECT * FROM `categories`";
   
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result=$stmt->fetchAll();
    foreach($result as $cat){
        $id=$cat['id'];
        echo $id;}
    
} catch(PDOException $e) {
    echo $e->getMessage();
}

?>