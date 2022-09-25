<?php
 $option = isset($_POST['location_FK']) ? $_POST['location_FK'] : false;
 if ($option) {
    echo htmlentities($_POST['location_FK'], ENT_QUOTES, "UTF-8");
 } else {
   echo "task option is required";
   exit;
 }
