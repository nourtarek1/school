<?php
function upload_file($file,$dir, $type){
    $orginal_name=$file['name'];
    $ext=pathinfo($orginal_name,PATHINFO_EXTENSION);
              
   $new_name=time().'.'.$ext;

    $file_name= $dir.$new_name;
    $ok=1; 
    
      $msg='';
      if(array_search($ext,$type)==false){

         $msg= 'File Not uploaded (is not txt file)';
         $ok=0;
  }
  if($file['size']>5000000){

      $msg='File Too Large (4M)';
      $ok=0;

  }

  if($ok==1){
       move_uploaded_file($file['tmp_name'],$file_name);
       $msg='File  uploaded Successfly';
  }
  return $msg;
}      








?>