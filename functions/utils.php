<?php

/**
 * @return string
 */
function getFunctionName(): string
{
    $functionName = 'read';

    $method = $_SERVER['REQUEST_METHOD'];
    $idExistsInGet = isset($_GET['id']);

    if ($method == 'POST') {
        if ($idExistsInGet) {
            $functionName = 'update';
        } else {
            $functionName = 'create';
        }

        if (isset($_GET['login'])) {
            $functionName = 'checkUserData';
        }

        if (isset($_GET['register'])) {
            $functionName = 'register';
        }

        if (isset($_GET['show'])) {
            $functionName = 'show';
        }
    } else {
        if ($idExistsInGet) {
            $functionName = 'delete';
        }

        if (isset($_GET['create'])) {
            $functionName = 'showCreateForm';
        }

        if (isset($_GET['show'])) {
            $functionName = 'showReportPage';
        }

        if (isset($_GET['admin'])) {
            $functionName = 'showAdminPage';
        }

        if (isset($_GET['update'])) {
            $functionName = 'showUpdateForm';
        }

        if (isset($_GET['login'])) {
            $functionName = 'showLoginPage';
        }

        if (isset($_GET['logout'])) {
            $functionName = 'logOutAndRedirect';
        }

        if (isset($_GET['students'])) {
            $functionName = 'students';
        }

        if (isset($_GET['classrooms'])) {
            $functionName = 'classrooms';
        }

        if (isset($_GET['register'])) {
            $functionName = 'showRegisterForm';
        }
    }

    return $functionName;
}

function redirectIfUserIsNotLoggedIn(): void
{
    if (!isset($_SESSION['user']) || !is_array($_SESSION['user'])) {
        echo '<meta http-equiv="refresh" content="1; url=\'/login\'" />';
        exit;
    }
}