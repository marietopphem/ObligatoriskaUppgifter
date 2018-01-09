<?php

header('Content-type: text/plain');

flock(fopen('count.txt','r+'),LOCK_EX);

$counter = file_get_contents("count.txt");
$counter = trim($counter);
$counter++;

fwrite(fopen('count.txt','w+'), $counter);


$htmlFile = file_get_contents('3.1.html');

$htmlFile = str_replace("---x antal---", $counter, $htmlFile);

header_remove();

echo $htmlFile;