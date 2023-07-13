<?php

$mysqli = new mysqli(
    hostname: 'localhost',
    username: 'applw',
    password: 'apple@22',
    database: 'jagaad'
);


// check connection

if ($mysqli->connect_errno) {
    echo 'Failed to connect to MYSQL: ' . $mysqli->connect_error;
    exit;
}
