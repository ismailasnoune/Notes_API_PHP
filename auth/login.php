<?php
include("../connect.php");

$password=filterrequest("password");
$email=filterrequest("email");
$sql="SELECT * FROM `notes`.`users` WHERE `email`=? AND `password`=?";
$stmt=$con->prepare($sql);
$stmt->execute(array($email,$password));
$data=$stmt->fetch(PDO::FETCH_ASSOC);
$count=$stmt->rowCount();
if($count>0){
 print(json_encode(array("status"=>"success","data"=>$data)));
}else{
    print( json_encode(array("status"=>"error")));
}
?>