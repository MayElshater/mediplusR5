<?php
    include_once('../conn.php');
    if(isset($_POST['id']) and $_POST['id']>0){
        try{
            $sql = "DELETE FROM `phone_index` WHERE `id` = ?"; 
            $id = $_POST['id'];
            $image = $_POST['image'];
            $stmt = $conn->prepare($sql);
            $stmt->execute([$id]);

            if(file_exists("../images/" . $image)) {
                unlink("../images/" . $image);
            }

            header("location: ../phoneIndex.php?delete=success");
            die();
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }else{
        echo "Invalid request";
    }
?>