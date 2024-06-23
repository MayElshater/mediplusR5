<?php
    include_once('conn.php');
    try{
        $sql = "SELECT * FROM `phone_index`";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
    } catch(PDOException $e) {
        $errMsg =  $e->getMessage();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Phone Index</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Hover Rows</h2>
  <p>The .table-hover class enables a hover state on table rows:</p>
  
<?php
    if(isset($_GET['delete']) and $_GET['delete'] == 'success'){
?>      
    <div class="alert alert-success">
      <strong>Success!</strong> phone index deleted
    </div>
<?php
    }     
    if(!isset($errMsg)){
        if($stmt->rowCount()){
?>
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Person Name</th>
        <th>Phone</th>
        <th>Email</th>
        <th>Address</th>
        <th>Image</th>
        <th>Created At</th>
        <th>Delete</th>
        <th>Update</th>
      </tr>
    </thead>
    <tbody>

    <?php
    foreach($stmt->fetchAll() as $row){
        $id = $row['id'];
        $person = $row['person_name'];
        $phone = $row['phone'];
        $email = $row['email'];
        $address = $row['address'];
        if($row['image'] == ""){
          $image = "unknown.jpg";
        }else{
          $image = $row['image'];
        }
        
        $create_at = date("d M Y", strtotime($row['created_at']));
    ?>

      <tr>
        <td><?php echo $person ?></td>
        <td><?php echo $phone ?></td>
        <td><?php echo $email ?></td>
        <td><?php echo $address ?></td>
        <td><img src="images/<?php echo $image ?>" alt="<?php echo $person ?>" style="width:50px; height:50px;"></td>
        <td><?php echo $create_at ?></td>
        <td>
          <form action="admin/deletePost.php" method="post" onclick="return confirm('Are you sure you want to delete?')">
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <input type="hidden" name="image" value="<?php echo $image ?>">
            <input type="submit" name="submit" value="Delete">
          </form>
        </td>
        <td><a href="admin/update.php?id=<?php echo $id ?>">Update</a></td>
      </tr>

    <?php
        }
    ?>
      
    </tbody>
  </table>

<?php
        }else{
            echo "No results";
        }
    }else{
?>
<div class="alert alert-danger">
  <strong>Error!</strong> <?php echo $errMsg ?>
</div>

<?php
    }
?>

</div>

</body>
</html>
