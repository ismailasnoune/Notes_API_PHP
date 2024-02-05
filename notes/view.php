<?php
include("../connect.php");

$id=filterrequest("id");

$sql="SELECT * FROM `notes`.`note` WHERE `note_users`=? ";
$stmt=$con->prepare($sql);
$stmt->execute(array($id));
$data=$stmt->fetchAll(PDO::FETCH_ASSOC);
$count=$stmt->rowCount();
if($count>0){
 print(json_encode(array("status"=>"success","data"=>$data)));
}else{
    print( json_encode(array("status"=>"no-data")));
}
?>