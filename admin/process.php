<?php session_start();

 $user_name=$_POST['uname'];
 require('../conn.php');
  $password=($_POST['upass']);
 
 

function login($user_name,$password){
global $conn;
echo $q_ch=" SELECT * FROM `users` WHERE `user_name`='$user_name' AND `password`='$password'";
$user_ob=mysqli_query($conn,$q_ch);
$user=mysqli_fetch_assoc($user_ob);

if(isset($user['id']) ){
    $msg= 'correct user';
    $_SESSION['user_id']=123;
    $_SESSION['user_name']=$user['display_name'];
    $_SESSION['role']=$user['role'];
    header("LOCATION:index.php?page=settings.php&msg=$msg");
    
}else{

    $msg='Inavaled user';
    header("LOCATION:index.php?msg=$msg");
    
}
}

login($user_name,$password);//login admin
?>