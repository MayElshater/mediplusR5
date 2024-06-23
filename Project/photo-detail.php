<?php
include_once("conn.php");
include_once("include/function.php");
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}

// Call updateViewersCount function with the specific photo ID
if (isset($id)) {
    try {
        updateViewersCount($conn, $id);
    } catch (PDOException $e) {
        // Handle the exception if needed
        echo "Error updating viewers count: " . $e->getMessage();
    }
}

try{
    $sql = "SELECT photos.title, photos.photo_date, photos.license, photos.dimension, photos.format, photos.image, photos.category_id, categories.name AS category_name FROM photos INNER JOIN categories ON photos.category_id = categories.id WHERE photos.id = ?";
   
    $stmt = $conn->prepare($sql);
    
    $stmt->execute([$id]); // Bind the id parameter
    $result = $stmt->fetch();
    $title1=$result['title'];
    $image=$result['image'];
    
    $dimension=$result['dimension'];
    $format=$result['format'];
    $category_id = $result['category_id'];
    $category_name = $result['category_name'];
} catch(PDOException $e) {
    $errMsg =  $e->getMessage();
}

try{
    $sql = "SELECT photos.id,photos.title, photos.photo_date, photos.viewers, photos.image FROM photos INNER JOIN categories ON photos.category_id = categories.id WHERE photos.category_id = ? AND photos.id != ?";
   
    $stmt = $conn->prepare($sql);
    
    $stmt->execute([$category_id, $id]); // Bind the id parameter
    $relate = $stmt->fetchALL();
    
} catch(PDOException $e) {
    $errMsg =  $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php 
   $title="photo detail";
   include_once("include/head.php");
   ?>
</head>
<body>
    <!-- Page Loader -->
    <?php
    include_once("include/navbar.php");
    include_once("include/searchphoto.php");
    ?>

    
    

    <div class="container-fluid tm-container-content tm-mt-60">
        <div class="row mb-4">
            <h2 class="col-12 tm-text-primary"><?php echo $title1?></h2>
        </div>
        <div class="row tm-mb-90">            
            <div class="col-xl-8 col-lg-7 col-md-6 col-sm-12">
                <img src="img/<?php echo $image?>" alt="<?php echo $title1?>" style="width: 100%;" class="img-fluid">
            </div>
            <div class="col-xl-4 col-lg-5 col-md-6 col-sm-12">
                <div class="tm-bg-gray tm-video-details">
                    <p class="mb-4">
                        Please support us by making <a href="https://paypal.me/templatemo" target="_parent" rel="sponsored">a PayPal donation</a>. Nam ex nibh, efficitur eget libero ut, placerat aliquet justo. Cras nec varius leo.
                    </p>
                    <div class="text-center mb-5">
                        <a href="#" class="btn btn-primary tm-btn-big">Download</a>
                    </div>                    
                    <div class="mb-4 d-flex flex-wrap">
                        <div class="mr-4 mb-2">
                            <span class="tm-text-gray-dark">Dimension: </span><span class="tm-text-primary"><?php echo $dimension?></span>
                        </div>
                        <div class="mr-4 mb-2">
                            <span class="tm-text-gray-dark">Format: </span><span class="tm-text-primary"><?php echo $format?></span>
                        </div>
                    </div>
                    <div class="mb-4">
                        <h3 class="tm-text-gray-dark mb-3">License</h3>
                        <p>Free for both personal and commercial use. No need to pay anything. No need to make any attribution.</p>
                    </div>
                    
                        
                        
                    <div>
                        <h3 class="tm-text-gray-dark mb-3">Tag</h3>
                        <a href="#" class="tm-text-primary mr-4 mb-2 d-inline-block"><?php echo $category_name ?></a>
                    </div>
                    
                    
                </div>
            </div>
        </div>
        <?php include_once("include/relatedphotos.php"); ?>
        
    </div> <!-- container-fluid, tm-container-content -->


    <footer class="tm-bg-gray pt-5 pb-3 tm-text-gray tm-footer">
        <div class="container-fluid tm-container-small">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-12 px-5 mb-5">
                    <h3 class="tm-text-primary mb-4 tm-footer-title">About Catalog-Z</h3>
                    <p>Integer ipsum odio, pharetra ac massa ac, pretium facilisis nibh. Donec lobortis consectetur molestie. Nullam nec diam dolor. Fusce quis viverra nunc, sit amet varius sapien.</p>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12 px-5 mb-5">
                    <h3 class="tm-text-primary mb-4 tm-footer-title">Our Links</h3>
                    <ul class="tm-footer-links pl-0">
                        <li><a href="#">Advertise</a></li>
                        <li><a href="#">Support</a></li>
                        <li><a href="#">Our Company</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12 px-5 mb-5">
                    <ul class="tm-social-links d-flex justify-content-end pl-0 mb-5">
                        <li class="mb-2"><a href="https://facebook.com"><i class="fab fa-facebook"></i></a></li>
                        <li class="mb-2"><a href="https://twitter.com"><i class="fab fa-twitter"></i></a></li>
                        <li class="mb-2"><a href="https://instagram.com"><i class="fab fa-instagram"></i></a></li>
                        <li class="mb-2"><a href="https://pinterest.com"><i class="fab fa-pinterest"></i></a></li>
                    </ul>
                    <a href="#" class="tm-text-gray text-right d-block mb-2">Terms of Use</a>
                    <a href="#" class="tm-text-gray text-right d-block">Privacy Policy</a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-md-7 col-12 px-5 mb-3">
                    Copyright 2020 Catalog-Z Company. All rights reserved.
                </div>
                <div class="col-lg-4 col-md-5 col-12 px-5 text-right">
                    Designed by <a href="https://templatemo.com" class="tm-text-gray" rel="sponsored" target="_parent">TemplateMo</a>
                </div>
            </div>
        </div>
    </footer>
    
    <script src="js/plugins.js"></script>
    <script>
        $(window).on("load", function() {
            $('body').addClass('loaded');
        });
    </script>
</body>
</html>