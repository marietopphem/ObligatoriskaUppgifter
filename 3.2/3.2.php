
<?php
$htmlFile = file_get_contents('3.2.html');
list($top, $table, $bottom) = explode('<!--==xxx==-->', $htmlFile);

function makeTable($table){
    $tables = '';
    $replace = array('---name---' , '---value---');
    foreach (getenv() as $key => $value) {
        $replaceInput = array(htmlentities($key), htmlentities($value));
        $tables .= str_replace($replace, $replaceInput, $table );
    }
    foreach ($_SERVER as $key => $value) {
        $replaceInput = array(htmlentities($key), htmlentities($value));
        $tables .= str_replace($replace, $replaceInput, $table );
    }
    return $tables;
}

echo $top . makeTable($table) . $bottom ;