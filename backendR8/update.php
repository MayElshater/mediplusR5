<?php
include_once('conn.php');
if(isset($_GET['id']) and $_GET['id']>0){
    
    $id=$_GET['id'];
   
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $address = $_POST['address'];
   /*  
    if ($_FILES['image']['error'] === UPLOAD_ERR_OK) {
        include_once('upload.php');
        $sql = "UPDATE `phone_index` SET `name`=?, `phone`=?, `email`=?, `address`=?, `image`=? WHERE `id` = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$name, $phone, $email, $address, $image_name, $id]);
        echo "Done";
    } else {
        
        $sql = "UPDATE `phone_index` SET `name`=?, `phone`=?, `email`=?, `address`=? WHERE `id` = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$name, $phone, $email, $address, $id]);
        echo "Done";
    }*/
    if ($_FILES['image']['error'] === UPLOAD_ERR_OK){
        include_once('upload.php');
        $imageupdate=$image_name;
        

    }else{
        $imageupdate=$_POST["oldimage"];
        

    }
    $sql = "UPDATE `phone_index` SET `name`=?, `phone`=?, `email`=?, `address`=?, `image`=? WHERE `id` = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$name, $phone, $email, $address, $imageupdate, $id]);
        echo "Done";
}

}
try{
    $sql = "SELECT * FROM `phone_index` where id = ?";
    $id=$_GET['id'];
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);
    if($stmt->rowCount()){
        $result=$stmt->fetch();
        $name=$result['name'];
        $phone=$result['phone'];
        $email=$result['email'];
        $address=$result['address'];
        $image =$result['image'];
        
} }catch(PDOException $e) {
    $errMsg =  $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Add to Phone Index</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Update Phone Index</h2>
  <form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
      <label for="person">Person name:</label>
      <input type="text" class="form-control" id="person" placeholder="Enter person name" name="name" value="<?php echo $name; ?>">
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="<?php echo $email; ?>">
    </div>
    <div class="form-group">
      <label for="phone">Phone:</label>
      <input type="text" class="form-control" id="phone" placeholder="Enter phone" name="phone" value="<?php echo $phone;?>">
    </div>
    <div class="form-group">
      <label for="address">Address:</label>
      <input type="text" class="form-control" id="address" placeholder="Enter address" name="address" value="<?php echo $address;?>">
    </div>
    <div class="form-group">
      <label for="image">Image:</label>
      <input type="file" class="form-control" id="image" name="image">
      <?php
        if($image){
      ?>
      <img src="images/<?php echo $image ?>" alt="<?php echo $name ?>" style="width:250px">
      <?php
        }
      ?>
    </div>
    <input type="hidden" name="oldimage" value="<?php echo $image?>">
    <button type="submit" class="btn btn-default">Submit</button>
  </form>
</div>

</body>
</html>
