<?php

if(strlen($_POST['namn']) and empty($_POST['email'])){
    $name = htmlspecialchars($_POST['namn']);
    $html = file_get_contents('4.1.2.2.html');
    $html = str_replace('$name' , $name , $html );
    header_remove();
    echo $html;
}elseif(strlen($_POST['namn']) and !empty (strlen($_POST['email']))){
    header("content-type: text/plain");
    $name = htmlspecialchars($_POST['namn']);
    $mail = htmlspecialchars($_POST['email']);
    echo 'Namn: ' . $name . '  Email: ' . $mail;

}else echo 'No data or wrong data was submitted';


