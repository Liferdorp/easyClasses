<?php


$JsonInput = file_get_contents('php://input');
$PostArray = json_decode($JsonInput, true);

$FormAction = $PostArray["action"];

if ($FormAction == "functions") {
    

}



?>