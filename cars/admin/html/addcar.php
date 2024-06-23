<?php

include_once("../../conn.php");
include_once("include/loginchecker.php");

try{
    $sql = "SELECT * FROM `categories`";
   
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result=$stmt->fetchAll();
    
} catch(PDOException $e) {
    echo $e->getMessage();
}
if($_SERVER["REQUEST_METHOD"]=="POST"){
    try{
        $sql = "INSERT INTO `cars`(`title`, `image`, `content`, `model`, `automatic`, `consumption`, `options`, `price`, `category_id`,`published`) VALUES (?,?,?,?,?,?,?,?,?,?)";
        $title=$_POST['title'];
        $content=$_POST['content'];
        $model=$_POST['model'];
        $options=$_POST['options'];
        $category_id=$_POST['category_id'];
        $automatic = isset($_POST['automatic']) ? 1 : 0;
        $consumption = $_POST['consumption'];
        $price = $_POST['price'];
        $published = isset($_POST['published']) ? 1 : 0;
        include_once('include/upload.php');
        $stmt = $conn->prepare($sql);
        $stmt->execute([$title,$image_name, $content, $model, $automatic, $consumption, $options, $price, $category_id, $published]);
        
        header('location: carlist.php');
        die();
        
    } catch(PDOException $e) {
        echo $e->getMessage();
    }
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
                <form action="" method="POST" enctype="multipart/form-data">
                  <div class="mb-3">
                    <label for="exampleInputtext1" class="form-label">Title</label>
                    <input type="text" class="form-control" id="exampleInputtext1" aria-describedby="textHelp" name="title">
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputtext2" class="form-label">Option</label>
                    <input type="text" class="form-control" id="exampleInputtext2" aria-describedby="textHelp2" name="options">
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputContent1" class="form-label">Content</label>
                    <textarea name="content"></textarea>
                  </div>
                  <div class="mb-4">
                    <label for="exampleInputModel1" class="form-label">Model</label>
                    <input type="model" class="form-control" id="exampleInputModel1" name="model">
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Automatic</label>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="AutomaticCheckbox" name="automatic">
                        <label class="form-check-label" for="AutomaticCheckbox">Is Automatic?</label>
                   </div>
                   </div>
                   <div class="mb-3">
                    <label for="exampleInputConsumption1" class="form-label">Consumption</label>
                    <input type="number" class="form-control" id="exampleInputConsumption1" aria-describedby="consumptionHelp"name="consumption">
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputPrice1" class="form-label">Price</label>
                    <input type="number" class="form-control" id="exampleInputPrice1" aria-describedby="priceHelp"name="price">
                  </div>
                   <div class="mb-3">
                    <label class="form-label">Published</label>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="PublishedCheckbox" name="published">
                        <label class="form-check-label" for="PublishedCheckbox">Is Published?</label>
                   </div>
                   </div>
                   <div class="mb-3 form-check">
                    <label class="form-check-label" for="category_id">category</label>
                    
                        <select name="category_id" id="" class="form-check`-select">
                           <option value="">Please Select </option>
                           <?php
                                   foreach($result as $cat){
                            ?>
                           <option value="<?php echo $cat['id']?>"><?php echo $cat['name']?></option>
                           <?php
                           }
                           ?>
                        </select>
                        

                   </div>
                   </div>
                   
                   <div class="form-group">
                     <label for="image">Image:</label>
                     <input type="file" class="form-control" id="image" name="image">
                   </div>

                   <input type="submit" name="submit" value="Add Car" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">
                  
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