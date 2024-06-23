
<?php
 
  include_once("include/loginchecker.php");
  
   include_once('../../conn.php');
try{
    $sql = "SELECT cars.id,cars.title,cars.model,categories.name,cars.create_at FROM cars INNER JOIN categories ON cars.category_id = categories.id";
   
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result=$stmt->fetchAll();
} catch(PDOException $e) {
    $errMsg =  $e->getMessage();
}
?>

<!doctype html>
<html lang="en">

<head>
<?php
 $title="Car List";
 include_once("include/head.php");
?>
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    <aside class="left-sidebar">
      <?php
      include_once("include/sidebarscroll.php");
      include_once("include/navbar.php");
      ?>
       
      </div>
      <!-- End Sidebar scroll-->
    </aside>
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">
      <!--  Header Start -->
      <header class="app-header">
        <nav class="navbar navbar-expand-lg navbar-light">
          <ul class="navbar-nav">
            <li class="nav-item d-block d-xl-none">
              <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                <i class="ti ti-menu-2"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link nav-icon-hover" href="javascript:void(0)">
                <i class="ti ti-bell-ringing"></i>
                <div class="notification bg-primary rounded-circle"></div>
              </a>
            </li>
          </ul>
          <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
              <a href="https://adminmart.com/product/modernize-free-bootstrap-admin-dashboard/" target="_blank" class="btn btn-primary">Download Free</a>
              <li class="nav-item dropdown">
                <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
                  aria-expanded="false">
                  <img src="../assets/images/profile/user-1.jpg" alt="" width="35" height="35" class="rounded-circle">
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                  <div class="message-body">
                    <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-user fs-6"></i>
                      <p class="mb-0 fs-3">My Profile</p>
                    </a>
                    <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-mail fs-6"></i>
                      <p class="mb-0 fs-3">My Account</p>
                    </a>
                    <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-list-check fs-6"></i>
                      <p class="mb-0 fs-3">My Task</p>
                    </a>
                    <a href="./authentication-login.html" class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!--  Header End -->
      <div class="container-fluid">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title fw-semibold mb-4"><?php echo $title;?></h5>
            <table class="table table-hover">
               <thead>
                <tr>
                 <th>id</th>
                 <th>title</th>
                
                 <th>model</th>
                 
                 <th>category_id</th>
                 <th>created_at</th>
                 <th>updatet</th>
                 <th>delete</th>
                </tr>
               </thead>
               <?php
               foreach($result as $col){
                $id=$col['id'];
                $title=$col['title'];
                //$image=$col['image'];
                //$contant=$col['contant'];
                $model=$col['model'];
                //$automatic=$col['automatic'];
                //$consumption=$col['consumption'];
                //$options=$col['options'];
                $category_id=$col['name'];
                $create_at=$col['create_at'];
                
                
               ?>
               <tbody>
                 <tr>
                   <td><?php echo $id;?></td>
                   <td><?php echo $title;?></td>
                   
                   <td><?php echo $model;?></td>
                   
                   <td><?php echo $category_id;?></td>
                   <td><?php echo $create_at;?></td>
                   
                   <td><a href="updatecar.php?id=<?php echo $id?>"><img src="../assets/update.png" alt="update" ></a></td>
                   <td><a href="deletecar.php?id=<?php echo $id?>"  onclick="return confirm('Are you sure you want to delete?')"><img src="../assets/delete.png" alt="delete" ></a></td>
                 </tr>
                <?php
              }?>
              
               </tbody>
             </table>
             <a href="addcar.php" target="_blank" class="btn btn-primary fs-2 fw-semibold lh-sm">Add Car</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php  
     
     include_once("include/footerjs.php");
 ?>
</body>
</html>