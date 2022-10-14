<?php
session_start();
function get_page($page_id){
    global $conn;
    $q_page="SELECT * FROM `pages` WHERE `id`='$page_id' ";
            $page_ob=mysqli_query($conn,$q_page);
            $page=mysqli_fetch_assoc($page_ob);
            $_SESSION['page_title']=$page['page_title'];
            $page_path=$page['page_name'].'.php';
                include($page_path)  ;
}
?>