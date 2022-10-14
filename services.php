<?php

?>
<div class='container'>
<div class='services row'>
<?php
$q1='SELECT * FROM `services` order by id DESC ';
$services_q=mysqli_query($conn,$q1);
while($service=mysqli_fetch_assoc($services_q)){

?>
<div class='col-md-3'>
    <h2 class='header_h2'><?php echo $service['service_name']?> </h2>
    <p class='service_p'> <?php echo $service['service_desc']?> </p>
    <img src='./upload/<?php echo $service['service_img']?>'class='service_img' >


</div>

<?php }?>


</div>


