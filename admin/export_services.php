<?php
require('../conn.php');
$q_ex="SELECT * FROM `services`";
$services=mysqli_query($conn,$q_ex);
header("Content-Disposition:attachment;filename=\"services.xls\"");
header("Cache-Control:cashe,must-revalidate");
header("Paragma:public");
header("Content-Type:application/xls");
$header='';
$header.='Name'."\t";
$header.='Price'."\t";
$header.='Desc'."\t";
$data='';

while($service=mysqli_fetch_assoc($services)){
    $service_name=$service['service_name'];
    $value=str_replace('"','""',$service_name);
    $value='"'.$value.'"'."\t";
    $line=$value;

$price=$service['price'];
$value=str_replace('"','""',$price);
$value='"'.$value.'"'."\t";
$line=$value;

$service_desc=$service['service_desc'];
$value=str_replace('"','""',$service_desc);
$value='"'.$value.'"'."\t";
$line=$value;

$data.=trim($line)."\n";

}
$data="\n".str_replace("\r","",$data );
print mb_convert_encoding($header,'UTF-16LE','UTF-8');
print mb_convert_encoding($data,'UTF-16LE','UTF-8');
?>