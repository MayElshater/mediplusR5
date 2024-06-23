<?php
if($_SERVER['REQUEST_METHOD'] === "POST"){
    include_once('conn.php');
try{
    $sql = "INSERT INTO `clients`( `client_name`, `phone`, `email`, `sales_amount`,`image`) VALUES (?,?,?,?,?)";
    $name=$_POST['client_name'];
    $phone=$_POST['phone'];
    $email=$_POST['email'];
    $sales_amount=$_POST['sales_amount'];
    include_once('upload.php');
    $stmt = $conn->prepare($sql);
    $stmt->execute([$name, $phone, $email, $sales_amount, $image_name]);
    echo "Inserted";
} catch(PDOException $e) {
    echo $e->getMessage();
}
}else{
    echo "invalid request";
}




?>