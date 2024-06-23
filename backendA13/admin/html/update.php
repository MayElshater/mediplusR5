<?php
//session_start();
include_once("include/loginchecker.php");
include_once("../../conn.php");
if(isset($_GET['id'])){
    $id=$_GET['id'];}
else{
    header('location: users.php');
    die();
}
if($_SERVER["REQUEST_METHOD"]=="POST"){
  

    try {
        $sql = "UPDATE `users` SET `name`=?, `password`=?, `email`=?, `active`=? WHERE `id`=?";
        $name = $_POST['name'];
        
        $email = $_POST['email'];
        if (empty($_POST['password'])) {
            $password = $_POST['oldpassword'];
        } else {
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        }
        $active = isset($_POST['active']) ? 1 : 0;
        
        $stmt = $conn->prepare($sql);
        $stmt->execute([$name, $password, $email, $active, $id]);
        header('location: users.php');
        die();
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    
   
}
try{
        $sql ="SELECT * FROM `users` WHERE `id`=?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$id]);
        $result=$stmt->fetch();
        $password=$result['password'];
        $name=$result['name'];
        $email=$result['email'];
        $active = $result['active'] ? "checked" : "";
}catch(PDOException $e) {
        echo $e->getMessage();
    }




 
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Modernize Free</title>
  <link rel="shortcut icon" type="image/png" href="../assets/images/logos/favicon.png" />
  <link rel="stylesheet" href="../assets/css/styles.min.css" />
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <div
      class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
      <div class="d-flex align-items-center justify-content-center w-100">
        <div class="row justify-content-center w-100">
          <div class="col-md-8 col-lg-6 col-xxl-3">
            <div class="card mb-0">
              <div class="card-body">
                <a href="./index.html" class="text-nowrap logo-img text-center d-block py-3 w-100">
                  <img src="../assets/images/logos/dark-logo.svg" width="180" alt="">
                </a>
                <p class="text-center">Your Social Campaigns</p>
                <form action="" method="POST">
                  <div class="mb-3">
                    <label for="exampleInputtext1" class="form-label">Name</label>
                    <input type="text" class="form-control" id="exampleInputtext1" aria-describedby="textHelp" name="name" value="<?php echo $name; ?>">
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email Address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"name="email" value="<?php echo $email; ?>">
                  </div>
                  <div class="mb-4">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                    <input type="hidden" name="oldpassword" value="<?php echo $password;?>">
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Active</label>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="activeCheckbox" name="active" <?php echo $active; ?>>
                        <label class="form-check-label" for="activeCheckbox">Is Active?</label>
                   </div>
                   </div>

                   <input type="submit" name="submit" value="update" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">
                  
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>