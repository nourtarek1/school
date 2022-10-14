<!-- create_service -->
<?php
function create_service($service_name,$service_price,$service_desc,$service_img,$created_at){
  global $conn;
$insert_q="INSERT INTO `services` VALUES(NULL ,'$service_name','$service_price','$service_desc','$service_img','$created_at')";
mysqli_query($conn, $insert_q);
    $ins_id=mysqli_insert_id($conn);
    return $ins_id;

}?>

<!-- upload functin -->
<?php
function upload_file($file,$dir, $type){
    $orginal_name=$file['name'];
    $ext=pathinfo($orginal_name,PATHINFO_EXTENSION);
              
   $new_name=time().'.'.$ext;

    $file_name= $dir.$new_name;
    $ok=1; 
    
      $msg='';
      if(array_search($ext,$type)==false){

         $msg= 'File Not uploaded (is not txt file)';
         $ok=0;
  }
  if($file['size']>5000000){

      $msg='File Too Large (4M)';
      $ok=0;

  }

  if($ok==1){
       move_uploaded_file($file['tmp_name'],$file_name);
       $msg='File  uploaded Successfly';
       return $new_name;
  }else{
    return 0;
  }

}    
function upload_multi_files($gallery,$dir,$ins_id){
  global $conn;
  for($i=0;$i<count($gallery['name']);$i++){
         
    $orginal_name=$gallery['name'][$i];
    $ext=pathinfo($orginal_name,PATHINFO_EXTENSION);
    $new_name=$i.time().'.'.$ext;
    $path=$dir.$new_name;
    move_uploaded_files($gallery['tmp_name'][$i],$path);
    $q_gallery="INSERT INTO `services_gallery` set `image`='$new_name',`service_id`='$ins_id'";
    mysqli_query($conn,$q_gallery);

    
}
 }  
?> 

<?php 
// DELETE function
function action($action,$service_id){
  global $conn;
  if($action=='delete'){
    $qrd="DELETE FROM `services` WHERE `id`='$service_id'";
    mysqli_query($conn,$qrd);
    header('LOCATION:index.php?page=services.php');
}
}
?>

<!-- //role function// -->
<?php
function role($action,$role){
  global $conn;

   $q_role="SELECT active as rs FROM `rols` WHERE `role`='$action' AND `user_role`='$role'";
  $role_ob=mysqli_query($conn,$q_role);
   $active_role=mysqli_fetch_assoc($role_ob);
    
   return $active_role['rs'];
  
}

?>