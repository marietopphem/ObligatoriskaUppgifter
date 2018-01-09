<?php
header('Content-type: text/plain');


if(isset($_GET['name']) and empty($_GET['mail'])){
    $name = htmlspecialchars($_GET['name']);
    $htmlFile = file_get_contents('4.1.1.2.html');
    $htmlFile = str_replace('$name' , $name , $html );
    header_remove();
    echo $htmlFile;
}elseif(isset($_GET['name']) and !empty($_GET['mail'])){
    header("content-type: text/plain");
    $name = htmlspecialchars($_GET['name']);
    $mail = htmlspecialchars($_GET['mail']);
    echo $name . $mail;
}else echo 'No data or wrong data was submitted';