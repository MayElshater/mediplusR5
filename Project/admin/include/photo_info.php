<?php
session_start();

include_once('../conn.php');


// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to login page or handle unauthorized access
    header("Location: login.php");
    exit();
}

// Access user ID
$user_id = $_SESSION['user_id'];
if ($user_id) {
  try {
      $sql = "SELECT `name`,`image` FROM `users` WHERE `id`=?";
      $stmt = $conn->prepare($sql);
      $stmt->execute([$user_id]);
      $userData = $stmt->fetch();

      if ($userData) {
          $nameuser = $userData['name'];
          if($userData['image'] == ""){
            $userimage = "user.png";
          }else{
            $userimage = $userData['image'];
          }
      }
  } catch(PDOException $e) {
      echo $e->getMessage();
  }
}
// Now you can use $user_id in this file
?>
