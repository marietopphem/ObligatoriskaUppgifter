<?php

header('Content-type: text/plain');

flock(fopen('count.txt','r+'),LOCK_EX);

$counter = file_get_contents("count.txt");
$counter = trim($counter);
$counter++;

fwrite(fopen('count.txt','w+'), $counter);

echo $counter;

?>