<?php
    include_once('conn.php');
    if(isset($_POST['id']) and $_POST['id'])
   {
    try{
        $sql = "DELETE FROM `phone_index` WHERE `id` = ?";
        $id=$_POST['id'];
        $stmt = $conn->prepare($sql);
        $stmt->execute([$id]);
        echo "deleted successfully";
    } catch(PDOException $e) {
        echo $e->getMessage();
    }
   }else{
    echo " error";
   }
?>