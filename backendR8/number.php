<?php
session_start();
setcookie("username","may",time() + (86400 * 7), "/");
if($_SERVER['REQUEST_METHOD'] === "POST"){
    if(isset($_POST['num'])){
        echo $_POST['num'];}
}
$_SESSION['age']= 25;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Mutliplication Table</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Enter the required number</h2>
  <form action="" method="post">
    <div class="form-group">
      <label for="num">number:</label>
      <input type="number" class="form-control" id="num" placeholder="Enter number" name="num">
      <input type="hidden" name="id" value="40">

    </div>
    <button type="submit" class="btn btn-default">Submit</button>
  </form>
</div>

</body>
</html>
