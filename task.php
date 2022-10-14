<?php
$h=fopen('./test.txt','w');
//  $size= filesize('./test.txt');
// echo fread($h,$size);

// write to fil//
// $students=["ahmed","nour","ali"];

// foreach( $students as$student){
// $new_studen=$student."\n";

//   fwrite($h,$new_studen);
// }
$student=[];
while(!feof($h)){
 $student[] fgets($h).'<br />';
}

fclose($h);
?>