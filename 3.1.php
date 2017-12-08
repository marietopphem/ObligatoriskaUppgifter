<?php

include_once '1.1.php';

$htmlFile = file_get_contents('3.1.html');

$htmlFile = str_replace("---x antal---", $counter, $htmlFile);

echo $htmlFile;