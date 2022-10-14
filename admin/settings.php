<!DOCTYPE html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">


</head>

<body>

    
    


    <form method=post action='index.php?page=settings.php' enctype='multipart/form-data'>
        <label>service name</label>
        <input type="color" name='service_name'></br>

        <label>Header background</label>
        <input type="color" name='header_background'></br>

        <label>Change Img</label>
        <input type="text" name='Ghange_img'></br>
        <h1>add new services</h1>
        <input type="text" name="sname" placeholder='service Name'></br>
        <input type="text" name="sprice" placeholder='service price'></br>
        <textarea name="sdesc" cols="30" rows="10"></textarea></br>
        <label for="">feature image</label> <input type=file name='service_img'></br>
        <label>Gallery</label><input type="file" name=gallery[] multiple>
        <button>save</button>
    </form>



    <?php
if($_SERVER['REQUEST_METHOD']=='POST'){
$style_path='../css/style.css';

$h=fopen($style_path,'w');

$service_name=$_POST['service_name'];
$header_background=$_POST['header_background'];
$Ghang_img=$_POST['Ghange_img'];
$style=".container-1 h2{
    color:$service_name;
    
}
.menu nav{
    background-color:$header_background;
}
    body{
        background-image:url(../logo/$Ghang_img );
    
    
}";


fwrite($h,$style);
}
?>
    <?php

if($_SERVER['REQUEST_METHOD']=='POST'){
$service_name=$_POST['sname'];
$service_price=$_POST['sprice'];
$service_desc=$_POST['sdesc'];
$service_img=$_FILES['service_img'];
$created_at=date('d-m-y H:i:s');
$dir='../upload/';
$type=['jpg','png','jpeg'];
$service_img=upload_file($service_img,$dir,$type);

$msg= 'correct user';
header("LOCATION:index.php?page=settings.php&msg=$msg");
// gallery upload//
$gallery=$_FILES['gallery'];
       $type=['jpg','png','jpeg'];
       $dir='../upload/gallery/';


       $ins_id=create_service($service_name,$service_price,$service_price,$service_desc,$created_at,$service_img);

      
       upload_multi_files($gallery,$dir,$ins_id);



}
?>
</body>

</html>