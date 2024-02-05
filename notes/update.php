<?php
include("../connect.php");

$note_id=filterrequest("id");
$note_title=filterrequest("note_title");
$note_content=filterrequest("note_content");
$note_img=filterrequest("note_img");

if(isset($_FILES['file'])){
    deleteFile("../upload",$note_img);
$note_img=imageupload("file");

}

$sql="UPDATE `notes`.`note`SET `note_title`=?,`note_content`=? ,`note_img`=? WHERE `note_id`=? ";
$stmt=$con->prepare($sql);
$stmt->execute(array($note_title,$note_content,$note_img,$note_id));
$count=$stmt->rowCount();
if($count>0){
 print(json_encode(array("status"=>"success")));
}else{
    print( json_encode(array("status"=>"error")));
}
?>