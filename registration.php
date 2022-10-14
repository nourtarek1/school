

        <form method=post action='' enctype='multipart/form-data'>
            <div class='mb-3'>
                <label>Your Name</label><input type=text name='yname'>
            </div>
            <div class='mb-3'>
                <label>Your Phone</label><input type=text name='yphone'>
            </div>
            <div class='mb-3'>
                <label>Your Email</label><input type=text name='yEmail'>
            </div>
            <div class='mb-3'>
                <label>Password</label><input type=password name='ypass'>
            </div>
            <div class='mb-3'>
                <label>Conferm Password</label><input type=text name='ypass'>
            </div>
            <div class='mb-3'>
                <label>Your Photo</label><input type=file name='pphoto'>
            </div>
            <div class='mb-3'>
                <button class='btn btn-success'> Send </button>
            </div>
        </form>


    </section>
    <?php 
           if($_SERVER['REQUEST_METHOD']=='POST'){
               $yname=$_POST['yname'];
               $yemail=$_POST['yEmail'];
               $yphone=$_POST['yphone'];
               $password=md5($_POST['ypass']) ;
               $user= new User($yname,$yemail,$yphone,$password);

                $user->insert_user();
                  $cdir='upload/';
                  $file_arr=$_FILES['pphoto'];
                  $ext_arr=[1=>'png',2=>'jpg',3=>'jpeg'];


            $res_msg=upload_file($file_arr,$cdir,$ext_arr);
            ?>

                <div class='alert alert-info'><?php echo  $res_msg ?></div>
       <?php

           }
    
    
    
    ?>
</body>

</html> 