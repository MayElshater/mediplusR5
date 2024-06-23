<?php

include_once("../conn.php");

if(isset($_GET['id'])){
    $id = $_GET['id'];
}

if($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $sql = "UPDATE `users` SET `name`=?, `username`=?, `password`=?, `email`=?, `active`=?,`image`=?  WHERE `id`=?";
        $name = $_POST['name'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        
        // Check if password field is empty
        if (empty($_POST['password'])) {
            // If empty, use the old password
            $password = $_POST['oldpassword'];
        } else {
            // If not empty, hash the new password
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        }
        
        $active = isset($_POST['active']) ? 1 : 0;
        
        // Handle image upload
		if ($_FILES['image']['error'] === UPLOAD_ERR_OK){
			include_once('include/upload.php');
			$imageupdate=$image_name;
			
	
		}else{
			$imageupdate=$_POST["oldimage"];
			
	
		}
        $stmt = $conn->prepare($sql);
        $stmt->execute([$name, $username, $password, $email, $active, $imageupdate,  $id]);
        $msg="updated user Successfully";
        $alert="alert-success";
        echo "<div class=\"alert $alert\">
                <strong>$msg</strong> 
              </div>";
    } catch (PDOException $e) {
        $msg="Error:". $e->getMessage();
        $alert="alert-warning";
        echo "<div class=\"alert $alert\">
                <strong>$msg</strong> 
              </div>";
    }
}

try {
    $sql = "SELECT * FROM `users` WHERE `id`=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);
    $result = $stmt->fetch();
    $password = $result['password'];
    $name = $result['name'];
    $username = $result['username'];
    $email = $result['email'];
    $active = $result['active'] ? "checked" : "";
	$image = $result['image'];
} catch(PDOException $e) {
    echo $e->getMessage();
}
include_once("include/photo_info.php");
?>

<!DOCTYPE html>
<html lang="en">
  <head>
  <?php
    $title="Edit User";
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
              include_once("include/pagecontentuser.php");
            ?>
					<div class="clearfix"></div>
					<div class="row">
						<div class="col-md-12 col-sm-12 ">
							<div class="x_panel">
								<div class="x_title">
									<h2>Edit User</h2>
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
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Full Name <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" id="first-name" required="required" class="form-control " name="name" value="<?php echo $name; ?>">
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="user-name">Username <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" id="user-name" name="username" required="required" class="form-control"  value="<?php echo $username; ?>">
											</div>
										</div>
										<div class="item form-group">
											<label for="email" class="col-form-label col-md-3 col-sm-3 label-align">Email <span class="required">*</span></label>
											<div class="col-md-6 col-sm-6 ">
												<input id="email" class="form-control" type="email" name="email" required="required"  value="<?php echo $email; ?>">
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align">Active</label>
											<div class="checkbox">
												<label>
													<input type="checkbox" class="flat" name="active" <?php echo $active; ?>>
												</label>
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="password">Password 
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="password" id="password" name="password"  class="form-control" name="password">
												<input type="hidden" name="oldpassword" value="<?php echo $password;?>">
											</div>
										</div>
										<div class="form-group">
                                           <label for="image">Image:</label>
                                              <input type="file" class="form-control" id="image" name="image">
                                              <?php
                                                  if($image){
                                                        ?>
                                                <img src="images/<?php echo $image ?>" alt="<?php echo $name ?>" style="width:250px">
                                              <?php
                                                    }
                                              ?>
                                        </div>
                                        <input type="hidden" name="oldimage" value="<?php echo $image?>">
										<div class="ln_solid"></div>
										<div class="item form-group">
											<div class="col-md-6 col-sm-6 offset-md-3">
											  <button class="btn btn-primary" type="button" onclick="window.location.href = 'users.php';">Cancel</button>

												<button type="submit" class="btn btn-success">Update</button>
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

</body>
</html>
