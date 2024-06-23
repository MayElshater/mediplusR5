<?php
$x=75;
$y=25;
function SUM(){
    $GLOBALS['z']= $GLOBALS['x']+ $GLOBALS['y'];
}
echo SUM();
echo "<br>";
echo $z;
?>

