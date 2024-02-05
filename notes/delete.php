<?php
include("../connect.php");

$id=filterrequest("id");
$img=filterrequest("img_name");

$sql="DELETE FROM `notes`.`note` WHERE `note_id`=? ";
$stmt=$con->prepare($sql);
$stmt->execute(array($id));
$count=$stmt->rowCount();
if($count>0){
 deleteFile("../upload",$img);
 print(json_encode(array("status"=>"success")));
}else{
    print( json_encode(array("status"=>"error")));
}
?>