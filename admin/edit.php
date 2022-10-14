<?php
$s_id=$_GET['id'];
global $conn;
  $curr_s="SELECT * FROM `services` WHERE `id`='$s_id'";
  $service_op=mysqli_query($conn,$curr_s);
  $service=mysqli_fetch_assoc($service_op);
  if($_SERVER['REQUEST_METHOD']=='POST'){
      $service_name=$_POST['sname'];
      $service_desc=$_POST['sdest'];
      
      $update_q="UPDATE `services` set `service_name`='$service_name',`service_desc`='$service_desc' WHERE `id`='$s_id'";
      mysqli_query($conn,$update_q); 
// img
if(!empty($_FILES['service_img']['name'])){
    $file=$_FILES['service_img'];
    $type=['jpg','jpeg','png'];
    $dir='../upload/';
    $new_img=upload_file($file,$dir,$type);
    if($new_img==0){
        echo'Imge not updated';
    }else{
         $old_img='../upload/'.$service['service_img'];
         unlink($old_img);
        $update_q="UPDATE `services` set `service_img`='$new_img' WHERE `id`='$s_id'";
    mysqli_query($conn,$update_q);
    
    
}
}
echo '<div class="alert alert-success">Update complet successfily</div>';
}
?>
<form method=post action='' enctype='multipart/form-data'>
    <h1>add new services</h1>
    <input type="text" name="sname" placeholder='service Name' value='<?php echo $service['service_name']?>'></br>
    <textarea name="sdest" cols="50" rows="10"> <?php echo $service['service_desc']?></textarea> </br>
    <img src='../upload/<?php echo $service['service_img']?>' width=200>
    <input type=file name='service_img'></br>
    <button>save</button>
</form>