<?php
session_start();
if(isset($_SESSION["logged"]) and $_SESSION["logged"] ){
    if(isset($_POST["email"]) and isset($_POST["pwd"])){
        
        echo "you are logged in";
    }else{
        ?>
    <div class="alert alert-danger">
      <strong>Danger!</strong> Invalid REQUEST.
    </div>
    <?php
    }  
}else{
    echo "you are logged out";
}
?>