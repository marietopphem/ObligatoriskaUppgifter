<?php
header('Content-type: text/plain');
foreach (getenv() as $key => $value) {
    echo "$key: $value\n";
}
foreach ($_SERVER as $key => $value) {
    echo "$key: $value\n";
}

header('Content-type: text/plain');

REMOTE_ADDR ();

HTTP_USER_AGENT ();