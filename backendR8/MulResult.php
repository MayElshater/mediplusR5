<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Multiplying Table</h2>
  <p>this table for multiplying table number</p>
  <?php
  if(isset($_POST['num'])){
      echo $_POST['id'];
      $num=$_POST['num'];
         ?>       
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Multable</th>
        
      </tr>
    </thead>
    <tbody>
    
    <?php
    
    
  
    
  
    for($x=1;$x<=10;$x++){
      ?>
      <tr>
        <td><?php echo ($x );?></td>
        <td><?php echo (" x");?></td>
        <td><?php echo ($num );?></td>
        <td><?php echo ("=");?></td>
        <td><?php echo ($x*$num);?></td>
        
      </tr>
   <?php
    }
    ?>
    </tbody>
  </table>
  <?php
  }else{
  ?>
  <div class="alert alert-danger">
    <strong>Danger!</strong> Invalid REQUEST.
  </div>
  <?php
   }
   ?>
</div>
</body>
</html>