<?php

include_once("../conn.php");

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
    $sql = "INSERT INTO `photos`(`title`, `photo_date`, `license`, `dimension`, `format`, `active`, `image`, `category_id`) VALUES (?,?,?,?,?,?,?,?)";
    $title1=$_POST['title1'];
	$photo_date=$_POST['photo_date'];
	$dimension=$_POST['dimension'];
    $format=$_POST['format'];
    $license=$_POST['license'];
	$category_id=$_POST['category_id'];
    $active = isset($_POST['active']) ? 1 : 0;
	include_once('include/uploadphoto.php');
    $stmt = $conn->prepare($sql);
    $stmt->execute([$title1,$photo_date, $license,$dimension,$format, $active,$image_name,$category_id]);
    $msg="added photo Successfully";
    $alert="alert-success";
    echo "<div class=\"alert $alert\">
                <strong>$msg</strong> 
              </div>";
} catch(PDOException $e) {
    $msg="Error:". $e->getMessage();
        $alert="alert-warning";
        echo "<div class=\"alert $alert\">
                <strong>$msg</strong> 
              </div>";
}
}

include_once("include/photo_info.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
	<?php
    $title="Add Photo";
    include_once("include/head.php");
    ?>
</head>

<body class="nav-md">
<?php
    include_once("include/imageadmin.php");
    ?>

					<div class="clearfix"></div>

					<!-- menu profile quick info -->
					<?php
              include_once("include/menuprofile.php");
            ?>
					<!-- /menu profile quick info -->

					<br />

					<!-- sidebar menu -->
					<?php
               include_once("include/sidebar.php");
             ?>
					<!-- /sidebar menu -->

					<!-- /menu footer buttons -->
					<?php
               include_once("include/menufooter.php");
             ?>
					<!-- /menu footer buttons -->
				</div>
			</div>

			<!-- top navigation -->
			<?php
              include_once("include/navigation.php");
            ?>
			<!-- /top navigation -->

			<!-- page content -->
			<?php
              include_once("include/pagecontentphoto.php");
            ?>

					<div class="clearfix"></div>
					<div class="row">
						<div class="col-md-12 col-sm-12 ">
							<div class="x_panel">
								<div class="x_title">
									<h2>Add Photo</h2>
									<ul class="nav navbar-right panel_toolbox">
										<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
										</li>
										<li class="dropdown">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-wrench"></i></a>
											<ul class="dropdown-menu" role="menu">
												<li><a class="dropdown-item" href="#">Settings 1</a>
												</li>
												<li><a class="dropdown-item" href="#">Settings 2</a>
												</li>
											</ul>
										</li>
										<li><a class="close-link"><i class="fa fa-close"></i></a>
										</li>
									</ul>
									<div class="clearfix"></div>
								</div>
								<div class="x_content">
									<br />
									<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action= "" method="POST" enctype="multipart/form-data">
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="photo-date">Photo Date <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="date" id="photo-date" required="required" class="form-control " name="photo_date">
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="title">Title <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" id="title" required="required" class="form-control " name="title1">
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="license">License <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<textarea id="content" name="license" required="required" class="form-control"></textarea>
											</div>
										</div>
										<div class="item form-group">
											<label for="dimension" class="col-form-label col-md-3 col-sm-3 label-align">Dimension <span class="required">*</span></label>
											<div class="col-md-6 col-sm-6 ">
												<input id="dimension" class="form-control" type="text" name="dimension" required="required">
											</div>
										</div>
										<div class="item form-group">
											<label for="format" class="col-form-label col-md-3 col-sm-3 label-align">Format <span class="required">*</span></label>
											<div class="col-md-6 col-sm-6 ">
												<input id="format" class="form-control" type="text" name="format" required="required">
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align">Active</label>
											<div class="checkbox">
												<label>
													<input type="checkbox" class="flat" name="active">
												</label>
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="image">Image <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="file" id="image" name="image" required="required" class="form-control">
											</div>
										</div>

										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="title">Tag <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<select class="form-control" name="category_id" id="">
													<option value=" ">Select Tag</option>
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
										<div class="ln_solid"></div>
										<div class="item form-group">
											<div class="col-md-6 col-sm-6 offset-md-3">
											    <button class="btn btn-primary" type="button" onclick="window.location.href='photos.php'">Cancel</button>
												<button type="submit" class="btn btn-success">Add</button>
											</div>
										</div>

									</form>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>
			<!-- /page content -->

			<!-- footer content -->
			<?php
              include_once("include/footer.php");
            ?>

</body></html>
