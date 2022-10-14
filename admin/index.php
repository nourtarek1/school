<?php require('header.php');

     
if(isset($_GET['msg'])){
    echo "<div class='alert alert-danger' > $_GET[msg] </div>";
 }
 if($_SESSION['user_id']==123){
    ?>
    <?php
    if(isset($_GET['page'])){
        $page=$_GET['page'];
        include($page);
    }
}else{header('location:login.php');

 

?>



<?php }?>
    
</body>
</head>
