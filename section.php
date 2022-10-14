
<section class='container'>
    <?php if(isset($_GET['page_id'])){
            $page_id=$_GET['page_id'];
            get_page($page_id);
    }else{    
            
        ?>
    <div class='services row'>
        <?php
            $q1='SELECT * FROM `services` order by id DESC limit 6';
            $services_q=mysqli_query($conn,$q1);
while($service=mysqli_fetch_assoc($services_q)){

            ?>
        <div class='col-md-3'>
            <h2 class='header_h2'><?php echo $service['service_name']?> </h2>
            <p class='service_p'> <?php echo $service['service_desc']?> </p>
            <img src='./upload/<?php echo $service['service_img']?>' class='service_img'>


        </div>

        <?php }?>
        <div class='text-center'>
            <a href='?page_id=2'> <button class='btn btn-info'> All services</button></a>
        </div>
    </div>

    <?php } ?>
</section>