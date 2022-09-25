<?php
include "../connect.php";
if(!$_SESSION["login"]) {
header("Location:../404.php");
}
?>


<?php

if ($_SESSION["userAuth"] == "3") {
  include 'header.php';
  include 'main.php';
  include 'footer.php';
}
else {
header("Location:../index.php");
}

?>
