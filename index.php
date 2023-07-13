<?php

session_start();

require_once __DIR__ . '/libs/jpgraph-4.4.1/src/jpgraph.php';
require_once __DIR__ . '/libs/jpgraph-4.4.1/src/jpgraph_line.php';

require_once __DIR__ . '/db/database.php';
require_once __DIR__ . '/functions/utils.php';

$url = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];

//Routing
/**
 * Students:
 * Create - POST method + URL '/controllers/students.php'
 * Read - GET method + URL '/controllers/students.php'
 * Update - POST method + URL '/controllers/students.php?id=%id%'
 * Delete - GET method  + URL '/controllers/students.php?id=%id%'

 * Classrooms:
 * Create - POST method + URL '/controllers/classrooms.php'
 * Read - GET method + URL '/controllers/classrooms.php'
 * Update - POST method + URL '/controllers/classrooms.php?id=%id%'
 * Delete - GET method  + URL '/controllers/classrooms.php?id=%id%'

 * User:
 * Read - GET method + URL '/controllers/users.php'
 */

$get = '';
if (str_contains(strtolower($url), 'delete') || str_contains(strtolower($url), 'update')) {
    /**
     *  /students/delete/id/345
     *  $urlParams[0] -> ''
     *  $urlParams[1] -> 'students'
     *  $urlParams[2] -> 'delete'
     *  $urlParams[3] -> 'id'
     *  $urlParams[4] -> '345'
     */
    $urlParams = explode('/', $url);
    $get = $urlParams[4] ?? '';
    $_GET['id'] = $get;
    $url = '/' . $urlParams[1] . '/' . $urlParams[2] . '/' . $urlParams[3];
}

$routing = match ($url) {
    '/students', '/students/delete/id' => ['file' => __DIR__ . '/controllers/students.php', 'get' => ''],
    '/students/update/id' => ['file' => __DIR__ . '/controllers/students.php', 'get' => 'update'],
    '/students/create' => ['file' => __DIR__ . '/controllers/students.php', 'get' => 'create'],
    '/classrooms', '/classrooms/delete/id' => ['file' => __DIR__ . '/controllers/classrooms.php', 'get' => ''],
    '/classrooms/update/id' => ['file' => __DIR__ . '/controllers/classrooms.php', 'get' => 'update'],
    '/classrooms/create' => ['file' => __DIR__ . '/controllers/classrooms.php', 'get' => 'create'],
    '/users' => ['file' => __DIR__ . '/controllers/users.php', 'get' => ''],
    '/users/register' => ['file' => __DIR__ . '/controllers/users.php', 'get' => 'register'],
    '/login' => ['file' => __DIR__ . '/controllers/users.php', 'get' => 'login'],
    '/logout' => ['file' => __DIR__ . '/controllers/users.php', 'get' => 'logout'],
    '/admin' => ['file' => __DIR__ . '/controllers/users.php', 'get' => 'admin'],
    '/users/show' => ['file' => __DIR__ . '/controllers/users.php', 'get' => 'show'],
    default => ['file' => __DIR__ . '/templates/pages/home.php', 'get' => ''],
};

$_GET[$routing['get']] = $routing['get'];
require_once $routing['file'];

require_once __DIR__ . '/db/db-close.php';
