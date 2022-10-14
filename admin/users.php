<?php
$user= new user;

$users= $user->all_users();
//delete//
if(isset($_GET['u_id'])){
$u_id=$_GET['u_id'];
$user->delete( $u_id);
}

//edite//
if(isset($_GET['u_id'])){
    $u_id=$GET['u_id'];
    $user->Edit($u_id);
}
?>
<table class="table table_stribed" >
    <tr><th>user name</th><th>Delete</th><th>Edit</th></tr>
    

<?php
while($user=mysqli_fetch_assoc($users)){

echo " <tr> <td> $user[user_name] </td> <td><a href='?page=users.php&u_id=$user[id]'> <button class='btn btn-danger'>Delete</button></td>
<td> <a href='?page=user.php &u_id=$user[id]'> <button class ='btn btn-success'>Edit</button> </td> </tr> " ;

}
?>
</table>