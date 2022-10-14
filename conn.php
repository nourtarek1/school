<?php
define('SERVER','localhost');
define('USER','root');
define('PASSWORD','');
define('DATABASE','myschool');


$conn=mysqli_connect(SERVER,USER,PASSWORD,DATABASE) or die(mysqli_error($conn));



?>