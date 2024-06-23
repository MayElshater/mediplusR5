<?php
include_once('conn.php');
try{
    $sql = "SELECT * FROM `phone_index`";
    /*
    $city="c1%";
    $name="%Mohamed%";
    */
    $stmt = $conn->prepare($sql);
    $stmt->execute();
} catch(PDOException $e) {
    $errMsg =  $e->getMessage();
}
?>
    

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
      <h2>Hover Rows</h2>
      <p>The .table-hover class enables a hover state on table rows:</p>   
      <?php
      if(!isset($errMsg)){
        if($stmt->rowCount() ){
      ?>         
      <table class="table table-hover">
        <thead>
          <tr>
            <th>id</th>
            <th>name</th>
            <th>phone</th>
            <th>email</th>
            <th>address</th>
            <th>Create at</th>
            <th>image</th>
            <th>Delete</th>
            <th>Update</th>
          </tr>
        </thead>
        <tbody>
         <?php
         foreach($stmt->fetchAll() as $col){
            $id=$col['id'];
            $name=$col['name'];
            $phone=$col['phone'];
            $email=$col['email'];
            $address=$col['address'];
            $create_at=date("d M Y", strtotime($col['create_at']));
            if($col['image'] == ""){
              $image = "unknow.jpg";
            }else{
              $image = $col['image'];
            }
            
        
         ?> 
          <tr>
            <td><?php echo $id?></td>
            <td><?php echo $name?></td>
            <td><?php echo $phone?></td>
            <td><?php echo $email?></td>
            <td><?php echo $address?></td>
            <td><?php echo $create_at?></td>
            <td><img src="images/<?php echo $image ?>" alt="<?php echo $name ?>" style="width:50px; height="50px"></td>
            <td>
              
              <form id="deleteForm" action="delete.php" method="post">
    
                      <input type="hidden" name="id" id="deleteId" value="<?php echo $id; ?>">

    
                      <button type="submit" onclick="return confirm('Are you sure you want to delete?')">Delete</button>
               </form>
            </td>
            <td><a href="update.php?id=<?php echo $id?>">Update</a></td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
    <?php
      }else{echo 'no result';} 
    }else{
    ?>
    <div class="alert alert-danger">
          <strong>Danger!</strong> <?php echo $errMsg?>.
    </div>
    <?php }?>
    </body>
    </html>
    