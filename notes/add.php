<?php
include("../connect.php");
$note_title=filterrequest("note_title");
$note_content=filterrequest("note_content");


$note_user=filterrequest("note_user");
$note_img=imageupload("file");

$sql="INSERT INTO `notes`.`note`(`note_title`,`note_content`,`note_users`,`note_img`) VALUES(?,?,?,?)";
if($note_img!="fail"){
    $stmt=$con->prepare($sql);
    $stmt->execute(array($note_title,$note_content,$note_user,$note_img));
    $count=$stmt->rowCount();
    if($count>0){
     print(json_encode(array("status"=>"success")));
    }else{
        print( json_encode(array("status"=>"error")));
    }
}
else{
    print( json_encode(array("status"=>"error")));
}

?>