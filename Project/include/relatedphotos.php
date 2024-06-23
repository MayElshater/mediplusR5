<div class="row mb-4">
            <h2 class="col-12 tm-text-primary">
                Related Photos
            </h2>
        </div>

        <?php
        
         
         $imagesPerRow = 4; 
         $imageIndex = 0;
        foreach($relate as $photo){
        $idrelated=$photo['id'];
        $titlerelate=$photo['title'];
        $imagerelate=$photo['image'];
        $viewersrelate=$photo['viewers'];
        $photo_daterelate = $photo['photo_date'];
        

        if ($imageIndex % $imagesPerRow === 0) {
        
        ?>
        <div class="row mb-3 tm-gallery">
        <?php } ?>
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-5">
                <figure class="effect-ming tm-video-item">
                    <img src="img/<?php echo $imagerelate?>" alt="<?php echo $titlerelate ;?>" class="img-fluid">
                    <figcaption class="d-flex align-items-center justify-content-center">
                        <h2><?php echo $titlerelate ;?></h2>
                        <a href="photo-detail.php?id=<?php echo $idrelated?>">View more</a>
                    </figcaption>                    
                </figure>
                <div class="d-flex justify-content-between tm-text-gray">
                    <span class="tm-text-gray-light"><?php echo $photo_daterelate ;?></span>
                    <span><?php echo $viewersrelate ;?> views</span>
                </div>
            </div>
            <?php if (($imageIndex + 1) % $imagesPerRow === 0 || $imageIndex + 1 === count($result)) { ?>
                 <?php
                 }
                 ?> 
              <?php $imageIndex++; ?>
    <?php } ?>      
        </div> <!-- row -->