<?php

$s_id=$_GET['id'];
$curr_s_q="SELECT * FROM `services` WHERE `id`='$s_id' ";
$service_ob=mysqli_query($conn,$curr_s_q);
$service=mysqli_fetch_assoc($service_ob);
// <!-- get gallery -->
$gallery_q="SELECT * FROM `services_gallery` WHERE `service_id`='$s_id'";
$gallery_ob=mysqli_query($conn,$gallery_q);
if($_SERVER['REQUEST_METHOD']=='POST'){
    
    $gallery=$_FILES['gallery'];

    $dir='../upload/gallery/';

    upload_multi_files($gallery,$dir,$s_id);
}
?>
<h3><?php echo $service['service_name']?> </h3>
<img src='../upload/<?php echo $service['service_img']?>' width=200px>
<p><?php echo $service['service_desc']?></P>
<form method=post action='index2.php?page=details.php&id=<?phpecho $s_id?>' enctype='multipart/form_data'>
<label>Add to Gallery</label><input type='file' name=gallery[] multiple>
<input type='hidden' name='s_id' value=<?php echo $s_id?>>
<button class='btn btn-info'>Upload</button>
</form>
<?php
 while($gallery=mysqli_fetch_assoc($gallery_ob)){?>

    <img src='../upload/gallery/<?php echo $gallery['image']?>'width=200px>
    
<?php }?>