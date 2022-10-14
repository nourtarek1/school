<?php
class User {
    public $name ;
    protected $emile;
    public $phone;
    public $password;

    public function __construct($uname='',$uemile='',$uphone='',$upassword=''){
        global $conn;
        $this->name=$uname;
        $this->emile=$uemile;
        $this->phone=$uphone;
        $this->password=$upassword;
       
    }
    public function insert_user(){
        global $conn;
        $q_user="INSERT INTO `users` set `user_name`='$this->name',`display_name`=' $this->name', `password`=' $this->password' ,`role`=1";
        mysqli_query($conn,$q_user);
    }
    public function edit (){
    global $conn;
    $q_edit="SELECT FROM `users` WHERE `id`='$user_id'";
    mysqli_query($conn,$q_edit);
    }
    public function delete($user_id){
        global $conn;
        $q_delete="DELETE FROM `users` WHERE `id`='$user_id'";
        mysqli_query($conn,$q_delete);
    }
    function all_users() {
        global $conn;
        $q_all_users="SELECT * FROM `users`";
        $all_users_ob=mysqli_query($conn,$q_all_users);
        return $all_users_ob;
    }
}
// $user1=new user();

// echo $user1->name;

// $user2=new user();

// echo $user2->name;
?>