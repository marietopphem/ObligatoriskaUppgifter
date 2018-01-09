<?php
header('Content-type: text/plain');
//print_r($_FILES);
if($_FILES['file']['size'] > 400000 or empty($_FILES)){
    echo 'Antingen så var bilden för stor eller så har ingen bild valts';
    die();
}
$type = $_FILES['file']['type'];
switch ($type) {
    case"image/jpeg":
        header('Content-Type: ' . $type );
        readfile($_FILES['file']['tmp_name']);
        break;
    case"image/png":
        header('Content-Type: ' . $type);
        readfile($_FILES['file']['tmp_name']);
        break;
    case"text/plain":
        readfile($_FILES['file']['tmp_name']);
        break;
    default:
        echo 'Name:' .$_FILES['file']['name']. ' Type:' . $type . ' Size:' . $_FILES['file']["size"];
        break;
}

