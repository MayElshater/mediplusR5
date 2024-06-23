<?php

include_once("../conn.php");

if(isset($_GET['id'])){
    $id = $_GET['id'];
    try{
        $sql = "DELETE FROM `photos` WHERE `id` = ?";
        $id=$_GET['id'];
        $stmt = $conn->prepare($sql);
        $stmt->execute([$id]);
        $msg="Deleted Photo Successfully";
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
   else{
    echo " error";
   }
include_once("include/photo_info.php");
?>

<!DOCTYPE html>
<html lang="en">
  <head>
  <?php
    $title="Delete Photo";
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
									<h2>Delete Photo</h2>
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
