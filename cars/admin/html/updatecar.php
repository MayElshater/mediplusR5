<?php
//session_start();
include_once("include/loginchecker.php");
include_once("../../conn.php");
if(isset($_GET['id'])){
    $id=$_GET['id'];

    try{
        $sql ="SELECT * FROM `cars` WHERE `id`=?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$id]);
        $result=$stmt->fetch();
        $title=$result['title'];
        $image=$result['image'];
        $content=$result['content'];
        $model=$result['model'];
        $consumption=$result['consumption'];
        $options=$result['options'];
        $price=$result['price'];
        $category_id=$result['category_id'];
        $automatic = $result['automatic'] ? "checked" : "";
        $published = $result['published'] ? "checked" : "";
}catch(PDOException $e) {
        echo $e->getMessage();
    }

try{
        $sql = "SELECT * FROM `categories`";
       
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $cat=$stmt->fetchAll();
         } 
catch(PDOException $e) {
        echo $e->getMessage();
    }

if($_SERVER["REQUEST_METHOD"]=="POST"){
  

    try {
        $sql = "UPDATE `cars` SET `title`=?,`image`=?,`content`=?,`model`=?,`automatic`=?,`consumption`=?,`options`=?,`price`=?,`category_id`=?,`published`=? WHERE `id` =?";
        $title = $_POST['title'];
        $content = $_POST['content'];
        $model = $_POST['model'];
        $consumption = $_POST['consumption'];
        $options = $_POST['options'];
        $price=$_POST['price'];
        $category_id = $_POST['category_id'];
        $automatic = isset($_POST['automatic']) ? 1 : 0;
        $published = isset($_POST['published']) ? 1 : 0;
        if ($_FILES['image']['error'] === UPLOAD_ERR_OK){
            include_once('upload.php');
            $imageupdate=$image_name;
            
    
        }else{
            $imageupdate=$_POST["oldimage"];
            
    
        }
        $stmt = $conn->prepare($sql);
        $stmt->execute([$title,$imageupdate,$content,$model,$automatic,$consumption, $options, $price ,$category_id, $published, $id]);
        header('location: carlist.php');
        die();
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    
   
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
                <form action="" method="POST">
                  <div class="mb-3">
                    <label for="exampleInputtext1" class="form-label">Title</label>
                    <input type="text" class="form-control" id="exampleInputtext1" aria-describedby="textHelp" name="title" value="<?php echo $title; ?>">
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputtext2" class="form-label">Option</label>
                    <input type="text" class="form-control" id="exampleInputtext2" aria-describedby="textHelp2" name="options" value="<?php echo $options;?>" ?>
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputContent1" class="form-label">Content</label>
                    <textarea name="content" ><?php echo $content;?></textarea>
                  </div>
                  <div class="mb-4">
                    <label for="exampleInputModel1" class="form-label">Model</label>
                    <input type="model" class="form-control" id="exampleInputModel1" name="model" value="<?php echo $model;?>">
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputConsumption1" class="form-label">Consumption</label>
                    <input type="number" class="form-control" id="exampleInputConsumption1" aria-describedby="consumptionHelp"name="consumption" value="<?php echo $consumption;?>">
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputPrice1" class="form-label">Price</label>
                    <input type="number" class="form-control" id="exampleInputPrice1" aria-describedby="priceHelp" name="price" value="<?php echo $price;?>">
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Automatic</label>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="automaticCheckbox" name="automatic" <?php echo $automatic; ?>>
                        <label class="form-check-label" for="automaticCheckbox">Is Automatic?</label>
                   </div>
                   </div>
                   <div class="mb-3">
                    <label class="form-label">Published</label>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="publishedCheckbox" name="published" <?php echo $published; ?>>
                        <label class="form-check-label" for="publishedCheckbox">Is Published?</label>
                   </div>
                   </div>
                   <div class="mb-3 form-check">
                    <label class="form-check-label" for="category_id">category</label>
                    
                        <select name="category_id" id="" <?php echo $category_id;?> class="form-check`-select">
                           
                           <?php
                                   foreach($cat as $category){
                            ?>
                           <option value="<?php echo $category['id']?>" <?php echo $result['id'] ==$category['id'] ? "selected" : "" ?>><?php echo $category['name']?></option>
                           <?php
                           }
                           ?>
                        </select>
                        

                   </div>
                   </div>
                  <div class="form-group">
                     <label for="image">Image:</label>
                        <input type="file" class="form-control" id="image" name="image">
                        <?php
                          if($image){
                        ?>
                        <img src="include/images/<?php echo $image ?>" alt="<?php echo $title ?>" style="width:250px">
                        <?php
                                }
                        ?>
                   </div>
                   <input type="hidden" name="oldimage" value="<?php echo $image?>">

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