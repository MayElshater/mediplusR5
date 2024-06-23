<?php
if($_SERVER['REQUEST_METHOD'] === "POST"){
    include_once('conn.php');
try{
    $sql = "INSERT INTO `phone_index`( `name`, `phone`, `email`, `address`,`image`) VALUES (?,?,?,?,?)";
    $name=$_POST['name'];
    $phone=$_POST['phone'];
    $email=$_POST['email'];
    $address=$_POST['address'];
    include_once('upload.php');
    $stmt = $conn->prepare($sql);
    $stmt->execute([$name, $phone, $email, $address, $image_name]);
    echo "Inserted";
} catch(PDOException $e) {
    echo $e->getMessage();
}
}else{
    echo "invalid request";
}




?>