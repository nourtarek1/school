<form method=post action=''>
    <table>
        <tr> <th> Action Name </th><th> role 1</th><th> role 2</th><tr>
        <tr><td> Edit Service <input type=hidden name=role_name[] value='EDIT_SERVICE'></td><th><input type=hidden name=user_role[] value=1 ><input type=checkbox name=role_active[] > </td><td><input type=hidden name=user_role[] value=2 ><input type=checkbox name=role_active[] ></td></tr>
        <tr><td> DELETE Service <input type=hidden name=role_name[] value='DELETE_SERVICE'></td><th><input type=hidden name=user_role[] value=1 ><input type=checkbox name=role_active[] > </td><td><input type=hidden name=user_role[] value=2 ><input type=checkbox name=role_active[] ></td></tr>
    </table >
    <button class='btn btn-success'>Save </button>
</form> 
<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
    $role_name=$_POST['role_name'];
    $user_role=$_POST['user_role'];    
    $role_active=$_POST['role_active'];
    $c=0;
    for($i=0;$i<count($role_name);$i++){
       $curr_role_name=$role_name[$i];
       $lo=0;
      while($lo<2){
       $curr_user_role=$user_role[$c];

          if(isset($role_active[$c])){
             $curr_role_active=1;
          }else{
           $curr_role_active=0;
          }
           $q_u_role=" UPDATE `rols` set `active`='$curr_role_active' WHERE `role`='$curr_role_name'AND `user_role`='$curr_user_role'";
          mysqli_query($conn, $q_u_role);    
         $lo++;
          $c++;
         
       }


    }} ?>