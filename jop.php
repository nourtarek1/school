<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    
    <link rel="stylesheet" href="style.css">

</head>

<body>
    
    <section class='container'>
        <form method=post action='' enctype='multipart/form-data'>
            <div class='mb-3'>
                <label> your name </label><input type=text name='yname'>
            </div>
            <div class='mb-3'>
                <label> you password </label><input type=text name='ypass'>
            </div>
            <div class='mb-3'>
                <label> your cv </label><input type=file name='cv'>
            </div>
            <div class='mb-3'>
                <button class='btn btn-success'> send </button>
            </div>
        </form>


    </section>
    <?php
if($_SERVER['REQUEST_METHOD']=='POST'){
        $yname=$_POST['yname'];
        $ypass=$_POST['ypass'];

        // $cv=$_FILES['cv']['name'];

        // echo $cv;

        $dir='upload/cv/';

        $original_name=$_FILES['cv']['name'];
        $ext=pathinfo($original_name,PATHINFO_EXTENSION);

        $new_name=time().'.'.$ext;

        $file_name= $dir.$new_name;
        
        $ok=1;
        if($ext!='pdf' && $ext!='docx' && $ext!='xlsx'){
            echo '<div class="alert alert-danger">file not uploded</div>';
        $ok=0;
        }

        if($_FILES['cv']['size']>5000){
            echo '<div class="alert alert-danger">file too  large</div>';
            $ok=0;
        }

        if($ok==1){

        move_uploaded_file($_FILES['cv']['tmp_name'],$file_name);
        echo '<div class="alert alert-success">file  uploded</div>';
    }


        
    }
    ?>

</body>

</html>