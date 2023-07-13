<?php

$function = getFunctionName();

try {
    $function();
} catch (Exception $e) {
    echo $e->getMessage();
    die;
}


/**
 * @return void
 */
function showAdminPage(): void
{
    redirectIfUserIsNotLoggedIn();
    require_once __DIR__ . '/../templates/pages/admin.php';
}

/**
 * @return void
 */
function showReportPage(): void
{
    global $mysqli;

    $sql = "SELECT * FROM classrooms";
    $result = $mysqli->query($sql);
    $classrooms = $result->fetch_all(MYSQLI_ASSOC);

    require_once __DIR__ . '/../templates/pages/show.php';
}

/**
 * @return void
 */
function show(): void
{
    global $mysqli;
    $sql = "SELECT * FROM classrooms";
    $result = $mysqli->query($sql);
    $classrooms = $result->fetch_all(MYSQLI_ASSOC);
    
    // Get the selected classroom ID from the form
    $classroomId = filter_input(INPUT_POST, 'classrooms', FILTER_VALIDATE_INT);

    if ($classroomId !== false) {
        $sql = "SELECT s.*, c.name as classroom_name FROM students s LEFT JOIN classrooms c ON c.classroom_id = s.classroom_id WHERE s.classroom_id = $classroomId";
        $result = $mysqli->query($sql);
        $students = $result->fetch_all(MYSQLI_ASSOC);

        // Find the selected classroom name from the list of classrooms
        $selectedClassroom = null;
        foreach ($classrooms as $classroom) {
            if ($classroom['classroom_id'] == $classroomId) {
                $selectedClassroom = $classroom;
                break;
            }
        }
        $classroomName = $selectedClassroom['name'];

    } else {
        echo "Invalid classroom selection!";
        return;
    }

    require_once __DIR__ . '/../templates/pages/show.php';
}


/**
 * @return void
 */
function showRegisterForm(): void
{
    require_once __DIR__ . '/../templates/pages/users/register.php';
}

/**
 * @return void
 */
function register(): void
{
    global $mysqli;

    $fullName = filter_input(INPUT_POST, 'fullName');
    $email = filter_input(INPUT_POST, 'email');
    $password = filter_input(INPUT_POST, 'password');
    $password = password_hash($password, PASSWORD_DEFAULT);

    if ($fullName == null || $fullName == false) {
        echo "Invalid name input.";
    } elseif ($email == null || $email == false) {
        echo "Invalid email input.";
    } elseif (empty($password)) {
        echo "Invalid password input.";
    } else {
        $sql = sprintf("INSERT INTO users (full_name, email, password) VALUES ('%s', '%s', '%s')", $fullName, $email, $password);

        $statement = $mysqli->prepare($sql);
        $statement->execute();

        echo '<meta http-equiv="refresh" content="1; url=\'/home\'" />';
    }
}

/**
 * @return void
 */
function showLoginPage(): void
{
    require_once __DIR__ . '/../templates/pages/users/login.php';
}

/**
 * @return void
 */
function checkUserData(): void
{
    global $mysqli;

    $email = filter_input(INPUT_POST, 'email');
    $password = filter_input(INPUT_POST, 'password');

    if ($email == null || $email == false) {
        echo "Invalid email input.";
    } elseif ($password == null || $password == false) {
        echo "Invalid password input.";
    } else {
        $sql = sprintf("SELECT * FROM users WHERE email='%s'", $email);
        $result = $mysqli->query($sql);
        $user = $result->fetch_array(MYSQLI_ASSOC);

        if (!$user || !password_verify($password, $user['password'])) {
            echo '<meta http-equiv="refresh" content="1; url=\'/login\'" />';
            exit;
        }

        $_SESSION['user'] = $user;

        echo '<meta http-equiv="refresh" content="1; url=\'/admin\'" />';
    }
}

/**
 * @return void
 */
function logOutAndRedirect(): void
{
    unset($_SESSION['user']);
    $_SESSION = [];
    session_destroy();

    echo '<meta http-equiv="refresh" content="1; url=\'/login\'" />';
}