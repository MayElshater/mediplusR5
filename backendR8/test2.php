<?php
include_once("Fruit.php");
$apple= new Fruit("apple","red");
$apple->set_price("100");
echo $apple->get_name() . $apple->get_price() .$apple->get_color()
?>