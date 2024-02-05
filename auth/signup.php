<?php
include("../connect.php");
$username=filterrequest("username");
$password=filterrequest("password");
$email=filterrequest("email");
$sql="INSERT INTO `notes`.`users`(`username`,`password`,`email`) VALUES(?,?,?)";
$stmt=$con->prepare($sql);
$stmt->execute(array($username,$password,$email));
$count=$stmt->rowCount();
if($count>0){
 print(json_encode(array("status"=>"success")));
}else{
    print( json_encode(array("status"=>"error")));
}
?>