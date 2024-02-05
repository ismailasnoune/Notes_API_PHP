<?php
include "connect.php";
$sql="SELECT * FROM `notes`.`users`";

$stmt =$con->prepare($sql);
$stmt->execute();
$users=$stmt->fetchAll(PDO::FETCH_ASSOC);
$count=$stmt->rowCount();
if ($count>0) {
    echo json_encode($users);
}else{
    echo "error";
}



?>