<?php
define("MB",1048576);
function filterrequest($req){
    return htmlspecialchars(strip_tags($_POST[$req]));
}

function imageupload($imgrequest){

    global $msgerror;
    $imgname=$_FILES[$imgrequest]["name"];
    $imgtmp=$_FILES[$imgrequest]['tmp_name'];
    $imgsize=$_FILES[$imgrequest]['size'];
    $allow_Ext=array("jpg","png","gif");
    $strtoarray=explode(".",$imgname);
    $ext=end($strtoarray);
    $ext=strtolower($ext);
    if(!empty($imgname)&& !in_array($ext,$allow_Ext)){
        $msgerror[]="error";

    }
    if($imgsize > 2*MB){
        $msgerror[]="size";

    }
    if(empty($msgerror)){
        move_uploaded_file($imgtmp,"../upload/".$imgname);
       return $imgname;
    }else{
       return"fail";
    }

}
function deleteFile($dir,$imgrequest){
    if(file_exists($dir."/".$imgrequest)){
        unlink($dir."/".$imgrequest);

    }

};

    function checkAuthenticate(){
        if (isset($_SERVER['PHP_AUTH_USER'])  && isset($_SERVER['PHP_AUTH_PW'])) {
    
            if ($_SERVER['PHP_AUTH_USER'] != "ismail" ||  $_SERVER['PHP_AUTH_PW'] != "ismail1414"){
                header('WWW-Authenticate: Basic realm="My Realm"');
                header('HTTP/1.0 401 Unauthorized');
                echo 'Page Not Found';
                exit;
            }
        } else {
            exit;
        }
    }


?>