<?php 
if($_SESSION['user_id']==123) {

    if($_SERVER['REQUEST_METHOD']=='POST'){
        if(isset($_POST['term'])){
        $term=$_POST['term'];
        $q_s="SELECT * FROM `services` WHERE `service_name`like'%$term%' OR `price` ='$term'";
 
}else{
    $min=$_POST['min-price'];
    $max=$_POST['max-price'];
    $q_s="SELECT * FROM `services` WHERE `price` between $min and $max"; 
}
}else{
$q_s="SELECT * FROM `services`";
}
$services_q=mysqli_query($conn,$q_s);
?>

<?php
/***Delete sevice */
    if(isset($_GET['action'])){
        $sid=$_GET['sid'];
        $action=$_GET['action'];
 action($action,$sid);
    }
?>
<div class='row'>
    <div class='col-md-4'>
        <form method=post class="d-flex">
            <input type="text" name='term' placeholder='search By service name or price' aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
    </div>
    <div class='col-md-6'>
        <form method=post action="">
            <input type=text name=min-price placeholder='min-price'>
            <input type=text name=max-price placeholder='max-price'>
            <button class='btn btn-info'> Filter price </button>
        </form>
    </div>
    <div class='col-md-2'>
        <a href='./export_services.php'><button class='btn btn-info'>Export</button><a>

    </div>
</div>
<!-- Edit service -->

<table class='table table-striped'>
    <tr>
        <th>service Name</th>
        <th>Image</th>
        <?php if(role('DELETE_SERVICE',$_SESSION['role'])) { ?> <th>Delete</th><?php } ?>
        <?php if(role('EDIT_SERVICE',$_SESSION['role'])){?> <th>Edit</th> <?php } ?>
    </tr>
    <?php
while($service=mysqli_fetch_assoc($services_q)){   
?>
    <tr>
        <td> <a
                href='index.php?page=details.php&id=<?php echo $service['id']?> '><?php echo $service['service_name']?></a>
        </td>
        <td><img width=200 src='../upload/<?php echo $service['service_img']?>'>
        </td>
        <?php if(role('DELETE_SERVICE',$_SESSION['role'])) { ?> <td><a 
                href=index.php?page=services.php&action=delete&sid=<?php echo $service['id']?>>
                <button class='btn btn-danger'>delete</button></a></td><?php } ?>
                
                <td><?php if(role('EDIT_SERVICE',$_SESSION['role'])){?>
            <a href=index.php?page=edit.php&id=<?php echo $service['id']?>>
                <button class='btn btn-success'> Edit </button></a>
        </td><?php } ?>
        
    </tr>


    <?php }
 ?>
</table>
<?php }else{ 
header('location:index.php');

}?>