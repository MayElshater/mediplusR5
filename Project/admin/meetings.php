<?php
 
  
  
   include_once('../conn.php');
   try{
    $sql = "SELECT * FROM meetings";
   
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result=$stmt->fetchAll();
} catch(PDOException $e) {
    $errMsg =  $e->getMessage();
}

include_once("include/photo_info.php");

?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <?php
    $title="Meetings";
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
              include_once("include/pagecontentmeeting.php");
            ?>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>List of Meetings</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Settings 1</a>
                            <a class="dropdown-item" href="#">Settings 2</a>
                          </div>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <th>Meeting Date</th>
                          <th>Time</th>
                          <th>Title</th>
                          <th>Active</th>
                          <th>Edit</th>
                          <th>Delete</th>
                        </tr>
                      </thead>
                      <?php
               foreach($result as $col){
                $id=$col['id'];
                $title1=$col['title'];
                $meeting_date=date("d M Y", strtotime($col['meeting_date']));
                $meeting_time=date("h:i:sa", strtotime($col['time']));
                if($col['active']==1){
                  $active="yes";
                }else{$active="no";}
                
               ?>



                      <tbody>
                        <tr>
                          <td><?php echo $meeting_date;?></td>
                          <td><?php echo $meeting_time?></td>
                          <td><?php echo $title1;?></td>
                          <td><?php echo $active;?></td>
                          <td><a href="editMeeting.php?id=<?php echo $id?>"><img src="./images/edit.png" alt="Edit"></a></td>
                          <td><a href="deleteMeeting.php?id=<?php echo $id?>"  onclick="return confirm('Are you sure you want to delete?')"><img src="./images/delete.png" alt="Delete"></a></td>
                        </tr>
                        <?php
                           }
                        ?>
                       
                      </tbody>
                    </table>
                  </div>
                  </div>
              </div>
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